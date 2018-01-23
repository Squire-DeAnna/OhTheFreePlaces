<?php
    if (isset($_SESSION['loggedin'])){
        
    } else {
        header('Location: ../index.php?action=home');
    }
?>
    <?php include '../common/header.php'; ?>
<h1 class="content-title"><?php 
                           echo "Welcome, ";
                           echo $_SESSION['userData']['userFirstname'];
                           echo " ";
                           echo $_SESSION['userData']['userLastname'];
                           ?></h1>
    <p><strong>You are currently logged in.</strong></p>
    <?php
            if (isset($message)) {
             echo $message;
            }
            ?>
        <div class="profile">
            <ul class="profile">
                <li><strong>First Name: </strong><?php 
                               echo $_SESSION['userData']['userFirstname'];
                               ?></li>
                <li><strong>Last Name:  </strong><?php 
                               echo $_SESSION['userData']['userLastname'];
                               ?></li>
                <li><strong>Email:  </strong><?php 
                               echo $_SESSION['userData']['userEmail'];
                               ?></li>
            </ul>
        </div>
    <a href='../accounts/index.php?action=update-account' title='Update Account Info'>
        <p><strong>Update Account Information</strong></p>
    </a>
    
    <?php include '../common/footer.php'; ?>
