<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Datatable extends Controller
    {
        # Load models and Mailer
        public function __construct()
        {
            // Load model from Datatable Controller
            $this->datatableModel = $this->model('DatatableModel');
        }

        # Back-end: fill the user request datatable
        public function requestTable()
        {
            // 1. Get query result
            $q = $this->datatableModel->requestQuery();
            
            // 2. Save the values in $array
            $array['data'] = [];
            while ($row = mysqli_fetch_assoc($q)) { $array['data'][]  = $row; }

            // 3. Convert $array to JSON object (in string format) in order to ajax Datatable recognize the data
            echo json_encode($array);
        }

        # Back-end: validate request form
        public function requestForm()
        {
            // 1. filter: fields must not be empty
            if (!empty($this->name) && !empty($this->id_card) && !empty($this->role) && !empty($this->email))
            {
                // 2.1. filter: name format validation
                if (preg_match('/^[A-zÀ-ÿ\s\.][^0-9\\\°\|\!\"\#\$\%\&\/\=\?\¿\¡\~\^\*\`\'\-\_\:\;\(\)\{\}\<\>\[\]]{3,}$/', $this->name))
                {
                    // 2.2. filter: id card format validation
                    if (preg_match('/[0-9]{5,}/', $this->id_card))
                    {
                        // 2.3.1. filter: email format validation
                        if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
                        {
                            // 2.3.2. filter: email extension validation
                            if ($this->emailExtension($this->email))
                            {
                                // 3. filter: user must be new
                                if (!$this->datatableModel->verifyUser($this->email, $this->id_card))
                                {
                                    // 4. filter: sql insert validation
                                    if ($this->datatableModel->sqlInsertUser($this->name, $this->id_card, $this->role, $this->email, $this->creator))
                                    {
                                        // 5. filter: existing user validation
                                        $q = $this->datatableModel->selectUser($this->email, $this->id_card);
                    
                                        if ($q->num_rows != 0)
                                        {
                                            $row = mysqli_fetch_assoc($q);

                                            $body = '<h1>Solicitud de nuevo usuario</h1><br>
                                                    Usted ha solicitado recuperar su contraseña, estos son sus datos registrados:
                                                    <hr>
                                                    <h2>NOMBRE:</h2><h4>' . $row['NAME']   . '</h4>
                                                    <h2>CORREO:</h2><h4>' . $this->email   . '</h4>
                                                    <h2>CÉDULA:</h2><h4>' . $this->id_card . '</h4>
                                                    <hr>
                                                    <h4>Ingrese al siguiente enlace para cambiar a una nueva contraseña:</h4>
                                                    <h4>' . $link . '</h4>';

                                            // 4. filter: send mail validation
                                            if ($this->mailer->sendMail($this->email, utf8_decode($row['NAME']), utf8_decode('Recuperación de contraseña'), utf8_decode($body))) { echo "¡Enviado correctamente!"; }
                                            else { echo "¡Error al enviar correo!"; }
                                        }
                                        else { echo "¡Los cambios no coinciden!"; }
                                    }
                                    else { echo "Algo salió mal. <br> ¡Inténtelo de nuevo!"; }
                                }
                                else { echo "{$this->email} <br> ¡Este usuario ya está registrado!"; }
                            }
                            else { echo "{$this->email} <br> ¡Correo no admitido!"; }
                        }
                        else { echo "{$this->email} <br> ¡Correo electrónico inválido!"; }
                    }
                    else { echo "Su cédula debe tener <br> mínimo 5 dígitos"; }
                }
                else { echo "Ingrese nombre sólo <br> con letras y espacios"; }
            }
            else { echo "¡Todos los campos <br> son obligatorios!"; }
        }
    }
?>