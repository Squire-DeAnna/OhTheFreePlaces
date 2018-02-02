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
        
        $cityInfo = fetchCityByID($cityID);
 
        $attractions = getAttractionByID($cityID);
        
        $attractionList = createList($attractions);
        
        include '../view/attraction-list.php';
        
        break;

}

