<?php

/* 
 * Attractions controller
 */

require_once '../library/database.php';
require_once '../model/state_db.php';
require_once '../model/city_db.php';
require_once '../model/attraction_db.php';

//get CityDB class
$cityDB = new CityDB();
$stateDB = new StateDB();
$attractionDB = new AttractionDB();


//error message variable
$error = '';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'view_attraction_list_by_city':
       $city_id = filter_input(INPUT_GET, 'city_id', FILTER_VALIDATE_INT);   
        $current_city = $cityDB->get_city($city_id);
        $attraction = $attractionDB->get_attraction_by_city($city_id);
     
        include('../view/attraction_list.php');
        break;
}
