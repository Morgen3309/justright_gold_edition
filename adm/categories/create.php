<?php
	require_once '../connectionDB.php';

	$db = new ConnectionDB();
	$values = array ('category_name' => $_POST['category_name']);

	$new_category = $db->insert('category', $values);

	$redirect = $_SERVER['HTTP_REFERER'];
	header("Location: $redirect");
?>