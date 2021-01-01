<!DOCTYPE html>
<html>
<head>
	<title>Категории</title>
	<style type="text/css">
		body{
			background-color: black;
			color: white;
		}

		a{
			color: white;
		}

		td{
			border: 1px solid white;
		}
	</style>
</head>
<body>
	<?php 
		include_once '../connectionDB.php';

		$db = new ConnectionDB;

		$categories = $db->makeQuery("SELECT * FROM `category`;");

		
		echo '<table>';

		foreach ($categories as $i => $row) {
			echo '<tr><td><a href="edit.php?id='.$row['id'].'">'.$row['category_name'].'</a></td></tr>';
		}

		echo '</table><br>';
		?>
	<a href="">Удалить</a>&nbsp;&nbsp;<a href="">Новая категория</a>
</body>
</html>