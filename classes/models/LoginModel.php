<?php

    class LoginModel extends Dbh
    {
        protected $error;
        public function loginUser(string $uid, string $email, string $pwd) {
            $stmt = $this->conn()->prepare(
                "SELECT * FROM users 
                 WHERE user = ? OR email = ?;"
            );
            $stmt->bindParam(1, $uid, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                header("location: ../views/login.php?=STMTfailed");
                exit();
            } else if ($stmt->rowCount() == 0) {
                header("location: ../views/login.php?=userNotFound");
                exit();
            } else if ($stmt->rowCount() == 1) {
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $dbPwd = $row[0]["pwd"];

                if (!password_verify($pwd, $dbPwd)) {
                    header("location: ../views/login.php?=WrongPwd!");
                    exit();
                } else {
                    session_start();

                    $dbUser = $row[0]["user"];
                    $dbEmail = $row[0]["email"];
                    $_SESSION['user_login_status'] = 1;

                    $_SESSION['username'] = $dbUser;
                    $_SESSION['email'] = $dbEmail;
                    header("location: ../index.php?=succes");
                }
                
            }
        }
    }