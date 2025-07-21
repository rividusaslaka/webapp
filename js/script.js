const form = document.getElementById('form');
const username_input = document.getElementById('username-input');
const email_input = document.getElementById('email-input');
const password_input = document.getElementById('password-input');
const repeat_password_input = document.getElementById('repeat-password-input');
const error_message = document.getElementById('error-message');
let inputEl = document.getElementById('password-input');
let reinputEl = document.getElementById('repeat-password-input');
let showEl = document.getElementById('show-password');
let hideEl = document.getElementById('hide-password');
let reshowEl = document.getElementById('re-show-password');
let rehideEl = document.getElementById('re-hide-password');


form.addEventListener("submit", (e) => {
  let errors = []

  if(username_input){
    // If we have a username input then we are in the register
    errors = getRegisterFormErrors(username_input.value, email_input.value, password_input.value, repeat_password_input.value)
  }
  else{
    // If we don't have a username input then we are in the login
    errors = getLoginFormErrors(email_input.value, password_input.value)
  }

  if(errors.length > 0){
    // If there are any errors
    e.preventDefault()
    error_message.innerText  = errors.join(". ")
  }
})

function getRegisterFormErrors(username, email, password, repeatPassword){
  let errors = []

  if(username === "" || username == null){
    errors.push("Username is required")
    username_input.parentElement.classList.add("incorrect")
  }
  if(email === '' || email == null){
    errors.push('Email is required');
    email_input.parentElement.classList.add('incorrect')
  }
  if(password === '' || password == null){
    errors.push('Password is required')
    password_input.parentElement.classList.add('incorrect')
  }
  if(password.length < 8){
    errors.push('Password must have at least 8 characters')
    password_input.parentElement.classList.add('incorrect')
  }
  if(password !== repeatPassword){
    errors.push('Password does not match repeated password')
    password_input.parentElement.classList.add('incorrect')
    repeat_password_input.parentElement.classList.add('incorrect')
  }


  return errors;
}

function getLoginFormErrors(email, password){
  let errors = []

  if(email === '' || email == null){
    errors.push('Email is required')
    email_input.parentElement.classList.add('incorrect')
  }
  if(password === '' || password == null){
    errors.push('Password is required')
    password_input.parentElement.classList.add('incorrect')
  }

  return errors;
}

const allInputs = [username_input, email_input, password_input, repeat_password_input].filter(input => input != null)

allInputs.forEach(input => {
  input.addEventListener('input', () => {
    if(input.parentElement.classList.contains('incorrect')){
      input.parentElement.classList.remove('incorrect')
      error_message.innerText = ''
    }
  })
})

showEl.addEventListener("click", () => {
  inputEl.type = "text";
  hideEl.classList.remove("hide");
  showEl.classList.add("hide");
})
hideEl.addEventListener("click", () => {
  inputEl.type = "password";
  hideEl.classList.add("hide");
  showEl.classList.remove("hide");
})
reshowEl.addEventListener("click", () => {
  reinputEl.type = "text";
  rehideEl.classList.remove("hide");
  reshowEl.classList.add("hide");
})
rehideEl.addEventListener("click", () => {
  reinputEl.type = "password";
  rehideEl.classList.add("hide");
  reshowEl.classList.remove("hide");
})