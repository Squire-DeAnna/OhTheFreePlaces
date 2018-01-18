<?php include 'header.php'; ?>
<body>
    <div class="menu">
        <?php include 'nav.php'; ?>
    </div>
    <div class="leftSidebar">
        <h2></h2>
    </div>

    <div class="body"> 
        <h2>
            <?php echo $attractions->getName(); ?></h2>
        
        <p><b>Address:</b> $<?php echo $attractions->getAddress(); ?></p>
            <p><b>Cost:</b> <?php echo $attractions->getCost(); ?></p>
            <p><b>Website:</b> $<?php echo $attractions->getWebsite(); ?>
        

    </div>
    <?php include '../view/footer.php'; ?>