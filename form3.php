<?php 

require 'db_connect.php';

$vendor=$_GET['vendorname'];

$car2=$dbh->prepare("SELECT cars.Name AS cars_name, cars.Race AS cars_race FROM cars, vendors WHERE vendors.Name=:vendor AND cars.FID_Vendors = vendors.ID_Vendors");
$car2->bindParam(':vendor', $vendor, PDO::PARAM_STR);
    $car2->execute();
	
	$result=$car2->fetchAll();
	

	
?>

<table border=1>
<tr>
<td>Name</td>
<td>Race</td>
</tr>
<?php foreach($result as $row){ ?>
<tr>
<td><?php echo $row['cars_name']; ?></td>
<td><?php echo $row['cars_race']; ?></td>
</tr>
<?php } ?>

</table>
