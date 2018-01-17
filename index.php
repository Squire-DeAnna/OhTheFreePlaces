<?php
require('library/database.php');
require('model/category_db.php');
require('model/city_db.php');
require('model/review_db.php');
require('model/state_db.php');
require('model/attraction_db.php');

$cityDB = new CityDB();
$stateDB = new StateDB();
$attractionDB = new AttractionDB();

$error = '';

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
        include 'view/template.php';
        break;
    case '500':
        include 'view/500.php';
        break;
}



 //------------------------planner page   
 if ($action == 'view_planner'){
    
    include('view/planner.php');
 
    
//------------------------blogs page
} else if ($action == 'view_blog'){ 
   
     include('view/tips_blog.php');
     

//------------------------state page actions
  
/*    
}else if ($action == 'view_state_list'){
    $state = $stateDB->get_states();
   
    include('view/state_list.php');
    

}else if ($action == 'view_city_list_by_state'){
    $state_id = filter_input(INPUT_GET, 'state_id', FILTER_VALIDATE_INT);
    if ($state_id == FALSE || $state_id == NULL) {
        $error = 'Hold up there, it looks like the City or State ID are missing. Please go back and try again.';
        include('errors/error.php');
    } else{
    $current_state = $stateDB->get_state($state_id);
    $states = $stateDB->get_states();
    $cities = $cityDB->get_cities_by_state($state_id);
    
    include('view/city_list.php');   
    }
    
*/
    
//------------------------city page actions
    
}else if ($action == 'view_city_list'){
   $cities = $cityDB->get_cities();
    
    include('view/city_list.php');
 
    
}else if ($action == 'view_attraction_list_by_city'){  
$city_id = filter_input(INPUT_GET, 'city_id', FILTER_VALIDATE_INT);   
    $current_city = $cityDB->get_city($city_id);
    $attraction = $attractionDB->get_attraction_by_city($city_id);
     
    include('view/attraction_list.php');
    
     
 /*  
 //----------------attrraction page actions 
}else if ($action == 'view_attraction') {
    $attraction_id = filter_input(INPUT_GET, 'attraction_id', FILTER_VALIDATE_INT);
    
    $attractions = $attractionDB->get_attraction($attraction_id);

    if ($attraction_id == FALSE || $attraction_id == NULL) {
        $error = 'Hold up there, it looks like the Attraction ID is missing. Please go back and try again.';
    } else {
        
    include('view/attraction_info.php');
    }
 */
    
}
?>