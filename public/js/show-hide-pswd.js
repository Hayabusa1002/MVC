const field = document.querySelector("#show-hide-pswd"),
pswdField   = field.querySelector("input[type='password']"),
toggleIcon  = field.querySelector("i#show-hide-icon");

toggleIcon.onclick  = () =>
{
    if (pswdField.type === 'password')
    {
      pswdField.type = 'text';
      toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    }
  
    else
    {
      pswdField.type = 'password';
      toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}