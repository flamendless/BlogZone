$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";
	$.getScript("/BlogZone/js/logout.js");
	let id = Cookies.get("id");
	let username = Cookies.get("username");
	if (!id || !username)
	{
		vex.dialog.alert({
			message: "You are not logged in.",
			callback: function()
			{
				window.location = "/BlogZone/pages/login.php";
			}
		});
	}

	let p = AppendPosts();
	p.done(
		function(arr_data)
		{
			for (let i = 0; i < arr_data.length; i++)
			{
				let parsed_data = arr_data[i];
				let url = parsed_data.url;
				let name = snake_case(parsed_data.title);
				let url_null = "javascript:void(0);";
				let date_published = DateFormat(parsed_data.date_published);
				let time_published = TimeFormat(parsed_data.time_published);

				let div_main = $("<div></div>").appendTo("body").addClass("p-card--highlighted u-clearfix u-equal-height post-main");
				let div_details_card = $("<div></div>").appendTo(div_main).addClass("p-card--highlighted u-float-left--medium u-float-left--large date-card");
				let details_card = $("<h1></h1>").appendTo(div_details_card).addClass("p-muted-heading u-align-text--center").text("DETAILS");
				let date_card = $("<p></p>").appendTo(div_details_card).text("Date: " + date_published);
				let time_card = $("<p></p>").appendTo(div_details_card).text("Time: " + time_published);

				let div_post_card = $("<div></div>").appendTo(div_main).addClass("p-card--highlighted post-card");
				let section = $("<section></section>").appendTo(div_post_card).addClass("p-strip--light is-shallow");
				let div_row = $("<div></div>").appendTo(section).addClass("row");
				let post_title = $("<h2></h2>").appendTo(div_row).addClass("u-align-text--center");
				let post_link = $("<a></a>").appendTo(post_title).attr("href", url_null).attr("name", name).val(parsed_data.title).text(parsed_data.title);
				let post_caption = $("<p></p>").appendTo(div_row).addClass("u-align-text--center").text(parsed_data.caption);
				let hr = $("<hr>").appendTo(div_row);
				let post_content = $("<p></p>").appendTo(div_row).addClass("post-fade post-content").text(parsed_data.content.substring(0, 100));
				let read_more = $("<p></p>").appendTo(div_row).addClass("u-align-text--center");
				let read_more_link = $("<a></a>").appendTo(read_more).attr("href", url_null).attr("name", name).val(parsed_data.title).text("Show Full Post");
				let icon = $("<i></i>").appendTo(read_more_link).addClass("p-icon--contextual-menu");

				$("a[name = " + name + "]").click(
					function()
					{
						let args = "?title=" + $(this).val();
						args += "&id=" + parsed_data.id;
						window.location = "/BlogZone/pages/view.php" + args;
					});
				}
		});
});

function AppendPosts()
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/show_posts.php',
		data:
		{
			"limit": 5,
			"username": Cookies.get("username"),
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			dfd.resolve(parsed);
		}
	});
	return dfd.promise();
}
