<?php
require_once APP_PATH . '/app/config/model.php';

class UserModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("`user`");
	}

	public function checkRegisterUserName($username){
		$result = $this->selectOne([
			"column"	=> "username, phone_number, name, email, accounttype, status",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username,
			
			]
		]);
		return $result;
	}
    public function checkRegisterEmail($email){
		$result = $this->selectOne([
			"column"	=> "username, phone_number, name, email, accounttype, status",
			"condition"	=> "email = ?",
			"bind"		=> [
				"s",
				$email,
			
			]
		]);
		return $result;
	}
    public function insertUser($username,$psw,$email,$name,$phone){
		$result =$this->insert([
			"data"		=> "username,name,phone_number,email,password",
			"bind"		=> [
				"sssss",
				$username,
                $name,
                $phone,
                $email,
                hash('sha256',$psw)

			]
		]);
		return $result;
	}
	public function updateUserAccess($username){
		$update=$this->update([
				"data"		=> "lastlogin=CURRENT_TIMESTAMP",
				"condition"	=> "username=?",
				"bind"		=> [
					"s",
					$username
				]
			]);
		$result = $this->selectOne([
			"column"	=> "status",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username
			]
		]);
		return $result['status'];
	}
	public function selectCode($username){
		$result = $this->selectOne([
			"column"	=> "password",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username,
			
			]
		]);
		return $result['password'];
	}
	public function updateUserPass($username,$pass){
		$result=$this->update([
				"data"		=> "password=?",
				"condition"	=> "username=?",
				"bind"		=> [
					"ss",
					hash('sha256',$pass),
					$username
				]
			]);
		return $result;
	}
	public function selectName($username){
		$result = $this->selectOne([
			"column"	=> "name",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username,
			
			]
		]);
		return $result['name'];
	}
}