    <?php include 'common/header_2.php'; ?>
        <h1 class='content-title'>Attraction List</h1>

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

   <?php include 'common/footer.php'; ?>
