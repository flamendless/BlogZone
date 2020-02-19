function CheckFile(filepath)
{
	let dfd = $.Deferred();
	$.get(filepath)
		.done(function()
			{
				console.log("File already exists: " + filepath);
				dfd.resolve();
			})
		.fail(function()
			{
				console.log("File does not exist: " + filepath);
				dfd.reject();
			});

	return dfd.promise();
}

function SavePost(method, username, id, title, caption, content, now, create_new, overwrite)
{
	let base_path = "/posts/" + username + "/";
	let filename = snake_case(title) + ".md";
	let filepath = base_path + filename;

	let date_created = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time_created = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	let date_published = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time_published = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	let is_published = true;

	let url = "";

	if (method == "overwrite")
		url = '/BlogZone/php/overwrite_post.php';
	else if (method == "create")
		url = '/BlogZone/php/create_post.php';
	console.log(method);

	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: url,
		data: {
			"id": id,
			"username": username,
			"title": title,
			"caption": caption,
			"content": content,
			"filename": filename,
			"base_path": base_path,
			"is_published": is_published,
			"date_created": date_created,
			"time_created": time_created,
			"date_published": date_published,
			"time_published": time_published,
		},
		success: function(data)
		{
			console.log("Save post: " + data);
			vex.dialog.alert("Post saved!");
		}
	});
	return dfd.promise();
}
