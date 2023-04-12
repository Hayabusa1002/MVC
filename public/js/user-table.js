// Read <form id="user-request-form"></form> in home.php View for HTTP Request
const form = document.querySelector("#user-request-form"), btn = form.querySelector("button");

// Prevent the form action attribute --> prevent page refresh
form.onsubmit = (e) => { e.preventDefault(); }

// When the user clicks on Approve (or Deny), make the HTTP Request to back-end: url = Home.php Controller and userRequest method
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
                
                if (data == '¡Proceso Exitoso!') { iconText = 'success'; }
                else { iconText = 'error'; }
                
                Swal.fire({
                    icon : iconText, html: data, width: 320,
                    allowOutsideClick: false, allowEscapeKey: false,
                    timer: 5000, timerProgressBar: true,
                }).then((result) => {
                    if (result.isConfirmed && data == '¡Proceso Exitoso!') { location.reload(); }
                    else if (result.dismiss === Swal.DismissReason.timer && data == '¡Proceso Exitoso!') { location.reload(); }
                    else if (result.isConfirmed) { Swal.close(); }
                    else if (result.dismiss === Swal.DismissReason.timer) { Swal.close(); }
                })
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

function editUser(val, opt = '', data = '')
{
    if (opt == 'add')
	{
		data = { "NOMBRE" : "", "CEDULA" : "", "TIPO_USUARIO" : "", "CORREO" : "", "RESPALDO" : "", "AREA" : "" }
		modalTitle = 'REGISTRAR NUEVO USUARIO'; data['editOpt'] = opt;
	}
	else { modalTitle = 'EDITAR REGISTRO DE USUARIO'; data['editOpt'] = opt; }

	array = ['NOMBRE', 'CEDULA', 'TIPO_USUARIO', 'CORREO', 'RESPALDO', 'AREA'];
	for (var i=0; i<6; i++) { if (data[array[i]] == null) { data[array[i]] = ""; } }

	if(val == true)
	{
		Swal.fire(
		{
			background: 'transparent',
			width: 800,
            backdrop:   `
                        #909497
                        static
                        `,
			allowOutsideClick: false,
            allowEscapeKey: false,
			// text: JSON.stringify(data),
			html:   '<link rel="stylesheet" href="arthemis_files/css/lib/adminlte.min.css">' +

					'<div class="form-wrapper" style="overflow-x: hidden;">' +
						'<div class="card card-outline card-primary">' +
								'<div class="card-header text-center">' + 
								'<img src="arthemis_files/img/Logo_Tigo_Business.png" width="200" height="80">' +
							'</div>' +

							'<div class="card-body admin-signup">' +
								'<p class="login-box-msg"><strong>' + modalTitle + '</strong></p>' +

								'<form action="#" method="post">' +

									'<input id="editOpt" name="editOpt" type="hidden" readonly/>' +

									'<div class="row">' +
										'<div class="col-md-6">' +
											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-user"></i></span>' +
												'<input id="name" name="name" type="text" class="form-control" placeholder="* Ingresar nombre de usuario" required/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-id-card"></i></span>' +
												'<input id="ced" name="ced" type="number" class="form-control" placeholder="* Ingresar cédula de usuario" required/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-solid fa-tags"></i></span>' +
												'<select id="type" name="type" class="form-control" required>' +
													'<option hidden value="">* Seleccione tipo usuario</option>' +
													'<option>ADMIN</option>' +
													'<option>GESTOR</option>' +
													'<option>NORMAL</option>' +
												'</select>' +
											'</div>' +
										'</div>' +

										'<div class="col-md-6">' +
											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-envelope"></i></span>' +
												'<input id="email" name="email" type="email" class="form-control" placeholder="* Ingresar correo de usuario" required/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-envelope"></i></span>' +
												'<input id="backup" name="backup" type="email" class="form-control" placeholder="Ingresar correo de quien respalde"/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-solid fa-users"></i></span>' +
												'<select id="area" name="area" class="form-control" required>' +
													'<option hidden selected value="">* Seleccione área</option>' +
													'<option>Soporte Técnico</option>' +
													'<option>Servicio al Cliente</option>' +
													'<option>Ejecutivo Presencial</option>' +
													'<option>Back</option>' +
													'<option>Administrativo</option>' +
													'<option>Líder</option>' +
													'<option>Otros</option>' +
												'</select>' +
											'</div>' +
										'</div>' +
									'</div>' +

									'<div class="row" style="position: relative; right: -25%;">' +
										'<div class="col-md-6">' +
											'<button type="submit" class="btn btn-success btn-block">Registrar</button>' +
											'<a onClick="editUser(false);" href="#" class="btn btn-danger btn-block">Cerrar</a>' +
										'</div>' +
									'</div>' +

								'</form>' +
							'</div>' +
						'</div>' +
					'</div>',
			showConfirmButton: false,
			didOpen: () =>
			{
				// Set inputs data
				userData = data;
				editOpt  = data['editOpt'];
				
				$('#editOpt').val(data['editOpt']);
				$('#name').val(data['NOMBRE']);
				$('#ced').val(data['CEDULA']);
				$('#type').val(data['TIPO_USUARIO']);
				$('#email').val(data['CORREO']);
				$('#backup').val(data['RESPALDO']);
				$('#area').val(data['AREA']);

				// Get backend data
				const form = document.querySelector(".card-body.admin-signup form"),
				submitBtn  = form.querySelector("button");
				
				form.onsubmit = (e) => { e.preventDefault(); }

				submitBtn.onclick  = () =>
				{
					let xhr = new XMLHttpRequest();
					xhr.open("POST", "./arthemis_files/php/backend_admin_register.php", true);
					xhr.onload = ()=>
					{
						if(xhr.readyState === XMLHttpRequest.DONE)
						{
							if(xhr.status === 200)
							{
								let data = xhr.response;
								
								if (data.includes('correctamente')) { iconText = 'success'; }
								else { iconText = 'error'; }
								
								Swal.fire({
									icon : iconText, html: data, width: 320,
									allowOutsideClick: false, allowEscapeKey: false,
									timer: 5000, timerProgressBar: true,
								}).then((result) => {
									if (result.isConfirmed && data.includes('correctamente'))
									{
										$('#users').DataTable().clear().destroy();
										usersTable();
										Swal.close();
									}
									else if (result.dismiss === Swal.DismissReason.timer && data.includes('correctamente'))
									{
										$('#users').DataTable().clear().destroy();
										usersTable();
										Swal.close();
									}
									else if (result.isConfirmed) { editUser(true, editOpt, userData); }
									else if (result.dismiss === Swal.DismissReason.timer) { editUser(true, editOpt, userData); }
								})
							}
						}
					}
					let formData = new FormData(form);
					xhr.send(formData);
				}
			},
		})
	}
	else { Swal.close() }
}