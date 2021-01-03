<?php
	require_once '../connectionDB.php';

	$db = new ConnectionDB();
	$values = array ('category_name' => $_POST['category_name']);

	$new_category = $db->insert('category', $values);

	header('Location: /adm/categories/сategories.php');
?>