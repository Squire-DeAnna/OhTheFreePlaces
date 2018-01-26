<?php

function checkEmail($userEmail){
  $valEmail = filter_var($userEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($password){
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $password);
}

function createTable($attractions){
    if(count($attractions) > 0){
            $attractionList = '<table id="attractions-table">';
            $attractionList .= '<thead>';
            $attractionList .= '<tr><th>Attraction Name</th><th>Modify</th><th>Delete</th></tr>';
            $attractionList .= '</thead>';
            $attractionList .= '<tbody>';
            foreach ($attractions as $attraction) {
             $attractionList .= "<tr><td>$attraction[attractionName]</td>";
             $attractionList .= "<td><a href='../attractions?action=update-attraction&id=$attraction[attractionID]' title='Click to modify'>Modify</a></td>";
             $attractionList .= "<td><a href='../attractions?action=delete-attraction&id=$attraction[attractionID]' title='Click to delete'>Delete</a></td></tr>";
            }
             $attractionList .= '</tbody></table>';
            } else {
             $attractionList = '<p class="notice">Sorry, no attractions were returned for this location.</p>';
          }
          return $attractionList;
}

function fetchStates() {
   $db = databaseConnect();
   $sql = 'SELECT stateName, stateID FROM state ORDER BY stateName ASC';
   $stmt = $db->prepare($sql);
   $stmt->execute();   
   $states = $stmt->fetchAll();
   $stmt->closeCursor();
   
   return $states;
}