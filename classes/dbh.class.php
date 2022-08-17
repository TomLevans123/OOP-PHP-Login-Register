<?php 
    abstract class Dbh
    {
        private $host = 'localhost';
        private $db   = 'justapp2';
        private $user = 'root';
        private $pass = '';
        private $charset = 'utf8mb4';

        protected function conn() {
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
                $conn = new PDO($dsn, $this->user, $this->pass, $options);
                return $conn;
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            
            }

        }
       
    }