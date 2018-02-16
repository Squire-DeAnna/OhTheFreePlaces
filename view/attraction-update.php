<?php
    if ($_SESSION['userData']['userLevel'] >= 5){   

    } else {
        header('Location: ../index.php?action=home');
    }
?>
<?php
//create the drop down lists with new checks to find existing info
   $categories = fetchCategories();
   
   $categoryList = '<select name="categoryID" id="categoryID">';
   $categoryList .= '<option>Select a Category</option>';
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
   
   //Cities
   $cities = fetchCities();
   
   $cityList = '<select name="cityID" id="cityID">';
   $cityList .= '<option value=0,0>Select a City</option>';
   foreach ($cities as $city) {
       $cityList .= "<option value='$city[cityID],$city[stateID]'";
    if(isset($cityID)){
        if($city['cityID'] === $cityID ){
            $cityList .= ' selected ';
        }
    } else if(isset($attractionInfo['cityID'])){
        if($city['cityID'] === $attractionInfo['cityID']){
         $cityList .= ' selected ';
        }
      }
    $cityList .= ">$city[cityName], $city[StateName]</option>";
   }
   $cityList .= '</select>';
?>
<?php include '../common/header.php'; ?>

    <h1 class='content-title'>Manage Attraction</h1>
        <p>Change the information in the fields below to change the information for this attraction.</p>
        <p>Fields marked with a star are required.</p>
        <h2><?php if(isset($attractionInfo['attractionName'])){ echo "Modify $attractionInfo[attractionName] ";} elseif(isset($attractionName)) { echo $attractionName; }?></h2>
        
    <?php
        if (isset($message)) {
         echo $message;
        }
    ?>
    <div class="login-form">
        <div class="form-align">
            <form action="../attractions/index.php" method="post">
            <label for="attractionName">*Attraction Name:</label> <br>
            <input name="attractionName" id="attractionName" type="text"
            <?php
            if (isset($attractionName)) {
                echo "value='$attractionName'";
            }
            elseif(isset($attractionInfo['attractionName'])) {echo "value='$attractionInfo[attractionName]'"; }
            ?> required> <br>
            <label for="categoryID">*Category:</label> <br>
            <?php echo $categoryList; ?>
            <br>
            <label for="streetAddress">*Address:</label> <br>
            <input name="streetAddress" id="streetAddress" type="text"
            <?php
            if (isset($streetAddress)) {
                echo "value='$streetAddress'";
            }
            elseif(isset($attractionInfo['streetAddress'])) {echo "value='$attractionInfo[streetAddress]'"; }
            ?> required> <br>
            <label for="cityID">*City:</label> <br>
            <?php echo $cityList; ?>
            <br>
            <label for="cost">*Cost:</label> <br>
            <input name="cost" id="cost" type="text"
            <?php
            if (isset($cost)) {
                echo "value='$cost'";
            }
            elseif(isset($attractionInfo['cost'])) {echo "value='$attractionInfo[cost]'"; }
            ?> required> <br>
            <label for="hours">*Hours:</label> <br>
            <input name="hours" id="hours" type="text"
            <?php
            if (isset($hours)) {
                echo "value='$hours'";
            }
            elseif(isset($attractionInfo['hours'])) {echo "value='$attractionInfo[hours]'"; }
            ?> required> <br>
            <label for="phone">Phone Number:</label> <br>
            <input name="phone" id="phone" type="text"
            <?php
            if (isset($phone)) {
                echo "value='$phone'";
            }
            elseif(isset($attractionInfo['phone'])) {echo "value='$attractionInfo[phone]'"; }
            ?> > <br>
            <label for="website">Website:</label> <br>
            <input name="website" id="website" type="text"
            <?php
            if (isset($website)) {
                echo "value='$website'";
            }
            elseif(isset($attractionInfo['website'])) {echo "value='$attractionInfo[website]'"; }
            ?> > <br>
            <label for="description">Description:</label> <br>
            <textarea rows="4" cols="50" name="description" id="description" type="text"><?php if(isset($description)){echo $description;}elseif(isset($attractionInfo['description'])){echo $attractionInfo['description'];}?></textarea>
            <br>
            <label for="imgSRC">Image Name with file extension (Default will be placeholder.jpg):</label> <br>
            <input name="imgSRC" id="imgSRC" type="text"
            <?php
            if (isset($imgSRC)) {
                echo "value='$imgSRC'";
            }
            elseif(isset($attractionInfo['imgSRC'])) {echo "value='$attractionInfo[imgSRC]'"; }
            ?> > <br>
            <label for="photoCaption">Photo Caption/Copyright Information (Default is &copy; 2018):</label> <br>
            <input name="photoCaption" id="photoCaption" type="text"
            <?php
            if (isset($photoCaption)) {
                echo "value='$photoCaption'";
            }
            elseif(isset($attractionInfo['photoCaption'])) {echo "value='$attractionInfo[photoCaption]'"; }
            ?> > <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Update Attraction">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="updateAttraction">
            <input type="hidden" name="attractionID" value="<?php if(isset($attractionInfo['attractionID'])){ echo $attractionInfo['attractionID'];} elseif(isset($attractionID)){ echo $attractionID; } ?>">
        </form>
        <br><br>
        <a class="return-button" style="background-color: #822432;" href="../attractions/index.php">
            Return to Attraction Management
        </a>
    </div>
    <br>    

        
        
<?php include '../common/footer.php'; ?>