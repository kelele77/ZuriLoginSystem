<?php
include("auth_session.php");
$req = $_POST;
$username = $req['username'];
$con = mysqli_connect('localhost', 'root', '', 'LoginSystem');
session_start();
$password = 'password';

if($req['object'] == 'forgot'){
if($req['newpassword'] == $req['confirmpassword']) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
        if(password_verify($password, $hashed_password)) {
        $update = "UPDATE `users` SET 'password' = '$hash' WHERE username = '$username' ";
        $result = mysqli_query($con, $update);
        $_SESSION['username'] = 'Your new password has reset successfully, you can now login.';
        header("Location: index.php");
    } else {
        $_SESSION['username'] = 'Password does not match';
        header("Location: index.php");
    }
}

}
?>