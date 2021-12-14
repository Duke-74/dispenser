<?php
session_start();
?>

<html>
	<head>
		<title>Автоматы</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="styles.css">
	</head>
	<hr>
	<br>
	<body >
		<center>

		<?php 		 	
		$db=mysqli_connect("localhost","root","root") OR DIE(mysql_error());
		mysqli_select_db($db, "vending_machine");
		mysqli_query($db, "SET NAMES utf8");
		$result1 = mysqli_query($db, "SELECT * FROM dispenser")or die(mysqli_error($db));	
		$a=mysqli_fetch_array($result1);

		//$result2 = mysqli_query($db, "SELECT * FROM location")or die(mysqli_error($db));	
		//$b=mysqli_fetch_array($result2);

		//$result3 = mysqli_query($db, "SELECT * FROM factory")or die(mysqli_error($db));	
		//$c=mysqli_fetch_array($result3);

		//$result4 = mysqli_query($db, "SELECT * FROM location")or die(mysqli_error($db));	
		//$d=mysqli_fetch_array($result2);

		echo "<table class=table>";
		echo "<tr><th><b>Номер автомата</b></th><th><b>Название автомата</b></th><th><b>Шаблон консткукции автомата</b></th><th><b>Тип продукции</b></th><th><b>Состояние автомата</b></th><th><b>Дата проверки автомата</b></th><th><b>Собран на фабрике</b></th><th><b>Период между проверками</b></th><th><b>Улица</b></th><th><b>Район</b></th><th><b>Город</b></th><th><b>Владелец</b></th><tr>";
		do
		{
			$pole0=$a[0];
			switch ($a[1]) {
				case '1':
					$pole1="Напитки";
					break;
				case '2':
					$pole1="Горячие напитки";
					break;
				case '3':
					$pole1="Еда";
					break;
				case '4':
					$pole1="Билеты";
					break;
				case '5':
					$pole1="Справочная информация";
					break;
				case '6':
					$pole1="Талоны";
					break;
				case '7':
					$pole1="Игрушки";
					break;
				case '8':
					$pole1="Жвачка";
					break;
				case '9':
					$pole1="Бахилы";
					break;
				default:
					$pole1="Не удалось определить тип";
					break;
			}
			//$pole1=$a[1];
			//$pole2=$a[2];
			switch ($a[2]) {
				case '1':
					$pole2="Завтраки";
					break;
				case '2':
					$pole2="Газировка";
					break;
				case '3':
					$pole2="Газировка Coca-Cola";
					break;
				case '4':
					$pole2="Билеты на комедии";
					break;
				case '5':
					$pole2="Туристические флаеры";
					break;
				case '6':
					$pole2="Кофе";
					break;
				case '7':
					$pole2="Маршрут до точки";
					break;
				case '8':
					$pole2="Переводы на языки";
					break;
				case '9':
					$pole2="Информация об экспонате";
					break;
				case '10':
					$pole2="Кондитерские изделия";
					break;
				case '11':
					$pole2="Чай";
					break;
				default:
					$pole2="Не удалось определить тип";
					break;
			}
			$pole3=$a[3];
			$pole4=$a[4];
			if($a[5] == "0")
				$pole5="Не пустой";
			else
				$pole5="Пустой";
			$pole6=$a[6];
			$pole7=$a[7];
			/*
			if($a[0]==$b[1]){
				$pole8=$b[2];
				$pole9=$b[3];
				$pole10=$b[4];
			}
			else{
				$pole8="";
				$pole9="";
				$pole10="";
			}
			*/

			$result2 = mysqli_query($db, "SELECT * FROM location WHERE dispenserNumber=$a[0]")or die(mysqli_error($db));	
			$b=mysqli_fetch_array($result2);
			
			$pole8=$b[2];
			$pole9=$b[3];
			$pole10=$b[4];

			$result3 = mysqli_query($db, "SELECT companyID FROM factory WHERE factoryName='$a[6]'")or die(mysqli_error($db));	
			if($result3!='false'){
				
				$company_id=mysqli_fetch_array($result3);
				
				$result4 = mysqli_query($db, "SELECT companyName FROM company WHERE companyID=$company_id[0]")or die(mysqli_error($db));	
				$companu_name=mysqli_fetch_array($result4);

				$pole11=$companu_name[0];

			}

			echo "<tr><td>$pole0</td><td>$pole3</td><td>$pole1</td><td>$pole2</td><td>$pole5</td><td>$pole4</td><td>$pole6</td><td>$pole7</td><td>$pole8</td><td>$pole9</td><td>$pole10</td><td>$pole11</td><tr>";
		} while ($a=mysqli_fetch_array($result1));
		echo "</table>";
		
		?>
		<br>
		<br>
		<a class="aa" href="index.php">На главную</a>
	</body>
	</center>

</html>