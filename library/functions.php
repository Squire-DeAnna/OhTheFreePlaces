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