<?php
require('../model/database.php');
require('../model/category_db.php');
require('../model/city_db.php');
require('../model/review_db.php');
require('../model/state_db.php');
require('../model/user_db.php');
require('../model/attraction_db.php');
session_start();

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
    $users = get_user($email_input);
    
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
    
     
    
 //----------------attrraction page actions 
}else if ($action == 'view_attraction') {
    $attraction_id = filter_input(INPUT_GET, 'attraction_id', FILTER_VALIDATE_INT);
    $current_attraction = $attractionDB->get_attraction($attraction_id);
    $attraction = $attractionDB->get_attraction($attraction_id);

    if ($attraction_id == FALSE || $attraction_id == NULL) {
        $error = 'Hold up there, it looks like the Attraction ID is missing. Please go back and try again.';
    } else {
        
    include('view/attraction_info.php');
    }
    

}else if ($action == 'manage_attractions') {
    $books = get_book_information();
    include('view/edit_attraction_list.php'); 

    
//-------------------------------------edit book form

/*    
}else if ($action == 'show_book_edit_form'){
    $book_id = filter_input(INPUT_POST, "book_id", FILTER_VALIDATE_INT);
    if ($book_id === null || $book_id  === false ){
    $error = 'Hold up there, it looks like the Book ID is missing. Please go back and try again.';
        include('errors/error.php');
    }else {
    $genres = get_genres();
    $ageGroup = get_age_groups();
    $authors = get_author();
    $books = get_book($book_id);
    $book_title = $books['bookTitle'];
    $genre_id = $books["genreID"];
    $author_id = $books["authorID"];
    $age_group_id = $books["ageGroupID"];
    $published_date = $books['publishedDate'];
    $review_text = $books['reviewText'];
    
    include('view/book_edit_form.php');
    }
    
//---------------------------edit book in database
}else if ($action == 'edit_book'){
    $book_id = filter_input(INPUT_POST, "book_id", FILTER_VALIDATE_INT);
    $genre_id = filter_input(INPUT_POST, "genre_id", FILTER_VALIDATE_INT);
    $review_text = filter_input(INPUT_POST, "review_text");
    $author_id = filter_input(INPUT_POST, "author_id", FILTER_VALIDATE_INT);
    $age_group_id = filter_input(INPUT_POST, "age_group_id", FILTER_VALIDATE_INT);
    $book_title = filter_input(INPUT_POST, "book_title");
    $published_date = filter_input(INPUT_POST, "published_date");


    if ($book_id == NULL || $book_id == FALSE ||$genre_id == NULL || $genre_id == FALSE || $author_id == NULL || $author_id == FALSE || $age_group_id == NULL || $age_group_id == FALSE ){
        $error = 'You have not filled all the fields';
        include 'errors/error.php';
    } else {
   edit_book($book_id, $book_title, $published_date, $genre_id, $review_text, $author_id, $age_group_id);
    $message = "You have edited the book successfully";
    include('view/result.php');
    }
    
//--------------------------------------book add form
}else if ($action == 'show_book_add_form'){
    $genres = get_genres();
    $authors = get_author();
    $ageGroup = get_age_groups();
    include('view/book_add_form.php'); 
   
    
//---------------------------------------add book to database
}else if ($action == 'add_book'){
    // Collect the data
    $book_title = filter_input(INPUT_POST, 'book_title');
    $published_date = filter_input(INPUT_POST, 'published_date');
    $review_text = filter_input(INPUT_POST, 'review_text');
    $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
    $author_id = filter_input(INPUT_POST, 'author_id', FILTER_VALIDATE_INT);
    $age_group_id = filter_input(INPUT_POST, 'age_group_id', FILTER_VALIDATE_INT);
    // Validate 
    if ($genre_id == NULL || $genre_id == FALSE || $author_id == NULL || $author_id == FALSE || $age_group_id == NULL || $age_group_id == FALSE){
        $error = 'Hold up there, something went wrong. Please go back and try again';
        include 'errors/error.php';
        
        }else if ($book_title == NULL){ 
        $error = 'Please add the Book Title';
        include 'errors/error.php';
    }else if ($published_date != NULL && checkdate($published_date['year'], $published_date['month'], $published_date['day']) == FALSE){
        $error = 'Please date as YYYY/MM/DD';
        include 'errors/error.php';
    } else {
        
    add_book($book_title, $published_date, $genre_id, $review_text, $author_id, $age_group_id);
    $message = "You have added the book successfully";
    include('view/result.php');
    }  

//---------------------------------------delete book    
}else if ($action == 'delete_book'){
    $book_id = filter_input(INPUT_POST, "book_id", FILTER_VALIDATE_INT);
    if ($book_id == NULL || $book_id == FALSE ) {
        
        $error = 'Hold up, the Book ID is missing. Please try again.';
        include 'errors/error.php';
    } else {
    delete_book($book_id);
    $message = "You have deleted the book successfully";
    include('view/result.php');
    }

//----------Manage genres table    
}else if ($action == 'manage_genres') {

    $genres = get_genres();
    include('view/genre_edit_table.php'); 


//----------add genre form   
}else if ($action == 'show_genre_add_form'){
    include('view/genre_add_form.php');

    
//------------add the genre to the database    
}else if ($action == 'add_genre'){
    $genre_name = filter_input(INPUT_POST, 'genre_name', FILTER_SANITIZE_STRING);
    if ($genre_name == NULL || $genre_name == FALSE) {
        $error = 'Please enter a genre name';
        include 'errors/error.php';
    } else {
    add_genre($genre_name);
    $message = "You have added the genre successfully";
    include('view/result.php');
    }

 //--------------delete genre from the database   
}else if ($action == 'delete_genre'){
    $genre_id = filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);
    if ($genre_id == NULL || $genre_id == FALSE) {
        
        $error = 'Something went wrong please try again';
        include 'errors/error.php';
    } else {
    delete_genre($genre_id);
    $message = "You have deleted the genre successfully";
    include('view/result.php');
    }


//---------------author_add form   
}else if ($action == 'author_add') {

    include('view/author_add.php'); 

    
//---------------add author action    
}else if ($action == 'add_author'){
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    if ($last_name !=NULL && $first_name != NULL ) {
        add_author($last_name, $first_name);
        $message = "You have added the author successfully";
        include('view/result.php');
    } else {
    $error = 'You have not filled all the fields';
        include 'errors/error.php';
    
    }*/
}


?>