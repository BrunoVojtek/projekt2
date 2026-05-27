<?php 
// spusti session
session_start();
// nacita autoload ktory vytvoril composer 
require_once __DIR__ . "/../vendor/autoload.php";
// naimportuje triedy z namespaces
use App\Core\Database;
use App\Repositories\UserRepository;
use App\Models\Users;
// vytvori premennu ktora bude mat vlastnosti z Database.php
$db = new Database();
// vytvori pripojenie k databaze
$pdo = $db->getConnection();

// vytvori premennu ktora bude mat vlastnosti z UserRepository.php
$userRepo = new UserRepository($pdo);
/*if ($user = $userRepo->findByUsername("Matej")){
    $user->setUsername("Peter");
    $userRepo->update($user);
}*/
$users = $userRepo->getAll();

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])){
    if($_POST["action"]==="delete"){
        $userRepo->delete($_POST["username"]);

    }
    elseif ($_POST["action"]==="update") {
        header("Location: update.php");
        exit();
    }
    elseif($_POST["action"]==="save"){
    
        $newUser = new Users($_POST["username"], $_POST["password"]);
        $save = $userRepo->save($newUser);
        header("Location: index.php");
        exit();
        }
    }

var_dump($_POST);
include __DIR__ . "/../views/home.php";


?>


