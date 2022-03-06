<?php
require_once APP_PATH . '/app/config/controller.php';

class Payment extends Controller{
	public function index(){
		$info= $this->verify();
		if(!$info){
			header("Location:" . "/login");
		}
		else if($info["type"]!=1)
			header("Location:" . "/");
		//Lấy thông tin Đơn hàng
		if(isset($_GET['detail'])){
			$id=$_GET['id'];
			$this->view->order=$this->model->getDetailOrder($id);
			$this->view->render("orders/detail",false);
			return;	
		}
		//Hủy đơn hàng
		else if(isset($_POST['deny'])){
			$id=$_POST['id'];
			$sts=5;
			$reason="Admin hủy đơn hàng khi: ".$_POST['status'];
			if($this->model->updateOrderSts($id,$sts,$reason))
				echo 2;
			else echo 0;
			return;	
		}
		//Thay đổi Status
		else if(isset($_POST['changeSts'])){
			$id=$_POST['id'];
			$sts=$_POST['status'];
			if($this->model->updateOrderSts($id,$sts,NULL))
				echo 2;
			else echo 0;
			return;	
		}
		$this->view->lstOrders=$this->model->getAllOrders();
		$this->view->title="Đơn hàng";
		$this->view->menuNum=1;
		$this->view->render("orders/index",false);
	}
}