const username_min_length = 8;
const username_max_length = 50;
const password_min_length = 8;
const password_max_length = 50;

const btn_login = "#form_login button[name = 'btn_login']";
const spinner = "i[name = 'spinner']";

const div_username = "div[name = 'username']";
const div_password = "div[name = 'password']";
const p_error = "#form_login p[name = 'error']";

const input_username = "#form_login input[name = 'username']";
const input_password = "#form_login input[name = 'password']";

const checkbox_show_password = "#checkbox_show_password";
const checkbox_remember_me = "#checkbox_remember_me";

let valid_username = false;
let valid_password = false;

function CheckIfComplete()
{
	if (valid_username && valid_password)
		$(btn_login).removeAttr("disabled", "");
	else
		$(btn_login).attr("disabled", "");
}

$(document).ready(
function()
{
	$(spinner).hide();
	vex.defaultOptions.className = "vex-theme-os";
	let _username = Cookies.get("username");
	let identifier = Cookies.get("remember_me");
	let did_logout = Cookies.get("logout");
	if (identifier && _username && !did_logout)
	{
		console.log("Validating identifier...");

		let timer_loader = 1500;
		let timer_result = 500;

		$.fakeLoader(
			{
				timeToHide: timer_loader,
				spinner: "spinner2",
				bgColor: "rgb(151, 198, 199)",
			}
		);

		let auth = ValidateIdentifier(identifier, _username);
		auth.done(
			function(data_username)
			{
				console.log("Authentication successful: " + data_username);
				setTimeout(
					function()
					{
						GoToDashboard(data_username);
					}, timer_result);
			}
		).fail(
			function(data_username)
			{
				console.log("Authentication failed: " + data_username);
				setTimeout(
					function()
					{
						Cookies.remove("remember_me");
					}, timer_result);
			}
		);

	}
	else
		$(".fakeLoader").removeClass("fakeLoader");

	$(btn_login).attr("disabled", "");

	$(checkbox_show_password).on("change",
		function()
		{
			let val = $(checkbox_show_password).is(":checked");
			if (val)
				$(input_password).attr("type", "text");
			else
				$(input_password).attr("type", "password");
		});

	$(input_username).keyup(
		function()
		{
			let username = $(input_username).val();
			if (username.length >= username_min_length && username.length <= username_max_length)
				valid_username = true;
			else
				valid_username = false;

			CheckIfComplete();
		});

	$(input_password).keyup(
		function()
		{
			let password = $(input_password).val();
			if (password.length >= password_min_length && password.length <= password_max_length)
				valid_password = true;
			else
				valid_password = false;

			CheckIfComplete();
		});

	$(btn_login).click(
		function()
		{
			if (valid_username && valid_password)
			{
				$(btn_login).hide();
				$(spinner).show();
				let username = $(input_username).val();
				let password = $(input_password).val();
				Login(username, password);
			}
		});
});

function Login(username, password)
{
	let val = ValidateUsernamePassword(username, password);
	val.done(
		function(data_val)
		{
			let remember_me = $(checkbox_remember_me).is(":checked");
			if (remember_me)
			{
				let auth = RememberMeStore(username);
				auth.done(
					function(data_auth)
					{
						console.log("Remember me success");
					}
				).fail(
					function(data_auth)
					{
						console.log("Remember me fail");
					}
				);
			}
			GoToDashboard(username);
		}
	).fail(
		function()
		{
			$(div_username).addClass("is-error");
			$(div_password).addClass("is-error");
			$(input_password).val("");
			$(btn_login).show();
			$(spinner).hide();
			vex.dialog.alert("The username and password does not match");
		}
	);
}

function UpdateSessionUsername(id)
{
	let dfd = $.Deferred();
	let now = new Date($.now());
	let date = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/update_session.php',
		data: {
			"id": id,
			"date": date,
			"time": time
		},
		success: function(data)
		{
			console.log("Update Session By Username: " + !!data);
			if (data)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	})
	return dfd.promise();
}

function ValidateUsernamePassword(username, password)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/login_validate.php',
		data:
		{
			"username": username,
			"password": password,
		},
		success: function(data)
		{
			console.log("Validate Username and Password: " + !!data);
			if (data)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	});
	return dfd.promise();
}

function RememberMeStore(username)
{
	let identifier = Cookies.get("PHPSESSID");
	Cookies.set("remember_me", identifier);
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/identifier_store.php',
		data:
		{
			"identifier": identifier,
			"username": username,
		},
		success: function(data)
		{
			if (data)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	});
	return dfd.promise();
}

function ValidateIdentifier(identifier, username)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/identifier_validate.php',
		data:
		{
			"identifier": identifier,
			"username": username,
		},
		success: function(data)
		{
			let _data = JSON.parse(data);
			if (_data["correct"])
				dfd.resolve(_data["username"]);
			else
				dfd.reject(_data["username"]);
		}
	});
	return dfd.promise();
}

function GoToDashboard(username)
{
	Cookies.set("username", username);
	Cookies.remove("logout");
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/login.php',
		data:
		{
			"username": username,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			console.log("Go To Dashboard: " + parsed.result);
			Cookies.set("id", parsed.id);
			Cookies.set("is_first_time", parsed.is_first_time);
			let upd = UpdateSessionUsername(parsed.id);
			upd.done(
				function(data_upd)
				{
					if (parsed.is_first_time == 1)
						window.location = "/BlogZone/pages/setup.php";
					else
						window.location = "/BlogZone/pages/dashboard.php";
				}
			);
		}
	});
}
