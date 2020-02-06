$(document).ready(
function()
{
	let username = Cookies.get("username");
	let id = GetURLData("id");
	let title = GetURLData("title");

	$("button[name = 'btn_edit']").click(
		function()
		{
			let args = StringFormat("?title={0}", title);
			args += "&id=" + id;
			window.location = "/BlogZone/pages/edit_post.php" + args;
		});

	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/get_post_info.php',
		data:{
			"id": id,
			"username": username,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			$("h1[name = 'post_title']").text(parsed.title);
			$("h4[name = 'post_caption']").text(parsed.caption);
			$("p[name = 'post_author']").text("@" + parsed.author);
		}
	});

	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/get_post_content.php',
		data:{
			"id": id,
			"username": username,
			"title": title,
		},
		success: function(data)
		{
			let content_split = data.split("\\n");
			let content = content_split.join("\n");

			let editor = new tui.Editor({
				el: document.querySelector("#viewer"),
				height: "480px",
				initialValue: content,
				usageStatistics: false,
			});
		}
	});

});
