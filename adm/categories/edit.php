<?php
	require_once '../connectionDB.php';

	$id = $_GET['id'];

	$db = new ConnectionDB();

	$category = $db->makeQueryValues("SELECT * FROM `category` WHERE `id` = ?;", $id);
	$category = $category[0]; //выбор первого и единственного элемента данного массива
?>
<form action="update.php" method="post">
	<input type="hidden" name="id" value="<?=$id?>">
	Имя категории: <input type="text" name="category_name" value="<?=$category['category_name']?>"><br>
	<button type="submit">Сохранить</button>
</form>
