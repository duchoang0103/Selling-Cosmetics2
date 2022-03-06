<?php
require_once APP_PATH . '/app/config/model.php';

class ProductModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable("product");
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

    public function getAllProducts($sortSelector){
        if($sortSelector == 0){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion"
            ]);
            return $result;
        }elseif($sortSelector == 1){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion",
                "order"		=> "price",
            ]);
            return $result;
        }elseif($sortSelector == 2){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion",
                "order"		=> "price desc",
            ]);
            return $result;
        }
		
	}

    public function getAllProductsWithCatalog($sortSelector,$catalog){
        if($sortSelector == 0){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion",
                "condition"	=> "catalog=?",
                "bind"		=> [
                    "s",
                    $catalog
                ]
            ]);
            return $result;
        }elseif($sortSelector == 1){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion",
                "condition"	=> "catalog=?",
                "order"		=> "price",
                "bind"		=> [
                    "s",
                    $catalog
                ]
            ]);
            return $result;
        }elseif($sortSelector == 2){
            $result = $this->selectMulti([
                "column"	=> "productid,title,price,quantity,promotion",
                "condition"	=> "catalog=?",
                "order"		=> "price desc",
                "bind"		=> [
                    "s",
                    $catalog
                ]
            ]);
            return $result;
        }
		
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

        $this->setTable("feedback");
        $star = $this->selectOne([
			"column"	=> "avg(star)",
			"condition"	=> "productid = ?",
            "group"     => "productid",
			"bind"		=> [
				"i",
				$product,
			]
		]);
        if($star == false){
            $star = [
                'avg(star)' => 5
            ];
        }
        $result['star']=$star['avg(star)'];

		$this->setTable("product");
		return $result;
	}

    public function getcatalogs(){
		$this->setTable("catalog");
    	$result = $this->selectMulti([
			"column"	=> "catalogname"
			
		]);
		$this->setTable("product");
		return $result;
	}

    // public function getProductsByCatalog($catalog){
	// 	$result = $this->selectMulti([
	// 		"column"	=> "productid,title,price,quantity,promotion",
    //         "condition"	=> "catalog = ?",
    //         "bind"		=> [
	// 			"s",
	// 			$catalog,
    //         ]
	// 	]);
	// 	return $result;
	// }
}