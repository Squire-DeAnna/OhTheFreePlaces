<?php

/* 
 * Cities controller 
 */
require_once '../library/database.php';
require_once '../model/state_db.php';
require_once '../model/city_db.php';

//get CityDB class
$cityDB = new CityDB();
$stateDB = new StateDB();


//error message variable
$error = '';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'view_city_list':
        $cities = $cityDB->get_cities();
        include '../view/city_list.php';
        break;
}
