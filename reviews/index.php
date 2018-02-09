<?php

/* 
 * Attraction Search index controller
 */

//start session
session_start();

//database connection file and functions
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
    //Cities Page View
    case 'addReview':
        $attractionID = filter_input(INPUT_POST, 'attractionID', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $userID = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_NUMBER_INT);
        
        $attractionInfo = getAttractionInfo($attractionID);
        $reviews = getReviewsByAttractionId($attractionID);
        
        if(empty($reviewText)){
            $message = '<p class="notice">All fields are required to leave a review.</p>';
            $_SESSION['message'] = $message;

            header('Location: ../attraction-search/?action=attraction-info&id='.$attractionID);

            exit;
        }
        
        $addReview = newReview($reviewText, $attractionID, $userID);
        
        if($addReview){
            $message = "<p class='success'>Review has been successfully added. Thanks for the feedback!";
        }else{
            $message = "<p class='notice'>An unexpected error has occureed and your review was not added. Please try again later.";
        }
        $_SESSION['message'] = $message;

        header('Location: ../attraction-search/?action=attraction-info&id='.$attractionID);
        
        break;
}

