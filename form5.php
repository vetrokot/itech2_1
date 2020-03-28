<?php 

require 'db_connect.php';
$racecar=$_GET['racecar'];
$race=$_GET['race'];

$newrace=$dbh->query("UPDATE cars SET Race='$race' WHERE '$racecar' IN (cars.ID_Cars)");

$res=$dbh->query("SELECT * FROM cars");
	$result=$res->fetchAll();

?>

<table border=1>
<tr>
<td>ID_Cars</td>
<td>Name</td>
<td>Race</td>
</tr>
<?php foreach($result as $row){ ?>
<tr>
<td><?php echo $row['ID_Cars']; ?></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Race']; ?></td>
</tr>
<?php } ?>

</table>
