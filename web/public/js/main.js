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
    var currentClass=document.getElementsByClassName('info required')[0];
    var emailText=document.getElementById('form_email').value;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(emailText))
    {
        if(currentClass!=null){
            document.getElementsByClassName('info required')[0].style.background = 'black';
            document.getElementsByClassName('info required')[0].style.color = 'white';
            document.getElementsByClassName('info required')[0].style.textAlign = "center";
            document.getElementsByClassName('info required')[0].innerHTML = 'Popraw adres! ';
            document.getElementsByClassName('info required')[0].className = "changedClass";
        }else{
            document.getElementsByClassName('changedClass')[0].style.background = 'black';
            document.getElementsByClassName('changedClass')[0].style.color = 'white';
            document.getElementsByClassName('changedClass')[0].style.textAlign = "center";
            document.getElementsByClassName('changedClass')[0].innerHTML = 'Popraw adres! ';
        }
    }else{
        if(currentClass!=null){
        document.getElementsByClassName('info required')[0].style.background = '#690005';
        document.getElementsByClassName('info required')[0].style.fontSize = 'small';
        document.getElementsByClassName('info required')[0].style.textAlign = "center";
        document.getElementsByClassName('info required')[0].innerHTML = 'Adres poprawny';
        document.getElementsByClassName('info required')[0].className = "changedClass";
        }else{
            document.getElementsByClassName('changedClass')[0].style.background = '#690005';
            document.getElementsByClassName('changedClass')[0].style.fontSize = 'small';
            document.getElementsByClassName('changedClass')[0].style.textAlign = "center";
            document.getElementsByClassName('changedClass')[0].innerHTML = 'Adres poprawny';
        }
    }
}

function checkDataOnBlur(){
    var nameText=document.getElementById('form_nameText').value;
    var emailText=document.getElementById('form_email').value;
    var messageText=document.getElementById('form_message').value;
    if(nameText!="" && emailText!="" && messageText!=""){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(emailReg.test(emailText))
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
    var nameText=document.getElementById('form_nameText').value;
    var emailText=document.getElementById('form_email').value;
    var messageText=document.getElementById('form_message').value;
    if(nameText!="" && emailText!="" && messageText!=""){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if(emailReg.test(emailText)){
            document.getElementById('form_save').disabled = false;  
        }else{
            document.getElementById('form_save').disabled = true;  
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