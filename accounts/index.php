<?php

/* 
 * Accounts index controller
 */

//start session
session_start();

//database connection file
require_once '../library/database.php';
require_once '../model/attraction_db.php';
require_once '../model/search_db.php';
require_once '../model/user_db.php';
require_once '../model/review_db.php';
require_once '../library/functions.php';

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
        // Query the user data based on the email address
        $userData = getUser($userEmail);
        // Compare the password just submitted against
        // the hashed password for the matching user
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
        include('../view/sign-up.php');
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
            $message = '<p class="notice">The email address provided already exists. Please login with your existing email and password. </p>';
            include '../view/login.php';
            exit;
        }
        
        // Check for missing data
        if(empty($userFirstName) || empty($userLastName) || empty($userEmail) || empty($password) || empty($userConfirm)){
            $message = '<p class="notice">Please provide information for all empty form fields.</p>';
            include '../view/sign_up.php';
            exit;   
        }
        
        if($password != $userConfirm){
            $message = '<p class="notice">Both password fields must match.</p>';
            include '../view/sign_up.php';
            exit;   
        }
        
        //Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Send the data to the model
        $regOutcome = regUser($userFirstName, $userLastName, $userEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
         $message = "<p class='success'>Thank you for registering $userFirstName. Please use your email and password to login.</p>";
         include '../view/login.php';
         exit;
        } else {
         $message = "<p class='notice'>Sorry $userFirstName, but the registration failed. Please try again.</p>";
         include '../view/sign_up.php';
         exit;
        }
        break;
        
        //View User Profile Page
    case 'profile':
        $reviews = getReviewsByUserId($_SESSION['userData']['userId']);
            if(!count($reviews)){
                $message2 = "<p class='notice'>Sorry, you have not made any attraction reviews yet.</p>";
               } else {
                $reviewDisplay = buildAdminReviewsDisplay($reviews);
            }
        
        include('../view/profile.php');
        break;
        // Update Account View
    case 'update-account':
        $userData = getUserInfo($_SESSION['userData']['userId']);
        
        include '../view/update-account.php';
        break;
    //Update User Name, and Email Action
    case 'update-user':
        $userFirstname = filter_input(INPUT_POST, 'userFirstname', FILTER_SANITIZE_STRING);
        $userLastname = filter_input(INPUT_POST, 'userLastname', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $userId = $_SESSION['userData']['userId'];
        
        $checkEmail = checkEmail($userEmail);
        
        $existingEmail = checkExistingEmail($userEmail);
        //Checks for Existing email
        if ($_SESSION['userData']['userEmail'] != $userEmail){
            if ($userEmail){
                $message = '<p class="notice">The email address provided already exists. Please update account with a new email address or log-out and login with the existing one.</p>';
                include '../view/update-account.php';
                exit;
            }
        } 
            //Checks for Empty Fields
        if(empty($checkEmail) || empty($userFirstname) || empty($userLastname)){
            $message = '<p class="notice">Fields cannot be left empty.</p>';
            include '../view/update-account.php';
            exit;   
        }
        //Runs the update in the database function
        $updateResult = updateUser($userFirstname, $userLastname, $userEmail, $userId);
        //If it all works out, runs this code
        if($updateResult === 1){
            $message = "<p class='success'>Congratulations, Account Information was successfully updated.</p>";
         
         //retrieves the new userData since it was updated
         $userData = getUser($userEmail);
         
         array_pop($userData);
        // Store the array into the session
         $_SESSION['userData'] = $userData;
        
         include '../view/profile.php';
         exit;
        } else {
            //The database update fails, or they submit the exact same info
            $message = "<p class='notice'>Sorry, but the account information update failed. Please try again.</p>";
            include '../view/profile.php';
         exit;
        }
        
        break;
    //Update User Password (It's basically the same as update account)
    case 'update-password':
        $userData = getUserInfo($_SESSION['userData']['userId']);
        
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userConfirm = filter_input(INPUT_POST, 'userConfirm', FILTER_SANITIZE_STRING);
        $userId = $_SESSION['userData']['userId'];

        $checkPassword = checkPassword($password);
        
        if(empty($checkPassword) || empty($userConfirm)){
            $message = '<p class="notice">Please provide information for empty password form fields.</p>';
            include '../view/update-account.php';
            exit;
        }
        
        if($password != $userConfirm){
            $message = '<p class="notice">Both password fields must match.</p>';
            include '../view/update-account.php';
            exit;   
        }
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $updateResult = updatePassword($hashedPassword, $userId);
        
        if($updateResult === 1){
         $message = "<p class='success'>Congratulations, Password was successfully changed.</p>";
        
         include '../view/profile.php';
         exit;
        } else {
         $message = "<p class='notice'>Sorry, but the account password change failed. Please try again.</p>";

         include '../view/profile.php';
         exit;
        }
        
        break;
   //Log out of Session
    case 'logout':
            $_SESSION['loggedin'] = FALSE;
            session_destroy();
            header('Location: ../index.php?action=home');
            
        break;

}

