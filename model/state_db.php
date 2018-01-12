<?php
class StateDB {
function get_states() {
    global $db;
    $query = "SELECT * FROM state
            ORDER BY stateName ASC";
    $statement = $db->query($query);
    $row = $statement->fetch();
    $states = array();
        foreach ($statement as $row) {
           
            $state = new State();
            $state->setId($row['stateID']);
            $state->setStateCode($row['stateCode']);
            $state->setStateName($row['stateName']);
            $states[] = $state;
        }
        return $states;
    
    }
function get_state($state_id) {
        global $db;
        $query = "SELECT * FROM state
                  WHERE stateID = '$state_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $states = new State();
        $states->setStateID($row['stateID']);
        $states->setStateCode($row['stateCode']);
        $states->setStateName($row['stateName']);
        return $states;
    }

}
class State {
    private $id, $stateCode, $stateName;

    public function construct() {
        $this->id = 0;
        $this->code = '';
        $this->name = '';
    }

    public function getStateID() {
        return $this->id;
    }

    public function setStateID($value) {
        $this->id = $value;
    }
    
    public function getStateCode() {
        return $this->stateCode;
    }

    public function setStateCode($value) {
        $this->stateCode = $value;
    }

    public function getStateName() {
        return $this->stateName;
    }

    public function setStateName($value) {
        $this->stateName = $value;
    }
    
    
}