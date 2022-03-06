<?php 
	include(__DIR__ .'/../header.php');
?> 
		<div class="col-sm-8 mx-auto my-2 p-3 h-100 border rounded-3" id='content'>
		<!-- CONTENT -->
			<button id="addPost" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#myModal">
				<b>+</b> Thêm bài viết
			</button>
			<div class="container h-100 overflow-scroll">
				<table id='table' class="table table-hover">
				<thead style="position: sticky;top: 0;" class="bg-white">
					<tr>
						<th style="width: 5%">ID</th>
						<th style="width: 25%">Tiêu đề</th>
						<th style="width: 20%">Ngày đăng</th>
						<th style="width: 8%">Độ ưu tiên</th>
						<th style="width: 12%">Trạng thái</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<!-- Show list posts -->
				<?php foreach ($this->lstPosts as $key => $post){?>
				<tr>
					<td><?php echo $post['postid']; ?></td>
					<td><?php echo $post['title']; ?></td>
					<td><?php echo $post['datecreated']; ?></td>
					<td><?php echo $post['priority']; ?></td>
					<td id="sts-<?php echo $post['postid']; ?>">
						<?php 
						if($post['status']==0){
							echo "Đang hiển thị";
						}
						else{
							echo '<span class="text-danger">Dừng hiển thị</span>';
						}
						 ?>
					</td>
					<td><div>
						<?php 
						if($post['status']==0){
							echo "<button class='btn btn-danger' onclick=\"postChangeSts(this,".$post['postid'].")\">Dừng</button>";
						}
						else{
							echo "<button class='btn btn-success' onclick=\"postChangeSts(this,".$post['postid'].")\">Hiển thị</button>";
						}
						 ?>
						<button class="btn btn-basic text-primary"data-bs-toggle="modal" data-bs-target="#myModal" onclick="postDetail(<?php echo $post['postid']; ?>)"> Chi tiết>></button>
					</div></td>
				</tr>
				<?php } ?>
				</tbody>
				<!-- End list posts -->
			</table>
		<!-- End content -->
		</div>
	</div>
</div>
</body>
<script src="/public/admin/js/ckeditor5-build-classic/ckeditor.js"></script>
<script src="/public/admin/js/onload.js"></script>
</html>