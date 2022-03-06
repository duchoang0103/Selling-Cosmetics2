<form class='mx-5'>
	<div class='text-danger' id='message'></div>
	<div class='mb-3 mt-3'>
	  <label for='title'>Tiêu đề:</label>
	  <input type='text' class='form-control' id='title' value="<?php echo $this->post["title"]; ?>" required name='title'>
	</div>
	<div class='mb-3 mt-3'>
	  <label for='priority'>Độ ưu tiên:</label>
	  <input type='number' class='form-control' id='priority' value="<?php echo $this->post["priority"]; ?>" name='priority'>
	</div>
	<div class='mb-3 mt-3'>
	  <label for='content'>Nội dung:</label>
	  <textarea id='postContent' class='form-control' rows="10" id='content' name='content'><?php include __DIR__ .'../../../../../public/posts/'.$this->post["postid"].'.html'; ?></textarea>
	</div>
</form>