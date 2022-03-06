<?php
require_once APP_PATH . '/app/config/model.php';

class OrdersModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("`order`");
	}
	public function getAllOrders(){
		$result = $this->selectMulti([
			"column"	=> "orderid ,username ,status,address,shipfee"
		]);
		//Get price
		$this->setTable("orderdetail");
		foreach ($result as $key=>$row) {
			$order=$row['orderid'];
	    	$raw_details = $this->selectMulti([
				"column"	=> "price, quantity",
				"condition"	=> "orderid = ?",
				"bind"		=> [
					"i",
					$order
				]
			]);
			$sum=0;
			foreach($raw_details as $row){
				$sum+=$row["price"]*$row["quantity"];
			}
			$result[$key]['shipfee']+=$sum;
		}
		$this->setTable("`order`");
		return $result;
	}
	public function updateOrderSts($id,$sts,$reason){
		//Có lý do xóa
		if($reason){
			$result=$this->update([
					"data"		=> "status=?,reason=?",
					"condition"	=> "orderid=?",
					"bind"		=> [
						"isi",
						$sts,
						$reason,
						$id
					]
				]);
		}
		//Update thông thường
		else{
			$result=$this->update([
					"data"		=> "status=?",
					"condition"	=> "orderid=?",
					"bind"		=> [
						"ii",
						$sts,
						$id
					]
				]);
		}
		return $result;
	}
	public function getDetailOrder($id){
		$result = $this->selectOne([
			"column"	=> "orderid ,username ,status,address,shipfee,reason",
			"condition"	=> "orderid=?",
			"bind"		=> [
				"i",
				$id
			]
		]);
		//Get price
		$this->setTable("orderdetail");
		$order=$result['orderid'];
    	$raw_details = $this->selectMulti([
			"column"	=> "productid,price, quantity",
			"condition"	=> "orderid = ?",
			"bind"		=> [
				"i",
				$order,
			]
		]);
		$sum=0;
		$this->setTable("product");
		foreach($raw_details as $key => $row){
	    	$productname = $this->selectOne([
				"column"	=> "title",
				"condition"	=> "productid = ?",
				"bind"		=> [
					"i",
					$row['productid'],
				]
			]);
			$raw_details[$key]['title']=$productname["title"];
			$sum+=$row["price"]*$row["quantity"];
		}
		$result['total']=$sum;
		$result['products']=$raw_details;
		$this->setTable("`order`");
		return $result;
	}
}