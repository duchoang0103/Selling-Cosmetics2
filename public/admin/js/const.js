var menuNum=0;
var addProductHTML;
const addProductHTML1=`
				<div class='text-danger' id='message'></div>
				<form class='mx-5' enctype="multipart/form-data">
			    <div class='mb-3 mt-3'>
			      <label for='title'>Tên sản phẩm:</label>
			      <input type='text' class='form-control' id='title' placeholder='Nhập tên' name='title'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='price'>Giá:</label>
			      <input type='number' class='form-control' id='price' placeholder='Nhập giá' name='price'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='quan'>Số lượng:</label>
			      <input type='number' class='form-control' id='quan' placeholder='Nhập số lượng' name='quan'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='prom'>Giảm giá(%):</label>
			      <input type='number' min='0' max='100' class='form-control' id='prom' placeholder='Nhập %' name='prom'>
			    </div>`;

var addProductHTML2=`
			    <div class='mb-3 mt-3'>
			      <label for='catalog'>Loại sản phẩm:</label>
			      <select id='catalog'  name='catalog' class='form-select'>
			    `;
const addProductHTML3=`
			    <div class='mb-3 mt-3'>
			      <label for='descr'>Mô tả:</label>
			      <textarea class='form-control' rows="6" id='descr' name='descr'></textarea>
			    </div>
			    <div id='file' class='mb-3 mt-3'>
			      <label for='file'>Thêm hình ảnh</label>
			      <input name="picture" type='file' class='form-control' accept="image/png, image/jpeg">
			      <div id="addPicture" class='btn btn-basic text-secondary'><b>+</b>Thêm ảnh</div>
			    </div>
			    <input type='reset' value='Nhập lại' class='btn btn-info float-end'>
			  </form>`;
const addUserHTML=`
				<div class='text-danger' id='message'></div>
				<form class='mx-5'>
			    <div class='mb-3 mt-3'>
			      <label for='username'>Username:</label>
			      <input type='text' class='form-control' id='username' placeholder='Nhập tên tài khoản' required name='username'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='name'>Tên:</label>
			      <input type='text' class='form-control' id='name' placeholder='Nhập tên' name='name'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='phone'>Số điện thoại:</label>
			      <input type='text' class='form-control' id='phone' placeholder='Nhập số điện thoại' name='phone'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='mail'>Email:</label>
			      <input type='email' class='form-control' id='mail' placeholder='Nhập Email' name='mail'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='pass'>Mật khẩu:</label>
			      <input type='text'  class='form-control' id='pass' placeholder='Nhập mật khẩu' name='pass'>
			    </div>
			      	<input type="radio" class="form-check-input" id="radio1" name="type" value="0">
				   	<label class="form-check-label" for="radio1">Người dùng</label>
				    <input type="radio" class="form-check-input" id="radio2" name="type" value="1">
				    <label class="form-check-label" for="radio2">Admin</label>
			    </div>
			  </form>`;

const addPostHTML=`<form class='mx-5'>
				<div class='text-danger' id='message'></div>
			    <div class='mb-3 mt-3'>
			      <label for='title'>Tiêu đề:</label>
			      <input type='text' class='form-control' id='title' placeholder='Tiêu đề' required name='title'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='priority'>Độ ưu tiên:</label>
			      <input type='number' class='form-control' id='priority' placeholder='Độ ưu tiên' name='priority'>
			    </div>
			    <div class='mb-3 mt-3'>
			      <label for='content'>Nội dung:</label>
			      <textarea id='postContent' class='form-control' rows="10" id='content' name='content'> </textarea>
			    </div>
			  </form>`;