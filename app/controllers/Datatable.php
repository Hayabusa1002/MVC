<?php
    session_start();
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class Datatable extends Controller
    {
        # Load models and Mailer
        public function __construct()
        {
            // Load model from Datatable Controller
            $this->datatableModel = $this->model('DatatableModel');
        }

        # Back-end: fill the user request datatable
        public function requestTable()
        {
            // 1. Get query result
            $q = $this->datatableModel->requestQuery();
            
            // 2. Save the values in $array
            $array['data'] = [];
            while ($row = mysqli_fetch_assoc($q)) { $array['data'][]  = $row; }

            // 3. Convert $array to JSON object (in string format) in order to ajax Datatable recognize the data
            echo json_encode($array);
        }
    }
?>