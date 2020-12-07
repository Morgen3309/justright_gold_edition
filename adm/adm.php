<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADM panel</title>
	<style type="text/css"> 
		td{border: 1px solid black;
		   padding-right: 8px;
		   padding-left: 8px;}
	</style>
</head>
<body>
	<form>
	<table cellspacing= "0"> 
		<tr><td> Select </td><td> id ТОВАРА </td><td>Наименование</td><td> id категории </td><td> Цена </td></tr>
	<!-- Подключение к БД -->
	<?php 
		$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
		
		$conection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options); 

		$db = $conection->query("SELECT * FROM `general`;");
		$good = ($db->fetchAll());

	// Добавление возможности выбора товаров
		foreach ($good as $i => $row) {
			echo '<tr><td><input name="id[]" type="checkbox" value="'.$row['id'].'">';
			foreach ($row as $k => $value) {
				echo '<td>'.$value.'</td>';
			}
			echo "</tr>";
		}
		$conection = null;
	?>
	</table>
	<br>

	<!-- Функциональные кнопки -->
	<input type="submit" name="create" value="Создать" formaction="create.php" formmethod="get" formnovalidate="false"> 

<!-- 	<input type="submit" name="view" value="Просмотр" formaction="../modules/catalog_list/preview.php" formmethod="get"> -->

	<input type="submit" name="change" value="Изменить" formmethod="get" formaction="change.php">

	<input type="submit" name="delete" value="Удалить" formmethod=" get" formaction="delete.php">

	</form>

	</body>
</html>
