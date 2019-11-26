const spinner_avatar = "i[name = 'spinner_avatar']";
const btn_upload_avatar = "button[name = 'btn_upload_avatar']";
const avatar_file_upload = "input[name = 'avatar_file_upload']";

function OnAvatar()
{
	$(spinner_avatar).hide();
	$(btn_upload_avatar).click(
		function()
		{
			let file = $(avatar_file_upload);
			if (file.val())
			{
				$(btn_upload_avatar).hide();
				$(spinner_avatar).show();
				let check = CheckUploadedFile(file);
				check.done(
					function(data)
					{
						let query = StoreImage(data.info);
						query.done(
							function(data_success)
							{
								$(btn_upload_avatar).show();
								$(spinner_avatar).hide();
								OnAvatarSuccess(data);
							}
						).fail(
							function(data_fail)
							{
								let info = data.info;
								let f = info.rel_path + info.filename;
								$.ajax({
									method: 'POST',
									url: "/BlogZone/php/delete_file.php",
									data: { "file": f },
									success: function(data)
									{
										console.log("deleted" + f + ": " + !!data);
										$(btn_upload_avatar).show();
										$(spinner_avatar).hide();
									}
								});
							});
					}
				).fail(
					function(data_fail)
					{
						let error_code = data_fail.error_code;
						if (error_code == 1)
						{
							OnAvatarSuccess(data_fail);
						}
						$(btn_upload_avatar).show();
						$(spinner_avatar).hide();
					}
				);
			}
		});
}

function OnAvatarSuccess(data)
{
	let info = data.info;
	let f = info.rel_path + info.filename;
	console.log(f + " already exists. Using the existing file.")
	$("#avatar_template").attr("src", f);
	$(btn_upload_avatar).text("Choose Another");
	$("<p></p>").appendTo("#avatar_file_upload").addClass("u-align-text--center").text("File uploaded successfully, you may now proceed to the next step.");
	let store = StoreAvatarToPreference(data);
}

function StoreAvatarToPreference(data)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/store_avatar_preference.php',
		data: {
			"user_id": Cookies.get("id"),
			"filename": data.info.filename,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			if (parsed.result)
			{
				console.log("Storing avatar to preference: " + !!parsed.result);
				dfd.resolve(parsed);
			}
			else
				dfd.reject(parsed);
		}
	});
	return dfd.promise();
}
