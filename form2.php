<?php 

require 'db_connect.php';

$car=$_GET['date2'];
$car2=$dbh->prepare("SELECT * FROM cars WHERE ID_Cars NOT IN (SELECT FID_Car FROM rent WHERE (rent.Date_start<:date2 OR rent.Date_end>:date2))");
$car2->bindParam(':date2', $car, PDO::PARAM_STR);
    $car2->execute();
	$result=$car2->fetchAll();

?>

<table border=1>
<tr>
<td>Name</td>
<td>price</td>
</tr>
<?php foreach($result as $row){ ?>
<tr>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Price']; ?></td>
</tr>
<?php } ?>

</table>
