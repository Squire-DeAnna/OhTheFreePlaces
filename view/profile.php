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
        <?php
            if (isset($message)) {
              echo $message;
              $_SESSION['message'] = '';
            }
        ?>
    <p><strong>You are currently logged in.</strong></p>
        
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
    
    <?php 
            if ($_SESSION['userData']['userLevel'] >= 5){
                echo "<h2>Administrative Tools:</h2>"
                     . "<p>Use the link below to manage activities, such as adding Cities, adding Attractions, and updating or deleting existing data.</p>"
                     . "<a href='../attractions/' title='Attraction Management'> "
                     . "<p><strong>Manage Attractions</strong></p>"
                     . "</a>";
            }
        ?>
    
    <h2>Manage Your Attraction Reviews</h2>
    <?php
    echo $_SESSION['message2'];
    $_SESSION['message2'] = '';
            if (isset($message2)) {
              echo $message2;
              echo $_SESSION['message2'];
              $_SESSION['message2'] = '';
            }
        ?>
    <?php if(isset($reviewDisplay)){ echo $reviewDisplay; } ?>
    
    <?php include '../common/footer.php'; ?>
