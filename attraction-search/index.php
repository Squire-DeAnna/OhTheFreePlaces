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
require_once '../model/review_db.php';
require_once '../model/user_db.php';
require_once '../library/functions.php';



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
    //Cities Page View
    case 'cities':
        $cityList = createCityButtons();
        
        include '../view/city-list.php';
        break;
    //Attraction List View
    case 'attraction-list':
        $cityID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $categoryID = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);
        
        $cityInfo = fetchCityByID($cityID);
 
        if ($categoryID > 0) {
            $attractions = getAttractionByCategory($cityID, $categoryID);
        } else {
            $attractions = getAttractionByID($cityID);
        }

        $attractionList = createList($attractions);

        
        include '../view/attraction-list.php';
        
        break;
        
    case 'attraction-category':
        $cityID = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_STRING);
        
       header('location: ../attraction-search/?action=attraction-list&id='
               . $cityID
               . '&category='
               . $categoryID);
        
        break;
        
    case 'attraction-info':
        $attractionID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $reviews = getReviewsByAttractionId($attractionID);
        
        $attractionInfo = getAttractionInfo($attractionID);
        
        if(!count($reviews)){
         $reviewDisplay = "<p class='notice'>No reviews have been made for this attraction yet.</p>";
        } else {
         $reviewDisplay = buildReviewsDisplay($reviews);
        }
        
        include '../view/attraction-info.php';
        
        break;
        
    case 'my-list':
        $myList = getAttractionListByUserId($_SESSION['userData']['userId']);
            if(!count($myList)){
                $message = "<p class='notice'>Sorry, you have not added any existing attractions to your list yet. <a href='../attraction-search/index.php?action=cities'><strong>Add some now!</strong></a></p>";
               } else {
                $listDisplay = buildMyListDisplay($myList);
            }
        
        include '../view/my-list.php';
        
        break;
    //Adding from the Cities search page    
    case 'listAdd':
        $userID = $_SESSION['userData']['userId'];
        $attractionID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $cityID = filter_input(INPUT_GET, 'cityID', FILTER_VALIDATE_INT);
        
        $checkList = checkList($userID, $attractionID);
        
        if ($checkList) {
            $message = "<p class='notice'>This attraction already exists on your list.";
            $_SESSION['list-message'] = $message;
            header('location: ../attraction-search/?action=attraction-list&id='
               . $cityID
               . '&category=0');
            exit;
        }
        
        
        $addListItem = newListItem($userID, $attractionID);
        
        if($addListItem){
            $message = "<p class='success'>Attraction has been added to your list.";
        }else{
            $message = "<p class='notice'>An unexpected error has occureed and the attraction was not added to your list. Please try again later.";
        }
        $_SESSION['list-message'] = $message;

        header('location: ../attraction-search/?action=attraction-list&id='
               . $cityID
               . '&category=0');
        
        break;
    //Adding from the Attraction Info Page   
    case 'addList':
        $userID = $_SESSION['userData']['userId'];
        $attractionID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        $checkList = checkList($userID, $attractionID);
        
        if ($checkList) {
            $message = "<p class='notice'>This attraction already exists on your list.";
            $_SESSION['list-message'] = $message;
            header('Location: ../attraction-search/?action=attraction-info&id='.$attractionID);
            exit;
        }
        
        
        $addListItem = newListItem($userID, $attractionID);
        
        if($addListItem){
            $message = "<p class='success'>Attraction has been added to your list.";
        }else{
            $message = "<p class='notice'>An unexpected error has occureed and the attraction was not added to your list. Please try again later.";
        }
        $_SESSION['list-message'] = $message;

        header('Location: ../attraction-search/?action=attraction-info&id='.$attractionID);
        
        break;
    //Delete from My List    
    case 'listDelete':
        $listID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        
        $deleteResult = deleteListItem($listID);
        if ($deleteResult) {
                     $message = "<p class='success'>Congratulations, the attraction was successfully removed.</p>";
                     $_SESSION['list-message'] = $message;
                     header('location: ../attraction-search/index.php?action=my-list'); 
                     exit;
                    } else {
                     $message = "<p class='notice'>Error: List item was not properly deleted. Please try again or contact the website administrator.</p>";
                     $_SESSION['list-message'] = $message;
                     header('location: ../attraction-search/index.php?action=my-list'); 
                     exit;
                    }
        
        break;
}

