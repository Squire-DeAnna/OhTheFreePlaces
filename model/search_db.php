<?php

//Create the drop down list for Cities
function createCityButtons() {
   $cities = fetchCities();
   
   $cityList = '';
   foreach ($cities as $city) {
       $cityList .= "<a href='../attraction-search?action=attraction-list&id=$city[cityID]&category=0' class='cities'>$city[cityName], $city[StateName]</a>";
   }
   
   return $cityList;
}

//Get City information for attraction list page
function fetchCityByID($cityID) {
   $db = databaseConnect();
    $sql = 'SELECT t1.cityName, t1.cityID, t1.stateID, t1.mapURL, t2.stateName as StateName FROM city t1 left Join state t2 on t2.stateID = t1.stateID WHERE cityID = :cityID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_INT);
    $stmt->execute();
    $attractionInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractionInfo;
}
//create the list for each attraction found under the cityID for the search page
function createList($attractions){
    if(count($attractions) > 0){
            
        $attractionList = '';
            
            foreach ($attractions as $attraction) {
              $attractionList .= '<div class="list-div">';
              $attractionList .=  "<a class='hovertext' href='../attraction-search/?action=attraction-info&id=$attraction[attractionID]' title='$attraction[attractionName]'>";
              $attractionList .=  "<img src='../img/$attraction[imgSRC]' alt='$attraction[attractionName]-thumbnail'>";
              $attractionList .=  "</a><div>";
              if (isset($_SESSION['loggedin'])){
                $attractionList .=  "<a href='../attraction-search/?action=listAdd&id=$attraction[attractionID]&cityID=$attraction[cityID]' class='list-button'>Add to My List</a>";
              } else {
                $attractionList .=  "<a href='../accounts/index.php?action=login' class='list-button'>Add to My List</a>";  
              }
              $attractionList .= '</div></div>';
            }

            } else {
             $attractionList = '<p class="notice">Sorry, no attractions were returned for this location.</p>';
          }
          return $attractionList;
}

//get Attraction by cityID and categoryID
function getAttractionByCategory($cityID, $categoryID) {
    $db = databaseConnect();
    $sql = 'SELECT attractionName, attractionID, imgSRC FROM attraction WHERE cityID = :cityID AND categoryID = :categoryID ORDER BY attractionName ASC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':cityID', $cityID, PDO::PARAM_STR);
    $stmt->bindValue(':categoryID', $categoryID, PDO::PARAM_STR);
    $stmt->execute();
    $attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $attractions;
}

//get My List items
function getAttractionListByUserId($userID){
    $db = databaseConnect();
    $sql = 'SELECT * FROM list WHERE userID IN (SELECT userID FROM list WHERE userID = :userID) ORDER BY listID DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

//Build My List Display
function buildMyListDisplay($myList){
 $rd = '<table id="list-table"><tbody>';
 foreach ($myList as $list) {
  $attractionInfo = getAttractionInfo($list['attractionID']);
  $rd .= '<tr>';
  $rd .= "<td><div class='container'><a href='../attraction-search/?action=attraction-info&id=$attractionInfo[attractionID]' title='$attractionInfo[attractionName]'><img src='../img/$attractionInfo[imgSRC]' alt='$attractionInfo[attractionName]-thumbnail'></a></div></td>";
  $rd .= "<td style='text-align: left; width: 100%;'>$attractionInfo[attractionName] <br> Cost: $attractionInfo[cost] <br> $attractionInfo[hours] </td>";
  $rd .= "<td class='delete-button'><a href='../attraction-search/?action=listDelete&id=$list[listID]'>Delete <br> From <br> List </a></td>";
 }
 $rd .= '</tbody></table>';
 return $rd;
}

//Add to My List
function newListItem($userID, $attractionID){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO list (userID, attractionID) VALUES (:userID, :attractionID)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_STR);
    $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

//check if it already exists on user's list
function checkList($userID, $attractionID) {
     $db = databaseConnect();
    $sql = 'SELECT attractionID FROM list WHERE attractionID = :attractionID AND userID = :userID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_STR);
    $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);
    $stmt->execute();
    $matchAttraction = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchAttraction)){
      return 0;
    } else {
      return 1;
    } 
}
//Delete from My List
function deleteListItem($listID) {
    $db = databaseConnect();
    $sql = 'DELETE FROM list WHERE listID = :listID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':listID', $listID, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
