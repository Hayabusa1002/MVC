<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Logout extends Controller
    {
        public function index()
        {
            if(isset($_SESSION['loginSuccess']))
            {
                session_unset();
                session_destroy();
                header('location: ' . PATH_URL . '/pages/login');
            }
            else { $this->view('pages/error'); }
        }
    }
?>