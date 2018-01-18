<?php
class CityDB {
function get_cities() {
    global $db;
    $query = "SELECT * FROM city c
            INNER JOIN state s
            ON c.stateID = s.stateID
            ORDER BY cityName ASC";
    $statement = $db->query($query);
    $row = $statement->fetch();
    $cities = array();
        foreach ($statement as $row) {
            $state = new State();
            $state->setStateID($row['stateID']);
            $state->setStateName($row['stateName']);
           
            $city = new City();
            $city->setId($row['cityID']);
            $city->setName($row['cityName']);
            $city->setState($state);
            $city->setCalendar($row['calendarSource']);
            $cities[] = $city;
        }
        return $cities;    
    }
function get_city($city_id) {
    global $db;
    $query = "SELECT * FROM city
              WHERE cityID = '$city_id'";
    $statement = $db->query($query);
    $row = $statement->fetch();
        $city = new City($row['cityID'],
                         $row['cityName']);
        return $city;
    }
/*   
function get_cities_by_state($state_id){
    global $db;
    $states = StateDB::get_state($state_id);
    $query = "SELECT * FROM city
            WHERE stateID = '$state_id'
            ORDER BY cityName";
    $statement = $db->query($query);
    $row = $statement->fetch();
    $cities = array();
        foreach ($statement as $row) {
           
            $city = new City();
            $city->setId($row['cityID']);
            $city->setName($row['cityName']);
            $city->setState($states);
            $city->setCalendar($row['calendarSource']);
            $cities[] = $city;
        }
        return $cities;  
    }
 * 
 */
}
class City {
    private $id, $name, $state, $calendar;

    public function construct() {
        $this->id = 0;
        $this->name = '';
        $this->state = '';
        $this->calendar = '';
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getState() {
        return $this->state;
    }

    public function setState($value) {
        $this->state = $value;
    }
    
    public function getCalendar() {
        return $this->calendar;
    }

    public function setCalendar($value) {
        $this->calendar = $value;
    }
}