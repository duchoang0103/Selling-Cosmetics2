	<?php
require_once APP_PATH . '/app/config/controller.php';

class Posts extends Controller{
	public function index(){
		$info= $this->verify();
		if(!$info){
			header("Location:" . "/login");
		}
		else if($info["type"]!=1)
			header("Location:" . "/");
		//Xem chi tiết Bài viết
		if(isset($_GET['detail'])){
			$id=$_GET['id'];
			$this->view->post=$this->model->getDetailPost($id);
			$this->view->render("posts/detail",false);
			return;	
		}
		//Thêm bài viết
		if(isset($_POST['add'])){
			$title=$_POST['title'];
			$priority=$_POST['priority']; 
			$content=$_POST['content'];
			$id=$this->model->insertPost($title, $priority, 0);
			$myfile = fopen("public/posts/".$id.".html", "w") or die(1);
			fwrite($myfile, $content);
			fclose($myfile);
			echo 2;
			return;	
		}
		//Sửa bài viết
		if(isset($_POST['change'])){
			$id=$_POST['id'];
			$title=$_POST['title'];
			$priority=$_POST['priority']; 
			$content=$_POST['content'];
			$this->model->changePost($id,$title, $priority);
			$myfile = fopen("public/posts/".$id.".html", "w") or die(1);
			fwrite($myfile, $content);
			fclose($myfile);
			echo 2;
			return;	
		}
		//Update Status
		if(isset($_POST['changeSts'])){
			$id=$_POST['id'];
			$status=$_POST['status'];
			if($this->model->changePostSts($id,$status))
				echo 2;
			else echo 1;
			return;	
		}
		$this->view->lstPosts=$this->model->getAllPost();
		$this->view->title="Bài viết";
		$this->view->menuNum=5;
		$this->view->render("posts/index",false);
	}
}