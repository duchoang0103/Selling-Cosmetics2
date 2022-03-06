<div class="mx-5">
	<div class="row product-list">
		<b id='message' class="text-danger"></b>
		<div class="col-5">
			<b>Username: </b>
		</div>
		<div class="col-7">
			<span><?php echo $this->user['username']; ?> </span>
		</div>
		<div class="col-5">
			<b>Tên: </b>
		</div>
		<div class="col-7">
			<input type="text" name="name" value="<?php echo $this->user['name']; ?>" style="border:none;">
		</div>
		<div class="col-5">
			<b>Số điện thoại: </b>
		</div>
		<div class="col-7">
			<input type="text" name="phone" value="<?php echo $this->user['phone_number']; ?>" style="border:none;">
		</div>
		<div class="col-5">
			<b>Email: </b>
		</div>
		<div class="col-7">
			<input type="email" name="email" value="<?php echo $this->user['email']; ?>" style="border:none;">
		</div>
		<div class="col-5">
			<b>Loại tài khoản:</b>
		</div>
		<div class="col-7">
			<input type="radio" class="form-check-input" id="radio1" name="type" value="0" <?php if($this->user['accounttype']==0) echo 'checked'; ?>>
		      <label class="form-check-label" for="radio1">Người dùng</label>
		      <input type="radio" class="form-check-input" id="radio2" name="type" value="1" <?php if($this->user['accounttype']==1) echo 'checked'; ?>>
		      <label class="form-check-label" for="radio2">Admin</label>
		</div>
		<div class="col-5">
			<b>Trạng thái: </b>
		</div>
		<div class="col-7">
				<?php 
					if ($this->user['status']==0){
						echo '<span name="sts-'.$this->user['username'].'">Hoạt động</span>  ';
						echo'<button name="ban-'.$this->user['username'].'" onclick="userBan(this,\''.$this->user['username'].'\')" class="btn btn-danger">Cấm</button>';
					}
					else {
						echo '<span name="sts-'.$this->user['username'].'" class="text-danger">Bị khóa</span>';
						echo '<button name="ban-'.$this->user['username'].'" onclick="userBan(this,\''.$this->user['username'].'\')" class="btn btn-success"> Mở khóa</button>';
					}
					?>
		</div>
		<div class="col-5">
			<b>Lần đăng nhập cuối: </b>
		</div>
		<div class="col-7">
			<span>
			<?php echo $this->user['lastlogin']; ?>
			</span>
		</div>
	</div>
</div>