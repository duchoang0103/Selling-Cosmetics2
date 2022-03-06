<?php
require_once APP_PATH . '/app/config/model.php';

class HomeModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("orders");
	}

	public function loadListOrders(){
		$result = $this->selectMulti(["column" => "id,user_id,date,status,total,detail"]);
		return $result;
	}
}