<?php

    $signup = $_POST["signupButton"];

    if (isset($signup)) {
        $username = $_POST["uid"];
        $email = $_POST["email"];
        $fname = $_POST["full"];
        $pwd = $_POST["pwd"];
        $pwdRep = $_POST["pwdRepeat"];

        // Include all files.

        include "../classes/dbh.class.php";
        include "../classes/models/SignupModel.php";
        include "../classes/controllers/SignupContr.php";

        $controller = new SignupContr($username, $email, $fname, $pwd, $pwdRep);
        $controller->signUpUser();
        // echo gettype($controller->er);
        // echo $controller->eror;
    }
    