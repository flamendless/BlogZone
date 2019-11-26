$(document).ready(
function()
{
	let id = Cookies.get("id");
	let username = Cookies.get("username");
	let title = GetURLData("title");
	let caption = GetURLData("caption") || "";

	let now = new Date($.now());

	let editor = new tui.Editor({
		el: document.querySelector("#editor"),
		previewStyle: "vertical",
		initialEditType: "markdown",
		height: "480px",
		usageStatistics: false,
	});

	$("button[name = 'btn_discard']").click(
		function()
		{
			vex.dialog.confirm({
				message: "Are you sure you want to discard this post?",
				callback: function(value)
				{
					if (value == true)
						window.location = "/BlogZone/pages/dashboard.php";
				}
			});
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
})

