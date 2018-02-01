<?php

//Create the drop down list for Cities
function createCityButtons() {
   $cities = fetchCities();
   
   $cityList = '';
   foreach ($cities as $city) {
       $cityList .= "<a href='../attraction-search?action=attraction-list&id=$city[cityID]' class='cities'>$city[cityName], $city[StateName]</a>";
   }
   
   return $cityList;
}
