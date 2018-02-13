<?php

/* 
 * Reviews Model
 */


//Function to Insert a Review
function newReview($reviewText, $attractionID, $userID){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'INSERT INTO review (reviewText, userID, attractionID) VALUES (:reviewText, :userID, :attractionID)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
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

//Function to get reviews for attractionID
function getReviewsByAttractionId($attractionID){
    $db = databaseConnect();
    $sql = 'SELECT * FROM review WHERE attractionID IN (SELECT attractionID FROM review WHERE attractionID = :attractionID) ORDER BY reviewID DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':attractionID', $attractionID, PDO::PARAM_STR);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
//Function to get reviews by userID
function getReviewsByUserId($userID){
    $db = databaseConnect();
    $sql = 'SELECT * FROM review WHERE userID IN (SELECT userID FROM review WHERE userID = :userID) ORDER BY reviewID DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
//Function to get specific review
function getReview($reviewID){
    $db = databaseConnect();
    $sql = 'SELECT * FROM review WHERE reviewID = :reviewID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewID', $reviewID, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}
//Function to update review
function updateReview($reviewText, $reviewID){
    // Create a connection object using the acme connection function
    $db = databaseConnect();
    // The SQL statement
    $sql = 'UPDATE review SET reviewText = :reviewText WHERE reviewID = :reviewID';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewID', $reviewID, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;

}

//Function to delete review
function deleteReview($reviewID) {
    $db = databaseConnect();
    $sql = 'DELETE FROM review WHERE reviewID = :reviewID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewID', $reviewID, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//Build a display of reviews within an unordered list
function buildReviewsDisplay($reviews){
 $rd = '<ul id="review-display">';
 foreach ($reviews as $review) {
  $phpdate = strtotime($review['reviewDate']);
  $mysqldate = date( 'd M, Y', $phpdate );
  $userInfo = getUserInfo($review['userID']);
  $screenName = $userInfo['userFirstname'][0].".".$userInfo['userLastname'][0].".";
  $rd .= '<li>';
  $rd .= "<strong>$screenName</strong> wrote on $mysqldate:<br>";
  $rd .= "<div class='reviewBox'><span>$review[reviewText]</span></div>";
  $rd .= '</li>';
 }
 $rd .= '</ul>';
 return $rd;
}

function buildAdminReviewsDisplay($reviews){
 $rd = '<ul class="admin-review">';
 foreach ($reviews as $review) {
  $phpdate = strtotime($review['reviewDate']);
  $mysqldate = date( 'd M, Y', $phpdate );
  $attractionInfo = getAttractionInfo($review['attractionID']);
  $rd .= '<li>';
  $rd .= "<strong>$attractionInfo[attractionName]</strong> (Reviewed on $mysqldate): ";
  $rd .= "<a href='../reviews?action=manageReview&id=$review[reviewID]' title='Click to manage'>Manage</a>";
  $rd .= '</li>';
 }
 $rd .= '</ul>';
 return $rd;
}

