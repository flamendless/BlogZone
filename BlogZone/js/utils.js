let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

function GetURLData(arg)
{
	let url = window.location.search.substring(1);
	let data = url.split("&");
	for (let i = 0; i < data.length; i++)
	{
		let param = data[i].split("=");
		if (param[0] == arg)
			return decodeURIComponent(param[1]);
	}
}

function snake_case(str)
{
	return str.toLowerCase().replace(/\W+/g, " ").split(/ |\B(?=[A-Z])/).map(word => word.toLowerCase()).join("_");
}

function StringFormat()
{
	let s = arguments[0];
	for (let i = 0; i < arguments.length - 1; i++)
	{
		let reg = new RegExp("\\{" + i + "\\}", "gm");
		s = s.replace(reg, arguments[i + 1]);
	}
	return s;
}

function DateFormat(date)
{
	let arr = date.split("-");
	let year = arr[0];
	let month = arr[1];
	let day = arr[2];
	let converted_date = months[month - 1] + ". " + day + ", " + year;
	return converted_date;
}

function TimeFormat(time)
{
	let arr = time.split(":");
	let n_hour = Number(arr[0]);
	let n_minute = Number(arr[1]);
	let n_second = Number(arr[2]);

	let t;
	if (n_hour > 0 && n_hour <= 12)
		t = "" + n_hour;
	else if (n_hour > 12)
		t = "" + (n_hour - 12);
	else if (n_hour == 0)
		t = "12";

	t += (n_minute < 10) ? ":0" + n_minute : ":" + n_minute;
	t += (n_second < 10) ? ":0" + n_second : ":" + n_second;
	t += (n_hour >= 12) ? " P.M." : " A.M.";

	return t;
}

function CookiesClear()
{
	let all = Cookies.get();
	for (let name in all)
		Cookies.remove(name);

	window.location = "/index.php";
}

function CookiesCount()
{
	let all = Cookies.get();
	let i = 0;
	for (let name in all)
		i++;

	console.log("Cookies count: " + i);
}

function CookiesList()
{
	let all = Cookies.get();
	for (let name in all)
		console.log("cookie > " + name + " : " + all[name]);
}
