<?php
    namespace app\Controllers;
    use app\Repositories\UserRepository;
    use App\Models\Users;

    class UserController{
        private UserRepository $userRepo;
        public function __construct($userRepo) {
            $this->userRepo = $userRepo;
        }
        
        public function index(){
            include __DIR__ . "/../../views/home.php";
        }
        public function login(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = trim($_POST["username"]) ?? "";
                $password = trim($_POST["password"]) ?? "";

                $user = $this->userRepo->findByUsername($username);

                if(!$user || !$user->passwordVerify($password)){
                    $_SESSION["flash_error"] = "Nespravne meno alebo heslo";
                    header("Location:/projekt1/public/login");
                    exit();
                }
                $_SESSION["user_id"] = $user->getId();
                $_SESSION["user_username"] = $user->getUsername();
                $_SESSION["user_role"] = $user->getRole();

                if($user->getRole() === "admin"){
                    header("Location:/projekt1/public/admin");
                    
                }else{
                    header("Location:/projekt1/public/dashboard");
                }
                exit();                
            }
            
            include __DIR__ . "/../../views/login.php";
        }
        public function register(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = trim($_POST["username"]) ?? "";
                $password = trim($_POST["password"]) ?? "";
                
                if($this->userRepo->findByUsername($username)){
                    $_SESSION["flash_error"] = "Uzivatelske meno uz existuje";
                    header("Location:/projekt1/public/register");
                    exit();
                }
                if(mb_strlen($username) < 3 ||  mb_strlen($password) < 6){
                    $_SESSION["flash_error"] = "Uzivatelske meno musi mat aspon 3 znaky a heslo aspon 6 znakov";
                    header("Location:/projekt1/public/register");
                    exit();
                }
                $newUser = new Users($username, $password,false);

                if($this->userRepo->save($newUser)){
                    $_SESSION["flash_succes"] = "Uzivatel bol vytvoreny";
                    header("Location:/projekt1/public/login");

                }


            }



            include __DIR__ . "/../../views/register.php";
        }
        public function logout() :void{
            session_destroy();
            header("Location:/projekt1/public/login");
            exit();
        }
        public function dashboard(){
            if (!$_SESSION["user_username"]){
                header("Location:/projekt1/public/login");
                exit();
            }
            include __DIR__ . "/../../views/dashboard.php";
        }
    }