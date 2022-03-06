function setMenu($number) {
	var menu, node;
	if(document.getElementById("menu")){
		menu=document.getElementById("menu").children;
		node=menu[$number].children;
		node[0].classList.add('active');
	}
}
setMenu(menuNum);
function login(){

	var user, pass;
	user=$("#username").val();
	pass=$("#pass").val();
	$('#submit').html(' <span class="spinner-grow spinner-grow-sm"></span>Loading..')
	$('#submit').attr('disabled','');
	setTimeout(function(){
						

	$.post('/login',
		{
			login:true,
			username:user,
			password:pass
		},function(data, status){
			if(data==0){
				location.reload();
			}
			else if(data==1){
				location.reload();
			}
			else{
				$('#message').text(data);
			}
			$('#submit').html('Đăng nhập')
			$('#submit').removeAttr('disabled','');
	});








					},500);
}

function changePass(){
	$('#submit').html(' <span class="spinner-grow spinner-grow-sm"></span>Loading..');
	$('#submit').attr('disabled','');
	var user, code, pass,npass;
	const urlSearchParams = new URLSearchParams(window.location.search);
	const params = Object.fromEntries(urlSearchParams.entries());
	code=params['code'];
	user=params['u'];
	pass=$("#npass").val();
	npass=$("#nnpass").val();
	if(pass!=npass){
		$('#message').text('Mật khẩu không khớp');
		$('#submit').html('Lấy mật khẩu')
		$('#submit').removeAttr('disabled','');
		return;
	}
	setTimeout(function(){
						

	$.post('/forgotpass',
		{
			change:true,
			username:user,
			code:code,
			pass:pass
		},function(data, status){
			if(data==1){
				$('#message').text('Thành công');
				setTimeout(function(){
						window.location="/login";
				},1500);
				return;
			}
			$('#message').text(data);
			$('#submit').html('Đổi mật khẩu')
			$('#submit').removeAttr('disabled','');
			// $('#submit').attr('onclick','verifyPass');
	});








					},500);
}
function forgotPass(){
	var user, mail;
	user=$("#username").val();
	mail=$("#mail").val();
	$('#submit').html(' <span class="spinner-grow spinner-grow-sm"></span>Loading..');
	$('#submit').attr('disabled','');
	setTimeout(function(){
						

	$.post('/forgotpass',
		{
			forgot:true,
			username:user,
			email:mail
		},function(data, status){

			$('#message').text(data);
			$('#submit').html('Lấy mật khẩu')
			$('#submit').removeAttr('disabled','');
			// $('#submit').attr('onclick','verifyPass');
	});








					},500);
}
function changeModalHead($content){
	document.getElementById("modal-head").innerHTML=$content;
}
function changeModalBody($content){
	document.getElementById("modal-body").innerHTML=$content;
}
function changeModalSubmit($function){
	// $('#submit').on('click',function(){});
	if($function==''){
		$('#submit').attr('onclick','');
		return;
	} 
	$('#submit').attr('onclick',$function+'()');
}
function changeModalSubmit($function,$data){
	// $('#submit').on('click',function(){});
	if($function==''){
		$('#submit').attr('onclick','');
		return;
	} 
	$('#submit').attr('onclick',$function+'("'+$data+'")');
}
function showModalSubmit(){
	$('#submit').removeClass('d-none')
}
function hideModalSubmit(){
	$('#submit').addClass('d-none')
}
function addPicture($number){
	showModalSubmit();
	const node = document.createElement('input');
	node.setAttribute('type','file');
	node.setAttribute('class','form-control');
	node.setAttribute('name','picture');
	node.setAttribute('accept','image/png, image/jpeg');
	var elem= document.getElementById('file');
	var chil= document.getElementById('addPicture');
	elem.insertBefore(node,chil);
}

