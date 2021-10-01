<?php
namespace App;

use App\Model;

class Todo extends Model
{
    /* public function __construct()
    {
        parent::__construct();
    } */

    public function createTodo($todo)
    {
        $stmt = $this->pdo->prepare("INSERT INTO todos (todo, completed, user_id, created_at, updated_at)
                                    VALUE (:todo, :completed, :user_id, :completed, :created_at, :updated_at)");
        $stmt->bindValue('todo', $todo['todo']);
        $stmt->bindValue('completed', false);
        $stmt->bindValue('user_id', $todo['user_id']);
        $stmt->bindValue('created_at', date('Y-m-d H:i:s'));
        $stmt->bindValue('updated_at', date('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function getTodosById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE user_id = :user_id");
        $stmt->bindValue('user_id', $id);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateTodo($todo, $id){
        $stmt = $this->pdo->prepare("UPDATE todos SET
                                        completed = :completed, updated_at = :updated_at WHERE user_id = :user_id");
        $stmt->bindValue('completed', $todo['completed']);
        $stmt->bindValue('user_id', $id);
        $stmt->bindValue('updated_at', date('Y-m-d H:i:s'));
        return $stmt->execute();
    }

    public function deleteTodo($id){
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindValue('id', $id);
        return $stmt->execute();
    }
}