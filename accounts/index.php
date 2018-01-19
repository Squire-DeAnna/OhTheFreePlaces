<?php

/* 
 * Accounts index controller
 */

//start session
session_start();

//database connection file
require_once '../library/database.php';
//Functions File
require_once '../library/functions.php';
// Accounts / User Model
require_once '../model/user_db.php';

//get UserDB class
//$userDB = new UserDB();

//error message variable
$error = '';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
    //Login Page View
    case 'login':
        include '../view/login.php';
        break;
    //User Logs in Action
    case 'user_login':
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $emailCheck = checkEmail($userEmail);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($password);

        // Run basic checks, return if errors
        if (empty($emailCheck) || empty($passwordCheck)) {
          $message = '<p class="notice">Please provide a valid email address and password.</p>';
          include '../view/login.php';
          exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $userData = getUser($userEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $userData['password']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
          $message = '<p class="notice">Please check your password and/or email and try again.</p>';
          include '../view/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($userData);
        // Store the array into the session
        $_SESSION['userData'] = $userData;

        // Send them to the profile view

        header('location: ../accounts/index.php?action=profile');
        
        exit;
        break;
    //Sign Up Page View    
    case 'sign_up_form':
        include('../view/sign_up.php');
        break;
    //Create New User Action
    case 'create_login':
        // Filter and store the data
        $userFirstName = filter_input(INPUT_POST, 'userFirstName', FILTER_SANITIZE_STRING);
        $userLastName = filter_input(INPUT_POST, 'userLastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userConfirm = filter_input(INPUT_POST, 'userConfirm', FILTER_SANITIZE_STRING);
        
        $checkEmail = checkEmail($userEmail);
        $checkPassword = checkPassword($password);
        
        $existingEmail = checkExistingEmail($userEmail);
        
        if ($existingEmail){
            $message = '<p>The email address provided already exists. Please login with your existing email and password. </p>';
            include '../view/login.php';
            exit;
        }
        
        // Check for missing data
        if(empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($password) || empty($userConfirm)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/sign_up.php';
            exit;   
        }
        
        if($password != $userConfirm){
            $message = '<p>Both password fields must match.</p>';
            include '../view/sign_up.php';
            exit;   
        }
        
        //Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Send the data to the model
        $regOutcome = regUser($userFirstName, $userLastName, $userEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
         $message = "<p>Thank you for registering $userFirstName. Please use your email and password to login.</p>";
         include '../view/login.php';
         exit;
        } else {
         $message = "<p>Sorry $userFirstName, but the registration failed. Please try again.</p>";
         include '../view/sign_up.php';
         exit;
        }
        break;
        
        //View User Profile Page
    case 'profile':
        include('../view/profile.php');
        break;
    
    case 'logout':
            $_SESSION['loggedin'] = FALSE;
            session_destroy();
            header('Location: ../index.php?action=home');
            
        break;

}

