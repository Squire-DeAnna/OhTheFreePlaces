<?php

/* 
 * Accounts index controller
 */

//start session
session_start();
//require_once '../library/database.php';
require_once '../model/user_db.php';

//get UserDB class
$userDB = new UserDB();

//error message variable
$error = '';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
    case 'login':
        include '../view/login.php';
        break;
    case 'user_login':
        $email_input = filter_input(INPUT_POST, 'email_input');
        $password_input = filter_input(INPUT_POST, 'password_input');
        $users = $userDB->get_user();
        $error ='';
            if ($email_input == NULL || $password_input == NULL ||$email_input != $users->getUserEmail() && $password_input != $users->getPassword()) {
            include('../view/login.php');
        $error = "Invalid username and password!";
        } 
            else  {
            include('../view/profile.php');
        }  
        break;
    case 'sign_up_form':
        include('../view/sign_up.php');
        break;
    case 'create_login':
        $email_input = filter_input(INPUT_POST, 'email_input');
        $first_name_input = filter_input(INPUT_POST, 'first_name_input');
        $last_name_input = filter_input(INPUT_POST, 'last_name_input');
        $password_input = filter_input(INPUT_POST, 'password_input');
        $verify_password = filter_input(INPUT_POST, 'verify_password');
        $users = get_user();
            if ($email_input == $users['userEmail']){    
            $error = "This email is already in use. Please either login with this email or sign up with a new one";
            } else if ($password_input != $verify_password || $verify_password != $password_input){
            $error = "The passwords you entered do not match.";
        } else {
        add_user($email_input, $password_input, $first_name_input, $last_name_input);
        $error = "User creation succesful! Please login with your username and password.";
        include('../view/login.php');
        }
        break;
    case 'profile':
        include('../view/profile.php');
        break;

}

