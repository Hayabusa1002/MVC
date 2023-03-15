<?php
    class DatatableModel
    {
        # Querys variables
        private $q;
        private $db = DB;
        private $primary_id;
        private $user_id;
        private $name;
        private $id_card;
        private $email;
        private $password;
        private $user_role;
        private $status;
        private $first_login;
        private $last_editor;
        private $creator;
        private $date_created;

        # Server connection
        public function __construct()
        {
            $this->q = new Database;
            $this->q->connect();
        }

        // Query with pending requests (not answered)
        public function requestQuery() { return $this->q->query("SELECT * FROM {$this->db}.tbl_requests WHERE ANSWER = '' OR ANSWER IS NULL"); }

        public function verifyUser($email, $id_card)
        {
            $q1 = $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}' AND ID_CARD = {$id_card}");

            if ($q1->num_rows != 0) { return true; }
            else { return false; }
        }
    }
?>