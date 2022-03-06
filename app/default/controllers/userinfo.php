<?php
require_once APP_PATH . '/app/config/controller.php';

class Userinfo extends Controller{
	public function index(){
		//var_dump($this->verify());	
		if( isset($_SESSION["user"]["username"]))
		{

			$this->view->list=$_SESSION["user"];
			
			// echo $_SESSION["user"]["name"];
			// die();
			// echo "Username: " . $_COOKIE["username"];
			// echo "Tên người dùng: " . $_COOKIE["name"];
			// echo "Email: " . $_COOKIE["email"];

			// $_SESSION["user"]["name"];

		}
		else
		{
			echo "Chưa có cookie";
		}

		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "POST") {
			$username = $_SESSION["user"]["username"];
			$name = $_POST["name"];
			$email = $_POST["mail"];
			$result = $this->model->updateUser($username,$name,$email);
			// $rate2 = $_POST["rate"]["s2"]?? 9;
			// $rate3 = $_POST["rate"]["s3"]?? 9;
			// $rate4 = $_POST["rate"]["s4"]?? 9;
			// $rate5 = $_POST["rate"]["s5"]?? 9;
			// $comment = $_POST["feedcmt"];
			if($result){
					
				echo '<script language="javascript">';
				echo 'alert("Bạn đã thay đổi thông tin thành công !")';
				echo '</script>';
				//header("Location:" . "/");
			}
			$_SESSION["user"]["name"]=$name;
			$_SESSION["user"]["email"]=$email;
			header("Location:" . "/");
		}
		

		//die(var_dump($this->verify()));
		$this->view->render("userinfo/index", false);

		
	}
	//$this->view->title = "Thông tin người dùng";
	
	// public function product_info(){
	// 	$this->view->render("showfb", false);
	// }

}