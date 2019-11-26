const spinner = "i[name = 'spinner']";
const btn_submit = "button[name = 'btn_submit']";

//TODO change to "#introduction"
const initial_hash = "#introduction";

$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";

	SetHashEvent();
	SetPagination();
	SetBirthDate();

	$.getScript("/BlogZone/js/on_setup_avatar.js", function() { OnAvatar(); });
	$.getScript("/BlogZone/js/on_setup_header.js", function() { OnHeader(); });

	$(spinner).hide();
	$(btn_submit).click(function()
		{
			$(spinner).show();
			$(btn_submit).hide();

			let store = StoreInfo();
			store.done(
				function()
				{
					$.ajax({
						method: 'POST',
						url: '/BlogZone/php/finished_setup.php',
						data: {
							"id": Cookies.get("id"),
						},
						success: function(data)
						{
							console.log("Updating is_first_time: " + data);
						}
					});
					vex.dialog.alert({
						message: "Setup is successful! We will redirect you to the dashboard page.",
						callback: function()
						{
							window.location = "/BlogZone/pages/dashboard.php";
						}
					});
				});
		});
});

function StoreImage(info)
{
	let now = new Date($.now());
	let date = now.getFullYear() + "/" + (now.getMonth() + 1) + "/" + (now.getDate());
	let time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/uploaded_file_store.php',
		data:
		{
			"date": date,
			"time": time,
			"filename": info.filename,
			"original_filename": info.original_filename,
			"filetype": info.filetype,
			"rel_path": info.rel_path,
		},
		success: function(data)
		{
			if (data == true)
			{
				console.log("Storing to database: " + !!data);
				dfd.resolve(data);
			}
			else
			{
				console.log(data);
				dfd.reject(data);
			}
		}
	});
	return dfd.promise();
}

function CheckUploadedFile(file)
{
	let form_data = new FormData();
	let files = file[0].files[0];
	form_data.append("file", files);

	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/uploaded_file_handler.php',
		contentType: false,
		processData: false,
		data: form_data,
		success: function(data)
		{
			console.log(data);
			let res = JSON.parse(data);
			if (res.valid)
			{
				dfd.resolve(res);
				console.log("Storing to local storage: " + data);
			}
			else
			{
				dfd.reject(res);
				console.log("Error: " + res.message);
			}
		}
	});
	return dfd.promise();
}

function StoreInfo()
{
	let fname = $("#form_basic_information input[name = 'first_name']").val();
	let mname = $("#form_basic_information input[name = 'middle_name']").val();
	let lname = $("#form_basic_information input[name = 'last_name']").val() ;
	let sex = $("#sex option:selected").val();
	let day = $("#birthday option:selected").val() || "0";
	let month = $("#form_basic_information input[name = 'birthmonth']").val() || "0";
	let year = $("#birthyear option:selected").val() || "0";
	let birthdate = year + "-" + month + "-" + day;

	let item1 = GetHeaderItem("select[name = 'select1']", "input[name = 'header_text1']", "select[name = 'logo1']");
	let item2 = GetHeaderItem("select[name = 'select2']", "input[name = 'header_text2']", "select[name = 'logo2']");
	let item3 = GetHeaderItem("select[name = 'select3']", "input[name = 'header_text3']", "select[name = 'logo3']");

	let link0 = $("input[name = 'header_logo_link']").val();
	let link1 = $("input[name = 'header_link1']").val();
	let link2 = $("input[name = 'header_link2']").val();
	let link3 = $("input[name = 'header_link3']").val();

	let color_header_bg = $("input[name = 'header_color_bg']").val();
	let color_header_item = $("input[name = 'header_color_item']").val();
	let color_header_text = $("input[name = 'header_color_text']").val();
	let color_dashboard = $("input[name = 'header_color_dashboard']").val();
	let color_body = $("input[name = 'header_color_body']").val();

	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/store_info.php',
		data:
		{
			"id": Cookies.get("id"),
			"fname": fname, "mname": mname, "lname": lname,
			"sex": sex,
			"birthdate": birthdate,
			"item1": item1, "item2": item2, "item3": item3,
			"link0": link0, "link1": link1, "link2": link2, "link3": link3,
			"color_header_bg": color_header_bg,
			"color_header_text": color_header_text,
			"color_header_item": color_header_item,
			"color_dashboard": color_dashboard,
			"color_body": color_body,
		},
		success: function(data)
		{
			console.log("Update info:" + data);
			if (data == true)
				dfd.resolve(data);
			else
				dfd.reject(data);
		}
	});
	return dfd.promise();
}

function GetHeaderItem(select, text, logo)
{
	let selected = $(select).val();
	if (selected == "text")
		return $(text).val();
	else if (selected == "logo")
		return $(logo).val();
	else
		return "";
}

function SetHashEvent()
{
	$(".content").hide();
	window.location.hash = initial_hash;

	$(window).on("hashchange",
		function()
		{
			let hash = window.location.hash.slice(1);
			$(".content").hide();
			$("#" + hash).show();
			if (hash == "styles")
				$("#sample_header").show();
			else
				$("#sample_header").hide();
		}).trigger("hashchange");
}

function SetPagination()
{
	let id = ["introduction", "basic_information", "avatar", "styles", "external_accounts", "final"];
	let title = ["Introduction", "Basic Information", "Avatar", "Styles", "External Accounts", "Final"];

	for (let i = 0; i < id.length; i++)
	{
		let div = $("#" + id[i]);
		$("<hr>").appendTo(div);
		let prev_url = "";
		let next_url = "";
		if (i > 0)
			prev_url = "#" + id[i - 1];
		if (i < id.length - 1)
			next_url = "#" + id[i + 1];

		let prev_title = "";
		let next_title = "";
		if (i > 0)
			prev_title = title[i - 1];
		if (i < title.length - 1)
			next_title = title[i + 1];

		let pagination = $("<div></div>").appendTo(div).addClass("p-article-pagination");
		let a_prev = $("<a></a>").appendTo(pagination).addClass("p-article-pagination__link--previous").attr("href", prev_url);
		$("<span></span>").appendTo(a_prev).addClass("p-article-pagination__label").text("Previous");
		$("<span></span>").appendTo(a_prev).addClass("p-article-pagination__title").text(prev_title);
		let a_next = $("<a></a>").appendTo(pagination).addClass("p-article-pagination__link--next").attr("href", next_url);
		$("<span></span>").appendTo(a_next).addClass("p-article-pagination__label").text("Next");
		$("<span></span>").appendTo(a_next).addClass("p-article-pagination__title").text(next_title);

		if (i == 0)
			a_prev.css("visibility", "hidden");
		else if (i == id.length - 1)
			a_next.css("visibility", "hidden");
	}
}

function SetBirthDate()
{
	$("#form_basic_information input[name = 'birthmonth']").flatpickr(
		{
			plugins: [
				new monthSelectPlugin(
					{
						shortHand: true,
						dateFormat: "m",
						theme: "material_green",
					})
			]
		}
	);
	$("#form_basic_information input[name = 'birthmonth']").find(".flatpickr-calendar").find(".numInputWrapper").css("display", "none");
	$("input.numInput.cur-year").css("display", "none");

	let div_birthyear = $("#birthyear");
	for (let i = 1900; i < 2020; i++)
	{
		$("<option></option>").appendTo(div_birthyear).val(i).change().text(i);
	}

	let div_birthday = $("#birthday");
	for (let i = 1; i < 31; i++)
	{
		$("<option></option>").appendTo(div_birthday).val(i).change().text(i);
	}
}
