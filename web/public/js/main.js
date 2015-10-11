function countdown(){	
	var timer = new Date();
	var day = timer.getDate();
	var month = timer.getMonth()+1;
	if(month<10) month="0"+month;
	var year = timer.getFullYear();
	var hour = timer.getHours();
	if(hour<10) hour="0"+hour;
	var minute = timer.getMinutes();
	if(minute<10) minute="0"+minute;
	var second = timer.getSeconds();
	if(second<10) second="0"+second;

	document.getElementById("timer").innerHTML= day+"."+month+"."+year+" - godzina: "+hour+":"+minute+":"+second;
	setTimeout("countdown()",1000);
}