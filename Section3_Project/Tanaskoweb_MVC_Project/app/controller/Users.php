<?php 
class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
           // die('submited');
            // Santitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Name
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter corect Name';
            }
            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }
            // Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter correct password';
            }elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            // Validate Cofirn Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm password';
            }else {
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Password do not match';
                }
            }

            // Make sure errors are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ){
                // Validate 
               // die('SUCCESS!');

               // Hash Password
               $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

               // Register User
              if($this->userModel->register($data)) {
                  flash('register_success', 'You are registered and can log in');  
                redirect('users/login');
              }else {
                    die('Something went wrong');
              }
            }else{
                // Load view with error
                $this->view('/users/register', $data);
            }
            
        }else {
            // Init data
            //echo 'load form';
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    // Login method
    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            //Initiezes POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            // Validate email
            if(empty($data['email'])){
                $data['email_err'] = 'Please entr correct email';
            }
            // Validate password
            if(empty($data['password'])){
                $data['password_err'] = 'Please eneter correct password';
            }

            // Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                // User found

            }else {
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                //die('SUCCESS LOGIN');
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    // Created Session
                    //die('Success');
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorect';

                    $this->view('users/login', $data);
                }
            }else {
                $this->view('/users/login', $data);
            }

        }else {
            // Init data
            $data = [
                'email' => '',
                'password' => ''
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        
        redirect('pages/index');
    }

    // Logout
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();
        redirect('users/login');
    }

    // isLoggedIn
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])) {
            return true;
        }else{
            return false;
        }
    }
}