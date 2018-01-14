<?php
class Database {
	private $connection = NULL;	
	private $servername = 'localhost';
	private $username = 'root';
	private $password = '';
	private $db_name = 'northwind';

	public function __construct(){
		try {
			$this->connection = new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->username, $this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->connection;
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

	// SELECT
	// public function selectData(){
	// 	$stmt = $this->connection->prepare('SELECT first_name,last_name FROM customers');
	// 	$stmt->execute();
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	// 	return $stmt->fetchAll();
	// } 

	// SELECT DISTINCT
	// public function selectDistinct(){
	// 	$stmt = $this->connection->prepare('SELECT COUNT(DISTINCT country_region) AS country_count FROM customers');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	// 	$stmt->execute();
	// 	return $stmt->fetchAll();
	// } 

	// WHERE
	// public function where(){
	// 	$stmt = $this->connection->prepare('SELECT * FROM customers WHERE customers.country_region = "PHILIPPINES"');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	// 	$stmt->execute();
	// 	return $stmt->fetchAll();
	// }

	// AND
	// public function andOperator(){
	// 	$stmt = $this->connection->prepare('SELECT * FROM customers,orders WHERE customers.id = 29 AND customers.id = orders.customer_id');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	// 	$stmt->execute();
	// 	return $stmt->fetchAll();
	// }

	// OR
	// public function orOperator(){
	// 	$stmt = $this->connection->prepare('SELECT * FROM customers WHERE customers.country_region="JAPAN" OR customers.country_region = "PHILIPPINES"');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	// 	$stmt->execute();
	// 	return $stmt->fetchAll();
	// }

	// NOT 
	// public function notOperator(){
	// 	$stmt = $this->connection->prepare('SELECT * FROM customers WHERE customers.country_region NOT IN ("PHILIPPINES","USA")');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	// 	$stmt->execute();
	// 	return $stmt->fetchAll(); 
	// }

	// MIXED OPERATORS
	// public function combineOperator(){
	// 	$stmt = $this->connection->prepare('SELECT *,customers.id AS customer_id FROM customers,orders WHERE customers.id IN (1,3) AND customers.id = orders.customer_id');
	// 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	// 	$stmt->execute();
	// 	return $stmt->fetchAll(); 
	// }

	// ORDER BY
	public function orderBy(){
		$stmt = $this->connection->prepare('SELECT * FROM customers ORDER BY company DESC');
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		return $stmt->fetchAll(); 
	}
}