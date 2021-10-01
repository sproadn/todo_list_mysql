<?php
require_once "../../vendor/autoload.php";

session_start();
$sessionIsset = !isset($_SESSION['is_logged']) && !isset($_SESSION['username']) && !isset($_SESSION['guid']);
if ($sessionIsset){
    if(isset($_POST['login'])){
        if (!empty($_POST['username']) && !empty($_POST['password'])){
            $user = new App\User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userCredentials = [
                'username' => $username,
                'password' => $password,
            ];

            $userFetch = $user->getUser($userCredentials);
            
            if (is_array($userFetch) && count($userFetch) > 0) {
                if (password_verify($password, $userFetch['password'])){
                    $_SESSION['is_logged'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['guid'] = $userFetch['id'];

                    header("Location: ../../todo_list.php");
                }else{
                    $_SESSION['error'] = "Username or Password is invalid";
                    header("Location: ../../index.php");
                }
            }else{
                $_SESSION['error'] = "Username or Password is invalid";
                header("Location: ../../index.php");
            }
        } else {
            $_SESSION['error'] = "All field are required";
            header("Location: ../../index.php");
        }
    }
} else {
    header("Location: ../../todo_list.php");
}