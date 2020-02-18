$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";
	let id = Cookies.get("id");
	let username = Cookies.get("username");

	$(".post_link").each(
		function(i, obj)
		{
			console.log(obj);
			let post_title = $(obj).attr("name");
			let post_id = $(obj).attr("data");
			let name = snake_case(post_title);
			$(obj).click(
				function()
				{
					let args = "?title=" + post_title;
					args += "&id=" + post_id;
					window.location = "/BlogZone/pages/view.php" + args;
				});
		});

	$("button[name = 'btn_edit']").click(
		function()
		{
			let title = $(this).val();
			let args = StringFormat("?title={0}", title);
			window.location = "/BlogZone/pages/edit_post.php" + args;
		});

	$("button[name = 'btn_delete']").click(
		function()
		{
			let title = $(this).val();
			vex.dialog.confirm({
				message: "Are you sure you want to delete '" + title + "' ?",
				callback: function(value)
				{
					if (value == true)
					{
						let del = DeletePost(username, title);
						del.done(
							function(data_success)
							{
								location.reload();
							}
						).fail(
							function(data_fail)
							{
								console.log(data_fail);
							}
						)
					}
				}
			})
		});
});

function DeletePost(username, title)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/delete_post.php',
		data:
		{
			"username": username,
			"title": title,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			if (parsed.result1 && parsed.result2)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	})
	return dfd.promise();
}
