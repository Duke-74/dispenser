<?php
session_start();
?>

<html>
	<head>
		<title>Добавление информации</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="styles.css">
	</head>
	<hr>
	<br>
	<body>
		<center>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="additem" method="GET">
			<input class="txtb" type="text" name="add_dispenser_number" placeholder="Номер автомата" required value=""> <br><br>
			<input class="txtb" type="text" name="add_dispenser_name" placeholder="Именование автомата" required value=""> <br><br>
			<input class="txtb" type="text" name="add_dispenser_type" placeholder="Тип автомата" required value=""> <br><br>
			<input class="txtb" type="text" name="add_category_type" placeholder="Тип ассортимерта" required value=""> <br><br>
			<input class="txtb" type="text" name="add_date_of_check" placeholder="Дата проверки" required value=""> <br><br>
			<input class="txtb" type="text" name="add_factory_name" placeholder="Собран на фабрике" required value=""> <br><br>
			<input class="txtb" type="text" name="add_period" placeholder="Период проверки" required value=""> <br><br>
			<hr>
			<br>
			<input class="txtb" type="text" name="add_street_name" placeholder="Название улицы" required value=""> <br><br>
			<input class="txtb" type="text" name="add_discr_name" placeholder="Название района" required value=""> <br><br>
			<input class="txtb" type="text" name="add_name_city" placeholder="Название города" required value=""> <br><br>
			<input class="btt" name="submit" type="submit" value="Добавить запись">  
		</form>
		</center>

		<?php 		
	
		if (isset($_GET['add_dispenser_number']) && isset($_GET['add_dispenser_name']) && isset($_GET['add_dispenser_type']) && isset($_GET['add_category_type']) && isset($_GET['add_date_of_check']) && isset($_GET['add_period']) && isset($_GET['add_factory_name'])  && isset($_GET['add_street_name']) && isset($_GET['add_discr_name']) && isset($_GET['add_name_city'])) {
			
			$dispenser_number = $_GET['add_dispenser_number'];
			$dispenser_name = $_GET['add_dispenser_name'];
			$dispenser_type_code = $_GET['add_dispenser_type'];	
			$list_code = $_GET['add_category_type'];
			$date_of_check = $_GET['add_date_of_check'];
			$assembled_at_factory = $_GET['add_factory_name'];	
			$period = $_GET['add_period'];
			$street_name = $_GET['add_street_name'];
			$district_name = $_GET['add_discr_name'];	
			$name_city = $_GET['add_name_city'];
			$db_dispenser = "dispenser";
			$db_location = "location";	

			$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
			mysqli_select_db($db, "vending_machine");	
			mysqli_query($db, "SET NAMES utf8");

			//$result = mysqli_query($db, "INSERT INTO $db_table (name, category, rating) VALUES ('$c','$n', '$r')")or die(mysqli_error($db));

			$result1 = mysqli_query($db, "INSERT INTO $db_dispenser (dispenserNumber, dispenserName, dispenserTypeCode, ListCode, dateOfCheck, ifEmpty, assembledAtTheFactory, checkPeriod) VALUES ('$dispenser_number', '$dispenser_name', '$dispenser_type_code', '$list_code', '$date_of_check', '0', '$assembled_at_factory', '$period')")or die(mysqli_error($db));

			//$id_dispenser = mysqli_query($db, "SELECT dispenserNumber FROM dispenser")or die(mysqli_error($db));

			$result2 = mysqli_query($db, "INSERT INTO $db_location (dispenserNumber, streetName, districtName, cityName) VALUES ('$dispenser_number', '$street_name', '$district_name', '$name_city')")or die(mysqli_error($db));
			
			if ($result1 = 'true' && $result2 = 'true'){
	         echo "<div style=\"font:bold 12px Arial; color:black;\">Запись добавлена!</div>";
			}	
		}

		?>
		<br>
		<center><a class="aa" href="index.php">На главную</a> </center>
	
<center>

<?php 		 	
		$db=mysqli_connect("localhost","root","root") OR DIE(mysql_error());
		mysqli_select_db($db, "vending_machine");
		mysqli_query($db, "SET NAMES utf8");
		$result1 = mysqli_query($db, "SELECT dispenserTypeCode, dispenserTypeName FROM dispensertype")or die(mysqli_error($db));	
		$a=mysqli_fetch_array($result1);

		echo "<table class=table>";
		echo "<tr><th><b>Код типа автомата</b></th><th><b>Название типа автомата</b></th><tr>";
		do
		{
			$pole0=$a[0];
			$pole1=$a[1];
			echo "<tr><td>$pole0</td><td>$pole1</td><tr>";
		} while ($a=mysqli_fetch_array($result1));
		echo "</table>";
		?>

		<br>

<?php 		 	
		$db=mysqli_connect("localhost","root","root") OR DIE(mysql_error());
		mysqli_select_db($db, "vending_machine");
		mysqli_query($db, "SET NAMES utf8");
		$result1 = mysqli_query($db, "SELECT listCode, listName FROM list")or die(mysqli_error($db));	
		$a=mysqli_fetch_array($result1);

		echo "<table class=table>";
		echo "<tr><th><b>Код листа</b></th><th><b>Название листа</b></th><tr>";
		do
		{
			$pole0=$a[0];
			$pole1=$a[1];
			echo "<tr><td>$pole0</td><td>$pole1</td><tr>";
		} while ($a=mysqli_fetch_array($result1));
		echo "</table>";
		?>
		<br>

<?php 		 	
		$db=mysqli_connect("localhost","root","root") OR DIE(mysql_error());
		mysqli_select_db($db, "vending_machine");
		mysqli_query($db, "SET NAMES utf8");
		$result1 = mysqli_query($db, "SELECT factoryCode, factoryName FROM factory")or die(mysqli_error($db));	
		$a=mysqli_fetch_array($result1);

		echo "<table class=table>";
		echo "<tr><th><b>Код фабрики</b></th><th><b>Название фабрики</b></th><tr>";
		do
		{
			$pole0=$a[0];
			$pole1=$a[1];
			echo "<tr><td>$pole0</td><td>$pole1</td><tr>";
		} while ($a=mysqli_fetch_array($result1));
		echo "</table>";
		?>
		<br>

</center>

	</body>


</html>