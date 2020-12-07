<?php

$id = $_GET['id'];

$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
		
$connection = new PDO('mysql:host=localhost; dbname=justright;charset=utf8', 'root', 'root', $options); 

function removeDir($dir) {
	$includes = glob($dir.'/*');

	foreach ($includes as $include) {
		if (is_dir($include))
			removeDir($include);
		else
			unlink($include);
	}
	rmdir($dir);
}

$sqlQuery = 'DELETE FROM general WHERE id in (:id)';
$query = $connection->prepare($sqlQuery);
$query->execute(array(':id'=> implode(',', $id)));
$connection = null;
foreach ($id as $dir) {
	removeDir("../src/img/".$dir);
}
header("location: adm.php")
?>