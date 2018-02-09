<?php

session_start();

require('library/database.php');
require('model/review_db.php');
require('model/attraction_db.php');
require('model/search_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}


switch ($action) {
    case 'home':
        include 'view/home.php';
        break;
    case 'template':
        include 'view/city-list.php';
        break;
    case '500':
        include 'view/500.php';
        break;
}




?>