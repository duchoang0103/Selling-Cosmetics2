<?php
require_once APP_PATH . '/app/config/model.php';

class UserModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("user");
	}

	public function checkLogin($username, $password){
		$result = $this->selectOne([
			"column"	=> "username, phone_number, name, email, accounttype, status",
			"condition"	=> "username = ? AND password = ? AND status = ?",
			"bind"		=> [
				"ssi",
				$username,
                hash('sha256',$password),
                0
			]
		]);
		return $result;
	}
	public function getAllUser(){
		$result = $this->selectMulti([
			"column"	=> "username, status,lastlogin,accounttype",
			"order"	=> "lastlogin desc"
		]);
		// $result=[];
		// while($row=$query->fetch_assoc()){
		// 	$result[]=$row;
		// }
		return $result;
	}
	public function getDetailUser($username){
		$result = $this->selectOne([
			"column"	=> "username, phone_number, name, email, accounttype, status, lastlogin",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username
				// hash('sha256',$password)
			]
		]);
		return $result;
	}
	public function checkRegisterUserName($username){
		$result = $this->selectOne([
			"column"	=> "username",
			"condition"	=> "username = ?",
			"bind"		=> [
				"s",
				$username,
			
				// hash('sha256',$password)
			]
		]);
		return $result;
	}
    public function insertUser($username,$psw,$email,$name,$phone,$type){
		$result =$this->insert([
			"data"		=> "username,name,phone_number,email,password,accounttype",
			"bind"		=> [
				"sssssi",
				$username,
                $name,
                $phone,
                $email,
                hash('sha256',$psw),
                $type,

			]
		]);
		return $result;
	}
	public function updateUserStatus($username, $status){
		$result=$this->update([
				"data"		=> "status=?",
				"condition"	=> "username=?",
				"bind"		=> [
					"is",
					$status,
					$username
				]
			]);
		return $result;
	}
	public function updateUserInfo($username,$name,$phone,$email,$type){
		$result=$this->update([
				"data"		=> "name=?,phone_number=?,email=?,accounttype=?",
				"condition"	=> "username=?",
				"bind"		=> [
					"sssis",
					$name,
					$phone,
					$email,
					$type,
					$username
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
}