<?php
	class ConnectionDB{
		public $connection;

		public function __construct()
		{
			$options = array(
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				);
		
			$this->connection = new PDO('mysql:host=localhost; dbname=lena2;charset=utf8', 'root', 'root', $options);		
		}

		public function makeQuery(string $query)
		{
			$stmt = $this->connection->query($query);
			return $stmt->fetchAll(); // извлечение данных в массив строк таблицы
		}

		public function makeQueryValues(string $query, ...$values)
		{
			$stmt = $this->connection->prepare($query); // подготовливаем запрос к вставке данных
			$stmt->execute($values); // происходит выполнение запроса с вставленными данными
			return $stmt->fetchAll();
		}


		/**
		* изменить данные в таблице
		* 
		* @param string		$table - имя таблицы
		* @param array		$values - ассоциативный массив, содержащий данные вида ['имя столбца' => 'значение']
		*/
		public function update(string $table, int $id, $values) // изменить данные в строке
		{
			$column_list = implode('=?, ', array_keys($values));
			$query = "UPDATE `$table` SET $column_list=? WHERE id=$id";
			$stmt = $this->connection->prepare($query);
			$stmt->execute(array_values($values));
		}

		public function insert(string $table, $values)// добавить новую строку в базу
		{
			$column_list = implode('=?, ', array_keys($values));
			$values_list = implode(", ", array_pad([], count(array_values($values)), '?'));
			$query = "INSERT INTO `$table` ($column_list) VALUE ($values_list);";
			$stmt = $this->connection->prepare($query);
			$stmt->execute(array_values($values));
		} 

		public function delete(string $table, $id) // удалить строку с id = $id
		{
			if (is_array($id)) {
				$id_list = implode(', ', array_map('intval', $id));
			}
			else if ($id instanceof int){
				$id_list = $id;
			}
			else {
				die();
			}
			
			$query = "DELETE FROM `$table` WHERE id IN ($id_list);";
			$stmt = $this->connection->query($query);
		}

		// public function get(string $table, int $id, string $columnList = '*'): array; // получить строку с id = $id
		
		// public function getAll(string $table, string $columnList = '*'): array; // получить все записи

		public function __destruct(){
			$this->connection = null;
		}
	}


?>