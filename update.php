<?php
session_start();
?>

<html>
	<head>
		<title>Обновление информации</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="styles.css">
	</head>
	<hr>
	<br>
	<body>
		<center>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="updateitem" method="GET"> 
			<input class="txtb" type="text" name="dispenser_number" placeholder="Номер автомата, в который вносятся изменения" required value=""> <br><br>
			<hr>
			<br>
			<input class="txtb" type="text" name="upd_dispenser_type" placeholder="Категория автомата" required value=""> <br><br>
			<input class="txtb" type="text" name="upd_list" placeholder="Тип ассортимерта" required value=""> <br><br>
			<input class="txtb" type="text" name="upd_factory_name" placeholder="Собран на фабрике" required value=""> <br><br>
			<input class="txtb" type="text" name="upd_period" placeholder="Период проверки" required value=""> <br><br>
			<br>
			<hr>
			<br>
			<input class="txtb" type="text" name="upd_street_name" placeholder="Название улицы" required value=""> <br><br>
			<input class="txtb" type="text" name="upd_discr_name" placeholder="Название района" required value=""> <br><br>
			<input class="txtb" type="text" name="upd_name_city" placeholder="Название города" required value=""> <br><br>
			<input class="btt" name="submit" type="submit" required value="Обновить запись">  
		</form>
		</center>

		<?php 		
	
		if (isset($_GET['dispenser_number'])) {

			$udnumber = $_GET['dispenser_number'];

			if (isset($_GET['upd_dispenser_type'])){
				$update_dispenser_type = $_GET['upd_dispenser_type'];
				$db_dispenser = "dispenser";

				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");

				$result = mysqli_query($db, "UPDATE dispenser SET dispenserTypeCode = '$update_dispenser_type' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if (isset($_GET['upd_category_type'])){
				$update_category_type = $_GET['upd_category_type'];
				$db_dispenser = "dispenser";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE dispenser SET ListCode = '$update_category_type' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}
/*
			if (isset($_GET['upd_date_of_check'])){
				$update_date_of_check = $_GET['upd_date_of_check'];
				$db_dispenser = "dispenser";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE dispenser SET dateOfCheck = '$update_date_of_check' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}
*/
			if (isset($_GET['upd_factory_name'])){
				$update_factory_name = $_GET['upd_factory_name'];
				$db_dispenser = "dispenser";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE dispenser SET assembledAtTheFactory = '$update_factory_name' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if (isset($_GET['upd_period'])){
				$update_period = $_GET['upd_period'];
				$db_dispenser = "dispenser";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE dispenser SET checkPeriod = '$update_period' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if (isset($_GET['upd_street_name'])){
				$update_street_name = $_GET['upd_street_name'];
				$db_location = "location";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE location SET streetName = '$update_street_name' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if (isset($_GET['upd_discr_name'])){
				$update_district_name = $_GET['upd_discr_name'];
				$db_location = "location";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE location SET districtName = '$update_district_name' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if (isset($_GET['upd_name_city'])){
				$update_name_city = $_GET['upd_name_city'];
				$db_location = "location";
				$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
				mysqli_select_db($db, "vending_machine");	
				mysqli_query($db, "SET NAMES utf8");
				$result = mysqli_query($db, "UPDATE location SET cityName = '$update_name_city' WHERE dispenserNumber = '$udnumber'")or die(mysqli_error($db));
			}

			if ($result = 'true'){
	         echo "<div style=\"font:bold 12px Arial; color:black;\">Информация обновлена!</div>";
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