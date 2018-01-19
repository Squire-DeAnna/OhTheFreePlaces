<?php include '../common/header.php'; ?>

        <h1 class='content-title'>Login</h1>
        <p>Please login with your email and the password for this website. If you are new, please click on the "Sign Up" button below.</p>
        <p><?php echo $error; ?></p>     
        <div class="login-form">
            <?php
                    if (isset($message)) {
                     echo $message;
                    }
                ?>

            <form action="/accounts/index.php" method="post">
                
                <label>Email:</label><br/>
                <input type="email" name="email_input"><br/>
                <label>Password:</label><br/>
                <input type="password" name="password_input"><br/><br>

                <input type="submit" value="Login">
                <input type="hidden" name="action" value="user_login" />
            </form>
        </div><br>
        <a href="../accounts/index.php?action=sign_up_form"><button>Sign Up</button></a><br><br>

    
<?php include '../common/footer.php'; ?>