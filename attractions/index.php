<?php

/* 
 * Attractions controller
 */
session_start();

require_once '../library/database.php';
require_once '../model/attraction_db.php';
require_once '../library/functions.php';
require_once '../model/user_db.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
    //Create Attractions Table in management Page based on CityID
    case 'find-attractions':
        //Collect City names and IDs for the Attractions Table
        $cities = getCityBasics();
        //Create Cities Drop Down selection list
        $cityList = createCityDropdown($cities);
        
        //find ID input by dropdown
        $cityID = filter_input(INPUT_GET, 'cityID', FILTER_VALIDATE_INT); 
        //Function to collect data based on the City ID from attractions
        $attractions = getAttractionBasics($cityID);
        //Creates table for attractions
        $attractionList = createTable($attractions);
        
        include '../view/attraction_mgmt.php';
        break;
    //Send to Add City page
    case 'manage-city':
               
        include '../view/manage-city.php';
        break;
    //Adding a new City Action
    case 'addCity':
        $stateID = filter_input(INPUT_POST, 'stateID', FILTER_SANITIZE_STRING);
        $cityName = filter_input(INPUT_POST, 'cityName', FILTER_SANITIZE_STRING);
        
        if(empty($cityName)){
            $message = '<p class="notice">Please provide a name for the city.</p>';
            include '../view/manage-city.php';
            exit;   
        }
        
        if ($stateID == "Select a State"){
           $message = '<p class="notice">You must select a state where the city resides.</p>';
            include '../view/manage-city.php';
            exit;
        }
        
        // Send the data to the model
        $regOutcome = addCity($cityName, $stateID);
        
        // Check and report the result
        if($regOutcome === 1){
         $message = "<p class='success'>City succesfully added to the database</p>";
         $_SESSION['message'] = $message;
         header('location:../attractions/index.php?action=home');
         exit;
        } else {
         $message = "<p class='notice'>Sorry, but the city addition failed. Please try again.</p>";
         include '../view/manage-city.php';
         exit;
        }
        
        break;
    //Remove city Action
    case 'removeCity':
        $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
        $values = explode(",", $location_data);
        $cityID = $values[0];

        $deleteResult = deleteCity($cityID);
        if ($deleteResult) {
            $message = "<p class='success'>Congratulations, the city was successfully removed.</p>";
            $_SESSION['message'] = $message;
            header('location:../attractions/index.php?action=home');
            exit;
        } else {
            $message = "<p class='notice'>Error: The city was not deleted. Please try again.</p>";
            include '../view/manage-city.php';
            exit;
        }        
        
        break;
    //Send to Add Attraction page
    case 'add-attraction':

            include '../view/add-attraction.php';
            break;  
    //Adding a new Attraction Action
    case 'addAttraction':
        $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
        $values = explode(",", $location_data);
        $cityID = $values[0];
        $stateID = $values[1];
        
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_STRING);
        $attractionName = filter_input(INPUT_POST, 'attractionName', FILTER_SANITIZE_STRING);
        $cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING);
        $hours = filter_input(INPUT_POST, 'hours', FILTER_SANITIZE_STRING);
        $streetAddress = filter_input(INPUT_POST, 'streetAddress', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $imgSRC = filter_input(INPUT_POST, 'imgSRC', FILTER_SANITIZE_STRING);
        
        if(empty($attractionName) || empty($cost) || empty($hours) || empty($streetAddress)){
            $message = '<p class="notice">Please fill out all required fields marked with a star.</p>';
            include '../view/add-attraction.php';
            exit;   
        }
        
        if ($cityID == 0){
           $message = '<p class="notice">You must select a city where the attraction resides.</p>';

            include '../view/add-attraction.php';
            exit;
        } else {
            $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
            $values = explode(",", $location_data);
            $cityID = $values[0];
            $stateID = $values[1];
        }
        
        if ($categoryID == "Select a Category"){
           $message = '<p class="notice">You must select a category for the attraction.</p>';
            include '../view/add-attraction.php';
            exit;
        }
        
        if(empty($imgSRC)){
            $imgSRC = 'placeholder.jpg';
        }

        
        // Send the data to the model
        $regOutcome = addAttraction($cityID, $categoryID, $stateID, $attractionName, $cost, $hours, $streetAddress, $phone, $website, $description, $imgSRC);
        
        // Check and report the result
        if($regOutcome === 1){
         $message = "<p class='success'>Attraction succesfully added to the database!</p>";
         $_SESSION['message'] = $message;
         header('location:../attractions/index.php?action=home');
         exit;
        } else {
         $message = "<p class='notice'>Sorry, but the attraction addition failed. Please try again.</p>";
         include '../view/add-attraction.php';
         exit;
        }
        
        break;
    //Click Manage on the attraction. Pulls the id to create "attractionInfo" to fill the page
    case 'update-attraction':
        $attractionID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $attractionInfo = getAttractionInfo($attractionID);
        if(count($attractionInfo)<1){
         $message = 'Sorry, no attraction information could be found.';
        }
        include '../view/attraction-update.php';
        exit;
    break;
    case 'delete-attraction':
        $attractionID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $attractionInfo = getAttractionInfo($attractionID);
        if(count($attractionInfo)<1){
         $message = 'Sorry, no attraction information could be found.';
        }
        include '../view/attraction-delete.php';
        exit;
    break;
    //Remove Attraction Action
    case 'removeAttraction':
        $attractionID = filter_input(INPUT_POST, 'attractionID', FILTER_SANITIZE_STRING);

        $deleteResult = deleteAttraction($attractionID);
        if ($deleteResult) {
            $message = "<p class='success'>Congratulations, the attraction was successfully removed.</p>";
            $_SESSION['message'] = $message;
            header('location:../attractions/index.php?action=home');
            exit;
        } else {
            $message = "<p class='notice'>Error: The attraction was not deleted. Please try again.</p>";
            include '../view/attraction-delete.php';
            exit;
        }        
        break;
    //Update Attraction Action
    case 'updateAttraction':
        $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
        $values = explode(",", $location_data);
        $cityID = $values[0];
        $stateID = $values[1];
        
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_SANITIZE_STRING);
        $attractionName = filter_input(INPUT_POST, 'attractionName', FILTER_SANITIZE_STRING);
        $cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING);
        $hours = filter_input(INPUT_POST, 'hours', FILTER_SANITIZE_STRING);
        $streetAddress = filter_input(INPUT_POST, 'streetAddress', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $imgSRC = filter_input(INPUT_POST, 'imgSRC', FILTER_SANITIZE_STRING);
        $attractionID = filter_input(INPUT_POST, 'attractionID', FILTER_SANITIZE_STRING);
        
        if(empty($attractionName) || empty($cost) || empty($hours) || empty($streetAddress)){
            $message = '<p class="notice">Please fill out all required fields marked with a star.</p>';
            include '../view/attraction-update.php';
            exit;   
        }
        
        if ($cityID == 0){
           $message = '<p class="notice">You must select a city where the attraction resides.</p>';

            include '../view/add-attraction.php';
            exit;
        } else {
            $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
            $values = explode(",", $location_data);
            $cityID = $values[0];
            $stateID = $values[1];
        }
        
        if ($categoryID == "Select a Category"){
           $message = '<p class="notice">You must select a category for the attraction.</p>';
            include '../view/add-attraction.php';
            exit;
        }
        
        if(empty($imgSRC)){
            $imgSRC = 'placeholder.jpg';
        }
        
        $updateResult = updateAttraction($cityID, $categoryID, $stateID, $attractionName, $cost, $hours, $streetAddress, $phone, $website, $description, $imgSRC, $attractionID);
        
        if($updateResult === 1){
         $message = "<p class='success'>Congratulations, $attractionName was successfully updated.</p>";
         $_SESSION['message'] = $message;
         header('location: ../attractions/');
         exit;
        } else {
         $message = "<p class='notice'>Sorry, but the product update failed. Please try again.</p>";
         include '../view/attraction-update.php';
         exit;
        }
        
        break;
    case 'createTable':
        $location_data = filter_input(INPUT_POST, 'cityID', FILTER_SANITIZE_STRING);
        $values = explode(",", $location_data);
        $cityID = $values[0];
        
        $attractions = getAttractionByID($cityID);
        $attractionList = createTable($attractions);
        
        include '../view/attraction_mgmt.php';
        break;
    //Index will "Default" to the attraction management page if no action is found. The management page restricts users with no admin level and they will be redirected to the home page
        case 'home':
            $attractions = getAttractionBasics();

            $attractionList = createTable($attractions);

            include '../view/attraction_mgmt.php';
            break;
    }
