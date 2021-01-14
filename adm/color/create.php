<?php
	require_once 'connectionDB.php';

	$db = new ConnectionDB();
	$values = array ('color' => $_POST['color']);

	$new_color = $db->insert('color', $values);

	$redirect = $_SEREVR['HTTP_REFERER'];
	header("Location: $redirect");
?>