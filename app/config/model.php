<?php
class Model{
	private $connection;
	private $tableName;

	public function __construct(){
		$database = [
			"host"		=> "localhost",
			"username"	=> "root",
			"password"	=> "",
			"dbname"	=> "211_web",
		    "port"		=> 3306
            
		];

		$this->connection = new mysqli(
			$database['host'],
			$database['username'],
			$database['password'],
			$database['dbname'],
			$database['port']
		);

		$this->connection->set_charset("utf8");

		if ($this->connection->connect_errno) {
		    die("Failed to connect to MySQL: (" . $this->connection->connect_errno . ") " . $this->connection->connect_error);
		}		
	}

	public function setTable($tableName){
		$this->tableName = $tableName;
	}

	//insert
	/*input = [
		"data"		=> "column1,column2",
		"bind"		=> [
			"sss",
			value1,
			value2,
			value3
		]
	]		
	*/
	public function insert($input){
		$prepares = [];
		$lstColumns = explode(",", $input['data']);
		for ($i=0; $i < count($lstColumns); $i++) { 
			$prepares[] = "?";
		}
		$sql = "INSERT INTO " . $this->tableName . "(" . $input['data'] . ") VALUES (" . implode(",", $prepares) . ")";		
		
		$result="";
		if (isset($input['bind'])) {
			$refValues = [];
			foreach ($input['bind'] as $key => $value) {
				$refValues[] = &$input['bind'][$key];				
			}

			$stmt = $this->connection->prepare($sql);

			call_user_func_array([$stmt, 'bind_param'], $refValues);
		
			$result = $stmt->execute();
		}else{
			$result = $this->connection->query($sql);
		}

		if($result){
			return $this->connection->insert_id;
		}else{
			return false;
		}
	}

	//update
	/*input = [
		"data"		=> "column=?"
		"condition"	=> "",
		"bind"		=> [
			"sss",
			value1,
			value2,
			value3
		]
	]		
	*/
	public function update($input){
		$sql = "UPDATE " . $this->tableName . " SET " . $input['data'] . " WHERE " . $input['condition'];

		$result="";
		if (isset($input['bind'])) {
			$refValues = [];
			foreach ($input['bind'] as $key => $value) {
				$refValues[] = &$input['bind'][$key];				
			}
			
			$stmt = $this->connection->prepare($sql);
			call_user_func_array([$stmt, 'bind_param'], $refValues);
			$result = $stmt->execute();
		}else{
			$result = $this->connection->query($sql);
		}

		return $result;
	}

	//delete
	/*input = [
		"condition"	=> "",
		"bind"		=> [
			"sss",
			value1,
			value2,
			value3
		]
	]		
	*/
	public function delete($input){
		$sql = "DELETE FROM " . $this->tableName . " WHERE " . $input['condition'];
		$result="";
		if (isset($input['bind'])) {
			$refValues = [];
			foreach ($input['bind'] as $key => $value) {
				$refValues[] = &$input['bind'][$key];				
			}
			
			$stmt = $this->connection->prepare($sql);
			call_user_func_array([$stmt, 'bind_param'], $refValues);
			$result = $stmt->execute();
		}else{
			$result = $this->connection->query($sql);
		}

		return $result;
	}

	//selectOne
	/*input = [
		"column"	=> "",
		"condition"	=> "",
		"order"		=> "",
		"group"		=> "",
		"having"	=> "",
		"bind"		=> [
			"sss",
			value1,
			value2,
			value3
		]
	]		
	*/
	public function selectOne($input){
		$sql = "SELECT " . $input['column'] . " FROM " . $this->tableName;
		if (isset($input['condition'])) {
			$sql .= " WHERE " . $input['condition'];
		}
		if (isset($input['order'])) {
			$sql .= " ORDER BY " . $input['order'];
		}
		if (isset($input['group'])) {
			$sql .= " GROUP BY " . $input['group'];
		}
		if (isset($input['having'])) {
			$sql .= " HAVING " . $input['having'];
		}
	
		$result="";
		if (isset($input['bind'])) {
			$refValues = [];
			foreach ($input['bind'] as $key => $value) {
				$refValues[] = &$input['bind'][$key];				
			}
			
			$stmt = $this->connection->prepare($sql);
			call_user_func_array([$stmt, 'bind_param'], $refValues);
			$stmt->execute();
			$result = $stmt->get_result();
		}else{
			$result = $this->connection->query($sql);
		}

		if($result->num_rows > 0){
			return $result->fetch_assoc();
		}else{
			return false;
		}
	}

	//selectMulti
	/*input = [
		"column"	=> "",
		"condition"	=> "",
		"order"		=> "",
		"group"		=> "",
		"having"	=> "",
		"limit"		=> "",
		"bind"		=> [
			"sss",
			value1,
			value2,
			value3
		]
	]		
	*/
	public function selectMulti($input){
		$sql = "SELECT " . $input['column'] . " FROM " . $this->tableName;
		if (isset($input['condition'])) {
			$sql .= " WHERE " . $input['condition'];
		}
		if (isset($input['group'])) {
			$sql .= " GROUP BY " . $input['group'];
		}
		if (isset($input['having'])) {
			$sql .= " HAVING " . $input['having'];
		}
		if (isset($input['order'])) {
			$sql .= " ORDER BY " . $input['order'];
		}
		if (isset($input['limit'])) {
			$sql .= " LIMIT " . $input['limit'];
		}

		$result="";
		if (isset($input['bind'])) {
			$refValues = [];
			foreach ($input['bind'] as $key => $value) {
				$refValues[] = &$input['bind'][$key];				
			}
			
			$stmt = $this->connection->prepare($sql);
			call_user_func_array([$stmt, 'bind_param'], $refValues);
			$stmt->execute();
			$result = $stmt->get_result();
		}else{
			$result = $this->connection->query($sql);
		}

		$lstData = [];
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$lstData[] = $row;
			}
		}
		return $lstData;
	}

	public function query($sql){
		return $this->connection->query($sql);
	}

	/*
		"bind" = [
			"sss",
			value1,
			value2,
			value3
		]
	*/
	// public function queryPrepare($sql, $bind){
	// 	$refValues = [];
	// 	foreach ($bind as $key => $value) {
	// 		$refValues[] = &$bind[$key];				
	// 	}
		
	// 	$stmt = $this->connection->prepare($sql);
	// 	call_user_func_array([$stmt, 'bind_param'], $refValues);
	// 	$stmt->execute();
	// 	$result = $stmt->get_result();
	// 	return $result;
	// }

	public function queryPrepare($sql, $bind){
		$refValues = [];
		foreach ($bind as $key => $value) {
			$refValues[] = &$bind[$key];				
		}
		$stmt = $this->connection->prepare($sql);
		call_user_func_array([$stmt, 'bind_param'], $refValues);
		$stmt->execute();
		$result = $stmt->get_result();
		$lstData = [];
		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$lstData[] = $row;
			}
		}
		return $lstData;
	}
}