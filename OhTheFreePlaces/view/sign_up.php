<?php include 'header.php'; ?>
<body>
    <div class="menu">
        <h2></h2>
        <?php include 'nav.php'; ?>
    </div>
    <div class="leftSidebar">
        <h2></h2>
    </div>

    <div class="body"> 
        <h2>Sign Up</h2>
        Please enter the fields below to sign up for our website. 
        <?php echo $error; ?>
        <form action="." method="post">
            <label for="email_input">Email:</label><br/>
            <input type="email" name="email_input" id="email_input"><br/>
            
            <label for="first_name_input">First Name:</label><br/>
            <input type="text" name="first_name_input" id="first_name_input"><br/>
            <label for="last_name_input">Last Name:</label><br/>
            <input type="text" name="first_name_input" id="first_name_input"><br/>
            <label for="password_input">Password:</label><br/>
            <input type="password" name="password_input" id="password_input"><br/>
            <label for="verify_password">Verify Password:</label><br/>
            <input type="password" name="verify_password" id="verify_password"><br/>
            
            <input type="hidden" name="action" value="create_login">
            <input type="submit" value="Sign Up"></form>


    </div>
    <?php include 'footer.php'; ?>