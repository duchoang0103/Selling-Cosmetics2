<?php
require_once APP_PATH . '/app/config/controller.php';

class Resource extends Controller{
	public function index(){
		$info= $this->verify();
		if(!$info){
			header("Location:" . "/login");
		}
		else if($info["type"]!=1)
			header("Location:" . "/");
		//AJAX lấy chi tiết sản phẩm
		if(isset($_GET['detail'])){
			$this->detail();
			return;
		}
		//Chạy chương trình chính
		$this->main();
	}
	public function main(){
		//Lấy danh sách tệp
		$img_fb=glob("public/images/feedback/*.png");
		$img_p=glob("public/images/products/*.png");
		$img_sl=glob("public/images/slider/*.jpg");
		$img_logo=glob("public/images/*.png");
		$img_mat=glob("public/admin/*.png");
		$html=glob("public/posts/*.html");
		$files=[];
		//Chuẩn hóa dữ liệu
		foreach ($img_fb as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"png",
				"descri"=> "Ảnh cho feedback",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}
		foreach ($img_p as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"png",
				"descri"=> "Ảnh cho product",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}
		foreach ($img_sl as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"jpg",
				"descri"=> "Ảnh cho quảng cáo trang chủ",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}
		foreach ($img_logo as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"png",
				"descri"=> "Logo trang web",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}
		foreach ($img_mat as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"png",
				"descri"=> "Ảnh cho css",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}
		foreach ($html as $value) {
			unset($file);
			$file=[
				"link"=> $value,
				"type"=>"html",
				"descri"=> "Nội dung bài viết tin tức",
				"time"=>date("F d Y H:i:s.",filemtime($value)),
				"stamp"=>filemtime($value)
			];
			$files[]=$file;
		}

		usort($files, function ($item1, $item2) {
		    return $item2['stamp'] <=> $item1['stamp'];
		});



		
		$this->view->title="Tài nguyên";
		$this->view->menuNum=6;
		$this->view->lstFiles=$files;
		$this->view->render("resource/index",false);
	}
	public function detail(){
		$this->view->link=$_GET['link'];
		$type=$_GET['type'];
		if($type=='png'||$type=='jpg'){
			$this->view->render("resource/picture",false);
		}
		else if($type=='html'){
			$this->view->render("resource/html",false);
		}
	}
}