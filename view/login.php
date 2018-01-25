<?php
    if (isset($_SESSION['loggedin'])){
        header('Location: ../index.php?action=home');
    } else {
        
    }
?>
<?php include '../common/header.php'; ?>

        <h1 class='content-title'>Login</h1>
        <p>Please login with your email and the password for this website.</p>
        <p>If you are new, please click on the "Sign Up" button below.</p>
        
        <div class="login-form">
            <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
            <div class="form-align">
            <form action="../accounts/index.php" method="post">
                <label for="userEmail">Email Address:</label> <br>
                <input name="userEmail" id="userEmail" type="email" 
                <?php
                if (isset($userEmail)) {
                    echo "value='$userEmail'";
                }
                ?>required>
                <br>
                <label for="password">Password:</label>
                <br>
                <input name="password" id="password" type="password" required>
             </div>
                <br><br>
                
                <input class="form-button" type="submit" value="Login">
                <input type="hidden" name="action" value="user_login">
            </form>
        </div><br>
        <a href="../accounts/index.php?action=sign_up_form"><button class="sign-up">Sign Up</button></a><br><br>

    
    <?php include '../common/footer.php'; ?>
