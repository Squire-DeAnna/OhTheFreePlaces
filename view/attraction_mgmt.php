<?php
    if ($_SESSION['userData']['userLevel'] >= 5){   
        if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
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

    <h1 class='content-title'>Attraction Management</h1>
    <?php
        if (isset($message)) {
         echo $message;
         $_SESSION['message'] = '';
        }
    ?>
    <p>Welcome to the attraction management page. You may currently add new cities, attractions, and edit or delete existing cities or attractions.</p>
    <p>Please choose an option below:</p>
   
    <a href="../attractions/index.php?action=manage-city" title="Add New City">
        <p><strong>Add / Remove a City</strong></p>
    </a>
        <a href="../attractions/index.php?action=add-attraction" title="Add new Attraction">
            <p><strong>Add a New Attraction</strong></p>
        </a>
    
    <p>Below is a list of existing attractions. You can modify or delete their information by clicking the respective link next to each item.</p>
    <div class="login-form">
        <div class="form-align">
            <form action="../attractions/index.php" method="post">
            <label for="cityID">Select a Specific City to show Attractions for:</label> <br>
            <?php echo $cityList; ?>
            <br>
            </div><br><br>
            <input class="form-button" type="submit" name="submit" value="Find Attractions">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="createTable">
            </form> <br><br>
        </div>
        <?php
        if (isset($attractionList)) {
         echo $attractionList;
        } else 
        {
          echo '<p class="notice">Sorry, no attractions were found.</p>';
        }
        ?>
<?php include '../common/footer.php'; ?>
