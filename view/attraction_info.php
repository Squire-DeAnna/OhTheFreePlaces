
<?php include $_SERVER['DOCUMENT_ROOT'].'/common/header.php'; ?>

        <h1 class='content-title'>Attraction Information</h1>
        <p><?php echo $attractions->getName(); ?></p>
        
        <p><b>Address:</b> $<?php echo $attractions->getAddress(); ?></p>
            <p><b>Cost:</b> <?php echo $attractions->getCost(); ?></p>
            <p><b>Website:</b> $<?php echo $attractions->getWebsite(); ?></p>

        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-pinterest"></a>
        
<?php include $_SERVER['DOCUMENT_ROOT'].'/common/footer.php'; ?>
