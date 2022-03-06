<?php
require_once APP_PATH . '/app/config/model.php';

class HomeModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("user");
	}

	// public function checkLogin($username, $password){
	// 	$result = $this->selectOne([
	// 		"column"	=> "username, phone_number, name, email, accounttype, status",
	// 		"condition"	=> "username = ? AND password = ?",
	// 		"bind"		=> [
	// 			"ss",
	// 			$username,
	// 			$password
	// 			// hash('sha256',$password)
	// 		]
	// 	]);
	// 	return $result;
	// }

    public function getBestSellingProducts(){
        $this->setTable("orderdetail");
        $products = $this->selectMulti([
            "column"	=> "productid,sum(quantity)",
            "order"		=> "sum(quantity) desc",
            "group"		=> "productid" ,           
            "limit"		=> 4,
        ]);
        
        $result = [];
        $this->setTable("product");
        foreach($products as $product){
            array_push($result, $this->selectOne([
                "column"	=> "productid,title,price,quantity,promotion",
                "condition"	=> "productid = ?",
                "bind"		=> [
                    "i",
                    $product['productid'],
                ]
            ]));
        }
        return $result;
    }

    public function getRecentlySeenProducts(){
        if(isset($_COOKIE["seen_recently"])){
            $products = explode(',',$_COOKIE["seen_recently"]);
            $products = array_unique($products);
            array_pop($products);  

            $result = [];
            foreach($products as $product){
                array_push($result, $this->selectOne([
                    "column"	=> "productid,title,price,quantity,promotion",
                    "condition"	=> "productid = ?",
                    "bind"		=> [
                        "i",
                        $product,
                    ]
                ]));
            }
            return $result;
        }
    }
}