<?php
require_once APP_PATH . '/app/config/model.php';

class PostsModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("post");
	}
	public function getAllPost(){
		$result = $this->selectMulti([
			"column"	=> "postid,title,priority ,status,datecreated",
			"condition"	=> "1 order by status, priority,datecreated desc"
		]);
		return $result;
	}

	public function getDetailPost($id){
		$result = $this->selectOne([
			"column"	=> "postid,title,priority ,status,datecreated",
			"condition"	=> "postid=?",
			"bind"		=> [
				"i",
				$id
			]
		]);
		return $result;
	}
    public function insertPost($title, $priority, $status){
		$this->insert([
			"data"		=> "title,priority,status",
			"bind"		=> [
				"sii",
				$title,
                $priority,
                $status

			]
		]);
		return $this->getMaxId();
	}
    public function changePost($id,$title, $priority){
		$result=$this->update([
				"data"		=> "title=?,priority=?",
				"condition"	=> "postid=?",
				"bind"		=> [
					"ssi",
					$title,
					$priority,
					$id
				]
			]);
	return $result;
	}
    public function changePostSts($id,$status){
		$result=$this->update([
				"data"		=> "status=?",
				"condition"	=> "postid=?",
				"bind"		=> [
					"ii",
					$status,
					$id
				]
			]);
	return $result;
	}
	private function getMaxId(){
		$result = $this->selectOne([
			"column"	=> "max(postid)"
		]);
		return $result["max(postid)"];
	}
}