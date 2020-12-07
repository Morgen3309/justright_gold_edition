<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="previewGood.css">
</head>
<body>
<?php 
	$id = intval($_GET['id']);

	$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);

	try {	
		$conection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options);
	}
	catch (Exception $e){
		exit('
			<script type="text/javascript">
				alert("Подключение к базе данных не удалось, попробуйте перезагрузить страницу: ' . $e->getMessage().'");
				location.href=location.href;
				</script>');
	}

	$query = "SELECT `general`.id as id, `general`.title as title, `color`.color as color, color_id, `size`.size as size, price, `goods`.count as count FROM `general` 
		LEFT JOIN goods on `general`.id = `goods`.id
		LEFT JOIN color on `color`.id = color_id
		LEFT JOIN size on `size`.id = size_id
		WHERE `general`.id = ".$id." ORDER BY size_id, `goods`.color_id"; 

	$stmt = $conection->query($query);

	$data = $stmt->fetchAll(); 
?>
	<div id="wrapper">
		<div id="wrap_good">

			<div id="sell">
				<img src="/src/img/<?php echo $id.'/'.$data[0]['color_id']; ?>" id="picture">
			</div>
			<div class="info" id="infoTitle"><span><?php echo $data[0]['title'] ?><span></div>
			<div class="info" id="infoSize"><span>Размер: <?php 
			$pred_size = array();
			foreach ($data as $key => $value) {
				if (array_search($value['size'], $pred_size) === false){ 
					$pred_size = [$value['size']]; 
					echo $value['size'].' ';
				}
			} ?> <span></div>
			<div class="info" id="infoColor"><span>Цвет: <?php 
			$pred_color = array();
			foreach ($data as $value) {
				if (array_search($value['color'], $pred_color) === false){ 
					$pred_color[] = $value['color'];
					echo $value['color'].' ';
				}

			}?><span></div>
			<div class="info" id="infoCount"><span>На складе: <?php 
			if ($data[0]['count']) {
				echo "<font color='green'>в наличии</font>";
			}
			else{
				echo "<font color='red'>нет в наличии</font>";
			}  ?></span>
				
			</div>

			<div id="priceGood"><?php echo $data[0]['price']?> ₽</div>
			<button id="cartGood"><img src="/src/ico/Список желаний2.png" style="object-fit: contain; height: 60px;"></button>
			<button onclick="window.parent.closeCart()" type="button" id="close"><img id="closeImg" src="/src/ico/close.png"></button>
		</div>
	</div>
</body>
</html>