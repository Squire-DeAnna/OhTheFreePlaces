<?php include 'header.php'; ?>
<body>
    <div class="menu">
        <h2></h2>
        <?php include 'nav.php'; ?>

    <div class="leftSidebar">
        <h2></h2>
        <!-- </*?php include ''; ? */> -->
    </div>

    <div class="body"> 
        <h2>Attraction List</h2>
        <!--<iframe src="." style="border: 0" width="500" height="400" frameborder="0" scrolling="no"></iframe> -->
        <table>
            <tr>
                <th>Name</th>
                <th>Cost</th>
                <th>Hours</th>
                <th>Address</th>
                <th>Website</th>
            </tr>
      
        <?php foreach ($attraction as $attractions) : ?>
        	<tr>
        		<td><?php echo $attractions->getName(); ?>
        		<td><?php echo $attractions->getCost(); ?>
        		<td><?php echo $attractions->getHours(); ?>
        		<td><?php echo $attractions->getStreetAddress(); ?>
        		<td><?php echo $attractions->getWebsite(); ?>
			<?php endforeach; ?>
			</tr>
		</table>
      
    </div>
    <?php include 'footer.php'; ?>