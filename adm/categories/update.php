<?php
	require_once '../connectionDB.php';
	$db = new ConnectionDB;

	$id = $_POST['id'];
	$values = array ('category_name' => $_POST['category_name']);

	$updateTable = $db->update('category', $id, $values);

	header('Location: /adm/categories/сategories.php');
?>