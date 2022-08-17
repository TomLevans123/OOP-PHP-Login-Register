<?php

    class SignupContr extends SignupModel
    {
       private $uid;
       private $email;
       private $fname;
       private $pwd;
       private $pwdRep;

       public $er;

       public $eror;
        public function __construct(string $uid, string $email, string $fullname, string $pwd, string $pwdRep)
        {
            $this->uid = $uid;
            $this->email = $email;
            $this->fname = $fullname;
            $this->pwd = $pwd;
            $this->pwdRep = $pwdRep;
        }

        public function errorHandling() 
        {
            // Empty input signup!
        if (empty($this->uid) || empty($this->email) || empty($this->fname) || empty($this->pwd) ||empty($this->pwdRep))
        {
            $this->eror = "empty";
        } else {
            $this->eror = true;
        }

            // Correct characters validation.
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $this->eror = "preg";
        } else {
            $this->eror = true;
        }
        
            // Correct characters validation.
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $this->eror = "email";
        } else {
            $this->eror = true;
        }
                
            // Correct characters validation.
        if ($this->pwd != $this->pwdRep)
        {
            $this->eror = "pwd not match";
        } else {
            $this->eror = true;
        }
            return $this->eror;
        }

             # If all the error handlers checked.

            public function signUpUser()
            {  if ($this->errorHandling() != true) 
                {
                    $error = $this->eror;
                    exit();
                } else if ($this->eror != true) 
                {
                    $error = $this->eror;
                    header("location: ../../views/signup.php?=something");
                    exit();
                } else if ($this->uidOrEmailExists($this->uid, $this->email) == false) 
                {
                    header("location: ../../views/signup.php?=exists");
                    exit();
                } else 
                {
                    $this->signUp($this->uid, $this->email, $this->fname, $this->pwd);
                    $model = new SignupModel();
                    header("location: ../../views/login.php?=success");
                }
            
            
            
            }
    }