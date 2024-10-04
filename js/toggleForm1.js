const toggleRegForm = document.getElementById('toggle-register-form');
const toggleLoginForm = document.getElementById('toggle-login-form');
const toggleProfileForm = document.getElementById('toggle-profile-form');
const toggeleBGDisabler = document.getElementById('toggle-bg-disabler');

function btnToggleRegisterForm() {
	if (toggeleBGDisabler.style.visibility == "visible") {
		toggleRegForm.classList.toggle('active');
		toggeleBGDisabler.style.visibility = "hidden";
	} else {
		toggeleBGDisabler.style.visibility = "visible";
		toggleRegForm.style.visibility = "visible";
		setTimeout(() => toggleRegForm.classList.toggle('active'), 300); 
	}
}

function btnToggleLoginForm() {
	if (toggeleBGDisabler.style.visibility == "visible") {
		toggleLoginForm.classList.toggle('active');
		toggeleBGDisabler.style.visibility = "hidden";
	} else {
		toggeleBGDisabler.style.visibility = "visible";
		toggleLoginForm.style.visibility = "visible";
		setTimeout(() => toggleLoginForm.classList.toggle('active'), 300); 
	}
} 

function btnToggleProfileForm() {
	if (toggeleBGDisabler.style.visibility == "visible") {
		toggleProfileForm.classList.toggle('active');
		toggeleBGDisabler.style.visibility = "hidden";
	} else {
		toggeleBGDisabler.style.visibility = "visible";
		toggleProfileForm.style.visibility = "visible";
		setTimeout(() => toggleProfileForm.classList.toggle('active'), 300); 
	}
} 

function btnToggleLogOrSignup(form) {
	if(form == "login") {
		toggleRegForm.classList.toggle('active');
		toggleRegForm.style.visibility = "hidden";
		toggleLoginForm.style.visibility = "visible";
		setTimeout(() => toggleLoginForm.classList.toggle('active'), 300); 
	} else {
		toggleLoginForm.classList.toggle('active');
		toggleLoginForm.style.visibility = "hidden";
		toggleRegForm.style.visibility = "visible";
		setTimeout(() => toggleRegForm.classList.toggle('active'), 300); 
	}
}

const checkShowPass = document.getElementById('check-show-pass');
const txtPass = document.getElementById("txt-reg-Pass");
function passVisibility() {
	if (txtPass.type === "password") {
		txtPass.type = "text";
	} else {
		txtPass.type = "password";
	}
}
