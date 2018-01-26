<?php

/* 
 * Attractions controller
 */
session_start();

require_once '../library/database.php';
require_once '../model/attraction_db.php';
require_once '../library/functions.php';
require_once '../model/user_db.php';

//get CityDB class



//error message variable
//$error = '';


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
    case 'add-city':
               
        include '../view/add-city.php';
        break;
    //Adding a new City Action
    case 'addCity':
        $stateID = filter_input(INPUT_POST, 'stateID', FILTER_SANITIZE_STRING);
        $cityName = filter_input(INPUT_POST, 'cityName', FILTER_SANITIZE_STRING);
        
        if(empty($cityName)){
            $message = '<p class="notice">Please provide a name for the city.</p>';
            include '../view/add-city.php';
            exit;   
        }
        
        if ($stateID == "Select a State"){
           $message = '<p class="notice">You must select a state where the city resides.</p>';
            include '../view/add-city.php';
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
         include '../view/add-city.php';
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
        
        if ($cityID == "Select a City"){
           $message = '<p class="notice">You must select a city where the attraction resides.</p>';
            include '../view/add-attraction.php';
            exit;
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
    //Index will "Default" to the attraction management page if no action is found. The management page restricts users with no admin level and they will be redirected to the home page
        case 'home':
            //Collect City names and IDs for the Attractions Table
            //$cities = getCityBasics();
            //Create Cities Drop Down selection list
            //$cityList = createCityDropdown($cities);

            $attractions = getAttractionBasics();

            $attractionList = createTable($attractions);

            include '../view/attraction_mgmt.php';
            break;
    }
