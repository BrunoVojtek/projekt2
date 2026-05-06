<?php
namespace App\Repositories;

use PDO;
use PDOExeption;
use App\Models\Users;
class UserRepository{
    private PDO $db;
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }


    public function saveUser($user){
            
    }

}