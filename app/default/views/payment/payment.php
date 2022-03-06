<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./public/default/fontawesome5/css/fontawesome.css" rel="stylesheet">
    <link href="./public/default/fontawesome5/css/solid.css" rel="stylesheet">
</head>
<body>
<div class="col-sm-9 mt-3" id='content'>
		<!-- CONTENT -->
			<table class="table table-hover">
				<tr>
					<th style="width: 5%">STT</th>
					<th style="width: 10%">Địa chỉ</th>
					<th style="width: 15%">Phí ship</th>
					<th style="width: 15%">Giá trị</th>
					<th style="width: 15%">Trạng thái</th>
					<th>Action</th>
				</tr>
				<!-- Show list order -->
				<?php foreach ($this->lstOrders as $order) {
					 ?>
				<tr>
					<td><?php echo 1; ?></td>
					<td><?php echo $order["address"]; ?></td>
					<td><?php echo $order["username"]; ?></td>
					<td><?php echo $order["shipfee"]; ?> đ</td>
					<td><?php echo $order["total"]; ?></td>
					<td id='sts-<?php echo $order["orderid"]; ?>'>
						<?php 
							if($order["status"]==0)
								echo 'Chưa xác nhận';
							
						?>
					</td>
					<td><div>
						<?php 
							if($order["status"]==0)
								$sts= 'Xác nhận';
							else $sts= 0;
							if($sts!=0){
								echo '<button class="btn btn-warning mx-2">'.$sts.'</button>';
								echo '<button class="btn btn-danger" onclick="orderDeny('.$order["orderid"].')"> Hủy</button>';
							}
						?>
						<button class="btn btn-basic"data-bs-toggle="modal" data-bs-target="#myModal" onclick="orderDetail(<?php echo $order["orderid"]; ?>)"> Đánh giá>></button>
					</div></td>
				</tr>
				<?php } ?>
			</table>
		<!-- End content -->
		</div>
</body>
</html>