<?php
    if (isset($_SESSION['loggedin'])){
        
    } else {
        header('Location: ../index.php?action=home');
    }
?>   
 <?php include '../common/header.php'; ?>

        <h1 class='content-title'>My List</h1>
        <p><strong>View a list of your favorite attractions.</strong></p>
        <?php
            if (isset($_SESSION['list-message'])) {
             echo $_SESSION['list-message'];
             $_SESSION['list-message'] = '';
            }
        ?>
        <div class="list-container">
            <?php if(isset($listDisplay)){ echo $listDisplay; }
            else { echo "<p>You have not yet added any attractions to your favorites. Add some by searching for an attraction and clicking the <strong>Add to My List</strong> button.</p>";}?>
         </div>   
            
            
        
        
        
    <?php include '../common/footer.php'; ?>