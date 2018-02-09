 <?php include '../common/header.php'; ?>

        <h1 class='info-title'><?php echo $attractionInfo['attractionName'] ?></h1>
        
        <div class="info-div">
            <div class="attraction-img">
               <img src='../img/<?php echo $attractionInfo['imgSRC'] ?>' alt="<?php echo $attractionInfo['attractionName']?>-img"/> 
            </div>

            <div class="attraction-info">
                <?php if ($attractionInfo['description'] == "") {

                } else {
                    echo '<p><strong>Description: </strong>'
                    .$attractionInfo["description"] 
                    .'</p>';
                }
                ?>
                <p><strong>Address:</strong> <?php echo $attractionInfo['streetAddress'] ?></p>
                <?php if ($attractionInfo['phone'] == "") {

                } else {
                    echo '<p><strong>Phone #: </strong>'
                    .$attractionInfo["phone"] 
                    .'</p>';
                }
                ?>
                <?php if ($attractionInfo['website'] == "") {

                } else {
                    echo '<p><strong>Website: </strong><a target="_blank" href="'
                    .$attractionInfo["website"] 
                    .'">'
                    . $attractionInfo["website"] 
                    .'</a></p>';
                }
                ?>
                <p><strong>Cost:</strong> <?php echo $attractionInfo['cost'] ?></p>
                <p><strong>Hours:</strong> <?php echo $attractionInfo['hours'] ?></p>
            </div>
        </div>
        <?php
            if (isset($_SESSION['loggedin'])){
                echo '<a class="list-button" style = "padding: 5px;" href="#id='
                     .$attractionInfo['attractionID']
                     .'">'
                     .'Add To My List</a>';
            } else {

            }
        ?>
        
        <br><br>
        
        <a class="return-button" href="../attraction-search/index.php?action=attraction-list&id=<?php echo $attractionInfo['cityID']?>">
            Return to City Search Results
        </a><br>
        <!-- REVIEWS SECTION -->
        <br><h2>Visitor Reviews</h2>
        <?php
            if (isset($_SESSION['message'])) {
             echo $_SESSION['message'];
             $_SESSION['message'] = '';
            }
        ?>
        <?php
        if (isset($_SESSION['loggedin'])){
                $userFirstname = $_SESSION['userData']['userFirstname'];
                $userLastname = $_SESSION['userData']['userLastname'];
                $userID = $_SESSION['userData']['userId'];
                $screenName = $userFirstname[0].".".$userLastname[0]."." ;
            echo "<h3>Review the $attractionInfo[attractionName]</h3>"
                 . "<div class='login-form'> <div class='form-align'>"
                 . "<form action='../reviews/index.php' method='post'>"
                 . "<label for='screenName'>Screen Name (Your screen name is set to be your first and last initials):</label> <br>"
                    . "<input name='screenName' id='screenName' type='text' "
                    . "value='$screenName' readonly> <br>"
                    . "<label for='reviewText'>Review:</label> <br>"
                    . "<textarea rows='4' cols='50' name='reviewText' id='reviewText' "
                    . "required></textarea></div><br>"
                    . "<input type='submit' class='form-button' name='submit' id='regbtn' value='Submit Review'>"
                    . "<input type='hidden' name='action' value='addReview'>"
                    . "<input type='hidden' name='userID' value='";
                    if(isset($userID)){ echo $userID;} elseif(isset($userID)){ echo $userID; }
                    echo "'><input type='hidden' name='attractionID' value='";
                    if(isset($prodInfo['attractionID'])){ echo $prodInfo['attractionID'];} elseif(isset($attractionID)){ echo $attractionID; }
                    echo "'><input type='hidden' name='' value='";
                    echo "'></form></div>";

        } else {
            echo "<p>Reviews can be added by <a href='../accounts/index.php?action=login'>logging in</a>.</p>";
        }
    ?>
    <?php if(isset($reviewDisplay)){ echo $reviewDisplay; } ?>
        
<?php include '../common/footer.php'; ?>
