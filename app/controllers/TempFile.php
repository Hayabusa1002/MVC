<?php
    /* In order to inherit the methods of the Main Controller, it extends the Controller class */
    class TempFile extends Controller
    {
        # Querys variables
        private $q;
        private $db = DB;
        private $primary_id;
        private $user_id;
        private $name           = 'Nombre Ejemplo';
        private $id_card        = '0123456789';
        private $email          = 'correo_ejemplo@gmail.com';
        private $password;
        private $user_role      = 'admin';
        private $first_login    = 1;
        private $last_editor    = null;
        private $creator;
        private $date_created;

        # Server connection
        public function __construct()
        {
            $this->q = new Database;
            $this->q->connect();
        }
        
        # Back-end: create an user
        public function index()
        {
            // 1. Get last PRIMARY KEY IN tbl_users
            $q1 = $this->q->query("SELECT PRIMARY_ID FROM {$this->db}.tbl_users GROUP BY PRIMARY_ID DESC");
            $this->primary_id = $q1->num_rows != 0 ? mysqli_fetch_assoc($q1)['PRIMARY_ID'] + 1 : 1;

            $this->user_id = uniqid('mvc' . $this->primary_id);
            $this->creator = $this->user_id;

            // 2. Encrypt the password
            $this->password = password_hash('mvc0123456789', PASSWORD_DEFAULT);

            // 3. Set current day
            date_default_timezone_set('America/Mexico_City');
            $this->date_created = date('Y-m-d', time());

            // 4. Print values
            ?>
                <table border="1px">
                    <thead>
                        <tr>
                            <th>PRIMARY ID</th>
                            <th>USER ID</th>
                            <th>NAME</th>
                            <th>ID CARD</th>
                            <th>EMAIL</th>
                            <th>PASSWORD</th>
                            <th>USER ROLE</th>
                            <th>FIRST LOGIN</th>
                            <th>LAST EDITOR</th>
                            <th>CREATOR</th>
                            <th>DATE CREATED</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?= $this->primary_id ?></td>
                            <td><?= $this->user_id ?></td>
                            <td><?= $this->name ?></td>
                            <td><?= $this->id_card ?></td>
                            <td><?= $this->email ?></td>
                            <td><?= $this->password ?></td>
                            <td><?= $this->user_role ?></td>
                            <td><?= $this->first_login ?></td>
                            <td><?= $this->last_editor ?></td>
                            <td><?= $this->creator ?></td>
                            <td><?= $this->date_created ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php

            // 5. Create the user
            $q2 = $this->q->query("INSERT INTO {$this->db}.tbl_users (PRIMARY_ID, USER_ID, NAME, ID_CARD, EMAIL, PASSWORD, USER_ROLE, 
                                                                      FIRST_LOGIN, LAST_EDITOR, CREATOR, DATE_CREATED)
                                   VALUES ({$this->primary_id}, '{$this->user_id}', '{$this->name}', {$this->id_card}, '{$this->email}', 
                                           '{$this->password}', '{$this->user_role}', {$this->first_login}, '{$this->last_editor}', 
                                           '{$this->creator}', '{$this->date_created}')");

            if ($q2) { ?><script>alert('¡Usuario creado!')</script><?php }
            else { ?><script>alert('¡Algo salió mal!')</script><?php }
        }

        # Back-end: proof PHPWord
        public function word()
        {
            $word = new Word;
            $word->example();
            $word->exampleWithTemplate();
        }
    }
?>