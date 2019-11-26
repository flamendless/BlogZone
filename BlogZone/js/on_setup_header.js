const spinner_header = "i[name = 'spinner_header']";
const btn_upload_header = "button[name = 'btn_upload_header']";
const header_file_upload = "input[name = 'header_file_upload']";

const sample_header = "#sample_header";
const sample_dashboard = "#sample_dashboard";

const sample_text1 = "#text1";
const sample_text2 = "#text2";
const sample_text3 = "#text3";

const header_color_bg = "input[name = 'header_color_bg']";
const header_color_item = "input[name = 'header_color_item']";
const header_color_dashboard = "input[name = 'header_color_dashboard']";
const header_color_body = "input[name = 'header_color_body']";

const template_header = "#template_header";

const user_logo = "#user_logo";
const logo_link = "input[name = 'header_logo_link']";
const text_link1 = "input[name = 'header_link1']";
const text_link2 = "input[name = 'header_link2']";
const text_link3 = "input[name = 'header_link3']";

const text1 = "input[name = 'header_text1']";
const text2 = "input[name = 'header_text2']";
const text3 = "input[name = 'header_text3']";

const select1 = "select[name = 'select1']";
const td_text1 = "#td-text1";
const td_logo1 = "#td-logo1";
const logo1 = "select[name = 'logo1']";

const select2 = "select[name = 'select2']";
const td_text2 = "#td-text2";
const td_logo2 = "#td-logo2";
const logo2 = "select[name = 'logo2']";

const select3 = "select[name = 'select3']";
const td_text3 = "#td-text3";
const td_logo3 = "#td-logo3";
const logo3 = "select[name = 'logo3']";

function OnTypes()
{
	OnTypeChange(select1, text1, td_text1, td_logo1);
	OnTypeChange(select2, text2, td_text2, td_logo2);
	OnTypeChange(select3, text3, td_text3, td_logo3);
}

function OnTypeChange(select, text, td_text, td_logo)
{
	$(select).change(function()
		{
			let val = $(select).val();
			if (val == "text")
			{
				$(text).prop("disabled", false);
				$(td_logo).addClass("u-hide");
				$(td_text).removeClass("u-hide");
			}
			else
			{
				$(td_text).addClass("u-hide");
				$(td_logo).removeClass("u-hide");
			}
		})
}

function OnLogo()
{
	OnLogoChange(logo1, sample_text1, 1);
	OnLogoChange(logo2, sample_text2, 2);
	OnLogoChange(logo3, sample_text3, 3);
}

function OnLogoChange(parent, target, i)
{
	$(parent).change(function()
		{
			let val = $(parent).val();
			$(target).text("");
			$("<i></i>").addClass("p-icon--" + val).attr("name", "header_logo" + i).appendTo(target);
		});
}

function OnHeader()
{
	ColorPicker();
	TextValues();
	LinkValues();
	OnTypes();
	OnLogo();
	$(spinner_header).hide();
	$(btn_upload_header).click(
		function()
		{
			let file = $(header_file_upload);
			if (file.val())
			{
				$(btn_upload_header).hide();
				$(spinner_header).show();
				let check = CheckUploadedFile(file);
				check.done(
					function(data)
					{
						let query = StoreImage(data.info);
						query.done(
							function(data_success)
							{
								$(btn_upload_header).show();
								$(spinner_header).hide();
								OnHeaderSuccess(data);
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
										$(btn_upload_header).show();
										$(spinner_header).hide();
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
							OnHeaderSuccess(data_fail);
						}
						$(btn_upload_header).show();
						$(spinner_header).hide();
					}
				);
			}
		});
}

function TextValues()
{
	$(text1).change(
		function()
		{
			let text = $(text1).val();
			$(sample_text1).text(text);
		});
	$(text2).change(
		function()
		{
			let text = $(text2).val();
			$(sample_text2).text(text);
		});
	$(text3).change(
		function()
		{
			let text = $(text3).val();
			$(sample_text3).text(text);
		});
}

function LinkValues()
{
	$(logo_link).change(
		function()
		{
			let text = $(logo_link).val();
			let url = "https://" + text;
			$(user_logo).attr("href", url);
		}
	)
	$(text_link1).change(
		function()
		{
			let text = $(text_link1).val();
			let url = "https://" + text;
			$(sample_text1).attr("href", url);
		});
	$(text_link2).change(
		function()
		{
			let text = $(text_link2).val();
			let url = "https://" + text;
			$(sample_text2).attr("href", url);
		});
	$(text_link3).change(
		function()
		{
			let text = $(text_link3).val();
			let url = "https://" + text;
			$(sample_text3).attr("href", url);
		});
}

function OnHeaderSuccess(data)
{
	let info = data.info;
	let f = info.rel_path + info.filename;
	console.log(f + " already exists. Using the existing file.")
	$("#header_template").attr("src", f);
	$(btn_upload_header).text("Choose Another");
	$("<p></p>").appendTo("#header_file_upload").addClass("u-align-text--center").text("File uploaded successfully, you may now proceed to the next step.");

	let pref = StoreHeaderToPreference(data);
	pref.done(
		function(pref_data)
		{
			let f = info.rel_path + info.filename;
			$(template_header).attr("src", f);
		}
	);
}

function StoreHeaderToPreference(data)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/store_header_preference.php',
		data: {
			"user_id": Cookies.get("id"),
			"filename": data.info.filename,
		},
		success: function(data)
		{
			let parsed = JSON.parse(data);
			if (parsed.result)
			{
				console.log("Storing header to preference: " + !!parsed.result);
				dfd.resolve(parsed);
			}
			else
				dfd.reject(parsed);
		}
	});
	return dfd.promise();
}

function ColorPicker()
{
	UpdateColorPicker(header_color_bg, sample_header, "background-color");
	UpdateColorPicker(header_color_item, sample_text1, "color");
	UpdateColorPicker(header_color_item, sample_text2, "color");
	UpdateColorPicker(header_color_item, sample_text3, "color");
	UpdateColorPicker(header_color_dashboard, sample_dashboard, "background-color");
	UpdateColorPicker(header_color_body, sample_body, "background-color");
}

function UpdateColorPicker(color_picker, obj, property)
{
	$(color_picker).change(
		function()
		{
			let value = $(color_picker).val();
			$(obj).css(property, value);
		});
}

