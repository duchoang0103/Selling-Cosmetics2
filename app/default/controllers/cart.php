<?php
require_once APP_PATH . '/app/config/controller.php';

class Cart extends Controller{
	public function index(){
		$info= $this->verify();
		if(isset($_POST['addProduct'])){
			$data = json_decode($_POST['product']);
			$newProduct = [
				"productid" => $data->product_id,
				"title" => $data->product_title,
				"quantity" => $data->quantity,
				"price" => $data->price
			];
			if(isset($_SESSION['cart'])){			
				if(count($_SESSION['cart']) == 0){
					$newCart =[$newProduct];
					$_SESSION['cart'] = $newCart;
				}else{
					$cart = $_SESSION['cart'];
					foreach($cart as &$item){
						if($item['productid'] == $newProduct['productid']){
							$item['quantity'] += $newProduct['quantity'];
							$_SESSION['cart'] = $cart;
							echo "Mặt hàng có sẵn, đã thêm số lượng";
							return;
						}
					}
					array_push($cart,$newProduct);
					$_SESSION['cart'] = $cart;
				}
			}else{
				$newCart =[$newProduct];
				$_SESSION['cart'] = $newCart;
				
			}
			echo "Thêm mới thành công";
			//echo(print_r(json_decode($_POST['product'])));
			return;
		}

		if(isset($_POST['remove'])){	
		
			$cart = $_SESSION['cart'];

			for ($i = 0; $i < count($cart); $i++){
				if($cart[$i]['productid'] == $_POST['id']){
					$_SESSION['cart'] = [];
					unset($cart[$i]);
					foreach($cart as &$newCartItem){
						array_push($_SESSION['cart'],$newCartItem);
					}
					echo("Xóa thành công");
					return;
				}
			}
			echo("Không tìm thấy sản phẩm");
			
			return;
		}

		if(isset($_POST['updateQuantity'])){	
		
			$cart = $_SESSION['cart'];

			for ($i = 0; $i < count($cart); $i++){
				if($cart[$i]['productid'] == $_POST['id']){
					$cart[$i]['quantity'] = $_POST['quantity'];
					$_SESSION['cart'] = $cart;
					echo(number_format($this->model->totalPrice($_SESSION['cart'])));
					return;
				}
			}
			echo("Cập nhật thất bại");
			return;
		}

		if(isset($_POST['makeOrder'])){	
		
			$cart = $_SESSION['cart'];

			$newOrder = $this->model->insertOrder($info['username'],$_POST['address'],$_POST['shipfee']);
			foreach($cart as &$item){
				$newId = $this->model->insertOrderDetail($newOrder,$item['productid'],$item['price'],$item['quantity']);
			}
			$_SESSION['cart'] = [];
			echo("Đặt hàng thành công");
			return;
		}
		$this->view->items =[];
		if(isset($_SESSION['cart'])){
			$this->view->items = $_SESSION['cart'];
		}


		$this->view->priceOptions=["normal" => 10000, "fast"=>20000];
		$this->view->totalPrice = $this->model->totalPrice($this->view->items);

		$this->view->title = "Giỏ hàng";
		
		$this->view->render("cart/cart", false);

	
	}
	
}