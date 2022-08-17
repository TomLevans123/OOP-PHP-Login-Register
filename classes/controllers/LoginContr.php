<?php

    class Logincontr extends LoginModel
    {
        private $uidOrEmail;
        private $pwd;
        public function __construct(string $uidemail, string $pwd) 
        {   
            $this->uidOrEmail = $uidemail;
            $this->pwd = $pwd;
        }
        
        private function emptyInputs() 
        {
            $eror;
            if (empty($this->uidOrEmail) || empty($this->pwd)) {
                $eror = false;
            } else {
                $eror = true;
            }
            return $eror;
        }

        public function logIn() {
            if ($this->emptyInputs() != true) {
                header("location: ../views/login.php?=emptyInputs");
                exit();
            } else {
                $this->loginUser($this->uidOrEmail, $this->uidOrEmail, $this->pwd);
            }
        }
    }