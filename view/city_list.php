<?php include 'header.php'; ?>
<body>
    <div class="menu">
     <h2></h2>
        <?php include 'nav.php'; ?>
    </div>
   <div class="leftSidebar">
     <h2></h2>

    </div>
        
    <div class="body"> 
        <h2>List of Cities</h2>
        <?php foreach ($cities as $city) : ?>
        <li>
                <a href="?action=view_attraction_list_by_city&amp;city_id=<?php echo $city->getID(); ?>">
                    <?php echo $city->getName(); ?>
                </a>  
        </li>
        <?php endforeach; ?>
        
    </div>
<?php include 'footer.php'; ?>