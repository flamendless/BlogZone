$(document).ready(
function()
{
	let username = Cookies.get("username");
	let id = Cookies.get("id");
	let title = GetURLData("title");
	let caption = "";
	let now = new Date($.now());

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
				el: document.querySelector("#editor"),
				previewStyle: "vertical",
				initialEditType: "markdown",
				height: "480px",
				initialValue: content,
				usageStatistics: false,
			});

			$("button[name = 'btn_save']").click(
				function()
				{
					let base_path = "/posts/" + username + "/";
					let filename = snake_case(title) + ".md";
					let filepath = base_path + filename;
					let content = editor.getMarkdown();

					let check = CheckFile(filepath);
					check.done(
						function()
						{
							let save_post = SavePost("overwrite", username, id, title, caption, content, now);
						}).fail(
						function()
						{
							let save_post = SavePost("create", username, id, title, caption, content, now);
						});
				});
		}
	});

});
