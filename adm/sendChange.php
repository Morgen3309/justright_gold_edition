<?php
	$id = intval($_GET['id']);
	$title = $_GET['title'];
	$price = $_GET['price'];

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
	$sql = "UPDATE `general` SET title = :title, price = :price
			WHERE id = :id";

	$stmt = $connection->prepare($sql);

	$stmt->execute([':title' => $title, ':price' => $price, ':id'=> $id]);

	$connection = null;
	header("location: adm.php");

?>
