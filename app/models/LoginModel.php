<?php
    class LoginModel
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

        public function selectUser($email) { return $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}'"); }

        public function updateFirstLogin($user_id) { return $this->q->query("UPDATE {$this->db}.tbl_users SET FIRST_LOGIN = 0 WHERE USER_ID = '{$user_id}'"); }
    }
?>