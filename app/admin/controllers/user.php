<?php
require_once APP_PATH . '/app/config/controller.php';

class User extends Controller{
	public function login(){
		$info= $this->verify();
		if($info){
			if($info["type"]!=1)
				header("Location:" . "/");
			else 
				header("Location:" . "/admin");
		}
		//User already input user, pass
		if(isset($_POST["login"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			echo $this->inputlogin($username,$password);
			return;
		}
		$this->view->render("login/index", false);
	}
	public function inputlogin($username,$password){
		$message = "";
		if (strlen($username) == 0 || strlen($password) == 0) {
			$message = "Hãy nhập đầy đủ thông tin.";
		}else{
			$user = $this->model->checkLogin($username, $password);
			if ($user) {
				$_SESSION["user"]["username"] = $user["username"];
				$_SESSION["user"]["email"] = $user["email"];
				$_SESSION["user"]["name"] = $user["name"];
				$_SESSION["user"]["type"] = $user["accounttype"];
				$_SESSION["user"]["status"] = $user["status"];
				$_SESSION["user"]["true"] = true;
				setcookie("username", $user["username"], time() + 31536000);
				setcookie("name", $user["name"], time() + 31536000);
				setcookie("email", $user["email"], time() + 31536000);
				if ($user["accounttype"] == 1) {
					$message=0;
				}else{
					$message=1;
				}
			}else{
				$message = "Thông tin đăng nhập không chính xác.";
			}
		}
		return $message;
	}
	public function logout(){
		session_unset();
		header("Location:" . "/");
		setcookie("username", '', time() - 31536000);
		setcookie("name",'', time() - 31536000);
		setcookie("email", '', time() - 31536000);
	}

	public function index(){
		//Check permission
		$info= $this->verify();
		if(!$info){
			header("Location:" . "/login");
		}
		else if($info["type"]!=1)
			header("Location:" . "/");
		//Getdetail AJAX
		if(isset($_GET['detail'])){
			$this->view->user=$this->model->getDetailUser($_GET['user']);
			$this->view->render("user/detail",false);
			return;	
		}
		//ADD User AJAX
		if(isset($_POST['add'])){
			$username=$_POST['username'];
			$name=$_POST['name']; 
			$phone=$_POST['phone']; 
			$email=$_POST['email']; 
			$pass=$_POST['pass']; 
			$type=$_POST['type'];
			//Return 0 if any field is null
			if($username==''||$name==''||$phone==''||$email==''||$pass==''||$type==''){
				echo 0;
				return;
			}
			//Return 1 if username exist
			if($this->model->checkRegisterUserName($username)){
				echo 1;
				return;
			}
			$this->model->insertUser($username,$pass,$email,$name,$phone,$type);
			//Return 2, success
			echo 2;
			return;
		}
		//Ban User AJAX
		if(isset($_POST['ban'])){
			$user=$_POST['banUserName'];
			$status=$this->model->getDetailUser($user)['status'];
			if($status==0){
				$this->model->updateUserStatus($user,1);
			}
			else{
				$this->model->updateUserStatus($user,0);
			}
			return;
		}
		//Change User AJAX
		if(isset($_POST['change'])){
			$username=$_POST['username'];
			$name=$_POST['name']; 
			$phone=$_POST['phone']; 
			$email=$_POST['email'];  
			$type=$_POST['type'];
			//Return 0 if any field is null
			if($username==''||$name==''||$phone==''||$email==''||$type==''){
				echo 0;
				return;
			}
			//Return 2 success
			else if($this->model->updateUserInfo($username,$name,$phone,$email,$type)){
				echo 2;
				return;
			}
			else{
				echo 1;
				return;
			}
		}
		$this->view->lstUser=$this->model->getAllUser();
		$this->view->title="Quản lý thành viên";
		$this->view->menuNum=3;
		$this->view->render("user/index",false);
	}
}