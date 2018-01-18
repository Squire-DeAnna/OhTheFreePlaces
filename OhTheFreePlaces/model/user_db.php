<?php
class UserDB {
function get_user() {
    global $db;
    $query = "SELECT * FROM user";
    $statement = $db->query($query);
    $row = $statement->fetch();
    $user = new User();
    $user->setUserID($row['userID']);
    $user->setUserEmail($row['userEmail']);
    $user->setPassword($row['password']);
    $user->setUserFirstName($row['userFirstName']);
    $user->setUserLastName($row['userLastName']);
        return $user;
}



function add_user($email_input, $password_input, $first_name_input, $last_name_input){
    global $db;
    $query = 'INSERT INTO user
            (userEmail, password, userFirstName, userLastName)
            VALUES
            (:email_input, :password_input, :first_name_input, :last_name_input)';
    $statement = $db->prepare($query);
    $statement->bindValue(":email_input", $email_input);
    $statement->bindValue(":password_input", $password_input);
    $statement->bindValue(":first_name_input", $first_name_input);
    $statement->bindValue(":last_name_input", $last_name_input);
    $statement->execute();
    $statement->closeCursor();
    
    }

}
class User {
    private $userID, $userEmail, $password, $userFirstName, $userLastName;

    public function construct() {
        $this->id = 0;
        $this->userEmail = '';
        $this->password = '';
        $this->userFirstName = '';
        $this->userLastName = '';
    }

    public function getUserID() {
        return $this->userID;
    }

    public function setUserID($value) {
        $this->userID = $value;
    }
    
    public function getUserEmail() {
        return $this->userEmail;
    }

    public function setUserEmail($value) {
        $this->userEmail = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($value) {
        $this->password = $value;
    }
    
    public function getUserFirstName() {
        return $this->userFirstName;
    }

    public function setUserFirstName($value) {
        $this->userFirstName = $value;
    }
    
    public function getUserLastName() {
        return $this->userLastName;
    }

    public function setUserLastName($value) {
        $this->userLastName = $value;
    }
    
    
}
