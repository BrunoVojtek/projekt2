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
if ($user = $userRepo->findByUsername("Matej")){
    $user->setUsername("Peter");
    $userRepo->update($user);
}



?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
