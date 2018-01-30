<?php
    if ($_SESSION['userData']['userLevel'] >= 5){   
       //$cityList = createCityDropDown();

    } else {
        header('Location: ../index.php?action=home');
    }
?>
<?php
    //create the Drop Down Lists
        $cities = fetchCities();

       $cityList = '<select name="cityID" id="cityID">';
       $cityList .= '<option value=0,0>Select a City</option>';
       foreach ($cities as $city) {
           $cityList .= "<option value='$city[cityID],$city[stateID]'";
        if(isset($cityID)){
            if($city['cityID'] === $cityID ){
                $cityList .= ' selected ';
            }
        }
        $cityList .= ">$city[cityName], $city[StateName]</option>";
       }
       $cityList .= '</select>';
       
       $categories = fetchCategories();
   
        $categoryList = '<select name="categoryID" id="categoryID">';
        $categoryList .= '<option>Select a Category</option>';
        foreach ($categories as $category) {
            $categoryList .= "<option value='$category[categoryID]'";
         if(isset($categoryID)){
             if($category['categoryID'] === $categoryID){
                 $categoryList .= ' selected ';
             }
         }
         $categoryList .= ">$category[categoryName]</option>";
        }
   $categoryList .= '</select>';
?>
<?php include '../common/header.php'; ?>

    <h1 class='content-title'>Add Attraction</h1>
        <p>Add a new attraction by filling out this form.</p>
        <p>Fields marked with a star are required.</p>
        
    <?php
        if (isset($message)) {
         echo $message;
        }
    ?>
    <div class="login-form">
        <div class="form-align">
            <form action="../attractions/index.php" method="post">
            <label for="attractionName">*New Attraction Name:</label> <br>
            <input name="attractionName" id="attractionName" type="text"
            <?php
            if (isset($attractionName)) {
                echo "value='$attractionName'";
            }
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
            ?> required> <br>
            <label for="hours">*Hours:</label> <br>
            <input name="hours" id="hours" type="text"
            <?php
            if (isset($hours)) {
                echo "value='$hours'";
            }
            ?> required> <br>
            <label for="phone">Phone Number:</label> <br>
            <input name="phone" id="phone" type="text"
            <?php
            if (isset($phone)) {
                echo "value='$phone'";
            }
            ?> > <br>
            <label for="website">Website:</label> <br>
            <input name="website" id="website" type="text"
            <?php
            if (isset($website)) {
                echo "value='$website'";
            }
            ?> > <br>
            <label for="description">Description:</label> <br>
            <textarea rows="4" cols="50" name="description" id="description" type="text"><?php if (isset($description)) {echo $description;}?></textarea>
            <br>
            <label for="imgSRC">Image Name with file extension (Default will be placeholder.jpg):</label> <br>
            <input name="imgSRC" id="imgSRC" type="text"
            <?php
            if (isset($imgSRC)) {
                echo "value='$imgSRC'";
            }
            ?> > <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Add Attraction">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="addAttraction">
        </form>
        <br><br>
        <a href="../attractions/index.php">
            <h3 class="register-button"><p><strong>Return to Attraction Management</strong></p></h3>
        </a>
    </div>
    <br>

    <?php include '../common/footer.php'; ?>
    

