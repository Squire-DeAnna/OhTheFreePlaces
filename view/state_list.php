<?php include 'header.php'; ?>
<body>
    <div class="menu">
        <h2></h2>
        <?php include 'nav.php'; ?>
    </div>
    <div class="leftSidebar">
        <h2></h2>
 <?php foreach ($state as $states) : ?>
     <li>
        <a href="?action=view_city_list_by_state&amp;state_id=<?php echo $states->getID(); ?>">
                    <?php echo $states->getName(); ?>
                </a>  
        </li>  
            <?php endforeach; ?>
    <?php include 'footer.php'; ?>