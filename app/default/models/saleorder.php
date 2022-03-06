<?php
require_once APP_PATH . '/app/config/model.php';

class SaleOrderModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("`order`");
	}

	public function getOrders($username){
		$result = $this->selectMulti([
			"column"	=> "orderid,username,status,reason,address,shipfee",
			"condition" => "username = ?",
			"order" 	=> "orderid DESC",
			"bind" => [
				"s",
				$username
			]
		]);
		$this->setTable("orderdetail");
		foreach ($result as $key=>$row) {
			$order=$row['orderid'];
			
	    	$raw_details = $this->selectMulti([
				"column"	=> "orderid,productid,price, quantity",
				"condition"	=> "orderid = ?",
				"bind"		=> [
					"i",
					$order
				]
			]);
			$this->setTable("product");
			foreach ($raw_details as $key1=>$row) {
				
				$productid = $row['productid'];
				$product_detail = $this->selectOne([
					"column"	=> "title",
					"condition"	=> "productid = ?",
					"bind"		=> [
						"i",
						$productid
					]
				]);
				$raw_details[$key1] += array("name" => $product_detail['title']);
				
			}
			$this->setTable("orderdetail");
			
			$result[$key] += array("items" => $raw_details);
			
		}
		$this->setTable("`order`");
		return $result;
	}
}