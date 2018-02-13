<?php
    if (isset($_SESSION['loggedin'])){
        
    } else {
        header('Location: ../index.php?action=home');
    }
?>
<?php include '../common/header.php'; ?>

    <h1 class='content-title'>Manage Review</h1>
    <p>You can update the text written in this review, or delete it permanently.</p>
    <p><strong>Be sure you want this review to be deleted before pressing the "Delete" button.</strong></p>
    
    <h2><?php echo $attractionInfo['attractionName'];?></h2> 
    <p><strong>Reviewed on: <?php $phpdate = strtotime($reviewInfo['reviewDate']); $mysqldate = date( 'd M, Y', $phpdate );echo "$mysqldate"?></strong></p>
        
        <?php
        if (isset($message)) {
         echo $message;
        }
    ?>
    
    <div class="login-form">
        <div class="form-align">
        <form action="../reviews/index.php" method="post">
            <label for="reviewText">Review Text</label><br>
            <textarea rows='4' cols='50' name="reviewText" id="reviewText" required>
<?php
            if (isset($reviewText)) {
                echo "$reviewText";
            }
            elseif(isset($reviewInfo['reviewText'])) {echo "$reviewInfo[reviewText]"; }
            ?></textarea>
            <br>
            <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Update Review">
            <!--Add the action key - value pair-->
            <input type="hidden" name="action" value="updateReview">
            <input type="hidden" name="reviewID" value="<?php if(isset($reviewInfo['reviewID'])){ echo $reviewInfo['reviewID'];} elseif(isset($reviewID)){ echo $reviewID; } ?>">
        </form>
            </div>
    
    <div class="login-form">
        <div class="form-align">
        <form action="../reviews/index.php" method="post">
            <br>
            </div><br><br>
            <input class="form-button"  style="background: #822432"type="submit" name="submit" value="Delete Review">
            <!--Add the action key - value pair-->
            <input type="hidden" name="action" value="deleteReview">
            <input type="hidden" name="reviewID" value="<?php if(isset($reviewInfo['reviewID'])){ echo $reviewInfo['reviewID'];} elseif(isset($reviewID)){ echo $reviewID; } ?>">
        </form>
            </div>
        <br>

    
    <br>
    
<?php include '../common/footer.php'; ?>
