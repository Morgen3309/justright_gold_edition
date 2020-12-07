<!DOCTYPE html>
<html>
<head>
	<title>Добавление товара - ADM панель</title>
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
		.clothes, .shoes{display: none;}
		/*#parent, #parentFile{width: 520px; height: auto;}*/
		select, textarea{margin-left: 3%;}
		#color, #name{margin-left: 1%}
		#category, #availale{margin-left: 0;}
	</style>
</head>
<body>
	<form id="form" method="post" action="sendCreate.php" enctype = 'multipart/form-data'>
		
		Категория  <select id="category" name="category_id" onchange="checkCategory()" size="0" required>
				<option value="">...</option>
				<option value="1">Одежда</option>
				<option value="2">Обувь</option>
				<option value="3">Аксессуары</option>
				<option value="4">Головные уборы</option>
				<option value="5">Музыкальные инструменты</option>
		   </select><br><br>


		<div class='style'>Наименование<textarea name="title" id="name" type="text" placeholder="Например, Футболка 'AC/DC'" required></textarea></div><br>

		<b>В базу данных</b>

	<div id="parent">
		<div id="child">
			<div id="selectCategory" style="border: 1px solid black;">
				<div class='cc' id="color">Цвет<select id="color" name="color_id[]" size="1"  required>
					<option value="9">Черный</option>
					<option value="0">Белый</option>
					<option value="1">Красный</option>
					<option value="2">Оранжевый</option>
					<option value="3">Жёлтый</option>
					<option value="4">Зеленый</option>
					<option value="5">Голубой</option>
					<option value="6">Синий</option>
					<option value="7">Фиолетовый</option>
					<option value="8">Розовый</option>
					<option value="10">Коричневый</option>
				</select></div>


				<div class='cc'>Размер<select margin-bottom="3%" name="size_id[]" id="size" size="1" required >
					
					<option value="">...</option>

					<option value="1" class="clothes">XS</option>
					<option value="2" class="clothes">S</option>
					<option value="3" class="clothes">M</option>
					<option value="4" class="clothes">L</option>
					<option value="5" class="clothes">XL</option>
					<option value="6" class="clothes">2XL</option>
					<option value="7" class="clothes">3XL</option>
					<option value="8" class="clothes">4XL</option>
					<option value="9" class="clothes">5XL</option>
					<option value="10" class="clothes">6XL</option>

					<option value="11" class="shoes">36</option>
					<option value="12" class="shoes">37</option>
					<option value="13" class="shoes">38</option>
					<option value="14" class="shoes">39</option>
					<option value="15" class="shoes">40</option>
					<option value="16" class="shoes">41</option>
					<option value="17" class="shoes">42</option>
					<option value="18" class="shoes">43</option>
					<option value="19" class="shoes">44</option>
					<option value="20" class="shoes">45</option>
					<option value="21" class="shoes">46</option>
				</select></div>

				<div class='cc'>Количество<br><input type="number" name="count[]"></div>

				<button id="drop" disabled type="button" onclick="dropElem()" style="margin: 19px"> - </button>
				<button id="add" type='button' onclick="copyElem()"> + </button>
			</div><br>

			</div>
		</div>
	</div>

			<b>Выборка по цвету на сайт</b>
			<div id="parentFile">
				<div id="childFile">
			<div id="uploadFile" style="border: 1px solid black;  height: 60px;">
				<div class='cc' id="color">Цвет<select id="color" name="img_color_id[]" size="1"  required>
					<option value="9">Черный</option>
					<option value="0">Белый</option>
					<option value="1">Красный</option>
					<option value="2">Оранжевый</option>
					<option value="3">Жёлтый</option>
					<option value="4">Зеленый</option>
					<option value="5">Голубой</option>
					<option value="6">Синий</option>
					<option value="7">Фиолетовый</option>
					<option value="8">Розовый</option>
				</select></div>
				<div class='cc'>Изображение<br><input type="file" name="image[]"></div>	
					
				<button id="dropFile" disabled type="button" onclick="droppFile()" style="margin: 19px; opacity: 100%;"> - </button>
				<button id="addFile" type='button' onclick="copyFile()"> + </button>			
			</div></div></div>
			<div class='cc'>Просмотр в каталоге<br><input type="file" name="preview[]"></div><br><br>
		<br><div class="cc">Цена <input type="number" name="price" required min='0' max="10000"></div><br><br>

		<button>Отправить</button>
	</form>
	<script type="text/javascript">
		function copyElem(){
			var lenNode = document.getElementById('parent').childNodes.length - 2;
			var idDrop = document.getElementById('drop');
				idDrop.removeAttribute('disabled');

			var parentCopy = document.getElementById('parent');
			var elemCopy = parentCopy.querySelector('#child');

			var clone = elemCopy.cloneNode(true);
			parentCopy.appendChild(clone);			
		}

		function dropElem(){
			var elemDrop = document.querySelector('#child');
			elemDrop.remove();

			var lenNode = document.getElementById('parent').childNodes.length - 2;
			var idDrop = document.getElementById('drop');

			if (lenNode == 1){
				idDrop.disabled = 'true';
			}
			
		}

		function copyFile(){
			var lenNode = document.getElementById('parentFile').childNodes.length - 1;
			var idDrop = document.getElementById('dropFile');
				idDrop.removeAttribute('disabled');

			var parentCopy = document.getElementById('parentFile');
			var elemCopy = parentCopy.querySelector('#childFile');

			var clone = elemCopy.cloneNode(true);
			parentCopy.appendChild(clone);			
		}

		function droppFile(){
			var elemDrop = document.querySelector('#childFile');
			elemDrop.remove();

			var lenNode = document.getElementById('parentFile').childNodes.length - 1;
			var idDrop = document.getElementById('dropFile');

			if (lenNode == 1){
				idDrop.disabled = 'true';
			}
		}

		function checkCategory(){
			var clothes = Array.from(document.getElementsByClassName('clothes'));
			var shoes = Array.from(document.getElementsByClassName('shoes'));
			for (var i = category.childNodes.length - 1; i >= 0; i--) {
				var child = category.childNodes[i];
				if (child.selected){
					if (child.value == 1){
						clothes.forEach(element => element.style.display = 'block');
						shoes.forEach(element => element.style.display = 'none');
					}
					else if (child.value == 2){
						shoes.forEach(element => element.style.display = 'block');
						clothes.forEach(element => element.style.display = 'none');
					}

					else{
						clothes.forEach(element => element.style.display = 'none');
						shoes.forEach(element => element.style.display = 'none');
					}
				}
			}
		}

	</script>
</body>
</html>