<?php
    /* Main Controller's class is in charge of loading Models and Views */
    class Controller
    {
        // Load any model
        public function model($model)
        {
            require_once '../app/models/' . $model . '.php';

            return new $model();
        }

        // Load any view
        public function view($view, $data = [])
        {
            # Validate whether the file to load exists or not
            # If the file doesn't exist load error.php
            if (file_exists('../app/views/' . $view . '.php')) { require_once '../app/views/' . $view . '.php'; }
            else { header('location: ' . PATH_URL . '/pages/error'); }
        }
    }
?>