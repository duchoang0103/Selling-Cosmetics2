<?php
require_once APP_PATH . '/app/config/controller.php';

class SaleOrder extends Controller{
	public function index(){
		$info= $this->verify();
		$this->view->items =  $this->model->getOrders($info['username']);;
		foreach($this->view->items as $key=>$row){
			$sum = 0;
			foreach($row['items'] as &$subItem){
			
				$sum += $subItem['price']*$subItem['quantity'];
			}
			$sum += $row['shipfee'];
			$this->view->items[$key] += array("total"=>number_format($sum));
			//map status
			$status_map = "";
			switch ($row['status']){
				case 0:
					$status_map = "Chờ xác nhận";
					break;
				case 1:
					$status_map = "Đang đóng gói";
					break;
				case 2:
					$status_map = "Đang vận chuyển";
					break;
				case 3:
					$status_map = "Đang giao hàng";
					break;
				case 4:
					$status_map = "Đã hoàn thành";
					break;
				case 5:
					$status_map = "Đã hủy";
					break;
				default:
					$status_map = "";
			}
			$this->view->items[$key] += array("status_map"=>$status_map);
		}
		$this->view->title = "Đơn hàng";
		$this->view->render("saleorder/index", false);
	}
		
	
}