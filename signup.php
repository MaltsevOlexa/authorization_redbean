<?php
require 'includes/db.php';

$data = $_POST;
if (isset($data['sign_up'])) {
    
    $errors = array();
    if (trim($data['login']) == '') {
        $errors[] = 'Enter login';
    }
    if ($data['password'] == '') {
        $errors[] = 'Enter password';
    }
    if ($data['password'] != $data['password2']) {
        $errors[] = 'Passwords do not match';
    }
    if (R::count('users', "login = ?", array($data['login'])) > 0) {
        $errors[] = 'User already exist';           
    }
    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color:green;">Registration complite</div><hr>';
    } else {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
    
}

?>
<form action="/signup.php" method="POST">
    <div style="margin: 5px;">
        Login: <br /><input type="text" name="login" value="<?php echo @$data['login'];?>">
    </div>
    <div style="margin: 5px;">
        Password: <br /><input type="password" name="password">
    </div>
    <div style="margin: 5px;">
        Password: <br /><input type="password" name="password2">
    </div>
    <div style="margin: 5px;">
        <button type="submit" name="sign_up">Registration</button>
    </div>
</form>

