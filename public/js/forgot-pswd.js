// Read <form id="validate-form"></form> in forgot.php View for HTTP Request
const form = document.querySelector("#validate-form"), btn = form.querySelector("button");

// Prevent the form action attribute --> prevent page refresh
form.onsubmit = (e) => { e.preventDefault(); }

// When the user clicks on Recover password, make the HTTP Request to back-end: url = Forgot.php Controller
btn.onclick  = ()=>
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                
                if (data == '¡Enviado correctamente!') { iconText = 'success'; }
                else { iconText = 'error'; }
                
                Swal.fire({
                    icon : iconText, html: data, width: 320,
                    allowOutsideClick: false, allowEscapeKey: false,
                    timer: 5000, timerProgressBar: true,
                }).then((result) => {
                    if (result.isConfirmed && data == '¡Enviado correctamente!') { location.reload(); }
                    else if (result.dismiss === Swal.DismissReason.timer && data == '¡Enviado correctamente!') { location.reload(); }
                    else if (result.isConfirmed) { Swal.close(); }
                    else if (result.dismiss === Swal.DismissReason.timer) { Swal.close(); }
                })
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}