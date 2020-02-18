let subnavContainers = document.querySelectorAll('[class^="p-subnav__items"]');
let subnavs = document.querySelectorAll('.p-subnav');
let subnavToggles = document.querySelectorAll('.p-subnav__toggle');

function NewPost()
{
	$.getScript("/BlogZone/js/logout.js");
	$("#new_post").click(function()
		{
			vex.dialog.open({
				message: "Enter Post Details",
				input: "<label>Title</label><input name='title' type='text' placeholder='Post Title'><br><label>Caption</label><input name='caption' type='text' placeholder='Post Caption'>",
				callback: function(data)
				{
					if (!data)
						return console.log("cancelled");
					else
					{
						let title = data.title || "";
						let caption = data.caption || "";

						if (title.length <= 0)
							return vex.dialog.alert("Post Title Must Not Be Empty");
						else if (title.length > 100)
							return vex.dialog.alert("Post Title Must Not Exceed 100 Characters");

						if (caption.length > 100)
							return vex.dialog.alert("Post Caption Must Not Exceed 100 Characters");

						let args = StringFormat("?title={0}&caption={1}", title, caption);
						window.location = "/BlogZone/pages/new_post.php" + args;
					}
				}
			});
		});
}

$(document).ready(
function()
{
	vex.defaultOptions.className = "vex-theme-os";
	let username = Cookies.get("username");
	let id = Cookies.get("id");

	if (!username)
	{
		$("li[name = 'dashboard']").find("a").text("Home").attr("href", "/BlogZone/index.php");
		$("li[name = 'menu_post']").remove();
		$("li[name = 'menu_my_account']").remove();

		let ul = $("ul[name = 'menu_right']");
		let il_create = $("<li class='p-navigation__link is-selected' role='menuitem' name='create_account'></li>").appendTo(ul);
		let a_create = $("<a href='/BlogZone/pages/register.php'>Register</a>").appendTo(il_create);

		let il_login = $("<li class='p-navigation__link is-selected' role='menuitem' name='login'></li>").appendTo(ul);
		let a_login = $("<a href='/BlogZone/pages/login.php'>Login</a>").appendTo(il_login);
	}
	else
	{
		$("il[name = create_account]").remove();
		$("il[name = login]").remove();
	}

	NewPost();

	subnavToggles.forEach(function(subnavToggle)
	{
		subnavToggle.addEventListener('click', function(event)
		{
			event.preventDefault();
		});
	});

	subnavs.forEach(function(currentSubnav)
	{
		currentSubnav.addEventListener('click', function(event)
		{
			event.stopPropagation();
			var clickedDropdown = this;
			subnavs.forEach(function(subnav)
			{
				var subnavContent = subnav.querySelector('[class^="p-subnav__items"]');
				if (subnav === clickedDropdown)
				{
					if (subnav.classList.contains('is-active'))
						closeSubnav(subnav, subnavContent);
					else
						openSubnav(subnav, subnavContent)
				}
				else
					closeSubnav(subnav, subnavContent);
			});
		});
	});

	document.addEventListener('click', function(event)
	{
		if (!event.target.closest('.p-subnav__toggle') && !event.target.closest('.p-subnav__item'))
		{
			closeAllSubnavs();
		}
	});

	$(".p-navigation__nav a[href *= \\#]").click(function(e)
		{
			e.preventDefault();
			scroll(this.hash);
		});

	if (location.hash)
		scroll(location.hash);
});

function openSubnav(subnav, subnavContent)
{
	subnav.classList.add('is-active');
	showElement(subnavContent);
}

function closeSubnav(subnav, dropdownContent)
{
	subnav.classList.remove('is-active');
	hideElement(dropdownContent);
}

function closeAllSubnavs()
{
	subnavs.forEach(function(element)
	{
		element.classList.remove('is-active');
	});
	subnavContainers.forEach(function(element)
	{
		hideElement(element);
	});
}

function hideElement(element)
{
	element.setAttribute("aria-hidden", "true");
}

function showElement(element)
{
	element.setAttribute("aria-hidden", "false");
}

function scroll(target)
{
	if ($(target).offset())
		$("html, body").animate({ scrollTop:$(target).offset().top }, 500);
}

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
