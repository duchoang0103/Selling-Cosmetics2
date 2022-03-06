<?php
require_once APP_PATH . '/app/config/model.php';

class CartModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("`order`");
	}


	public function totalPrice($items){
		$total = 0;
		foreach($items as &$item){
			$total = $total + $item['price']*$item['quantity'];
		}
		return $total;
	}
	
	public function insertOrder($username,$address,$shipfee){
		$result = $this->insert([
			"data"		=> "username,address,shipfee",
			"bind"		=> [
				"sss",
				$username,
                $address,
                $shipfee

			]
		]);
		return $result;
	}
	public function insertOrderDetail($orderid,$productid,$price,$quantity){
		$this->setTable("orderdetail");
		$result = $this->insert([
			"data"		=> "orderid,productid,price,quantity",
			"bind"		=> [
				"iiii",
				$orderid,
				$productid,
				$price,
				$quantity
			]
		]);
		$this->setTable("`order`");
		return $result;
	}
}