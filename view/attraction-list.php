<?php
//create the drop down lists with new checks to find existing info
   $categories = fetchCategories();
   
   $categoryList = '<select name="categoryID" id="categoryID">';
   $categoryList .= '<option value="0">Show All</option>';
   foreach ($categories as $category) {
       $categoryList .= "<option value='$category[categoryID]'";
    if(isset($categoryID)){
        if($category['categoryID'] === $categoryID){
            $categoryList .= ' selected ';
        }
    } elseif(isset($attractionInfo['categoryID'])){
        if($category['categoryID'] === $attractionInfo['categoryID']){
         $categoryList .= ' selected ';
        }
      }
    $categoryList .= ">$category[categoryName]</option>";
   }
   $categoryList .= '</select>';
?>
<?php include '../common/header.php'; ?>
            <?php  echo "<h1 class='content-title'>Attractions in $cityInfo[cityName], $cityInfo[StateName]</h1>";?>

           <?php
                if (isset($_SESSION['list-message'])) {
                 echo $_SESSION['list-message'];
                 $_SESSION['list-message'] = '';
                }
            ?>

        <div class="login-form">
                <div class="form-align">
                    <form action="../attraction-search/index.php" method="post">
                    <label for="categoryID">Find attractions by category:</label>
                    <?php echo $categoryList; ?>
                    </div>
                    <input type="submit" name="submit" class="form-button" value="Go">
                    <input type="hidden" name="action" value="attraction-category">
                    <input type="hidden" name="cityID" value="<?php echo $cityInfo['cityID']; ?>">
                    </form> <br><br>
            </div>
            
            <div class ="map">
                <?php echo "<iframe src='$cityInfo[mapURL]' width='300' height='580'></iframe>"; ?>
            </div>
            
            <div class="attraction-links">  
                    <?php echo $attractionList ?>
                
            </div>
            
            
            
            
                    
                    
   <?php include '../common/footer.php'; ?>
