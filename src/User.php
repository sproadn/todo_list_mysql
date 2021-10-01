<?php
namespace App;
use App\Model;

class User extends Model
{
    /* public function __construct()
    {
        parent::__construct();
    } */

    public function createUser($user)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password)
                                    VALUE (:username, :password)");
        $stmt->bindValue('username', $user['username']);
        $stmt->bindValue('password', password_hash($user['password'], PASSWORD_BCRYPT));
        return $stmt->execute();
    }

    public function getUser($user, $verify=false){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindValue('username', $user['username']);
        $stmt->execute();
        
        $datas = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(is_array($datas) && count($datas) > 0 && $verify) return true;
        return $datas;
    }
}