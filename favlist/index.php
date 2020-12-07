<?php
	if ($_COOKIE['session'])
	{
		if (!validate_session($_COOKIE['session']))
		{
			exit('<script type="text/javascript">
					alert("Ошибка входа.")
					location.href = "/authorization/auth.html";
				</script>');
		}
	}
	else
	{
		exit('<script type="text/javascript">
					location.href = "/authorization/auth.html";
				</script>');
	}

	function validate_session($session)
	{
		if ($session == "papapa")
			return 1;
		else
			return 0;
	}

	$id_list = array_map(intval, $_COOKIE['id_list']);
	if (!$id_list[0]){
		echo 'Список пуст.';
	}
	else{
		$options = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);
		$connection = new PDO('mysql:host=localhost;dbname=justright;charset=utf8', 'root', '',$options);
		$stmt = $connection->query('SELECT id, name FROM good WHERE id IN ('.implode(', ', $id_list).')');
		$favlist = $stmt->fetchAll();
		foreach ($favlist as $key => $row) {
			foreach ($row as $col => $value) {
				echo $value." ";
			}
			echo '<br>';
		}
	}
?>
