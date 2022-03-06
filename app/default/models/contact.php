<?php
require_once APP_PATH . '/app/config/model.php';

class ContactModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("user");
	}

}