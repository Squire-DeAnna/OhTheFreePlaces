    <?php include 'common/header_2.php'; ?>
<h1 class='content-title'>State List</h1>
 <?php foreach ($state as $states) : ?>
     <li>
        <a href="?action=view_city_list_by_state&amp;state_id=<?php echo $states->getID(); ?>">
                    <?php echo $states->getName(); ?>
                </a>  
        </li>  
            <?php endforeach; ?>
    <?php include 'common/footer.php'; ?>