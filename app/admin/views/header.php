<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  echo $this->title; ?></title>
    <link href="/public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/admin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/public/default/js/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="/public/admin/css/admin.css">
	<script src="/public/admin/js/const.js"></script>
</head>
<body>	
<?php 
	echo "<script>menuNum=".$this->menuNum."</script>"
 ?>
<div class="container-fluid overflow-hidden" style="height: 100vh;">
 	<div class="row">
 		<div class="col-sm-3 bg-dark"style="height: 70px; ">
 			<!-- <div class="d-inline-block"><img src="/public/images/logo.png" width="70px" alt=""></div>  -->
 			<p class="d-inline-block text-white  my-3 text-center h-100">
 				<b><span class="h3 text-danger">W</span>EB <span class="h3 text-danger">A</span>SSIGNMENT</b>
 			</p>
 		</div>
 		<div class="col-sm-9  bg-white"style="min-height: 70px;">
 			<div class="row h-100">
 				<div class="col-sm-2"></div>
 				<div class="col-sm-8 my-auto text-center display-6 text-success"><?php  echo $this->title; ?></div>
	 			<div class="col-sm-2 my-auto">
	 				<div class="row">
	 					<!-- <div class="col-6 text-white">Chào,<br><b>Hào</b></div> -->
	 					<div class="col-12">
	 						<div class="dropdown">
								<?php echo $_SESSION['user']['username']; ?>
							  <button type="button" class="btn p-0" data-bs-toggle="dropdown">
	 								<img src="/public/admin/user-icon.png" width="50px"  alt="account">
							  </button>
							  <ul class="dropdown-menu">
							    <li><a class="dropdown-item" href="/logout">Đăng xuất</a></li>
							  </ul>
							</div>
	 					</div>
	 				</div>
	 			</div>
 			</div>
 		</div>
 	</div>
 	<div class="row h-100">
 		<div class="col-sm-3 bg-dark border-end p-0 pt-3">
 			<ul id="menu" class="nav nav-pills flex-column">
			  <li class="nav-item d-none">
			    <a class="nav-link" href="../admin"><p>DASHBOARD</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/orders"><p>Quản lý đơn hàng</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/products"><p>Quản lý sản phẩm</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/user"><p>Quản lý thành viên</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/feedback"><p>Quản lý feedback</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/posts"><p>Quản lý bài viết</p></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="../admin/resource"><p>Quản lý tài nguyên</p></a>
			  </li>
			</ul>
 		</div>
	<script src="/public/admin/js/hao.js"></script>
	<!-- The Modal -->
	<div class="modal fade" id="myModal">
	  <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
	    <div class="modal-content">
	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 id="modal-head" class="modal-title">Đợi một tí...</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div>
	      <!-- Modal body -->
	      <div id="modal-body" class="modal-body">
		      
	      </div>

	      <!-- Modal footer -->
	      <div id="modal-foot" class="modal-footer">
	        <button id='submit' type="button" class="btn btn-success" >Lưu</button>
	      </div>

	    </div>
	  </div>
	</div>