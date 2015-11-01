function setAlert(){
    if(document.send.nameText.value=="" && document.send.emailText.value=="" && document.send.messageText.value==""){
        alert("Nie wypełniono żadnego pola!");
    }
    else if(document.send.nameText.value==""){
        alert("Nie wypełniono pola \"Imię/Nazwisko\"!");
    }
    else if(document.send.emailText.value==""){
        alert("Nie wpisano pola \"Adres e-mail\"!");
    }
    else if(document.send.messageText.value==""){
        alert("Nie wpisano pola \"Wiadomość\"!");
    }
}

function checkEmail(){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(document.send.emailText.value))
    {
        document.getElementById("labelDiv").style.background = 'black';
        document.getElementById("labelDiv").style.color = 'white';
        document.getElementById("labelDiv").style.textAlign = "center";
        document.getElementById("labelDiv").innerHTML = 'Podano błędny format email!';
    }else{
        document.getElementById("labelDiv").style.background = '#690005';
        document.getElementById("labelDiv").style.fontSize = 'small';
        document.getElementById("labelDiv").style.textAlign = "center";
        document.getElementById("labelDiv").innerHTML = 'Adres poprawny';
    }
}

function checkDataOnBlur(){
    if(document.send.nameText.value!="" && document.send.emailText.value!="" && document.send.messageText.value!=""){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(emailReg.test(document.send.emailText.value))
        {
            document.getElementById('checkedDataInfo').style.background = '#690005';
            document.getElementById('checkedDataInfo').style.color = 'white';
            document.getElementById('checkedDataInfo').innerHTML = "Wszystkie pola formularza zostały wypełnione.";
        }else{
            document.getElementById('checkedDataInfo').style.background = 'black';
            document.getElementById('checkedDataInfo').style.color = 'white';
            document.getElementById('checkedDataInfo').innerHTML = "Proszę poprawić adres e-mail!";
        }
    }else{
        document.getElementById('checkedDataInfo').style.background = 'grey';
        document.getElementById('checkedDataInfo').style.color = 'white';
        document.getElementById('checkedDataInfo').innerHTML = "Proszę wypełnić wszystkie pola!";
    }
}

function checkDataOnKeyUp(){
    if(document.send.nameText.value!="" && document.send.emailText.value!="" && document.send.messageText.value!=""){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(emailReg.test(document.send.emailText.value))
        {
            document.getElementById('submitDiv').disabled = false;  
        }else{
            document.getElementById('submitDiv').disabled = true;  
        }
    }
}

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