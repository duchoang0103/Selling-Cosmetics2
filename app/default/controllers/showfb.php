<?php
require_once APP_PATH . '/app/config/controller.php';

class Showfb extends Controller{
	public function showfb(){

		$method = $_SERVER['REQUEST_METHOD'];


		if(isset($_GET['productid'])){
            $productid = $_GET['productid'];
			$list = $this->model->getAllFeedback($productid);
			$this->view->list=$list;
		// header("Location:" . "/feedback");
		$this->view->render("feedback/showfb", false);
           
        }else{
            echo"khong co gi";
        }
}
}