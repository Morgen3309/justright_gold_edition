<!DOCTYPE html>
<html>
<head>
	<title>Музыкальные инструменты</title>
	<link rel="stylesheet" type="text/css" href="/modules/catalog_list/instrument.css">
	<meta http-equiv="Cache-Control" content="private">
</head>
<body>

<?php 
	$id = intval($_GET['id']); //category_id, берется из catalog_list

	$size =  $_GET['size'];
	$color =  $_GET['color'];	
	$price_min = intval($_GET['price_min']);
	$price_max = intval($_GET['price_max']);

	$query = "SELECT `general`.id as id, title, price FROM general 
		INNER JOIN goods on `general`.id = `goods`.id
		WHERE category_id = ".$id." ";
	if($size){
		array_map(intval, $size);
		$query = $query.' AND goods.size_id in('.implode(',', $size).')';
	}
	if($color){
		array_map(intval, $color);
		$query = $query.' AND goods.color_id in('.implode(',', $color).')';
	}
	if($price_min){
		if($price_min >= 0)
			$query = $query.' AND price >= '.$price_min ;
	}
	if($price_max){
		if($price_max >= 0)
			$query = $query.' AND price <= '.$price_max ;
	}
	$query = $query." GROUP BY general.id, title";
	$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
	try {	
		$connection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options);
	}
	catch (Exception $e){
		exit('
			<script type="text/javascript">
				alert("Подключение к базе данных не удалось, попробуйте перезагрузить страницу: ' . $e->getMessage().'");
				location.href=location.href;
				</script>');
	}

	$stmt = $connection->query($query);

	$data = $stmt->fetchAll(); //массив из строк
	$connection = null;
?>

<!---------------------------------------- Фильтрация -------------------------------------->



	<form method="get">
	<div id="wrapper_filt">
		<div class="fk">
			<span style="margin: 23%"><b>Размер</b></span><br>
			<button type="button" value="" onclick="menuShow(getElementById('size'))">Любой размер ▼</button>
			<div class="menu" id="size" style="height: 0;">
				<ul style="padding-left: 10px;">
					<?php
					if ($id == 1){
						echo '
							<li><input type="checkbox" name="size[]" value="1">XS</li>
							<li><input type="checkbox" name="size[]" value="2">S</li>
							<li><input type="checkbox" name="size[]" value="3">M</li>
							<li><input type="checkbox" name="size[]" value="4">L</li>
							<li><input type="checkbox" name="size[]" value="5">XL</li>
							<li><input type="checkbox" name="size[]" value="6">2XL</li>
							<li><input type="checkbox" name="size[]" value="7">3XL</li>
							<li><input type="checkbox" name="size[]" value="8">4XL</li>
							<li><input type="checkbox" name="size[]" value="9">5XL</li>
							<li><input type="checkbox" name="size[]" value="10">6XL</li>
							';
					}
					else if ($id == 2)
						echo '
							<li><input type="checkbox" name="size[]" value="11">36</option>
							<li><input type="checkbox" name="size[]" value="12">37</option>
							<li><input type="checkbox" name="size[]" value="13">38</option>
							<li><input type="checkbox" name="size[]" value="14">39</option>
							<li><input type="checkbox" name="size[]" value="15">40</option>
							<li><input type="checkbox" name="size[]" value="16">41</option>
							<li><input type="checkbox" name="size[]" value="17">42</option>
							<li><input type="checkbox" name="size[]" value="18">43</option>
							<li><input type="checkbox" name="size[]" value="19">44</option>
							<li><input type="checkbox" name="size[]" value="20">45</option>
							<li><input type="checkbox" name="size[]" value="21">46</option>
							';
					?>
				</ul>
			</div>
		</div>
		<input type="number" name="id" value="<?php echo $id ?>" readonly style="display: none;">
		<div class="fk">
			<span style="margin-left: 29%"><b>Цвет</b></span><br>
			<button type="button" value="" onclick="menuShow(getElementById('color'))">Любой цвет ▼</button>
				<div class="menu" id="color" style="height: 0;">
					<ul style="padding-left: 30px;">
						<li><input type="checkbox" name="color[]" value="9">Чёрный</li>
						<li><input type="checkbox" name="color[]" value="0">Белый</li>
						<li><input type="checkbox" name="color[]" value="1">Красный</li>
						<li><input type="checkbox" name="color[]" value="2">Оранжевый</li>
						<li><input type="checkbox" name="color[]" value="3">Жёлтый</li>
						<li><input type="checkbox" name="color[]" value="4">Зелёный</li>
						<li><input type="checkbox" name="color[]" value="5">Голубой</li>
						<li><input type="checkbox" name="color[]" value="6">Синий</li>
						<li><input type="checkbox" name="color[]" value="7">Фиолетовый</li>
						<li><input type="checkbox" name="color[]" value="8">Розовый</li>
						<li><input type="checkbox" name="color[]" value="10">Коричневый</li>
					</ul>
				</div>
		</div>

		<div class="fk">
			<span style="margin-left: 29%"><b>Цена</b></span><br>
			<button type="button" value="" onclick="menuShow(getElementById('price'))">Любая цена ▼</button>
			<div class="menu" id="price" style="height: 0;">
				<ul>
					<li>От <input type="number" name="price_min" min="0" max="10000" value="<?php echo $price_min ?>">₽</li>
					<li>До <input type="number" name="price_max" min="0" max="10000" value="<?php echo $price_max ?>">₽</li>
				</ul>
			</div>
		</div>

			<button style="margin-top: 32px;">Применить</button>
		</div>
	</div>
		</form>



<!---------------------------------------- Контент ----------------------------------------->



	<div id="wrapper">
		
		<?php
		for ($i=0; $i < count($data); $i++) { 
			echo '<div class="sell"><img class="photo" src="/src/img/'.$data[$i]['id'].'/preview">
				<span onclick="window.parent.openPreview('.$data[$i]['id'].')">'.$data[$i]['title'].'</span>			
				<div class="priceGood">'.$data[$i]['price'].'₽</div>
				<button type="button" class="cartGood" style="cursor: url(/src/cur/link_menu.cur), pointer;"><img id="addFavlist" src="/src/ico/Список желаний2.png"></button>
			</div>';
		}
		?>
	</div>
	<script type="text/javascript">


		var sizeList = <?php echo json_encode($size) ?>;
		var colorList = <?php echo json_encode($color) ?>;

		if (sizeList) {
			var checkSize = document.querySelectorAll('#size ul li input');
			for (var i = checkSize.length - 1; i >= 0; i--) {
				if (sizeList.indexOf(checkSize[i].value) != -1)
					checkSize[i].checked = true;

			}
				
		}
		if (colorList) {
			var checkColor = document.querySelectorAll('#color ul li input');
			for (var i = checkColor.length - 1; i >= 0; i--) {
				if (colorList.indexOf(checkColor[i].value) != -1)
					checkColor[i].checked = true;

			}
				
		}


		var zh = document.querySelector('.menu');

		function menuShow(menu){
			if (menu.style.height != '0px') {
				menu.style.height = 0;
			}
			else{
				menu.style.height = 'auto';
			}
		}

		pip()

		var height;
		var wrapper = document.querySelector("body");

		function pip(){
			setTimeout("var height = window.getComputedStyle(wrapper, null).height;", 300);
			window.parent.heighIframe();
		}
		window.addEventListener(`resize`, event => {
			pip()
		}, false);		

	</script>
</body>
</html>