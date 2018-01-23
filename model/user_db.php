<?php

/* 
 * Users/Accounts model
 */

//Insert site visitor data to the database
function regUser($userFirstName, $userLastName, $userEmail, $password){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO user (userFirstName, userLastName, userEmail, password) VALUES (:userFirstName, :userLastName, :userEmail, :password)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':userFirstName', $userFirstName, PDO::PARAM_STR);
    $stmt->bindValue(':userLastName', $userLastName, PDO::PARAM_STR);
    $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

// Check for an Existing email address
function checkExistingEmail($userEmail) {
  $db = databaseConnect();
  $sql = 'SELECT userEmail FROM user WHERE userEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if(empty($matchEmail)){
    return 0;
  } else {
    return 1;
  }
}

function getUser($userEmail){
  $db = databaseConnect();
  $sql = 'SELECT userId, userFirstname, userLastname, userEmail, userLevel, password FROM user WHERE userEmail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $userData;
}

function getUserInfo($userId){
  $db = databaseConnect();
  $sql = 'SELECT userId, userFirstname, userLastname, userEmail, userLevel FROM user WHERE userId = :userId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->execute();
  $userData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $userData;
}

function updateUser($userFirstname, $userLastname, $userEmail, $userId){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'UPDATE user SET userFirstname = :userFirstname, userLastname = :userLastname, userEmail = :userEmail WHERE userId = :userId';// Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':userFirstname', $userFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':userLastname', $userLastname, PDO::PARAM_STR);
    $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

function updatePassword($password, $userId){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'UPDATE user SET password = :password WHERE userId = :userId';// Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

/*
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
*/
