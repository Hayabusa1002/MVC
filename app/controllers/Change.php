<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Change extends Controller
    {
        # Load models
        public function __construct()
        {
            if (isset($_POST['last']) && isset($_POST['new']) && isset($_POST['confirm']))
            {
                // Declare inputs as variables
                $this->user_id = $_SESSION['loginSuccess'];
                $this->email   = $_SESSION['loginEmail'];
                $this->last    = $_POST['last'];
                $this->new     = $_POST['new'];
                $this->confirm = $_POST['confirm'];

                // Load model from Change Controller
                $this->ChangeModel = $this->model('ChangeModel');
            }
            else { $this->view('pages/error'); }
        }

        # Back-end: change password validation
        public function index()
        {
            // 1. filter: fields must not be empty
            if (!empty($this->last) && !empty($this->new) && !empty($this->confirm))
            {
                // 2. filter: last password verification
                if ($this->ChangeModel->lastPswdVal($this->user_id, $this->email, $this->last))    
                {
                    // 3. filter: can't repeat: new password != last password
                    if ($this->new != $this->last)
                    {
                        // 4. filter: new password len: 20 >= new password >= 8
                        if (preg_match('/.{8,20}/', $this->new))
                        {
                            // 5. filter: confirm password verification
                            if ($this->confirm === $this->new)
                            {
                                $enc_pswd = password_hash($this->new, PASSWORD_DEFAULT); # NEW PASSWORD ENCRIPTED

                                if ($this->ChangeModel->sqlUpdatePassword($this->user_id, $this->email, $enc_pswd)) { echo "¡Proceso Exitoso!"; }
                                else { echo "Algo salió mal. <br> ¡Inténtelo de nuevo!"; }  
                            }
                            else { echo "¡Contraseñas no coinciden!"; }
                        }
                        else { echo "La contraseña debe tener <br> mínimo 8 caracteres"; }
                    }
                    else { echo "La nueva contraseña <br> se encuentra en uso"; }
                }
                else { echo "¡Contraseña incorrecta!"; }
            }
            else { echo "¡Todos los campos <br> son obligatorios!"; }
        }
    }
?>