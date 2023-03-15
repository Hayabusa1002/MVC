<?php
    class Database
    {
        # Database configuration
        private $server     = HOST;
        private $usuario    = USER;
        private $password   = PSWD;
        private $database   = DB;

        # Connect to the database
        public function connect()
        {
            if(!isset($this->conexion))
            {
                $this->conexion = (mysqli_connect($this->server, $this->usuario,$this->password)) or die(mysqli_error($this->conexion));
                mysqli_query($this->conexion, "SET NAMES 'utf8'");
                mysqli_select_db($this->conexion, $this->database);
            }
        }
        
        # Make a query
        public function query($query)
        {
            $result = mysqli_query($this->conexion, $query);
            if(!$result)
            {
                echo 'MySQL Error: '.mysqli_error($this->conexion);
                exit;
            }
            return $result;
        }
    }
?>