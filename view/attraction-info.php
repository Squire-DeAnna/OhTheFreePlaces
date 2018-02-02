
    <?php include 'common/header_2.php'; ?>
        <h1 class='content-title'>Attraction Information</h1>
        <p><?php echo $attractions->getName(); ?></p>
        
        <p><b>Address:</b> $<?php echo $attractions->getAddress(); ?></p>
            <p><b>Cost:</b> <?php echo $attractions->getCost(); ?></p>
            <p><b>Website:</b> $<?php echo $attractions->getWebsite(); ?></p>
        
    <?php include 'common/footer.php'; ?>
