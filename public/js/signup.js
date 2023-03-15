// Read <form id="validate-form"></form> in signup.php View for HTTP Request
const form = document.querySelector("#validate-form"), btn = form.querySelector("button");

// Prevent the form action attribute --> prevent page refresh
form.onsubmit = (e) => { e.preventDefault(); }

// When the user clicks on Sign Up, make the HTTP Request to back-end: url = Signup.php Controller
btn.onclick = ()=>
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
                
                if (data == '¡Solicitud enviada!') { iconText = 'success'; }
                else { iconText = 'error'; }
                
                Swal.fire({
                    icon : iconText, html: data, width: 320,
                    allowOutsideClick: false, allowEscapeKey: false,
                    timer: 5000, timerProgressBar: true,
                }).then((result) => {
                    if (result.isConfirmed && data == '¡Solicitud enviada!') { location.reload(); }
                    else if (result.dismiss === Swal.DismissReason.timer && data == '¡Solicitud enviada!') { location.reload(); }
                    else if (result.isConfirmed) { Swal.close(); }
                    else if (result.dismiss === Swal.DismissReason.timer) { Swal.close(); }
                })
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}