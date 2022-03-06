<?php 
	include(__DIR__ .'/../header.php');
?> 
		<div class="col-sm-8 mx-auto my-2 p-3 h-100 border rounded-3" id='content'>
		<!-- CONTENT -->
		<div class="container h-100 overflow-scroll">
			<table class="table table-hover">
				<thead style="position: sticky;top: 0;" class="bg-white">
					<tr>
						<th style="width: 4%">ID</th>
						<th style="width: 25%">Đường dẫn</th>
						<th style="width: 10%">Loại</th>
						<th style="width: 18%">Miêu tả</th>
						<th style="width: 25%">Lần sửa đổi gần nhất</th>
						<th>Action</th>
					</tr>
				</thead>
				<!-- Show list file -->
				<tbody class="overflow-scroll">
				<?php foreach ($this->lstFiles as $key => $file) {
					?>
				<tr>
					<td><?php echo $key+1; ?></td>
					<td><?php echo $file["link"]; ?></td>
					<td><?php echo $file["type"]; ?></td>
					<td><?php echo $file["descri"]; ?></td>
					<td><?php echo $file["time"]; ?></td>
					<td><div>
						<button class="btn btn-basic text-primary"data-bs-toggle="modal" data-bs-target="#myModal" onclick="resourceDetail(<?php echo "'".$file["link"]."','".$file["type"]."'"; ?>)"> Chi tiết>></button>
					</div></td>
				</tr>
				<?php } ?>
				<!-- End show list -->
				</tbody>
			</table>
			<br>
		<!-- End content -->
		</div>
		</div>
	</div>
</div>
</body>
<script src="/public/admin/js/ckeditor5-build-classic/ckeditor.js"></script>
<script src="/public/admin/js/onload.js"></script>
</html>