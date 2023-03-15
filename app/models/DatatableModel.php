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

        public function sqlInsertUser($name, $id_card, $role, $email, $creator)
        {
            // 1. Get last PRIMARY KEY IN tbl_users
            $q1 = $this->q->query("SELECT PRIMARY_ID FROM {$this->db}.tbl_users GROUP BY PRIMARY_ID DESC");

            // 2. Set current day
            date_default_timezone_set('America/Mexico_City');

            // 3. Define all values
            $this->primary_id   = $q1->num_rows != 0 ? mysqli_fetch_assoc($q1)['PRIMARY_ID'] + 1 : 1;
            $this->user_id      = uniqid('mvc' . $this->primary_id);
            $this->name         = $name;
            $this->id_card      = $id_card;
            $this->email        = $email;
            $this->password     = password_hash('mvc' + $id_card, PASSWORD_DEFAULT);
            $this->user_role    = $user_role;
            $this->first_login  = 1;
            $this->last_editor  = null;
            $this->creator      = $creator;
            $this->date_created = date('Y-m-d', time());       

            // 4. Create the user
            $q2 = $this->q->query("INSERT INTO {$this->db}.tbl_users (PRIMARY_ID, USER_ID, NAME, ID_CARD, EMAIL, PASSWORD, USER_ROLE, 
                                                                      FIRST_LOGIN, LAST_EDITOR, CREATOR, DATE_CREATED)
                                   VALUES ({$this->primary_id}, '{$this->user_id}', '{$this->name}', {$this->id_card}, '{$this->email}', 
                                           '{$this->password}', '{$this->user_role}', {$this->first_login}, '{$this->last_editor}', 
                                           '{$this->creator}', '{$this->date_created}')");

            if ($q2) { return true; }
            else { return false; }
        }

        public function selectUser($email, $id_card) { return $this->q->query("SELECT * FROM {$this->db}.tbl_users WHERE EMAIL = '{$email}' AND ID_CARD = {$id_card}"); }
    }
?>