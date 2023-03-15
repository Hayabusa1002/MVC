<?php
    class RecoverModel
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

        public function selectUser($user_id) { return $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE USER_ID = '{$user_id}'"); }

        public function sqlUpdatePassword($user_id, $id_card, $email, $enc_pswd)
        {
            $q1 = $this->q->query("UPDATE {$this->db}.tbl_users SET PASSWORD = '$enc_pswd' WHERE USER_ID = '{$user_id}' AND ID_CARD = {$id_card} AND EMAIL = '{$email}'");

            if ($q1) { return true; }
            else { return false; }
        }
    }
?>