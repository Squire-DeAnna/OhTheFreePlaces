<?php
    if ($_SESSION['userData']['userLevel'] >= 5){   
        //create state drop down
        $stateList = createStatesDropDown();
    } else {
        header('Location: ../index.php?action=home');
    }
?>
<?php
//Create Cities drop down
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
?>
<?php include '../common/header.php'; ?>

    <h1 class='content-title'>Add City</h1>
    <p>Add a new city to list an attraction under by filling out the form below.</p>
    <p>The city <strong>must</strong> have an accompanying state and not already exist in the database.</p>
    <?php
        if (isset($message)) {
         echo $message;
        }
    ?>
    <div class="update-form">
    <div class="login-form">
        <div class="form-align">
            <form action="../attractions/index.php" method="post">
            <label for="cityName">New City Name:</label> <br>
            <input name="cityName" id="cityName" type="text"
            <?php
            if (isset($cityName)) {
                echo "value='$cityName'";
            }
            ?> required> <br>
            <label for="stateID">Residing State:</label> <br>
            <?php echo $stateList; ?>
            <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Add City">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="addCity">
        </form>
            </div>
        </div>
        <br><br>
        <div class="update-form">
    <div class="login-form">
        <div class="form-align">
        <form action="../attractions/index.php" method="post">
            <label for="cityID">Select City:</label> <br>
            <?php echo $cityList; ?>
            <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Remove City">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="removeCity">
        </form>
            </div>
        </div>
        <br><br>
        <a href="../attractions/index.php">
            <h3 class="register-button"><p><strong>Return to Attraction Management</strong></p></h3>
        </a>

    
    <br>
    
<?php include '../common/footer.php'; ?>
