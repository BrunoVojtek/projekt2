<?php
    namespace app\Controllers;
    use app\Repositories\UserRepository;
    use app\Models\User;

    class UserController{
        private UserRepository $userRepo;
        public function __construct($userRepo) {
            $this->userRepo = $userRepo;
        }
        
        public function index(){
            echo "ahoj";
        }
        public function login(){
            include __DIR__ . "/../../views/login.php";
        }
        public function register(){
            include __DIR__ . "/../../views/register.php";
        }
        public function dashboard(){
            include __DIR__ . "/../../views/dashboard.php";
        }
    }