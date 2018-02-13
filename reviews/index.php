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
    //Add Review Action called from attraction info page
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
    //Manage Review Page View
    case 'manageReview':
        $reviewID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $reviewInfo = getReview($reviewID);
        $attractionInfo = getAttractionInfo($reviewInfo['attractionID']);
        if(count($reviewInfo)<1){
         $message = '<p class="notice">Sorry, no review information could be found.</p>';
        }
        include '../view/manage-review.php';
        exit;
        
        break;
    //Update review Action
    case 'updateReview':
        $reviewID = filter_input(INPUT_POST, 'reviewID', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        if( empty($reviewText)){
                $message = '<p class="notice">All fields are required.</p>';
                $reviewID = filter_input(INPUT_POST, 'reviewID', FILTER_SANITIZE_NUMBER_INT);
                $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
                $reviewInfo = getReview($reviewID);
                $attractionInfo = getAttractionInfo($reviewInfo['attractionID']);
                if(count($reviewInfo)<1){
                 $message = '<p class="notice">Sorry, no review information could be found.</p>';
                }
                include '../view/manage-review.php';
                exit;
            }

        $updateResult = updateReview($reviewText, $reviewID);

        if($updateResult === 1){
             $message2 = "<p class='success'>Congratulations, your review was successfully updated.</p>";
             $_SESSION['message2'] = $message2;
             header('location: ../accounts/index.php?action=profile');
             exit;
            } else {
             $message2 = "<p class='notice'>Sorry, but the review update failed. Please try again.</p>";
             $_SESSION['message2'] = $message2;
             header('location: ../accounts/index.php?action=profile');
             exit;
            }
        
        break;
    //Delete Review Action
    case 'deleteReview':
        $reviewID = filter_input(INPUT_POST, 'reviewID', FILTER_SANITIZE_NUMBER_INT);
    
        $deleteResult = deleteReview($reviewID);
        if ($deleteResult) {
                     $message2 = "<p class='success'>Congratulations, the review was successfully deleted.</p>";
                     $_SESSION['message2'] = $message2;
                     header('location: ../accounts/index.php?action=profile'); 
                     exit;
                    } else {
                     $message2 = "<p class='notice'>Error: Review was not properly deleted. Please try again or contact the website administrator.</p>";
                     $_SESSION['message2'] = $message2;
                     header('location: ../accounts/index.php?action=profile'); 
                     exit;
                    }
        break;
}

