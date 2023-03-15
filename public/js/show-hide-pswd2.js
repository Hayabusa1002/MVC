const field  = document.querySelectorAll("#show-hide-pswd"),
// Password input
pswdField    = field[0].querySelector("input[type='password']"),
pswdIcon     = field[0].querySelector("i#show-hide-icon"),
// Confirm password input
confField    = field[1].querySelector("input[type='password']"),
confIcon     = field[1].querySelector("#show-hide-icon");

pswdIcon.onclick  = () => { togglePswd(pswdField, pswdIcon) }
confIcon.onclick  = () => { togglePswd(confField, confIcon) }

function togglePswd(input, toggleIcon) {
  if (input.type === 'password')
  {
    input.type = 'text';
    toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
  }

  else
  {
    input.type = 'password';
    toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
  }
}