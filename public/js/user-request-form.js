function requestForm(val, data = '')
{
	if(val == true)
	{
		// Show the user request form with Sweet Alert 2
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
			html:   '<div class="form-wrapper swal">' +
						'<div class="card card-outline card-primary">' +
							'<div class="card-header text-center">' +
								'<strong>Responder a solicitud de usuario</strong>' +
							'</div>' +

							'<div class="card-body">' +

								'<form id="user-request-form" method="post">' +

									'<div class="row">' +
										'<div class="col-md-6">' +
											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-user"></i></span>' +
												'<input name="name" type="text" class="form-control" placeholder="* Ingresar nombre de usuario" required/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-id-card"></i></span>' +
												'<input name="id_card" type="number" class="form-control" placeholder="* Ingresar cédula de usuario" required/>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-envelope"></i></span>' +
												'<input name="email" type="email" class="form-control" placeholder="* Ingresar correo de usuario" required/>' +
											'</div>' +
										'</div>' +

										'<div class="col-md-6">' +
											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-solid fa-tags"></i></span>' +
												'<select name="role" class="form-control" required>' +
													'<option value="" selected disabled hidden>* Seleccione rol de usuario</option>' +
													'<option value="amdmin">Administrador</option>' +
													'<option value="normal">Normal</option>' +
												'</select>' +
											'</div>' +

											'<div class="input-group mb-3">' +
												'<span class="input-group-text"><i class="fa-duotone fa-pen-to-square"></i></span>' +
												'<select name="answer" class="form-control" required>' +
													'<option value="" selected disabled hidden>* Seleccione respuesta</option>' +
													'<option value="approved">Aprovar</option>' +
													'<option value="denied">Denegar</option>' +
												'</select>' +
											'</div>' +
										'</div>' +
									'</div>' +

									'<div class="row" style="position: relative; right: -25%;">' +
										'<div class="col-md-6">' +
											'<button type="submit" class="btn btn-success btn-block">Responder</button>' +
											'<a onClick="requestForm(false);" href="#" class="btn btn-danger btn-block">Cerrar</a>' +
										'</div>' +
									'</div>' +

								'</form>' +
							'</div>' +
						'</div>' +
					'</div>',
			showConfirmButton: false,
			// Since the form is open, get back-end's data from 'user-request-table.js'
			didOpen: () =>
			{
				// Set inputs values from row's data
				userData = data;

				$('input[name="name"]').val(data['NAME']);
				$('input[name="id_card"]').val(data['ID_CARD']);
				$('select[name="role"]').val(data['USER_ROLE']);
				$('input[name="email"]').val(data['EMAIL']);

				// Read <form id="user-request-form"></form> in home.php View for HTTP Request
				const form = document.querySelector("#user-request-form"), submitBtn = form.querySelector("button");
				
				// Prevent the form action attribute --> prevent page refresh
				form.onsubmit = (e) => { e.preventDefault(); }

				// When the user clicks on Approve (or Deny), make the HTTP Request to back-end: url = Home.php Controller and userRequest method
				submitBtn.onclick  = () =>
				{
					let xhr = new XMLHttpRequest();
					xhr.open("POST", request_form_url, true);
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
									else if (result.isConfirmed) { requestForm(true, userData); }
									else if (result.dismiss === Swal.DismissReason.timer) { requestForm(true, userData); }
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