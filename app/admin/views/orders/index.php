<?php 
	include(__DIR__ .'/../header.php');
?> 
		<div class="col-sm-8 mx-auto my-2 p-3 h-100 border rounded-3" id='content'>
		<!-- CONTENT -->
			<div class="container h-100 overflow-scroll">
				<table id='table' class="table table-hover">
				<thead style="position: sticky;top: 0;" class="bg-white">
					<tr>
						<th style="width: 5%">ID</th>
						<th style="width: 10%">Username</th>
						<th style="width: 10%">Giá trị</th>
						<th style="width: 20%">Địa chi</th>
						<th style="width: 15%">Trạng thái</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<!-- Show list order -->
				<?php foreach ($this->lstOrders as $order) {
					 ?>
				<tr>
					<td><?php echo $order["orderid"]; ?></td>
					<td><?php echo $order["username"]; ?></td>
					<td><?php echo $order["shipfee"]; ?> đ</td>
					<td><?php echo $order["address"]; ?></td>
					<td id='sts-<?php echo $order["orderid"]; ?>'>
						<?php 
							if($order["status"]==0)
								echo 'Chưa xác nhận';
							else if($order["status"]==1)
								echo 'Đang đóng gói';
							else if($order["status"]==2)
								echo 'Đang vận chuyển';
							else if($order["status"]==3)
								echo 'Đang giao hàng';
							else if($order["status"]==4)
								echo '<span class="text-success">Đã giao hàng</span>';
							else echo '<span class="text-danger">Đã hủy</span>'
						?>
					</td>
					<td><div>
						<?php 
							if($order["status"]==0)
								$sts= 'Xác nhận';
							else if($order["status"]==1)
								$sts=  'Vận chuyển';
							else if($order["status"]==2)
								$sts=  'Xác nhận đến kho';
							else if($order["status"]==3)
								$sts=  'Đã giao';
							else if($order["status"]==4)
								$sts= 0;
							else $sts= 0;
							if($sts!=0){
								echo '<button id="change'.$order["orderid"].'"" class="btn btn-warning mx-2" onclick="orderChangeSts(this,'.$order["orderid"].','.($order["status"]+1).')">'.$sts.'</button>';
								echo '<button class="btn btn-danger" onclick="orderDeny(this,'.$order["orderid"].')"> Hủy</button>';
							}
						?>
						<button class="btn btn-basic text-primary"data-bs-toggle="modal" data-bs-target="#myModal" onclick="orderDetail(<?php echo $order["orderid"]; ?>)"> Chi tiết>></button>
					</div></td>
				</tr>
				<?php } ?>
				<!-- End show list Order -->
				</tbody>
			</table>
		<!-- End content -->
		</div>
	</div>
</div>
</body>
<script src="/public/admin/js/onload.js"></script>
</html>