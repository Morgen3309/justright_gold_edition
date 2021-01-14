<!DOCTYPE html>
<html>
<head>
	<title>Цвета</title>
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
			include_once 'connectionDB.php';

			$db = new ConnectionDB;
			$colors = $db->getAll('color');

			echo '<table>';
			foreach ($colors as $i => $row) {
				echo '<tr><td><input name="id[]" type="checkbox" value="'.$row['id'].'"><a href="edit.php?id='.$row['id'].'">'.$row['color'].'</a></td></tr>';
			}
			echo '</table><br>';
		?>
		<button type="submit" formaction="delete.php">Удалить</button>&nbsp;&nbsp;<a href="new.php">Добавить цвет</a>
	</form>
</body>
</html>