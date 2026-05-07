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


    public function findByUsername(string $username) :?Users {
        try{

        
        $user = null;
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([":username" => $username]);
        if($row = $stmt->fetch()){
            $user = new Users($row["username"],$row["password"], $row["role"], true);
            $user->setId((int)$row["id"]);
            $user->setCreatedAt($row["created_at"]);
            return $user;

        }
        return null;
    }
    catch(PDOException $e){
        return null;
    }


    }
    public function save(Users $user) :bool{
        try{
        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->db->prepare($sql);
        
        $result = $stmt->execute([
            ":username" => $user->getUsername(),
            ":password" =>$user->getPassword(),
            ":role" =>$user->getRole()
        ]);
        if($result){
            $user->setId((int)$this->db->lastInsertId());
        }
        return $result;
        }
        catch(PDOExeption $e){
            return false;
        }
    }
    public function delete($username) :bool{
        try{

            $sql = "DELETE FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            return $result = $stmt->execute([":username"=>$username]);  
        }
        catch(PDOExeption $e){
            return false;
        }
    }
    public function update(Users $user) :bool{
        try{
            $sql = "UPDATE users SET username = :username, password = :password, role = :role WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $result = $stmt->execute([
                ":username"=>$user->getUsername(),
                ":password"=>$user->getPassword(),
                ":role"=>$user->getRole(),
                ":id"=>$user->getId()

            ]);
            

            
        }
        catch(PDOExeption $e){
            return false;
        }
    }
}