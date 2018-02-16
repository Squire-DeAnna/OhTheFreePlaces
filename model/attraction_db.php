<?php

//Get basic attraction information from the database for starting an update or delete process (table found on management page)
function getAttractionBasics() {
    $db = databaseConnect();
    $sql = 'SELECT attractionName, attractionID FROM attraction ORDER BY attractionName ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractions;
}
//Get attraction info by city ID
function getAttractionByID($cityID) {
    $db = databaseConnect();
    $sql = 'SELECT attractionName, attractionID, imgSRC FROM attraction WHERE cityID = :cityID ORDER BY attractionName ASC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_STR);
    $stmt->execute();
    $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractions;
}
//Create the drop down list for States
function createStatesDropDown() {
   $states = fetchStates();
   
   $stateList = '<select name="stateID" id="stateID">';
   $stateList .= '<option>Select a State</option>';
   foreach ($states as $state) {
       $stateList .= "<option value='$state[stateID]'";
    if(isset($stateID)){
        if($state['stateID'] === $stateID){
            $stateList .= ' selected ';
        }
    }
    $stateList .= ">$state[stateName]</option>";
   }
   $stateList .= '</select>';
   
   return $stateList;
}

//Create the drop down list for Cities
function createCityDropDown() {
   $cities = fetchCities();
   
   $cityList = '<select name="cityID" id="cityID">';
   $cityList .= '<option value=0,0>Select a City</option>';
   foreach ($cities as $city) {
       $cityList .= "<option value='$city[cityID],$city[stateID]'";
    if(isset($cityID)){
        if($city[cityID] === $cityID ){
            $cityList .= ' selected ';
        }
    }
    $cityList .= ">$city[cityName], $city[StateName]</option>";
   }
   $cityList .= '</select>';
   
   return $cityList;
}


//Create the drop down list for Category
function createCatDropDown() {
   $categories = fetchCategories();
   
   $categoryList = '<select name="categoryID" id="categoryID">';
   $categoryList .= '<option>Select a Category</option>';
   foreach ($categories as $category) {
       $categoryList .= "<option value='$category[categoryID]'";
    if(isset($categoryID)){
        if($city['categoryID'] === $categoryID){
            $categoryList .= ' selected ';
        }
    }
    $categoryList .= ">$category[categoryName]</option>";
   }
   $categoryList .= '</select>';
   
   return $categoryList;
}

//Add City to Database
function addCity($cityName, $stateID){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO city (cityName, stateID) VALUES (:cityName, :stateID)';
    // Create the prepared statement using the connection
    $stmt = $db->prepare($sql);
    // The next lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':stateID', $stateID, PDO::PARAM_STR);
    $stmt->bindValue(':cityName', $cityName, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

//Remove City from database
function deleteCity($cityID) {
    $db = databaseConnect();
    $sql = 'DELETE FROM city WHERE cityID = :cityID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Add Attraction to Database
function addAttraction($cityID, $categoryID, $stateID, $attractionName, $cost, $hours, $streetAddress, $phone, $website, $description, $imgSRC, $photoCaption){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO attraction (cityID, categoryID, stateID, attractionName, cost, hours, streetAddress, phone, website, description, imgSRC, photoCaption) VALUES (:cityID, :categoryID, :stateID, :attractionName, :cost, :hours, :streetAddress, :phone, :website, :description, :imgSRC, :photoCaption)';
    // Create the prepared statement using the connection
    $stmt = $db->prepare($sql);
    // The next lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_STR);
    $stmt->bindValue(':categoryID', $categoryID, PDO::PARAM_STR);
    $stmt->bindValue(':stateID', $stateID, PDO::PARAM_STR);
    $stmt->bindValue(':attractionName', $attractionName, PDO::PARAM_STR);
    $stmt->bindValue(':cost', $cost, PDO::PARAM_STR);
    $stmt->bindValue(':hours', $hours, PDO::PARAM_STR);
    $stmt->bindValue(':streetAddress', $streetAddress, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':website', $website, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':imgSRC', $imgSRC, PDO::PARAM_STR);
    $stmt->bindValue(':photoCaption', $photoCaption, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

//Remove Attraction from database
function deleteAttraction($attractionID) {
    $db = databaseConnect();
    $sql = 'DELETE FROM attraction WHERE attractionID = :attractionID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Get attraction information by attractionId
function getAttractionInfo($attractionID){
    $db = databaseConnect();
    $sql = 'SELECT * FROM attraction WHERE attractionID = :attractionID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_INT);
    $stmt->execute();
    $attractionInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractionInfo;
}

//Update the Attraction
function updateAttraction($cityID, $categoryID, $stateID, $attractionName, $cost, $hours, $streetAddress, $phone, $website, $description, $imgSRC, $photoCaption, $attractionID) {
    $db = databaseConnect();
    $sql = 'UPDATE attraction SET cityID = :cityID, categoryID = :categoryID, stateID = :stateID, attractionName = :attractionName, cost = :cost, hours = :hours, streetAddress = :streetAddress, phone = :phone, website = :website, description = :description, imgSRC = :imgSRC, photoCaption = :photoCaption WHERE attractionID = :attractionID';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_STR);
    $stmt->bindValue(':categoryID', $categoryID, PDO::PARAM_STR);
    $stmt->bindValue(':stateID', $stateID, PDO::PARAM_STR);
    $stmt->bindValue(':attractionName', $attractionName, PDO::PARAM_STR);
    $stmt->bindValue(':cost', $cost, PDO::PARAM_STR);
    $stmt->bindValue(':hours', $hours, PDO::PARAM_STR);
    $stmt->bindValue(':streetAddress', $streetAddress, PDO::PARAM_STR);
    $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindValue(':website', $website, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':imgSRC', $imgSRC, PDO::PARAM_STR);
    $stmt->bindValue(':photoCaption', $photoCaption, PDO::PARAM_STR);
    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}