<?php
    class ForgotModel
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

        public function selectUser($email, $id_card) { return $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}' AND ID_CARD = {$id_card}"); }
    }
?>