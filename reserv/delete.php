<?php
session_start();
?>

<html>
	<head>
		<title>Удаление записи</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="styles.css">
	</head>
	<hr>
	<br>
	<body >
		<center>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="additem" method="GET"> 
			<input class="txtb" type="text" name="delete_dispenser" placeholder="Номер автомата" required value=""> <br><br>
			<input class="btt" name="submit" type="submit" value="Удалить информацию">  
		</form>
		<?php 		
		if (isset($_GET['delete_dispenser'])){		
			$dd = $_GET['delete_dispenser'];				
			$db_dispenser = "dispenser";
			$db_location = "location";	
			$db=mysqli_connect("localhost","root","root") OR DIE(mysqli_error());
			mysqli_select_db($db, "vending_machine");	
			$result1 = mysqli_query($db, "DELETE FROM dispenser  WHERE dispenserNumber='$dd'");
			$result2 = mysqli_query($db, "DELETE FROM location  WHERE dispenserNumber='$dd'");
			//$result = mysqli_query($db, "DELETE FROM dispenser, location WHERE dispenser.dispenserNumber = location.dispenserNumber AND dispenser.dispenserNumber = '$dd'");
			
			if ($result1 = 'true'){
	         	echo "<div class = 'message'>Информация из БД dispenser удалена!</div>";
			}
			if ($result2 = 'true'){
	         	echo "<div class = 'message'>Информация из БД location удалена!</div>";
			}
			
			//if ($result = 'true'){
	        // 	echo "<div class = 'message'>Информация удалена!</div>";
			//}
		}
		?>
		<br>
		<a class="aa" href="index.php">На главную</a>
	</body>
	</center>

</html>