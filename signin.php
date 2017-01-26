<?php
require 'includes/db.php';

$data = $_POST;
if (isset($data['sign_in'])) {
    $errors = array();
    $user =R::findOne('users', 'login = ?', array($data['login']));
    if ($user) {
        if (password_verify($data['password'], $user->password)) {
            $_SESSION['logged_user'] = $user;
            echo '<div style="color:green;">You are authorized</div>';
            echo '<div style="color:green;">you can go to the <a href="/">home page</a></div><hr>';
        } else {
            $errors[] = 'Wrong password'; 
        }
    } else {
        $errors[] = 'User doesn\'t exist';
    }

     if (!empty($errors)) {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    } 
}

?>

<form action="/signin.php" method="POST">
    <div style="margin: 5px;">
        Login: <br /><input type="text" name="login">
    </div>
    <div style="margin: 5px;">
        Password: <br /><input type="password" name="password">
    </div>
    <div style="margin: 5px;">
        <button type="submit" name="sign_in">Registration</button>
    </div>
</form>