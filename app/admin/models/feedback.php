<?php
require_once APP_PATH . '/app/config/model.php';

class FeedbackModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("feedback");
	}
	public function getAllFeedback(){
		$result = $this->selectMulti([
			"column"	=> "feedbackid,orderid ,productid ,star,comment"
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

	public function getDetailFeedback($id){
		$result = $this->selectOne([
			"column"	=> "feedbackid,orderid ,productid ,star,comment",
			"condition"	=> "feedbackid=?",
			"bind"		=> [
				"i",
				$id
			]
		]);
		//Get product name
		$this->setTable("product");
		$product=$result['productid'];
    	$raw_details = $this->selectOne([
			"column"	=> "title",
			"condition"	=> "productid = ?",
			"bind"		=> [
				"i",
				$product,
			]
		]);
		$result['productname']=$raw_details['title'];
		//Get username
		$this->setTable("`order`");
		$order=$result['orderid'];
    	$raw_details = $this->selectOne([
			"column"	=> "username",
			"condition"	=> "orderid = ?",
			"bind"		=> [
				"i",
				$order,
			]
		]);
		$result['username']=$raw_details['username'];
		//Get username
		$this->setTable("feedback");
		return $result;
	}
}