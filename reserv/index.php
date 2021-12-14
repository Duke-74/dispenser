<?php
session_start();
?>
<html>
<head>
	<title>Добро пожаловать</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="log">
<center><font size="5" color="Black" face="Palatino Linotype">Сервис обслуживания торговых автоматов<br></font></center>

<form align = "left" action ="insert.php" method = "post"> 
<br>
<center><input type="submit" class="aa" name="registration" value="Запись данных"> 
</form></div>
</div>

<br>

<form align = "left" action ="update.php" method = "post"> 
<br>
<center><input type="submit" class="aa" name="registration" value="Обновление данных"> 
</form></div>
</div>

<br>

<form align = "left" action ="delete.php" method = "post"> 
<br>
<center><input type="submit" class="aa" name="registration" value="Удаление данных"> 
</form></div>
</div>

<br>

<form align = "left" action ="see.php" method = "post"> 
<br>
<center><input type="submit" class="aa" name="registration" value="Просмотр данных"> 
</form></div>
</div>

</body>
</html>

