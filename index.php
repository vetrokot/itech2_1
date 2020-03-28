<?php

  $db_driver="mysql"; $host = "127.0.0.1"; $database = "iteh2lb1var7";
  $dsn = "$db_driver:host=$host; dbname=$database";
  $username = "root"; $password = "";
  $options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
  
  try {
    $dbh = new PDO ($dsn, $username, $password, $options);
    echo "Connected to database<br>";
    //$dbh ->query("SET CHARACTER SET utf8");
  }
  catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>"; die();
  }
    //$dbh->exec("SET CHARACTER SET 'CP1251'");


?>

<p><b>получить доход с проката по состоянию на выбранную дату</b></p>
<form action="form1.php" method="get">
<p><input type="date" name="date1" id="date"></p>
<p><input type="submit" value="выбрать"></p>
</form>

<p><b>свободные автомобили на выбранную дату</b></p>
<form action="form2.php" method="get">
<p><input type="date" name="date2" id="date2"></p>
<p><input type="submit" value="выбрать"></p>
</form>

<p><b>автомобили выбранного производителя</b></p>
<form action="form3.php" method="get">
<select name="vendorname">
<?php
	$res=$dbh->query("SELECT DISTINCT Name FROM vendors");
foreach($res as $row) {
	echo "<option value=$row[0]>$row[0]</option>";
}
?>
</select>
<p><input type="submit" value="выбрать"></p>
</form>

<p><b>добавление информации об аренде для выбранного автомобиля на указанные даты</b></p>
<form action="form4.php" method="get">
<p>дата начала аренды</p>
<p><input type="date" name="startdate"></p>
<p>дата конца аренды</p>
<p><input type="date" name="enddate"></p>
<select name="rentcar">
<?php
	$res=$dbh->query("SELECT DISTINCT ID_Cars FROM cars");
foreach($res as $row) {
	echo "<option value=$row[0]>$row[0]</option>";
}
?>
</select> 
<p><input type="submit" value="арендовать"></p>
</form>

<p><b>изменение информации о пробеге машины</b></p>
<form action="form5.php" method="get">
<p>выберите машину, пробег которой вы хотите изменить</p>
<select name="racecar">
<?php
	$res=$dbh->query("SELECT DISTINCT ID_Cars FROM cars");
foreach($res as $row) {
	echo "<option value=$row[0]>$row[0]</option>";
}
?>
</select> 
<p>введите новый пробег</p>
<p><input type="text" name="race"></p>

<p><input type="submit" value="арендовать"></p>
</form>