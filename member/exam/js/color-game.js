<script type="text/javascript">
	var score = 0;
	var once = false;
	var color = ["red","blue","yellow","black","green","violet","orange"];
	var colorFont = ["red","blue","yellow","black","green","violet","orange"];
	var coloredString = "";
	
	document.getElementById("xyz").innerHTML = 0;
	
	function startGame()
	{
		if(once)	return;
		once = true;
		startcountdownTimer();
		stringGenerator();
	}
	
	function stringGenerator()
	{
		//validate();
		if(seconds!=00){var z = Math.floor((Math.random()*7));
		var j = Math.floor((Math.random()*7));
		var k = Math.floor((Math.random()*7));
		if(z<3)j=k;
		coloredString = color[j].fontcolor(colorFont[k]);
		document.getElementById("y").innerHTML = coloredString;
		if(j==k){
			document.getElementById("correct").onclick = function(){
				document.getElementById("xyz").innerHTML = ++score;
				stringGenerator();
			};
			document.getElementById("wrong").onclick = function(){
				document.getElementById("xyz").innerHTML = --score;
				stringGenerator();
			};
		}
		else {
			document.getElementById("correct").onclick = function(){
					document.getElementById("xyz").innerHTML = --score;
				stringGenerator();
			};
			document.getElementById("wrong").onclick = function(){
			document.getElementById("xyz").innerHTML = ++score;
				stringGenerator();
			};
		}
		
		if(seconds==00){
			document.getElementById("y").innerHTML = "";
		}
		
		}
	}
	// x=Math.floor(Math.random()*6);
	//var j,k.......
	// if(x<3)j=k;
	//timer
	var seconds=60;
	var minutes=0;
	var stop=null;
	
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
		}
		/*if(minutes<0)
		{
			minutes=59;
		}*/
		minutes = checkTime(minutes);
		seconds = checkTime(seconds);
		document.getElementById("time").innerHTML = seconds+"sec";
		if(minutes=="00"&&seconds=="00")
		{
			clearInterval(stop);
			window.alert("Time's up");
			window.close();
		}
	}
	function checkTime(i)
	{
		var istring = i+"";
		if(istring.length<2) return "0"+istring;
		else return istring;
	}