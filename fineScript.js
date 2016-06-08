var flag_1=0;
var flag_2=0;

var flag_10=0;
var flag_20=0;

function clearLogin() {
	login = document.getElementById("Login");
	password = document.getElementById("Password");
	if ((login.value=="Логин") && (flag_1==0)){
		login.value="";
		flag_1=1;
	}
	if (password.value==""){
		password.value="Пароль";
		flag_2=0;
	}
	// body...
}

function clearPassword() {
	login = document.getElementById("Login");
	password = document.getElementById("Password");
	if ((password.value=="Пароль") && (flag_2==0)){
		password.value="";
		flag_2=1;
	}

	if (login.value==""){
		login.value="Логин";
		flag_1=0;
	}
}

function registr() {
	regDiv = document.getElementById("registration");
	reg_btn = document.getElementById("registration_btn");
	if (regDiv.style.display == "none") {
		regDiv.style.display = "block";
		reg_btn.style.backgroundColor="#FF7C00";
	}
	else {
		regDiv.style.display = "none";
		reg_btn.style.backgroundColor="darkgrey";
	}
}

function scanPassword() {
	nPassword = document.getElementById("newPassword");
	nPassword2 = document.getElementById("newPassword2");
	button = document.getElementById("continue_reg");
	if (nPassword2.value == nPassword.value) {
		continue_reg.className="activeBtn";
		button.disabled = false;
	}
	else{
		continue_reg.className="disabledBtn";
		button.disabled = true;
	}
}


function addNewsScan(){
	names = document.getElementById("NameOfAdding");
	text = document.getElementById("TextOfAdding");
	button = document.getElementById("AddNewsButton");
	if ((names.value != "Название") && (text.value !="Текст новости...")){
	//	alert(names.value);
		button.className="activeBtn";
		button.disabled = false;
	}
	else{
		button.className="disabledBtn";
		button.disabled = true;
	}
	// body...
}

function addNewView() {
	addNewBlock = document.getElementById("addNews");
	if ((addNewBlock.style.display == "none") || (addNewBlock.style.display == "")) addNewBlock.style.display = "block";
	else addNewBlock.style.display = "none";
	//alert(addNewBlock.style.display);
}

function clearAddNews() {
	login = document.getElementById("NameOfAdding");
	password = document.getElementById("TextOfAdding");
	if ((login.value=="Название") && (flag_10==0)){
		login.value="";
		flag_10=1;
	}
	if (password.value==""){
		password.value="Текст новости...";
		flag_20=0;
	}
	// body...
}

function clearAddNewsText() {
	login = document.getElementById("NameOfAdding");
	password = document.getElementById("TextOfAdding");
	if ((password.value=="Текст новости...") && (flag_20==0)){
		password.value="";
		flag_20=1;
	}
	if (login.value==""){
		login.value="Название";
		flag_10=0;
	}
	// body...
}