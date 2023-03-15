<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Login extends Controller
    {
        # Load models
        public function __construct()
        {
            if (isset($_POST['email']) && isset($_POST['pswd']))
            {
                // Declare inputs as variables
                $this->email    = $_POST['email'];
                $this->password = $_POST['pswd'];
                
                // Normalize inputs
                $this->email = mb_strtolower($this->email, 'utf-8');
                
                // Load model from Login Controller
                $this->loginModel = $this->model('LoginModel');
            }
            else { $this->view('pages/error'); }
        }

        # Back-end: log in validation
        public function index()
        {
            // 1. filter: fields must not be empty
            if (!empty($this->email) && !empty($this->password))
            {
                // 2. filter: email format validation
                if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
                {
                    // 3. filter: existing email validation
                    $q = $this->loginModel->selectUser($this->email);

                    if ($q->num_rows != 0)
                    {
                        // 4. filter: password validation
                        $row = mysqli_fetch_assoc($q);

                        if (password_verify($this->password, $row['PASSWORD']))
                        {
                            // 5. Login success
                            $this->loginSuccess($row);
                            echo "¡Proceso Exitoso!";
                        }
                        else { echo "¡Contraseña incorrecta!"; }
                    }
                    else { echo "{$this->email} <br> ¡Usuario no existente!"; }
                }
                else { echo "{$this->email} <br> ¡Correo electrónico inválido!"; }
            }
            else { echo "¡Todos los campos <br> son obligatorios!"; }
        }

        # Create session variables for login
        public function loginSuccess($row)
        {
            if ($row['FIRST_LOGIN'] == 1)
            {
                // $_SESSION['showTour'] = TRUE;
                $this->loginModel->updateFirstLogin($row['USER_ID']);
            }

            $_SESSION['loginEmail']     = $this->email;
            $_SESSION['loginSuccess']   = $row['USER_ID'];
        }
    }
?>