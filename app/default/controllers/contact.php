<?php
require_once APP_PATH . '/app/config/controller.php';

class Contact extends Controller{
	public function index(){
		$this->view->render("contact/index", false);
	}
	
}