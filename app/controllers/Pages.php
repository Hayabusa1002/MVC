<?php
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Pages extends Controller
    {
        # Load model
        public function __construct() { $this->pagesModel = $this->model('PagesModel'); }

        # Load views
        public function index() { $this->view('pages/index'); }
    }
?>