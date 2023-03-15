<?php
    class SignupModel
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

        public function verifyUser($email, $id_card)
        {
            $q1 = $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}' AND ID_CARD = {$id_card}");

            if ($q1->num_rows != 0) { return true; }
            else { return false; }
        }

        public function sqlInsertSingup($name, $id_card, $role, $email)
        {
            date_default_timezone_set('America/Mexico_City');
            $today = date('Y-m-d', time()); # REQUEST DATE

            # Get last PRIMARY KEY IN tbl_requests
            $q1 = $this->q->query("SELECT REQUEST_ID AS KEY_VALUE FROM {$this->db}.tbl_requests GROUP BY REQUEST_ID DESC");
            $request_id = $q1->num_rows != 0 ? mysqli_fetch_assoc($q1)['KEY_VALUE'] + 1 : 1;

            $q2 = $this->q->query("INSERT INTO {$this->db}.tbl_requests (REQUEST_ID, NAME, ID_CARD, USER_ROLE, EMAIL, REQUEST_DATE)
                                   VALUES ({$request_id}, '{$name}', {$id_card}, '{$role}', '{$email}', '{$today}')");

            if ($q2) { return true; }
            else { return false; }
        }
    }
?>