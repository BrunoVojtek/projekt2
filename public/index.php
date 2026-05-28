<?php 
// spusti session
session_start();
// nacita autoload ktory vytvoril composer 
require_once __DIR__ . "/../vendor/autoload.php";
// naimportuje triedy z namespaces
use App\Core\Database;
use App\Repositories\UserRepository;
use App\Controllers\UserController;
use App\Models\Users;
use App\Core\Router;
// vytvori premennu ktora bude mat vlastnosti z Database.php
$db = new Database();
// vytvori pripojenie k databaze
$pdo = $db->getConnection();

// vytvori premennu ktora bude mat vlastnosti z UserRepository.php
$userRepo = new UserRepository($pdo);
$userController = new UserController($userRepo);

$router  = new Router();

$router->add("/", $userController, "index");
$router->resolve();

?>


