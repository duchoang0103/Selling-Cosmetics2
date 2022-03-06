<?php
require_once APP_PATH . '/app/config/controller.php';

class News extends Controller{
	public function index(){
		if(isset($_GET['post_id'])){
			$post_id=$_GET['post_id'];
			$this->content($post_id);
			return;
		}
		$this->view->news = $this->model->getAllNews();
		$this->view->news_1 = NULL;
		$this->view->news_2 = [];
		$this->view->news_3 = [];
		if(count($this->view->news) >0){
			$this->view->news_1 = $this->view->news[0];
			if(count($this->view->news) >1){
				if(count($this->view->news) < 3){
					for($i = 1; $i<count($this->view->news); $i++){
						array_push($this->view->news_2,$this->view->news[$i]);
					}
				}else{
					for($i = 1; $i<4; $i++){
						array_push($this->view->news_2,$this->view->news[$i]);
					}
					for($i = 4; $i<count($this->view->news); $i++){
						array_push($this->view->news_3,$this->view->news[$i]);
					}
				}
			}
		}
		
		
		$this->view->render("news/index", false);
	}
	public function content($post_id){
		$this->view->content= $post_id;
		$this->view->title = $this->model->getNews($post_id)['title'];
		$this->view->date = $this->model->getNews($post_id)['datecreated'];
		$this->view->render("/news/content", false);
	}
}