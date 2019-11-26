function LogOut()
{
	vex.dialog.confirm({
		message: "Are you sure you want to log out?",
		callback: function(value)
		{
			if (value == true)
			{
				Cookies.set("logout", true);
				let update_session = UpdateSessionOut(Cookies.get("id"));
				update_session.done(
					function(data)
					{
						let identifier = Cookies.get("remember_me");
						if (!identifier)
						{
							Cookies.remove("username");
							Cookies.remove("id");
							Cookies.remove("is_first_time");
						}
						window.location = "/BlogZone/pages/login.php";
					});
			}
		}
	});
}

function UpdateSessionOut(id)
{
	let dfd = $.Deferred();
	let now = new Date($.now());
	let date = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/update_session_out.php',
		data: {
			"id": id,
			"date": date,
			"time": time,
		},
		success: function(data)
		{
			console.log("Updated Session Date/Time Out: " + !!data);
			if (data)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	});
	return dfd.promise();
}

