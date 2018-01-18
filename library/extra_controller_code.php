<?php

/* 
 * Code that may be helpful later on
 */

     
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