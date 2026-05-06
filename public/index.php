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
// vypise obsah z $pdo
var_dump($pdo);
// vytvori premennu ktora bude mat vlastnosti z UserRepository.php
$userRepo = new UserRepository($pdo);
$userRepo->save();

