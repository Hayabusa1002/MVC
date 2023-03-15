<?php
    class PagesModel
    {
        # Querys variables
        private $q;
        private $db = DB;

        # Server connection
        public function __construct()
        {
            $this->q = new Database;
            $this->q->connect();
        }
    }
?>