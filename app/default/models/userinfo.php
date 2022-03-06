<?php
require_once APP_PATH . '/app/config/model.php';

class UserinfoModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("user");
	}	
	public function updateUser($username,$name,$email){

		$result=$this->update([
				"data"		=> "name=?,email=?",
				"condition"	=> "username=?",
				"bind"		=> [
					"sss",
					$name,
					$email,
					$username
					
				]
			]);
		return $result;
	}
}