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
        <h2>Welcome <?php echo $users->getUserFirstName(); ?> </h2>
        <h3>Profile Page</h3>
       First Name: <?php echo $users->getUserFirstName(); ?>
        <br>Last Name: <?php echo $users->getUserLastName(); ?>
        <br>Email: <?php echo $users->getUserEmail(); ?>
        
        

    </div>
    <?php include 'footer.php'; ?>