$(document).ready(
function()
{
	let username = Cookies.get("username");
	let id = GetURLData("id");
	let title = GetURLData("title");

	if (!username)
	{
		$("button[name = 'btn_edit']").remove();
	}

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
			"title": title,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);

			let content_split = parsed.post_content.split("\\n");
			let content = content_split.join("\n");

			let editor = new tui.Editor({
				el: document.querySelector("#viewer"),
				height: "480px",
				initialValue: content,
				usageStatistics: false,
			});

			if (username != parsed.author)
			{
				SetupRating();
				// SetupComments();
			}
		}
	});

	//TODO need works
	//view-source:http://viima.github.io/jquery-comments/demo/
	//http://viima.github.io/jquery-comments/demo/data/comments-data.js
	UpdateComment();
});

function SetupRating()
{
  	$("#rateYo").rateYo({
  		numStars: 5,
  		halfStar: true,
  		onSet: function(rating, obj)
  		{
  			vex.dialog.alert("You have rated: " + rating);
  			$(this).rateYo("option", "readOnly", true);
  		}
  	});
}

function SetupComments()
{
	let p = GetUserInfo();
	p.done(
		function(parsed_data)
		{
			let filename = parsed_data["filename"];
			let rel_path = parsed_data["rel_path"];
			let filetype = parsed_data["filetype"];
			console.log(filename, rel_path, filetype);
		}
	).fail(
		function(parsed_data)
		{
			let file = "/BlogZone/template_user.svg";
			UpdateComment(file);
		});
}

function UpdateComment(file = "/BlogZone/assets/template_user.svg")
{
	let username = "Stranger";
	$("#comments").comments({
		profilePictureURL: file,
		getComments: function(success, error)
		{
			let arr_comments = [{
				id: 1,
				created: "2020-02-19",
				content: "Awesome post!",
				fullname: username,
			}];
			success(arr_comments);
		}
	});
}

function GetUserInfo()
{
	let username = Cookies.get("username");
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/get_user_info.php',
		data: {
			"username": username,
		},
		success: function(data)
		{
			if (data == false)
				dfd.reject();
			else
			{
				let parsed = JSON.parse(data);
				if (parsed.result)
					dfd.resolve(parsed);
				else
					dfd.reject(parsed);
			}
		}
	});
	return dfd.promise();
}
