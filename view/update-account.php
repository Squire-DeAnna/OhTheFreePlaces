<?php
    if (isset($_SESSION['loggedin'])){
        
    } else {
        header('Location: ../index.php?action=home');
    }
?>
<?php include '../common/header.php'; ?>

    <h2>Update Account</h2>
    
    <?php
        if (isset($message)) {
         echo $message;
        }
        ?>
        <p>Use this form to update your name or email information.</p>
        <div class="update-form">
        <form action="../accounts/index.php" method="post">
            <label for="userFirstname"><strong>First Name:</strong></label><br>
            <input name="userFirstname" id="userFirstname" type="text" required
            <?php
            if (isset($userFirstname)) {
                echo "value=$userFirstname";
            } elseif (isset($userData['userFirstname'])){
                echo "value=$userData[userFirstname]";
            } else{
              echo "value=''"; 
            }
            ?>>
            <br>
            <label for="userLastname"><strong>Last Name:</strong></label><br>
            <input name="userLastname" id="userLastname" type="text" required
            <?php
            if (isset($userLastname)) {
                echo "value=$userLastname";
            } elseif (isset($userData['userLastname'])){
                echo "value=$userData[userLastname]";
            } else{
              echo "value=''"; 
            }
            ?>>
            <br>
            <label for="userEmail"><strong>Email Address:</strong></label><br>
            <input name="userEmail" id="userEmail" type="email" required
           <?php
            if (isset($userEmail)) {
                echo "value=$userEmail";
            } elseif (isset($userData['userEmail'])){
                echo "value=$userData[userEmail]";
            } else{
              echo "value=''"; 
            }
            ?>>
            <br><br>
            <input type="submit" name="submit" value="Update Account">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="update-user">
            <input type="hidden" name="userId" value="<?php if(isset($_SESSION['userData']['userId'])){ echo $_SESSION['userData']['userId'];} elseif(isset($userId)){ echo $userId; } ?>">
        </form>
    </div>
        
        <h2>Password Change</h2>
        <p>Use this form to change your password.</p>
        <div class="update-form">
        <form action="../accounts/index.php" method="post">
            <label for="password"><strong>New Password:</strong></label>
            <br><span>(Password must be at least 8 characters long and contain 1 number, 1 capital letter, and 1 special character)</span>
            <br><input name="password" id="password" type="password" required pattern="(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <br>
            <label for="userConfirm"><strong>Confirm Password:</strong></label><br>
            <input name="userConfirm" id="userConfirm" type="password" required >
            <br>
            <br>
            <input type="submit" name="submit" id="updatebtn" value="Change Password">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="update-password">
            <input type="hidden" name="userId" value="<?php if(isset($_SESSION['userData']['userId'])){ echo $_SESSION['userData']['userId'];} elseif(isset($userId)){ echo $userId; } ?>">
        </form>
    </div>
        <br>


<?php include '../common/footer.php'; ?>
