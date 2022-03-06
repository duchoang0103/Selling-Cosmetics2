<div class="mx-5">
	<div id="message" class="text-danger"></div>
	<div class="row product-list">
		<div class="col-5">
			<b>Tên sản phẩm </b>
		</div>
		<div class="col-7">
			<input type='text' class='form-control border-0 p-0 m-0' id='title' value='<?php echo $this->product['title']; ?>' name='title'>
		</div>
		<div class="col-5">
			<b>Giá: </b>
		</div>
		<div class="col-7">
			<input type='number' class='form-control border-0 p-0 m-0' id='price' value='<?php echo $this->product['price']; ?>' name='price'>
		</div>
		<div class="col-5">
			<b>Số lượng tồn kho: </b>
		</div>
		<div class="col-7">
			<input type="number" value="<?php echo $this->product['quantity']; ?>" style="border:none;" name="quantity">
		</div>
		<!-- <div class="col-5">
			<b>Tổng đã bán: </b>
		</div>
		<div class="col-7">
			<span>200</span>
		</div> -->
		<div class="col-5">
			<b>Giảm giá %: </b>
		</div>
		<div class="col-7">
			<input type="number" value="<?php echo $this->product['promotion']; ?>" style="border:none;" name="promotion">
		</div>
		<div class="col-5">
			<b>Loại sản phẩm: </b>
		</div>
		<div class="col-7">
			<span><?php echo $this->product['catalog']; ?></span>
		</div>
		<div class="col-5">
			<b>Mô tả: </b>
		</div>
		<div class="col-12">
			<textarea id="descri" name='descri' class='form-control border-0 p-0 m-0' rows='6'><?php echo $this->product['descri'];?></textarea>
		</div>
		<button class="btn btn-danger" onclick="productDelete(<?php echo $this->product['productid']; ?>)">Xóa sản phẩm</button>
		<b>Hình ảnh</b>
		<!-- Display picture -->
		<?php foreach($this->product['picture'] as $key=>$pic){
			echo '<div>Ảnh số '.($key+1).'</div>';
		 ?>
		<img class="border border-info rounded-3 mx-auto p-0" style="width: 80%!important;" src="../public/images/products/<?php echo $pic;?>" >
		<?php } ?>
		<!-- end display picture -->
	</div>
</div>