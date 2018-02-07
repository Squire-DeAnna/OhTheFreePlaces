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
        
        <a class="return-button" href="../attraction-search/index.php?action=attraction-list&id=<?php echo $attractionInfo['cityID']?>">
            Return to City Search Results
        </a>
<?php include '../common/footer.php'; ?>
