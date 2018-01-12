<?php
require('model/database.php');
require('model/category_db.php');
require('model/city_db.php');
require('model/review_db.php');
require('model/state_db.php');
require('model/user_db.php');
require('model/attraction_db.php');

$cityDB = new CityDB();
$stateDB = new StateDB();
$attractionDB = new AttractionDB();
$userDB = new UserDB();
$error = '';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

//------------------------home page
if ($action == 'home'){
    include('main.php');

//------------------------login and sign up pages
} else if ($action == 'login'){
    include('view/login.php');
    
}else if ($action == 'user_login'){
    $email_input = filter_input(INPUT_POST, 'email_input');
    $password_input = filter_input(INPUT_POST, 'password_input');
    $users = $userDB->get_user();
    $error ='';
    
    if ($email_input == NULL || $password_input == NULL ||$email_input != $users->getUserEmail() && $password_input != $users->getPassword()) {
        include('view/login.php');
            $error = "Invalid username and password!";
    } else  {
            include('view/profile.php');
    }  

}else if ($action == 'sign_up_form'){
    include('view/sign_up.php');
    
}else if ($action == 'create_login'){
    $email_input = filter_input(INPUT_POST, 'email_input');
    $first_name_input = filter_input(INPUT_POST, 'first_name_input');
    $last_name_input = filter_input(INPUT_POST, 'last_name_input');
    $password_input = filter_input(INPUT_POST, 'password_input');
    $verify_password = filter_input(INPUT_POST, 'verify_password');
    $users = get_user();
    
    if ($email_input == $users['userEmail']){    
    $error = "This email is already in use. Please either login with this email or sign up with a new one";
    } else if ($password_input != $verify_password || $verify_password != $password_input){
    $error = "The passwords you entered do not match.";
    } else {
        add_user($email_input, $password_input, $first_name_input, $last_name_input);
        $error = "User creation succesful! Please login with your username and password.";
        include('view/login.php');
    }
    
//------------------------profile page
} else if ($action == 'user_profile'){
    include('view/profile.php');
    
 //------------------------planner page   
} else if ($action == 'view_planner'){
    
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