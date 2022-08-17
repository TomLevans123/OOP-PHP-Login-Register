<?php

    $submit = $_POST["loginBtn"];

    if (!isset($submit)) {
        header("Location: ../views/login.php");
        exit();
    } else {
        $uidOrEmail = $_POST['uidoremail'];
        $pwd = $_POST['pwd'];

        // Includes.

        include "../classes/dbh.class.php";
        include "../classes/models/LoginModel.php";
        include "../classes/controllers/LoginContr.php";

        $controller = new LoginContr($uidOrEmail, $pwd);
        $controller->logIn();

    }