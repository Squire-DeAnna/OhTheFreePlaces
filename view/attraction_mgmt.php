<?php
    if ($_SESSION['userData']['userLevel'] >= 5){   
        if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
       }
    } else {
        header('Location: ../index.php?action=home');
    }
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
   
    <a href="../attractions/index.php?action=add-city" title="Add New City">
        <p><strong>Add a New City</strong></p>
    </a>
        <a href="../attractions/index.php?action=add-attraction" title="Add new Attraction">
            <p><strong>Add a New Attraction</strong></p>
        </a>
    <a href="../attractions/index.php?action=remove-city" title="Delete City">
        <p><strong>Delete Existing City</strong></p>
    </a>
    
    <p>Below is a list of existing attractions. You can modify or delete their information by clicking the respective link next to each item.</p>
    <!--<div class="login-form">
        <div class="form-align">
        <form action="#" method="post">
            <label for="cityID">Select a City:</label><br>
            <?php echo $cityList; ?>
            <br>
            </div><br>
            <input class="form-button" type="submit" name="submit" value="Go">
        </form>
    </div> -->
        <?php
        if (isset($attractionList)) {
         echo $attractionList;
        } else 
        {
          echo '<p class="notice">Sorry, no attractions were found.</p>';
        }
        ?>
<?php include '../common/footer.php'; ?>
