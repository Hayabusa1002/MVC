<?php
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Forgot extends Controller
    {
        # Load models and Mailer
        public function __construct()
        {
            if (isset($_POST['email']) && isset($_POST['id_card']))
            {
                // Declare inputs as variables
                $this->email   = $_POST['email'];
                $this->id_card = $_POST['id_card'];
                
                // Normalize inputs
                $this->email = mb_strtolower($this->email, 'utf-8');

                // Load model from Forgot Controller
                $this->ForgotModel = $this->model('ForgotModel');

                // Load Mailer
                $this->mailer = new Mailer;
            }
            else { $this->view('pages/error'); }
        }

        # Back-end: forgot password validation
        public function index()
        {
            // 1. filter: fields must not be empty
            if (!empty($this->email) && !empty($this->id_card))
            {
                // 2. filter: email format validation
                if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
                {
                    // 3. filter: existing email and id_card validation
                    $q = $this->ForgotModel->selectUser($this->email, $this->id_card);
  
                    if ($q->num_rows != 0)
                    {
                        date_default_timezone_set('America/Mexico_City');
                        $row = mysqli_fetch_assoc($q);
                        
                        $enc_email   = password_hash($this->email,   PASSWORD_DEFAULT);
                        $enc_id_card = password_hash($this->id_card, PASSWORD_DEFAULT);
                        $enc_date    = base64_encode(date('Y-m-d', time()));

                        $link = PATH_URL . '/recover/index/' . $row['USER_ID'] . '_' . $enc_email . '_' . $enc_id_card . '_' . $row['PASSWORD'] . '_' . $enc_date;

                        $body = '<h1>Recuperación de contraseña</h1><br>
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
                    else { echo "¡Correo o cédula incorrectos!"; }
                }
                else { echo "{$this->email} <br> ¡Correo electrónico inválido!"; }
            }
            else { echo "¡Todos los campos <br> son obligatorios!"; }
        }
    }
?>