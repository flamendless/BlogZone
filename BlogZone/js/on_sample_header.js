$(document).ready(
function()
{
	let username = Cookies.get("username");
	let id = Cookies.get("id");

	let p_subnav = ".p-subnav";
	let p_subnav_items = ".p-subnav__item";
	let p_subnav_toggle = ".p-subnav__toggle";

	let subnavs = $(p_subnav);
	let subnav_toggles = $(p_subnav_toggle);
	let subnav_containers = $("[class ^= 'p-subnav__items']");

	$(document).click(
		function(event)
		{
			if (!event.target.closest(p_subnav_toggle) && !event.target.closest(p_subnav_items))
				close_all_subnavs(subnavs, subnav_containers);
		});

	subnav_toggles.click(
		function(event)
		{
			event.preventDefault();
		});

	subnavs.click(
		function(event)
		{
			event.stopPropagation();
			let clicked = this;
			subnavs.each(function(index)
				{
					let subnav = $(this)[index];
					let content = subnavs.children("[name ^= 'subnav_item']");
					if (subnav == clicked)
					{
						if (subnavs.hasClass("is-active"))
							close_subnav(subnavs, content);
						else
							open_subnav(subnavs, content);
					}
					else
						close_subnav(subnavs, content);
				});
		});

	$("#sample_header a[href *= \\#]").click(function(e)
		{
			e.preventDefault();
		});
});

let offset = $('.sticky').offset().top;
$(window).scroll(
function()
{
	let sticky = $(".sticky");
	let scroll = $(window).scrollTop();
	if (scroll > offset)
		sticky.addClass("fixed");
	else
		sticky.removeClass("fixed");
});

function open_subnav(subnav, content)
{
	subnav.addClass("is-active");
	show_element(content);
}

function close_subnav(subnav, content)
{
	subnav.removeClass("is-active");
	hide_element(content);
}

function close_all_subnavs(subnavs, containers)
{
	subnavs.removeClass("is-active");
	hide_element(containers);
}

function hide_element(e)
{
	e.attr("aria-hidden", "true");
}

function show_element(e)
{
	e.attr("aria-hidden", "false");
}

function GetUserAssets(id)
{
	let dfd = $.Deferred();
	$.ajax({
		method: 'POST',
		url: '/BlogZone/php/get_user_assets.php',
		data:
		{
			"id": id,
		},
		success: function(data)
		{
			console.log(data);
			let parsed = JSON.parse(data);
			dfd.resolve(parsed);
		}
	});
	return dfd.promise();
}
