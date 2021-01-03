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
	<form method="post">
	<?php 
		include_once '../connectionDB.php';

		$db = new ConnectionDB;

		$categories = $db->makeQuery("SELECT * FROM `category`;");

		
		echo '<table>';

		foreach ($categories as $i => $row) {
			echo '<tr><td><input name="id[]" type="checkbox" value="'.$row['id'].'"><a href="edit.php?id='.$row['id'].'">'.$row['category_name'].'</a></td></tr>';
		}

		echo '</table><br>';
		?>
	
	<button type="submit" formaction="delete.php">Удалить</button>&nbsp;&nbsp;<a href="/adm/categories/new.php">Новая категория</a>
	</form>
</body>
</html>