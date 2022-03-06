<?php
require_once APP_PATH . '/app/config/controller.php';

class Feedback extends Controller{
	public function feedback(){


		if(isset($_GET['productid'])){
            $productid = $_GET['productid'];
			$this->view->list=$productid;
			
			
		// header("Location:" . "/feedback");         
        }else{
            echo"khong co gi";
        }
		if(isset($_GET['orderid'])){
            $orderid = $_GET['orderid'];
		
		// header("Location:" . "/feedback");         
        }else{
            echo"khong co gi";
        }


		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == "POST") {
			$rate1 = $_POST["rate"]["s1"]?? 9;
			$rate2 = $_POST["rate"]["s2"]?? 9;
			$rate3 = $_POST["rate"]["s3"]?? 9;
			$rate4 = $_POST["rate"]["s4"]?? 9;
			$rate5 = $_POST["rate"]["s5"]?? 9;
			$comment = $_POST["feedcmt"];
			// foreach ($_FILES["proImg"]["tmp_name"] as $file) {
			// 	$saveFilePath = APP_PATH . "/public/images/feedback/" . "idfeedback" . "_" . ".jpg";

			// 	move_uploaded_file($file, $saveFilePath);
			// }

			$file = $_FILES['myFile']['tmp_name'];
			
			$idfeedback = $this->model->getFeedback();
			
            $path = APP_PATH . "/public/images/feedback/". $idfeedback+1 . ".png";
			
			
            if(move_uploaded_file($file, $path)){
                echo "Tải tập tin thành công";
				
            }
			

			if($rate1!=9)
			{
				$rate = $rate1;
			}
			else if($rate2!=9)
			{
				$rate = $rate2;
			}
			else if($rate3!=9)
			{
				$rate = $rate3;
			}
			else if($rate4!=9)
			{
				$rate = $rate4;
			}
			else if($rate5!=9)
			{
				$rate = $rate5;
			}
			else 
			{
				$rate = 5;
			}
			
			//validate
			if(isset($comment)){

				//handlesubmit
				
				$result = $this->model->insertFeedback($orderid,$productid,$rate,$comment);

				
				
				if($result){
					
					echo '<script language="javascript">';
					echo 'alert("Cảm ơn bạn đã đánh giá cho sản phẩm của chúng tôi !")';
					echo '</script>';
					//header("Location:" . "/");
				}
				
			}

			
			// if(isset($hinhanh))
			// {

			// }
		}

		// if(isset($_GET['productid'])){
        //     $productid = $_GET['productid'];
		// 	$list = $this->model->getAllFeedback($productid);
		// 	$this->view->list=$list;
		// // header("Location:" . "/feedback");
		// $this->view->render("feedback/", false);
           
        // }else{
        //     echo"khong co gi";
        // }
		
		$this->view->render("feedback/feedback", false);
	}
	
}
