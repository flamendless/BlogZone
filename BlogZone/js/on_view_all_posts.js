$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";
	let id = Cookies.get("id");
	let username = Cookies.get("username");

	$(".post_link").each(
		function(i, obj)
		{
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
			const title = $(this).val();
			const post_id = $(this).attr("data");
			let args = StringFormat("?title={0}", title);
			args += "&id=" + post_id;
			window.location = "/BlogZone/pages/edit_post.php" + args;
		});

	$("button[name = 'btn_share']").click(
		function()
		{
			const title = $(this).val();
			const id = $(this).attr("data");
			let args = StringFormat("?title={0}", title);
			args += "&id=" + id;
			const post_url = "http://localhost/BlogZone/pages/view.php" + args;
			navigator.clipboard.writeText(post_url).then(function()
				{
					vex.dialog.alert("Blog post link has been copied to clipboard");
				});
		});

	$("button[name = 'btn_publish']").click(
		function()
		{
			const title = $(this).val();
			let p = TogglePublishedPost(username, title);
		});

	$("button[name = 'btn_delete']").click(
		function()
		{
			const title = $(this).val();
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

function TogglePublishedPost(username, title)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/toggle_published_post.php',
		data:
		{
			"username": username,
			"title": title,
		},
		success: function(data)
		{
			console.log("Toggle " + title + " : " + !!data);
			location.reload();
		}
	});
	return dfd.promise();
}

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
			console.log(data);
			let parsed = JSON.parse(data);
			if (parsed.result1 && parsed.result2)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	})
	return dfd.promise();
}
