$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";
	let id = Cookies.get("id");
	let username = Cookies.get("username");

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
