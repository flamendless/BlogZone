const username_min_length = 8;
const username_max_length = 50;
const email_min_length = 8;
const email_max_length = 50;
const password_min_length = 8;
const password_max_length = 50;

const btn_register = "#form_register button[name = 'btn_register']";
const spinner = "i[name = 'spinner']";

const input_username = "#form_register input[name = 'username']";
const input_email = "#form_register input[name = 'email']";
const input_password = "#form_register input[name = 'password']";
const input_confirm_password = "#form_register input[name = 'confirm_password']";

const div_username = "div[name = 'username']";
const div_email = "div[name = 'email']";
const div_password = "div[name = 'password']";
const div_confirm_password = "div[name = 'confirm_password']";

const req_username = "#form_register p[name = 'username-required']";
const req_email = "#form_register p[name = 'email-required']";
const req_password = "#form_register p[name = 'password-required']";
const req_confirm_password = "#form_register p[name = 'confirm-password-required']";

const checkbox_accept_term = "#checkbox_accept_term";

const message_username_min = "#form_register p[name = 'username-min']";
const message_username_max = "#form_register p[name = 'username-max']";
const message_username_taken = "#form_register p[name = 'username-taken']";
const message_email_taken = "#form_register p[name = 'email-taken']";
const message_email_valid = "#form_register p[name = 'email-valid']";
const message_password_min = "#form_register p[name = 'password-min']";
const message_password_max = "#form_register p[name = 'password-max']";
const message_confirm_password = "#form_register p[name = 'confirm-password']";

let final_username;
let final_password;
let final_email;
let username_pass = false;
let email_pass = false;
let password1_pass = false;
let password2_pass = false;
let password_pass = false;
let valid_username = false;
let valid_email = false;
let valid_email_form = false;
let valid_accept_term = false;

function CheckIfComplete()
{
	if (username_pass && password_pass && email_pass && valid_username && valid_email && valid_email_form && valid_accept_term)
		$(btn_register).removeAttr("disabled", "");
	else
		$(btn_register).attr("disabled", "");
}

$(document).ready(
function()
{
	$(btn_register).attr("disabled", "");
	$(spinner).hide();

	Username();
	EMail();
	Password();

	$(checkbox_accept_term).on("change",
		function()
		{
			valid_accept_term = $(checkbox_accept_term).is(":checked");
			CheckIfComplete();
		});

	$(btn_register).click(
		function()
		{
			if (username_pass && password_pass && email_pass)
			{
				$(btn_register).hide();
				$(spinner).show();

				let ajax_register = Register(final_username, final_password, final_email);
				ajax_register.done(
					function(success, id)
					{
						Cookies.set("id", id);
						window.location = "/BlogZone/pages/login.php";
					}
				).fail(
				function(data)
					{
						console.log(data);
						$(btn_register).show();
						$(spinner).hide();
					});
			}
		});
});

function Username()
{
	$(input_username).keyup(
		function()
		{
			let username = $(input_username).val();
			username_pass = (username.length >= username_min_length && username.length <= username_max_length);

			if (username.length != 0)
				$(req_username).addClass("u-hide");
			else
				$(req_username).removeClass("u-hide");

			if (username.length > 0 && username.length < username_min_length)
				$(message_username_min).removeClass("u-hide");
			else
				$(message_username_min).addClass("u-hide");

			if (username.length > 0 && username.length > username_max_length)
				$(message_username_max).removeClass("u-hide");
			else
				$(message_username_max).addClass("u-hide");

			if (username.length > 0 && !username_pass)
				$(div_username).addClass("is-error");
			else
				$(div_username).removeClass("is-error");

			if (valid_username)
				$(div_username).addClass("is-error");
			else
				$(div_username).removeClass("is-error");

			if ($(div_username).hasClass("is-error"))
				$(div_username).removeClass("is-success");

			if (username_pass)
			{
				let ajax_username = FieldValidateUsername(username);
				ajax_username.always(
					function(data)
					{
						valid_username = data;
						CheckIfComplete();
						if (valid_username)
						{
							$(message_username_taken).addClass("u-hide");
							$(div_username).addClass("is-success");
						}
						else
							$(message_username_taken).removeClass("u-hide");

						if (username_pass && valid_username)
							final_username = username;
					}
				);
			}
		});
}

