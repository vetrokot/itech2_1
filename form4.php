<?php 

require 'db_connect.php';
$rentcar=$_GET['rentcar'];
$startdate=$_GET['startdate'];
$enddate=$_GET['enddate'];

$cost=$dbh->query("SELECT DISTINCT cars.Price FROM cars WHERE '$rentcar' IN (cars.ID_Cars)");
$var=$cost->fetch();
echo $var[0];

$sql=$dbh->query("INSERT INTO rent (FID_Car, Date_start, Date_end, Cost) VALUES ('$rentcar', '$startdate', '$enddate', $var[0])");

$res=$dbh->query("SELECT * FROM rent");
	$result=$res->fetchAll();

?>

<table border=1>
<tr>
<td>FID_Car</td>
<td>Date_start</td>
<td>Date_end</td>
<td>Cost</td>
</tr>
<?php foreach($result as $row){ ?>
<tr>
<td><?php echo $row['FID_Car']; ?></td>
<td><?php echo $row['Date_start']; ?></td>
<td><?php echo $row['Date_end']; ?></td>
<td><?php echo $row['Cost']; ?></td>
</tr>
<?php } ?>

</table>
