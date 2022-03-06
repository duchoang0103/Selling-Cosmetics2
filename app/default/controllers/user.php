<?php
require_once APP_PATH . '/app/config/controller.php';

class User extends Controller{
	public function register(){
		if($this->verify()) header("Location:" . "/");
		$this->view->nameError = "";
		$this->view->pswError = "";
		$this->view->emailError = "";
		$this->view->repeatPswError = "";
		$this->view->userNameError = "";
		$this->view->phoneError = "";

		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "POST") {
			$username = $_POST["reg"]["username"];
			$psw = $_POST["reg"]["psw"];
			$name = $_POST["reg"]["name"];
			$email = $_POST["reg"]["email"];
			$repeatPsw = $_POST["reg"]["repeatPsw"];
			$phone = $_POST["reg"]["phone"];
			$submitable = true;
			//validate
			if (!preg_match("/^[a-zA-Z-' ]*$/",$this->vn_str_filter($name))) {
				$this->view->nameError = "Tên chỉ bao gồm kí tự và khoảng trắng";
				$submitable = false;
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$this->view->emailError = "Email không đúng định dạng";
				$submitable = false;
			}else{
				if($this->model->checkRegisterEmail($email) != false){
					$this->view->emailError = "Email đã tồn tại";
					$submitable = false;
				}
			}

			if (!preg_match("/^\S{8,}$/",$psw)) {
				$this->view->pswError = "Phải gồm 8 kí tự trở lên";
				$submitable = false;
			}

			if (!preg_match("/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/",$phone)) {
				$this->view->phoneError = "Đây không thể là một số điện thoại";
				$submitable = false;
			}

			if($psw != $repeatPsw){
				$this->view->repeatPswError = "Mật khẩu không khớp";
				$submitable = false;
			}

			if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]+$/",$this->vn_str_filter($username))) {
				$this->view->nameError = "Tên đăng nhập chỉ được sử dụng chữ, số và phải bắt đầu bởi chữ cái";
				$submitable = false;
			}else{
				if($this->model->checkRegisterUserName($username) != false){
					$this->view->userNameError = "Tên đăng nhập đã tồn tại";
					$submitable = false;
				}
			}

			if($submitable){
				//handlesubmit
				$result = $this->model->insertUser($username,$psw,$email,$name,$phone);
				header("Location:" . "/login");
			}
		}
		$this->view->render("user/register", false);

	}
	private function vn_str_filter($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
		return $str;
    }
	// public function product_detail(){
		
	// }
	public function forgotpass(){
		if($this->verify()) header("Location:" . "/");
		//Send request
		if(isset($_POST['forgot'])){
			$user=$_POST['username'];
			$email=$_POST['email'];
			$veriUser=$this->model->checkRegisterUserName($user);
			$veriEmail=$this->model->checkRegisterEmail($email);
			if(!$veriUser){
				echo 'Không có user này';
				return;
			}
			if(!$veriEmail){
				echo'Sai email';
				return;
			}
			$code= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'?p=true&u='.$user.'&code='.$this->model->selectCode($user);
			$to = $email;
			$subject = "Yêu cầu lấy lại mật khẩu - Mỹ phẩm CSE";
			$txt = '<h1>Chào mừng bạn đến với Mỹ phẩm - CSE</h1>
					Yêu cầu lấy lại mật khẩu của bạn đã <b style="color:red;"> thành công</b> <br>
					Vui lòng nhấn vào đường dẫn sau để hoàn thành việc lấy lại mật khẩu: <br>
					<a href="'.$code.'">Nhấn vào đây</a>';
			$headers = "From: Công ty Mỹ phẩm CSE". "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$txt,$headers);
			echo 'Email đã được gửi đi, kiểm tra email '.$email.' để lấy mật khẩu';
			return;
		}
		if(isset($_GET['p'])){
			$code=$_GET['code'];
			$user=$_GET['u'];
			if($code!=$this->model->selectCode($user)){
				header('Location: /');
			}
			else{
				$this->view->user=$user;
				$this->view->username=$this->model->selectName($user);
				$this->view->render("user/changepass", false);
				return;
			}
		}
		if(isset($_POST['change'])){
			$code=$_POST['code'];
			$user=$_POST['username'];
			$pass=$_POST['pass'];
			if (!preg_match("/^\S{8,}$/",$pass)) {
				echo "Phải gồm 8 kí tự trở lên";
				return;
			}
			if($code!=$this->model->selectCode($user)){
				echo 'Hết hạn sử dụng code này';
				return;
			}
			else{
				$this->model->updateUserPass($user,$pass);
				echo 1;
				return;
			}
		}
		$this->view->render("user/forgot", false);
	}
}