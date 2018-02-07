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
            <div class="login-form">
                <div class="form-align">
                    <form action="../attraction-search/index.php" method="post">
                    <label for="categoryID">Find attractions by category:</label>
                    <?php echo $categoryList; ?>
                    </div>
                    <input class="" type="submit" name="submit" value="Go">
                    <!--Add the action kew - value pair-->
                    <input type="hidden" name="action" value="attraction-list">
                    <input type="hidden" name="id" value="<?php echo $cityInfo['cityID']?>">
                    </form> <br><br>
            </div>
            
            <div class ="map">
                <?php echo "<iframe src='$cityInfo[mapURL]' width='300' height='580'></iframe>"; ?>
            </div>
            
            <div class="attraction-links">  
                    <?php echo $attractionList ?>
                
            </div>
            
            
            
            
                    
                    
   <?php include '../common/footer.php'; ?>
