try{
	document.getElementById('addProduct')
		.addEventListener('click',
			function(){
				changeModalBody(addProductHTML);
				changeModalHead('Thêm sản phẩm');
				document.getElementById('addPicture')
				.addEventListener('click',function(){addPicture(1);});
				changeModalSubmit('addProduct');
				editorChange('descr');
			});
	}
catch{}
try{
	document.getElementById('addUser')
		.addEventListener('click',
			function(){
				changeModalBody(addUserHTML);
				changeModalHead('Thêm Thành viên');
				changeModalSubmit('userAdd');
			});
	}
catch{}
try{
	document.getElementById('addPost')
		.addEventListener('click',
			function(){
				changeModalBody(addPostHTML);
				changeModalHead('Thêm bài viết');
				changeModalSubmit('postAdd');
				editorChange('postContent');
			});
	}
catch{}
// $("#menu").load("/");
 // $.post("/",
 //  {
 //    name: "Donald Duck",
 //    city: "Duckburg"
 //  },
 //  function(data, status){
 //    alert("Data: " + data + "\nStatus: " + status);
 //  });