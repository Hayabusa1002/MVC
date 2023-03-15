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

        public function selectUser($email, $user_id) { return $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}' AND USER_ID = '{$user_id}'"); }
    }
?>