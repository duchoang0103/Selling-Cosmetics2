<div class="mx-5">
	<div class="row product-list">
		<div class="col-5">
			<b>Sản phẩm: </b>
		</div>
		<div class="col-7">
			<span> <?php echo $this->fb['productid'].'-'.$this->fb['productname'];?></span>
		</div>
		<div class="col-5">
			<b>Người bình luận: </b>
		</div>
		<div class="col-7">
			<span> <?php echo $this->fb['username'];?></span>
		</div>
		<div class="col-5">
			<b>Mã đơn hàng: </b>
		</div>
		<div class="col-7">
			<span> <?php echo $this->fb['orderid'];?></span>
		</div>
		<div class="col-5">
			<b>Số sao(1-5): </b>
		</div>
		<div class="col-7">
			<span> <?php echo $this->fb['star'];?></span>
		</div>
		<div class="col-5">
			<b>Bình luận: </b>
		</div>
		<div class="col-7">
			<span> <?php echo $this->fb['comment'];?></span>
		</div>
		<div class="col-5">
			<b>Hình ảnh: </b>
		</div>
		<div class="col-12">
			<img class="img-fluid" src="../public/images/feedback/<?php echo $this->fb['feedbackid'].'.png';?>" alt="">
		</div>
	</div>
</div>