function orderDetail($number) {
	hideModalSubmit();
	$.get('/admin/orders?detail=true&id='+$number,function(data, status){
		changeModalHead('Đơn hàng số '+$number);
		changeModalBody(data);
	});
}
function productDetail($number){
	changeModalSubmit('productChange', $number);
	$.get('/admin/products?detail=true&id='+$number,function(data, status){
		changeModalHead('Sản phẩm mã '+$number);
		changeModalBody(data);
		editorChange('descri');
	});
}
function userDetail($username){
	changeModalSubmit('userChange', $username);
	$.get('/admin/user?detail=true&user='+$username,function(data, status){
		changeModalHead('Người dùng '+$username);
		changeModalBody(data);
	});
}
function feedbackDetail($number){
	hideModalSubmit();
	$.get('/admin/feedback?detail=true&id='+$number,function(data, status){
		changeModalHead('Feedback '+$number);
		changeModalBody(data);
	});
}
function postDetail($number){
	changeModalSubmit('postChange', $number);
	$.get('/admin/posts?detail=true&id='+$number,function(data, status){
		changeModalHead('Bài viết '+$number);
		changeModalBody(data);
		editorChange('postContent');
	});
}
function userAdd(){
	var username, name, phone, email, pass, type;
	username=$('#username').val();
	name=$('#name').val();
	phone=$('#phone').val();
	email=$('#mail').val();
	pass=$('#pass').val();
	type=$('input[name=type]:checked').val();
	$.post('/admin/user',
		{
			add:true,
			username:username,
			name:name, 
			phone:phone, 
			email:email, 
			pass:pass, 
			type:type
		},function(data, status){
			if(data==0){
				$('#message').text('Có trường nhập rỗng');
			}
			else if(data==1){
				$('#message').text('Username đã có');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function userBan($ele,$username){
	userStatusEle=$('*[name="sts-'+$username+'"]');
	userStatusContent=userStatusEle.text();
	userStatusBut=$('*[name="ban-'+$username+'"]');
	userStatusEle.toggleClass('text-danger');
	userStatusBut.toggleClass('btn-danger btn-success');
	if(userStatusContent.search('Hoạt động')!=-1){
		userStatusEle.text('Bị khóa');
		userStatusBut.text('Mở khóa');
	}
	else{	
		userStatusEle.text('Hoạt động');
		userStatusBut.text('Cấm');
	}
	$.post('/admin/user',
		{
			ban:true,
			banUserName:$username
		},function(data, sts){
			console.log(data);
		}
		);
}
function userChange($username){
	var name, phone, email, type;
	name=$('input[name="name"]').val();
	phone=$('input[name="phone"]').val();
	email=$('input[name="email"]').val();
	type=$('input[name=type]:checked').val();
	$.post('/admin/user',
		{
			change:true,
			username:$username,
			name:name, 
			phone:phone, 
			email:email, 
			type:type
		},function(data, status){
			if(data==0){
				$('#message').text('Có trường nhập rỗng');
			}
			else if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function addProduct(){
	var title, price, quantity,promotion, catalog,descr,files;
	title=$('input[name="title"]').val();
	price=$('input[name="price"]').val();
	quantity=$('input[name="quan"]').val();
	promotion=$('input[name="prom"]').val();
	catalog=$('*[name="catalog"]').val();
	descr=$('.ck-content').html();;
	files= $('input[name="picture"]');
	var form_data = new FormData();
	form_data.append("add", true);
	form_data.append("title", title);
	form_data.append("price", price);
	form_data.append("quantity", quantity);
	form_data.append("promotion", promotion);
	form_data.append("catalog", catalog);
	form_data.append("descr", descr);
	var num=0;		
	files.each(function(){
		form_data.append("pic"+num, this.files[0]);
		num++;
		}
		);
	$.ajax({
      type: "POST",
      data: form_data,
      url: "/admin/products",
      contentType: false,
      processData: false,
      headers: { "X-CSRF-Token": $("meta[name='csrf-token']").attr("content") },
      success: function (data) {
        if(data==0){
			$('#message').text('Có trường nhập rỗng');
		}
		else if(data==2){
			$('#message').text('Thành công, reload sau 2 giây');
			setTimeout(function(){
					location.reload();
				},2000);
		}
      },
      error: function (data) {
        console.log(data);
      }
    });
}
function productChange($id){
	var title, price, quantity, promotion, descri;
	title=$('input[name="title"]').val();
	price=$('input[name="price"]').val();
	quantity=$('input[name="quantity"]').val();
	promotion=$('input[name="promotion"]').val();
	descri=$('.ck-content').html();;
	$.post('/admin/products',
		{
			change:true,
			id:$id,
			title:title, 
			price:price, 
			quantity:quantity, 
			promotion:promotion,
			descri:descri
		},function(data, status){
			console.log(data);
			if(data==0){
				$('#message').text('Có trường nhập rỗng');
			}
			else if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function productDelete($id){
	$.post('/admin/products',
		{
			delete:true,
			id:$id
		},function(data, status){
			console.log(data);
			if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function orderDeny($button,$id){
	status=$('#sts-'+$id).text();
	$.post('/admin/orders',
		{
			deny:true,
			id:$id,
			status:status
		},function(data, status){
			console.log(data);
			if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$button.remove();
				document.getElementById('change'+$id).remove();
				status=$('#sts-'+$id).html('<span class="text-danger">Đã hủy</span>');
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function orderChangeSts($button,$id,$sts){
	status=$('#sts-'+$id).text();
	$.post('/admin/orders',
		{
			changeSts:true,
			id:$id,
			status:$sts
		},function(data, status){
			console.log(data);
			if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				if($sts==1){
					$button.innerHTML='Vận chuyển';
					$button.setAttribute('onclick','orderChangeSts(this,'+$id+','+($sts+1)+')');
					status=$('#sts-'+$id).text('Đang đóng gói');
				}	
				else if($sts==2){
					$button.innerHTML='Xác nhận đến kho';
					$button.setAttribute('onclick','orderChangeSts(this,'+$id+','+($sts+1)+')');
					status=$('#sts-'+$id).text('Đang vận chuyển');
				}	
				else if($sts==3){
					$button.innerHTML='Đã giao';
					$button.setAttribute('onclick','orderChangeSts(this,'+$id+','+($sts+1)+')');
					status=$('#sts-'+$id).text('Đang giao hàng');
				}	
				else if($sts==4){
					$button.remove();
					status=$('#sts-'+$id).html('<span class="text-success">Đã giao hàng</span>');
				}	
			}
	});
}
function editorChange($id){
	ClassicEditor
		.create( document.querySelector( '#'+$id+'' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
}
function postAdd(){
	var title, priority, content;
	title=$('#title').val();
	priority=$('#priority').val();
	content=$('.ck-content').html();
	$.post('/admin/posts',
		{
			add:true,
			title:title,
			priority:priority, 
			content:content
		},function(data, status){
            if(data!=2){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function postChange($id){
	var title, priority, content;
	title=$('#title').val();
	priority=$('#priority').val();
	content=$('.ck-content').html();
	$.post('/admin/posts',
		{
			change:true,
			id:$id,
			title:title,
			priority:priority, 
			content:content
		},function(data, status){
			if(data==0){
				$('#message').text('Có trường nhập rỗng');
			}
			else if(data==1){
				$('#message').text('Username đã có');
			}
			else if(data==2){
				$('#message').text('Thành công, reload sau 2 giây');
				setTimeout(function(){
						location.reload();
					},2000);
			}
	});
}
function postChangeSts($button,$id){
	var sts, status;
	sts=$('#sts-'+$id).text();
	if(sts.match("Đang hiển thị")) status=1;
	else status=0;
	$.post('/admin/posts',
		{
			changeSts:true,
			id:$id,
			status:status
		},function(data, stat){
			if(data==1){
				$('#message').text('Có lỗi xảy ra');
			}
			else if(data==2){
				$button.classList.toggle('btn-danger');
				$button.classList.toggle('btn-success');
				if(status==0){
					console.log('hao');
					$button.innerHTML='Dừng';
					status=$('#sts-'+$id).html('Đang hiển thị');
				}	
				else if(status==1){
					$button.innerHTML='Hiển thị';
					status=$('#sts-'+$id).html('<span class="text-danger">Dừng hiển thị</span>');
				}		
			}
	});
}
function resourceDetail($link,$type){
	hideModalSubmit();
	changeModalSubmit('resourceSubmit', $link);
	$.get('/admin/resource?detail=true&link='+$link+'&type='+$type,function(data, status){
		changeModalHead($link);
		console.log(data);
		changeModalBody(data);
		if($type=='html'){
			editorChange('descri');
		}
		
	});
}