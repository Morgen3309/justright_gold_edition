<?php
	$category_id = $_POST['category_id'];
	$title = $_POST['title'];
	$color_id = $_POST['color_id'];
	$img_color_id = $_POST['img_color_id'];
	$size_id = $_POST['size_id'];
	$count = $_POST['count'];
	$price = $_POST['price'];
	$image = $_FILES['image'];
	$preview = $_FILES['preview'];
 
	$options = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);
	
	$connection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options); // соединение с базой данных

	$query = $connection->prepare("INSERT INTO `general` (title, category_id, price) VALUES (:title, :category_id, :price)"); 
	$query->execute([':title' => $title, ':category_id' => $category_id, ':price' => $price]); //вносим значения переменных в таблицу general;

	$id = $connection->lastInsertId(); // получаем последний id;

	$query = $connection->prepare("INSERT INTO `goods` (id, size_id, color_id, count) VALUES (:id, :size_id, :color_id, :count)");

	for ($i=0; $i < count($color_id); $i++) { 
		$query->execute([':size_id' => $size_id[$i], ':color_id' => $color_id[$i], ':count' => $count[$i], ':id' => $id]);//вносим значения переменных в таблицу goods;
	}

	// $blacklist = array('phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi');

	// foreach ($blacklist as $item) 
	// 	if (preg_match("/$item\$/i", $_FILES['image']['name'])) exit;


		

	if (!(is_dir('../src/img/'.$id)))
		mkdir('../src/img/'.$id);
	
	$uploadfile = '../src/img/'.$id."/preview";
	move_uploaded_file($preview['tmp_name'][0], $uploadfile);
	

	for ($i=0; $i < count($image["size"]); $i++) {
		$uploadfile = '../src/img/'.$id."/".$img_color_id[$i];
		move_uploaded_file($image['tmp_name'][$i], $uploadfile);
	}
	// $type = $_FILES['image']['type'];
	// $size = $_FILES['image']['size'];
	// if (($type != 'image/jpg') && ($type != 'image/jpeg')) exit;
	// if ($size > 102400) exit;

	

	$connection = null;
 	header('location: /adm/adm.php');

?>