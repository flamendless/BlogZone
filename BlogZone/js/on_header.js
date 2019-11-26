$(document).ready(
function()
{
	console.log("Header is ready");

	let current = window.location.pathname;
	let register = $("li[name = 'register']");
	let login = $("li[name = 'login']");

	if (current == "/BlogZone/pages/register.php")
		register.remove();
	else if (current == "/BlogZone/pages/login.php")
		login.remove();

	$(".p-navigation__nav a[href *= \\#]").click(function(e)
		{
			e.preventDefault();
			scroll(this.hash);
		});

	if (location.hash)
		scroll(location.hash);
});

function scroll(target)
{
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
