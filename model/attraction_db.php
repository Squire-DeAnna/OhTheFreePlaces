<?php
class AttractionDB {
//get attractions

    
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
}