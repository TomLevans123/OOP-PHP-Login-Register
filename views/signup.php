<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Sign Up!]</title>
</head>
<body>
    <h1>Sign Up!</h1>
    <form action="../includes/signup.inc.php" method="POST">
        <input type="text" placeholder="Username" name="uid">
        <input type="text" placeholder="Email" name="email">
        <input type="text" placeholder="Full Name" name="full">
        <input type="password" placeholder="Password" name="pwd">
        <input type="password" placeholder="Repeat Password" name="pwdRepeat">
        <input type="submit" value="Sign Up!" name="signupButton">
    </form>
</body>
</html>