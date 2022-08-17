<?php

    class SignupModel extends Dbh
    {
        public function uidOrEmailExists(string $uid, string $email) {
            $stmt = $this->conn()->prepare("SELECT user FROM users WHERE user = ? OR email = ?;");
            $stmt->bindParam(1, $uid, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);
            # Execute the statement.
            $result;
            $stmt->execute();
            $rows = $stmt->rowCount();
            if ($rows > 0) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }
        public function signUp(string $uid, string $email, string $fname, string $pwd) {
        
            $stmt = $this->conn()->prepare("INSERT INTO users (user, email, fname, pwd) VALUES (?,?,?,?);");
            $passcode = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->bindParam(1, $uid, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);
            $stmt->bindParam(3, $fname, PDO::PARAM_STR);
            $stmt->bindParam(4, $passcode, PDO::PARAM_STR);
            # Execute the statement.
            $eror;
            if (!$stmt->execute()) {
                $eror = "stmt failed";
            } else {
                $eror = true;
            }
            return $eror;
        }
    }