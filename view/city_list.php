    <?php include 'common/header_2.php'; ?>

        <h1 class='content-title'>List of Cities</h1>
        
        <?php foreach ($cities as $city) : ?>
        <li>
            <a href="../attractions/index.php?action=view_attraction_list_by_city&amp;city_id=<?php echo $city->getID(); ?>">
                    <?php echo $city->getName(); ?>
                </a>  
        </li>
        <?php endforeach; ?>

<?php include 'common/footer.php'; ?>
