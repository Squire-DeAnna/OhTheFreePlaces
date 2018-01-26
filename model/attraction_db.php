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
   $cityList .= '<option>Select a City</option>';
   foreach ($cities as $city) {
       $cityList .= "<option value='$city[cityID],$city[stateID]'";
    if(isset($cityID)){
        if($city['cityID'] === $cityID){
            $cityList .= ' selected ';
        }
    }
    $cityList .= ">$city[cityName]</option>";
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
    // The next four lines replace the placeholders in the SQL
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

//Add Attraction to Database
function addAttraction($cityID, $categoryID, $stateID, $attractionName, $cost, $hours, $streetAddress, $phone, $website, $description, $imgSRC){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO attraction (cityID, categoryID, stateID, attractionName, cost, hours, streetAddress, phone, website, description, imgSRC) VALUES (:cityID, :categoryID, :stateID, :attractionName, :cost, :hours, :streetAddress, :phone, :website, :description, :imgSRC)';
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
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}


/*class AttractionDB {
//get attractions

function getAttractionBasics($cityID) {
    $db = databaseConnect();
    $sql = 'SELECT attractionName, attractionID FROM attraction WHERE cityID = :cityID ORDER BY attractionName ASC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_STR);
    $stmt->execute();
    $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractions;
}
    
function get_attraction($attraction_id) {
    global $db;
    $query = "SELECT *
            FROM attraction 
            WHERE attractionID = '$attraction_id'
            ORDER BY attractionName";
        $statement = $db->query($query);
        $attractions = array();
        foreach ($statement as $row) {
           
            $attraction = new Attraction();
            $attraction->setId($row['attractionID']);
            $attraction->setName($row['attractionName']);
            $attraction->setCost($row['cost']);
            $attraction->setHours($row['hours']);
            $attraction->setStreetAddress($row['streetAddress']);
            $attraction->setPhone($row['phone']);
            $attraction->setWebsite($row['website']);
            $attraction->setDescription($row['description']);
            $attractions[] = $attraction;
        }
        return $attractions;
    }



function get_attraction_by_city($city_id) {
    global $db;
    
    $city = CityDB::get_city($city_id);
    $query = "SELECT *
            FROM attraction 
            WHERE cityID = '$city_id'
            ORDER BY attractionName";
    $statement = $db->query($query);
    $attractions = array();
        foreach ($statement as $row) {
            $attraction = new Attraction();
            $attraction->setCity($city);
            $attraction->setId($row['attractionID']);
            $attraction->setName($row['attractionName']);
            $attraction->setStreetAddress($row['streetAddress']);
            $attraction->setCost($row['cost']);
            $attraction->setHours($row['hours']);
            $attraction->setWebsite($row['website']);

            $attractions[] = $attraction;
        }
        return $attractions;
    }
    


}

class Attraction {
    private $id, $category, $name, $cost, $hours, $streetAddress, $city, $state, $description, $phone, $website;

    public function construct() {
        $this->id = 0;
        $this->category = NULL;
        $this->name = '';
        $this->cost = '';
        $this->hours = '';
        $this->streetAddress = '';
        $this->city = NULL;
        $this->state = NULL;
        $this->description = '';
        $this->phone = '';
        $this->website = '';

    }
    

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    public function getCategory() {
        return $this->category;
    }

    public function setCategory($value) {
        $this->category = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
        
    }
    
    public function getCost() {
        return $this->cost;
    }

    public function setCost($value) {
        $this->cost = $value;
    }
    
    public function getHours() {
        return $this->hours;
    }

    public function setHours($value) {
        $this->hours = $value;
    }
    
    public function getStreetAddress() {
        return $this->streetAddress;
    }

    public function setStreetAddress($value) {
        $this->streetAddress = $value;
    }
    
    public function getCity() {
        return $this->city;
    }

    public function setCity($value) {
        $this->city = $value;
    }
    
        public function getState() {
        return $this->state;
    }

    public function setState($value) {
        $this->state = $value;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }
    
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }
    
    public function getWebsite() {
        return $this->website;
    }

    public function setWebsite($value) {
        $this->website = $value;
    }
} */