function EMail()
{
	$(input_email).keyup(
		function()
		{
			let email = $(input_email).val();
			email_pass = (email.length >= email_min_length && email.length <= email_max_length);

			if (email.length != 0)
				$(req_email).addClass("u-hide");
			else
				$(req_email).removeClass("u-hide");

			if ($(div_email).hasClass("is-error"))
				$(div_email).removeClass("is-success");

			if (email_pass)
			{
				let ajax_email = FieldValidateEMail(email);
				ajax_email.always(
					function(form, valid)
					{
						valid_email_form = form;
						valid_email = valid;
						if (valid_email)
							$(message_email_taken).addClass("u-hide");
						else
							$(message_email_taken).removeClass("u-hide");

						if (valid_email_form)
							$(message_email_valid).addClass("u-hide");
						else
							$(message_email_valid).removeClass("u-hide");

						CheckIfComplete();
						if (email_pass && valid_email && valid_email_form)
							final_email = email;

						if (email.length > 0 && (!email_pass || !valid_email || !valid_email_form))
							$(div_email).addClass("is-error");
						else
						{
							$(div_email).removeClass("is-error");
							$(div_email).addClass("is-success");
						}
					}
				);
			}
		});
}

function Password()
{
	$(input_password).keyup(
		function()
		{
			let password = $(input_password).val();
			password1_pass = (password.length >= password_min_length && password.length <= password_max_length);

			if (password.length != 0)
				$(req_password).addClass("u-hide");
			else
				$(req_password).removeClass("u-hide");

			if (password.length > 0 && !password1_pass)
				$(div_password).addClass("is-error");
			else
				$(div_password).removeClass("is-error");

			if (password.length > 0 && password.length < password_min_length)
				$(message_password_min).removeClass("u-hide");
			else
				$(message_password_min).addClass("u-hide");

			if (password.length > 0 && password.length > password_max_length)
				$(message_password_max).removeClass("u-hide");
			else
				$(message_password_max).addClass("u-hide");

			if ($(div_password).hasClass("is-success"))
				$(div_password).removeClass("is-error");

			if (password1_pass)
				$(div_password).addClass("is-success");

			CheckIfComplete();
		});

	$(input_confirm_password).keyup(
		function()
		{
			let password = $(input_password).val();
			let confirm_password = $(input_confirm_password).val();

			if (confirm_password.length != 0)
				$(req_confirm_password).addClass("u-hide");
			else
				$(req_confirm_password).removeClass("u-hide");

			password2_pass = password === confirm_password;
			password_pass = password1_pass === password2_pass;

			if (confirm_password.length > 0 && !password2_pass)
				$(message_confirm_password).removeClass("u-hide");
			else
				$(message_confirm_password).addClass("u-hide");

			if (confirm_password.length > 0 && !password2_pass)
				$(div_confirm_password).addClass("is-error");
			else
				$(div_confirm_password).removeClass("is-error");

			if ($(div_confirm_password).hasClass("is-success"))
				$(div_confirm_password).removeClass("is-error");

			if (password2_pass && password_pass)
				$(div_confirm_password).addClass("is-success");

			CheckIfComplete();
			if (password_pass)
				final_password = password;
		});
}

function Register(username, password, email)
{
	let now = new Date($.now());
	let date = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/register.php',
		data:
		{
			"username": username,
			"password": password,
			"email": email,
			"date": date,
			"time": time,
		},
		success: function(data)
		{
			console.log(data);
			let parsed = JSON.parse(data);
			console.log(StringFormat("Registering ID {0}: {1}", parsed.id, parsed.result));
			if (parsed.result)
				dfd.resolve(parsed.result, parsed.id);
			else
				dfd.reject(data);
		}
	});
	return dfd.promise();
}

function FieldValidateUsername(username)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/check_field.php',
		data:
		{
			"username": username,
		},
		success: function(data)
		{
			console.log("Validate username field: " + !!data);
			dfd.resolve(data);
		}
	});
	return dfd.promise();
}

function FieldValidateEMail(email)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/check_field.php',
		data:
		{
			"email": email,
		},
		success: function(data)
		{
			let result = JSON.parse(data);
			console.log(StringFormat("Validate EMail: form = {0}; valid = {1}", result.form, result.valid));
			dfd.resolve(result.form, result.valid);
		}
	});
	return dfd.promise();
}
