<?php
require_once "../../vendor/autoload.php";

session_start();
$sessionIsset = !isset($_SESSION['is_logged']) && !isset($_SESSION['username']) && !isset($_SESSION['guid']);
if ($sessionIsset) {
    if (isset($_POST['register'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_verify'])) {
            $user = new App\User();
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_verify = $_POST['password_verify'];
            if ($password === $password_verify) {
                $userCredentials = [
                    'username' => $username,
                    'password' => $password,
                ];
              
                if ($user->getUser($userCredentials, true)){
                    $_SESSION['error'] = "Username is unavailable!";
                    header("Location: ../../register.php");
                }else{
                    $isCreated = $user->createUser($userCredentials);

                    if ($isCreated) {
                        $userDatas = $user->getUser($userCredentials);
                        $_SESSION['is_logged'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['guid'] = $userDatas['id'];

                        header("Location: ../../todo_list.php");
                    } else {
                        $_SESSION['error'] = "Error when creating. Please submit again!";
                        header("Location: ../../register.php");
                    }
                }
            }else{
                $_SESSION['error'] = "Password does not match!";
                header("Location: ../../register.php");
            }
            
        } else {
            $_SESSION['error'] = "All field are required";
            header("Location: ../../register.php");
        }
    }
} else {
    header("Location: ../../todo_list.php");
}
