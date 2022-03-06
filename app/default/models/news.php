<?php
require_once APP_PATH . '/app/config/model.php';

class NewsModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("post");
	}

	public function getAllNews(){
		$result = $this->selectMulti([
			"column" => "postid,title,priority,datecreated",
			"condition" => "status = ?",
			"order" => " priority,datecreated DESC",
			"bind" => [
				"i",
				0
			]
			]);
		return $result;
	}
	public function getNews_1(){
		$result = $this->selectMulti([
			"column" => "postid,title,priority",
			"condition" => "status = ? AND priority = ?",
			"limit" => 1,
			"order" => "datecreated",
			"bind" => [
				"ii",
				1,
				1
			]
			]);
		return $result;
	}
	public function getNews_2(){
		$result = $this->selectMulti([
			"column" => "postid,title,priority",
			"condition" => "status = ? AND priority = ?",
			"limit" => 3,
			"order" => "datecreated",
			"bind" => [
				"ii",
				1,
				2
			]
			]);
			return $result;
	}
	public function getNews_3(){
		$result = $this->selectMulti([
			"column" => "postid,title,priority",
			"condition" => "status = ? AND priority = ?",
			"limit" => 3,
			"order" => "datecreated",
			"bind" => [
				"ii",
				1,
				3
			]
			]);
			return $result;
	}
	public function getNews($id){
		$result = $this->selectOne([
			"column" => "postid,title,priority,datecreated",
			"condition" => "postid = ?",
			"bind" => [
				"i",
				$id
			]
			]);
		return $result;
	}
}