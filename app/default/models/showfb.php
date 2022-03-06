<?php
require_once APP_PATH . '/app/config/model.php';

class ShowfbModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("feedback");
	}



	// public function checkorderid(){
	// 	$this->setTable("order");


	// 	// $result = $this->selectOne([
	// 	// 	"column"	=> "username, phone_number, name, email, accounttype, status",
	// 	// 	"condition"	=> "username = ?",
	// 	// 	"bind"		=> [
	// 	// 		"s",
	// 	// 		$username,
			
	// 	// 		// hash('sha256',$password)
	// 	// 	]
	// 	// ]);
	// 	$this->setTable("feedback");
	// 	return $result;
	// }


	// public function getlistFeedback($productid){

	// 	$rel = $this->selectMulti([
	// 		"column"	=> "star,comment"
	// 	]);
		
	// 	return $rel;
	// }

	public function getAllFeedback($productid){
		$result = $this->selectMulti([
			"column"	=> "feedbackid,orderid ,productid ,star,comment",
			"condition"	=> "productid = ?",
				"bind"		=> [
					"i",
					$productid,
				]
		]);
		//Get product name
		$this->setTable("product");
		foreach ($result as $key=>$row) {
			$product=$row['productid'];
	    	$raw_details = $this->selectOne([
				"column"	=> "title",
				"condition"	=> "productid = ?",
				"bind"		=> [
					"i",
					$product,
				]
			]);
			$sum=0;
			$result[$key]['productname']=$raw_details['title'];
		}
		//Get username
		$this->setTable("`order`");
		foreach ($result as $key=>$row) {
			$order=$row['orderid'];
	    	$raw_details = $this->selectOne([
				"column"	=> "username",
				"condition"	=> "orderid = ?",
				"bind"		=> [
					"i",
					$order,
				]
			]);
			$sum=0;
			$result[$key]['username']=$raw_details['username'];
		}
		//Get username
		$this->setTable("feedback");
		return $result;
	}
	
}