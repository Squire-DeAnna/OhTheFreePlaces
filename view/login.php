<?php include 'common/header_2.php'; ?>

        <h1 class='content-title'>Login</h1>
        <p>Please login with your email and the password for this website. If you are new, please click on the "Sign Up" button below.</p>
        
        <div class="form">
        <?php
        if (isset($message)) {
         echo $message;
        }
        ?>
            <form class="form" action="../accounts/index.php" method="post">
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
                <br><br>
                <input type="submit" value="Login">
                <input type="hidden" name="action" value="user_login">
            </form>
        </div><br>
        <a href="../accounts/index.php?action=sign_up_form"><button>Sign Up</button></a><br><br>

    
    <?php include 'common/footer.php'; ?>
