<?php include 'header.php'; ?>
<!--<head><meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head> -->
<body>
    <div class="menu">
        <h2></h2>
        <?php include 'nav.php'; ?>
    </div>
    <div class="leftSidebar">
        <h2></h2>
    </div>

    <div class="body"> 
        <h2>Login/Sign Up</h2>
        Please login with your email and the password you created for this website. If you are new, please click on the "Sign Up" button below.
        <p><?php echo $error; ?></p>
        <form action="index.php" method="post" id="login_user">
            <input type="hidden" name="action" value="user_login" />
            <label>Email:</label><br/>
            <input type="email" name="email_input"><br/>
            <label>Password:</label><br/>
            <input type="password" name="password_input"><br/>
        
            <input type="submit" value="Login"> 
        </form>
        
            
            <p><a href="index.php?action=sign_up_form">Sign Up</a></p>

    </div>
    <!--
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script> -->
    <?php include 'footer.php'; ?>