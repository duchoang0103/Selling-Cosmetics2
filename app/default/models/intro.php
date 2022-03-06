<?php
require_once APP_PATH . '/app/config/model.php';

class IntroModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("user");
	}

	public function checkLogin($username, $password){
		$result = $this->selectOne([
			"column"	=> "username, phone_number, name, email, accounttype, status",
			"condition"	=> "username = ? AND password = ?",
			"bind"		=> [
				"ss",
				$username,
				$password
				// hash('sha256',$password)
			]
		]);
		return $result;
	}
}