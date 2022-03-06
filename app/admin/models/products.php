<?php
require_once APP_PATH . '/app/config/model.php';

class ProductsModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("product");
	}
	public function getAllProducts(){
		$result = $this->selectMulti([
			"column"	=> "productid,title,price,quantity,promotion"
		]);
		return $result;
	}
	public function getDetailProduct($product){
		$result = $this->selectOne([
			"column"	=> "productid,title,price,quantity,promotion,catalog,descri",
			"condition"	=> "productid = ?",
			"bind"		=> [
				"i",
				$product,
			]
		]);

		$this->setTable("product_image");
    	$raw_pictures = $this->selectMulti([
			"column"	=> "priority",
			"condition"	=> "productid = ? AND type = 0",
			"bind"		=> [
				"i",
				$product,
			]
		]);
		$pics=[];
		foreach ($raw_pictures as $pic) {
			$pics[]=$product.'p'.$pic["priority"].'.png';
		}
		$result['picture']=$pics;
		$this->setTable("product");
		return $result;
	}

    public function insertProduct($title, $price, $quantity,$promotion, $catalog, $descr){
		$result =$this->insert([
			"data"		=> "title,price,quantity,promotion,catalog,descri",
			"bind"		=> [
				"siiiss",
				$title,
                $price,
                $quantity,
                $promotion,
                $catalog,
                $descr,

			]
		]);
		$id = $this->selectOne([
			"column"	=> "max(productid)"
			
		])["max(productid)"];
		return $id;
	}
	public function getcatalogs(){
		$this->setTable("catalog");
    	$result = $this->selectMulti([
			"column"	=> "catalogname"
			
		]);
		$this->setTable("product");
		return $result;
	}
    public function insertPicture($product, $priority){
		$this->setTable("product_image");
    	$id = $this->selectOne([
			"column"	=> "max(product_image)"
			
		]);
		$id++;
		$result =$this->insert([
			"data"		=> "imgcode,productid,priority,type",
			"bind"		=> [
				"iiii",
				$id,
				$product,
                $priority,
                0

			]
		]);
		$this->setTable("product");
		return $result;
	}
	public function updateProduct($id,$title,$price,$quantity,$promotion,$descri){
		$result=$this->update([
				"data"		=> "title=?,price=?,quantity=?,promotion=?,descri=? ",
				"condition"	=> "productid=?",
				"bind"		=> [
					"siiisi",
					$title,
					$price,
					$quantity,
					$promotion,
					$descri,
					$id
				]
			]);
		return $result;
	}
	public function deleteProduct($id){
		$result = $this->delete([
			"condition"	=> "productid=?",
			"bind"		=> [
				"i",
				$id
			]
		]);
		return $result;
	}
}