<?php
	require_once '../connectionDB.php';
	$db = new ConnectionDB();

	$id = $_POST['id'];

	$db->delete('category', $id);

	$redirect = $_SERVER['HTTP_REFERER'];
	header("Location: $redirect");
?>