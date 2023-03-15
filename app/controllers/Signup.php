<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Signup extends Controller
    {
        # Load models
        public function __construct()
        {
            if (isset($_POST['name']) && isset($_POST['id_card']) && isset($_POST['role']) && isset($_POST['email']))
            {
                // Declare inputs as variables
                $this->name     = $_POST['name'];
                $this->id_card  = $_POST['id_card'];
                $this->role     = $_POST['role'];
                $this->email    = $_POST['email'];
                
                // Normalize inputs
                $this->name  = mb_strtoupper($this->name,  'utf-8');
                $this->email = mb_strtolower($this->email, 'utf-8');

                // Load model from Signup Controller
                $this->SignupModel = $this->model('SignupModel');
            }
            else { $this->view('pages/error'); }
        }

        # Back-end: sign up validation
        public function index()
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
                                if (!$this->SignupModel->verifyUser($this->email, $this->id_card))
                                {
                                    // 4. filter: sql insert validation
                                    if ($this->SignupModel->sqlInsertSingup($this->name, $this->id_card, $this->role, $this->email)) { echo "¡Solicitud enviada!"; }
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

        public function emailExtension($email)
        {
            $admitted = false;
            $pattern = ['/@gmail.com$/', '/@hotmail.com$/'];

            foreach ($pattern as $p) { if (preg_match($p, $email)) { $admitted = true; } }

            return $admitted;
        }
    }
?>