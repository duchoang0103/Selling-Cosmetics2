<?php
require_once APP_PATH . '/app/config/controller.php';

class Intro extends Controller{
	public function index(){
		// if (isset($_SESSION["user"]["email"])) {

		// }else{
		// 	header("Location:" . "/login"); //chưa đăng nhập thì cho về đăng nhập
		// 	die();
		// }	
        $this->view->title="Giới thiệu";
		$this->view->render("intro", false);
        		// $info= $this->verify();
		// foreach ($info as $info => $value) {
		// 	echo $info.": ".$value."<br>";
		// }
	}
}