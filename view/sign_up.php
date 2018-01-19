<?php include '../common/header.php'; ?>
    <h1 class="content-title">Sign Up</h1>
    <p>Fill in the form below to sign up for our website:</p>
    <div class="login-form">
        <?php
        if (isset($message)) {
         echo $message;
        }
        ?>
        <form action="../accounts/index.php" method="post">
            <label for="userFirstName">First Name:</label> <br>
            <input name="userFirstName" id="userFirstName" type="text"
            <?php
            if (isset($userFirstName)) {
                echo "value='$userFirstName'";
            }
            ?> required>
            <br>
            <label for="userLastName">Last Name:</label><br>
            <input name="userLastName" id="userLastName" type="text"
            <?php
            if (isset($userLastName)) {
                echo "value='$userLastName'";
            }
            ?> required>
            <br>
            <label for="userEmail">Email Address:</label><br>
            <input name="userEmail" id="userEmail" type="email" required 
            <?php
            if (isset($userEmail)) {
                echo "value='$userEmail'";
            }
            ?>>
            <br>
            <label for="password">Password:</label>
            <br><span>(Password must be at least 8 characters long and contain 1 number, 1 capital letter, and 1 special character)</span>
            <br><input name="password" id="password" type="password" required pattern="(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <br>
            <label for="userConfirm">Confirm Password:</label><br>
            <input name="userConfirm" id="userConfirm" type="password" required pattern="(?=^.{8,}$)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <br>
            <br>
            <input type="submit" name="submit" id="regbtn" value="Register">
            <!--Add the action kew - value pair-->
            <input type="hidden" name="action" value="create_login">
        </form>
    </div>

<?php include '../common/footer.php'; ?>