<?php 
	include(__DIR__ .'/../header.php');
?> 
		<div class="col-sm-8 mx-auto my-2 p-3 h-100 border rounded-3" id='content'>
		<!-- CONTENT -->
			<button id="addUser" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#myModal">
				<b>+</b> Thêm thành viên
			</button>
			<br>
			<div class="container h-100 overflow-scroll">
				<table id='table' class="table table-hover">
				<thead style="position: sticky;top: 0;" class="bg-white">
					<tr>
						<th style="width: 5%">STT</th>
						<th style="width: 15%">Username</th>
						<th style="width: 10%">Loại</th>
						<th style="width: 25%">Đăng nhập</th>
						<th style="width: 15%">Trạng thái</th>
						<th>Action</th>
					</tr>
				</thead>
				<!-- Show list user -->
				<tbody>
					<?php
						$count=0;
						foreach ($this->lstUser as $user) {
							$count++;
					 ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $user['username']; ?></td>
						<td id='type-<?php echo $user['username']; ?>'>
							<?php 
							if ($user['accounttype']==0)
								echo 'Người dùng';
							else echo 'Admin';
							?>
						</td>
						<td><?php echo $user['lastlogin']; ?></td>
						<td><?php 
							if ($user['status']==0)
								echo '<span name=\'sts-'.$user['username'].'\'>Hoạt động</span>';
							else echo '<span name=\'sts-'.$user['username'].'\' class="text-danger">Bị khóa</span>';
						?></td>
						<td><div>
							<?php 
							if ($user['status']==0)
								echo '<button name="ban-'.$user['username'].'" onclick=userBan(this,"'.$user['username'].'") class="btn btn-danger">Cấm</button>';
							else echo '<button name="ban-'.$user['username'].'" onclick=userBan(this,"'.$user['username'].'") class="btn btn-success">Mở khóa</button>';
							?>
							
							<button class="btn btn-basic text-primary"data-bs-toggle="modal" data-bs-target="#myModal" onclick='userDetail("<?php echo $user['username'];?>")'> Chi tiết>></button>
						</div></td>
					</tr>
					<?php } ?>
				</tbody>
				<!-- End show list user -->
			</table>
			</div>
		<!-- End content -->
		<br>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	
</script>
<script src="/public/admin/js/onload.js"></script>
</html>