<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.style{ 
			display: flex;
			align-items: center;
		 }
		.cc{
			float: left;
		}
		button:disabled{
			background-color: gray;
			color: white;
		}
		select, textarea{margin-left: 3%;}
	</style>
</head>
<body>
	<?php
		$id = intval($_GET['id'][0]);

		$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
		try {	
			$connection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options);
			}
		catch (Exception $e){
			exit('<script type="text/javascript">
						alert("Подключение к базе данных не удалось, попробуйте перезагрузить страницу: ' . $e->getMessage().'");
						location.href=location.href;
						</script>');
		}

		$stmt = $connection->query("SELECT id, title, price FROM `general` WHERE id = ".$id);

		$data = $stmt->fetchAll()[0];
		$connection = null;
	?>
	<form id="form" method="get" action="sendChange.php" enctype = 'multipart/form-data'>
	

		<input type="number" name="id" readonly value="<?php echo($data['id']) ?>">
		<div class='style'>Наименование<textarea name="title" value="<?php echo($data['title']) ?>" id="name" type="text" placeholder="Например, Футболка 'AC/DC'" required><?php echo($data['title']) ?></textarea></div>

		<br><div class="cc">Цена <input type="number" name="price" required value="<?php echo($data['price']) ?>" min='0' max="10000"></div><br><br>

		<button>Отправить</button><button onclick="location.href='adm.php'">Отмена</button>
	</form>		
</body>
</html>