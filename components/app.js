const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  matchPassword();
  if (pw1.value === pw2.value) {
    container.classList.add("right-panel-active");
    document.forms[0].submit(); // Submit the form
  }
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// password validation function 
function matchPassword() {  
  var pw1 = document.getElementById("pswd1");  
  var pw2 = document.getElementById("pswd2");  
  if(pw1 != pw2)  
  {   
    alert("Passwords did not match");  
  } else {  
    alert("Password created successfully");  
  }  
}  