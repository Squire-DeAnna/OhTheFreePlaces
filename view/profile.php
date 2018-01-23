<?php
    if (isset($_SESSION['loggedin'])){
        
    } else {
        header('Location: ../index.php?action=home');
    }
?>
    <?php include 'common/header_2.php'; ?>
<h1 class="content-title"><?php 
                           echo "Welcome, ";
                           echo $_SESSION['userData']['userFirstname'];
                           echo " ";
                           echo $_SESSION['userData']['userLastname'];
                           ?></h1>
<p>You are currently logged in.</p>
        <div class="profile">
            <ul class="profile">
                <li>First Name: <?php 
                               echo $_SESSION['userData']['userFirstname'];
                               ?></li>
                <li>Last Name:  <?php 
                               echo $_SESSION['userData']['userLastname'];
                               ?></li>
                <li>Email:  <?php 
                               echo $_SESSION['userData']['userEmail'];
                               ?></li>
            </ul>
        </div>
    
    <?php include 'common/footer.php'; ?>
