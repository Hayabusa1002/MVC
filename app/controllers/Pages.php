<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Pages extends Controller
    {
        # Load model
        public function __construct() { $this->userInfo = $this->model('PagesModel'); }

        # Load view
        public function index() { $this->view('pages/error'); }
    }
?>