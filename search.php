<?php
require_once 'db.php';

# Grabbing the key. Be like Trump :D
$search = $_POST['search'];

# Querying the database
if(!empty($search)){
    $sql = "SELECT * FROM `cars` WHERE `name` LIKE '%$search%' ";
    $q = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($q);
    
if ($count > 0) {
	while ($row = mysqli_num_rows($q)){
	    $cars = $row['name'];
	?>
	<ul class="list-unstyled">
	    <li>
	        <?php echo $cars ?>
	    </li>
	</ul>
<?php } }else{ ?>
		<span>There are currently no result matching your search criteria.</span>
	<?php } } ?>
