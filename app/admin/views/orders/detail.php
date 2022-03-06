<div class="mx-5">
	<div id="message" class="text-danger"></div>
	<div class="row product-list">
		<div class="col-5">
			<b>Người đặt: </b>
		</div>
		<div class="col-7">
			<?php echo $this->order["username"]; ?>
		</div>
		<div class="col-5">
			<b>Trạng thái: </b>
		</div>
		<div class="col-7">
			<?php 
				if($this->order["status"]==0)
					echo 'Chưa xác nhận';
				else if($this->order["status"]==1)
					echo 'Đang đóng gói';
				else if($this->order["status"]==2)
					echo 'Đang vận chuyển';
				else if($this->order["status"]==3)
					echo 'Đang giao hàng';
				else if($this->order["status"]==4)
					echo '<span class="text-success">Đã giao hàng</span>';
				else echo '<span class="text-danger">Đã hủy</span>'
			?>
		</div>
		<div class="col-5">
			<b>Lý do hủy đơn: </b>
		</div>
		<div class="col-7">
			<?php 
			if($this->order["reason"])
				echo $this->order["reason"];
			else echo 'Không có';
			?>
		</div>
		<div class="col-5">
			<b>Địa chỉ: </b>
		</div>
		<div class="col-7">
			<?php echo $this->order["address"]; ?>
		</div>
		<div class="col-5">
			<b>Phí vận chuyển: </b>
		</div>
		<div class="col-7">
			<?php echo $this->order["shipfee"]; ?>
		</div>
		<div class="col-5">
			<b>Tổng giá trị sản phẩm: </b>
		</div>
		<div class="col-7">
			<?php echo $this->order["total"]; ?>
		</div>
		<div class="col-5">
			<b>Tổng giá trị đơn hàng: </b>
		</div>
		<div class="col-7">
			<?php echo $this->order["total"]+$this->order["shipfee"]; ?>
		</div>
		<!-- Display picture -->
		<div class="row">
			<b>Chi tiết: </b>
		</div>
		<span>
		<?php 
			foreach($this->order['products'] as $key=> $product){
				echo ($key+1).". ".$product['title'].': ';
				// echo "<ul type='none'>";
				echo "<span class='mx-3'>Giá: ".$product['price']."</span>";
				echo "<span>Số lượng: ".$product['quantity']."</span><br>";
				// echo "</ul>";
			}
		 ?>
		<!-- end display picture -->
		</span>
	</div>
</div>