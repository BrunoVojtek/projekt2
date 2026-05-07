<?php

namespace App\Models;

class Users{
    private ?int $id = null;
    private string $username;
    private string $password;
    private string $role;
    private string $created_at;

    public function __construct(string $username, string $password, string $role = "user", bool $isAllredyHash = false){
        $this->username = $username;
        $this->password = password_hash($password,PASSWORD_DEFAULT);
        $this->role = $role;
        
    }

    //getter
    public function getId() :int{
        return $this->id;
    }
    public function getUsername() :string{
        return $this->username;
    }
    public function getPassword() :string{
        return $this->password;
    }
    public function getRole() :string{
        return $this->role;
    }
    public function getCreatedAt() :string{
        return $this->created_at;
    }

    public function passwordVerify(string $plainPassword) :bool{
        return password_verify($plainPassword, $this->password);
    }


    //setter
    public function setId(int $id) :void{
        $this->id = $id;
    }
    public function setCreatedAt(string $created_at) :void{
        $this->created_at = $created_at;
    }
    public function setUsername(string $username) :void{
        $this->username = $username;
    }



}