<?php
    /* 
        NOTE: URL structure
        $link = PATH_URL . '/recover/index/' . $row['USER_ID'] . '_' . $enc_email . '_' . $enc_id_card . '_' . $row['PASSWORD'];
    */

    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Recover extends Controller
    {
        protected $userData; # Array with the encrypted URL data
        protected $row;      # Array with the database data

        # Load model
        public function __construct() { $this->RecoverModel = $this->model('RecoverModel'); }

        # 1st Back-end: get URL data
        public function index(...$parameter)
        {
            // 1. Get the whole URL parameter (because '/' separate in parameters)
            $str = '';
            foreach($parameter as $string) { $str .= '/' . $string; }   
            $str = ltrim($str, '/');

            // 2. Convert $str to Array and validate all the elements
            $this->userData = explode('_', $str);
            /*
                $this->userData[0] = USER_ID
                $this->userData[1] = encrypted EMAIL
                $this->userData[2] = encrypted ID_CARD
                $this->userData[3] = encrypted last PASSWORD
            */

            // 3. Use model and load view
            if (!empty($this->userData[0]) && !empty($this->userData[1]) && !empty($this->userData[2]) && !empty($this->userData[3]))
            {
                // 4. Get user data from database with USER ID
                $q = $this->RecoverModel->selectUser($this->userData[0]);
                $this->row = mysqli_fetch_assoc($q);

                // 5. Validate if the forgotten password still matches the database
                $link_has_expired = $this->userData[3] != $this->row['PASSWORD'] ? 'true' : 'false';

                // 6. Pass the Parameter to 2nd Back-end
                $data = [
                            'title'             => TITLE,
                            'link_has_expired'  => $link_has_expired,
                            'userData'          => $this->row
                        ];

                $this->view('pages/recover', $data);
            }
            else { $this->view('pages/error'); }
        }

        # 2nd Back-end: validate recover form
        public function updatePswd()
        {
            if (isset($_POST['user_id']) && isset($_POST['id_card']) && isset($_POST['email']) && isset($_POST['last']) && isset($_POST['new']) && isset($_POST['confirm']))
            {
                $this->user_id = $_POST['user_id'];
                $this->id_card = $_POST['id_card'];
                $this->email   = $_POST['email'];
                $this->last    = $_POST['last'];
                $this->new     = $_POST['new'];
                $this->confirm = $_POST['confirm'];

                // 1. filter: fields must not be empty
                if (!empty($this->new) && !empty($this->confirm))
                {
                    // 2. filter: can't repeat: new password != last password
                    if (!password_verify($this->new, $this->last))
                    {
                        // 3. filter: new password len: 20 >= new password >= 8
                        if (preg_match('/.{8,20}/', $this->new))
                        {
                            // 4. filter: confirm password verification
                            if ($this->confirm === $this->new)
                            {
                                $enc_pswd = password_hash($this->new, PASSWORD_DEFAULT); # NEW PASSWORD ENCRIPTED

                                if ($this->RecoverModel->sqlUpdatePassword($this->user_id, $this->id_card, $this->email, $enc_pswd)) { echo "¡Proceso Exitoso!"; }
                                else { echo "Algo salió mal. <br> ¡Inténtelo de nuevo!"; }  
                            }
                            else { echo "¡Contraseñas no coinciden!"; }
                        }
                        else { echo "La contraseña debe tener <br> mínimo 8 caracteres"; }
                    }
                    else { echo "La nueva contraseña <br> se encuentra en uso"; }
                }
                else { echo "¡Todos los campos <br> son obligatorios!"; }
            }
            else { $this->view('pages/error'); }
        }
    }
?>