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
              $attractionList .=  "<a class='hovertext' href='../attraction-search?action=attraction-info&id=$attraction[attractionID]' title='$attraction[attractionName]'>";
              $attractionList .=  "<img src='../img/$attraction[imgSRC]' alt='attraction-thumbnail'>";
              $attractionList .=  "</a><div>";
              if (isset($_SESSION['loggedin'])){
                $attractionList .=  "<a href='#' class='list-button'>Add to My List</a>";
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