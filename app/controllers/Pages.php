<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Pages extends Controller
    {
        # Load model
        public function __construct() { $this->userInfo = $this->model('PagesModel'); }

        # Load views
        public function index() { $this->view('pages/error'); }

        public function login()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/login', $data);
        }

        public function signup()
        {
            $data = [ 'title' => TITLE ];
            $this->view('pages/signup', $data);
        }
    }
?>