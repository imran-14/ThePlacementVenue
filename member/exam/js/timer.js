//timer
var seconds=60;
var minutes=59;
var stop=null;
window.onload=startcountdownTimer;
function startcountdownTimer()
{
	stop = window.setInterval("countdownTime()",1000);
}
function countdownTime()
{
	seconds--;
	if(seconds<0)
	{
		seconds=59;
		minutes--;
	}
	if(minutes<0)
	{
		minutes=59;
	}
	minutes = checkTime(minutes);
	seconds = checkTime(seconds);
	document.getElementById("time").innerHTML = minutes+" : "+seconds;
	if(minutes=="00"&&seconds=="00")
	{
		clearInterval(stop);
		window.alert("Time's up");
		document.getElementById("submitButton").click();
	}
}
function checkTime(i)
{
	var istring = i+"";
	if(istring.length<2) return "0"+istring;
	else return istring;
}