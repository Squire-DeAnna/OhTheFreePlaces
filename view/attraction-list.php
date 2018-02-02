    <?php include '../common/header.php'; ?>

            <?php  echo "<h1 class='content-title'>Attractions in $cityInfo[cityName], $cityInfo[StateName]</h1>";?>
            <br>
            
            <div class ="map">
                <?php echo "<iframe src='$cityInfo[mapURL]' width='300' height='580'></iframe>"; ?>
            </div>
            
            <div class="attraction-links">  

                    <?php echo $attractionList ?>
                
            </div>
            
            
            
            
                    
                    
   <?php include '../common/footer.php'; ?>
