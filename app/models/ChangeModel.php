<?php
    class ChangeModel
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

        public function lastPswdVal($user_id, $email, $pswd)
        {
            $q1 = $this->q->query("SELECT PASSWORD FROM {$this->db}.tbl_users WHERE USER_ID = '{$user_id}' AND EMAIL = '{$email}'");
            $row = mysqli_fetch_assoc($q1);

            if (password_verify($pswd, $row['PASSWORD'])) { return true; }
            else { return false; }
        }

        public function sqlUpdatePassword($user_id, $email, $enc_pswd)
        {
            $q2 = $this->q->query("UPDATE {$this->db}.tbl_users SET PASSWORD = '$enc_pswd' WHERE USER_ID = '{$user_id}' AND EMAIL = '{$email}'");

            if ($q2) { return true; }
            else { return false; }
        }
    }
?>