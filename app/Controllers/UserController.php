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
    }