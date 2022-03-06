<?php
require_once APP_PATH . '/app/config/controller.php';

class Products extends Controller{
	public function index(){
		$info= $this->verify();
		if(!$info){
			header("Location:" . "/login");
		}
		else if($info["type"]!=1)
			header("Location:" . "/");
		//AJAX Get product detail
		if(isset($_GET['detail'])){
			$product=$_GET['id'];
			$this->view->product=$this->model->getDetailProduct($product);
			$this->view->render("products/detail",false);
			return;	
		}
		//AJAX add Product
		if(isset($_POST['add'])){
			$title=$_POST['title'];
			$price=$_POST['price']; 
			$quantity=$_POST['quantity']; 
			$promotion=$_POST['promotion']; 
			$catalog=$_POST['catalog']; 
			$descr=$_POST['descr']; 
			if($title==''||$price==''||$quantity==''||$promotion==''||$catalog==''||$descr==''){
				echo 0;
				return;
			}
			$productid=$this->model->insertProduct($title, $price, $quantity,$promotion, $catalog, $descr);
			$num=0;
			while(isset($_FILES['pic'.$num])){
				$_FILES['pic'.$num];
				if ($_FILES["anh"]["size"] > 20000000)
			      {
			        $num++;
			        continue;
			      }
				$this->model->insertPicture($productid, $num);
			    $target_file="public/images/products/".$productid.'p'.$num.".png";
			    move_uploaded_file($_FILES['pic'.$num]["tmp_name"], $target_file);
			    $num++;
			}
			echo 2;
			return;
		}
		//Change Product AJAX
		if(isset($_POST['change'])){
			$id=$_POST['id'];
			$title=$_POST['title']; 
			$price=$_POST['price']; 
			$quantity=$_POST['quantity'];  
			$promotion=$_POST['promotion'];
			$descri=$_POST['descri'];
			//Return 0 if any field is null
			if($id==''||$title==''||$price==''||$quantity==''||$promotion==''||$descri==''){
				echo 0;
				return;
			}
			//Return 2 success
			else if($this->model->updateProduct($id,$title,$price,$quantity,$promotion,$descri)){
				echo 2;
				return;
			}
			else{
				echo 1;
				return;
			}
		}
		if(isset($_POST['delete'])){
			$id=$_POST['id'];
			if($this->model->deleteProduct($id)) echo 2;
			else echo 1;
			return;
		}
		$this->view->lstCatalogs=$this->model->getcatalogs();
		$this->view->lstProducts=$this->model->getAllProducts();
		$this->view->title="Sản phẩm";
		$this->view->menuNum=2;
		$this->view->render("products/index",false);
	}
}
