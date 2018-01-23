<?php

session_start();

require('library/database.php');
require('model/category_db.php');
require('model/city_db.php');
require('model/review_db.php');
require('model/state_db.php');
require('model/attraction_db.php');

//$cityDB = new CityDB();
//$stateDB = new StateDB();
//$attractionDB = new AttractionDB();

$error = '';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'template';
    }
}


switch ($action) {
    case 'home':
        include 'view/home.php';
        break;
    case 'template':
        include 'view/template.php';
        break;
    case '500':
        include 'view/500.php';
        break;
}




?>