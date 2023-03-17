const field  = document.querySelectorAll("#show-hide-pswd"),
// Last Password input
lastField    = field[0].querySelector("input[type='password']"),
lastIcon     = field[0].querySelector("i#show-hide-icon"),
// New password input
newField     = field[1].querySelector("input[type='password']"),
newIcon      = field[1].querySelector("#show-hide-icon")
// Confirm password input
confField    = field[2].querySelector("input[type='password']"),
confIcon     = field[2].querySelector("#show-hide-icon");

lastIcon.onclick  = () => { togglePswd(lastField, lastIcon) }
newIcon.onclick   = () => { togglePswd(newField,  newIcon)  }
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