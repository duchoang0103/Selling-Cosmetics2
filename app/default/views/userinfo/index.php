
<?php
    include "app/default/views/component/header.php";
    
?>
<style>
:focus {outline: none;}
 

 
label, input[type="submit"] {
  display: inline-block;
}
 

 
input:focus:invalid {
  box-shadow: 0 0 5px #d45252;
  border-color: #b03535;
}
 
input:focus:valid {
  box-shadow: 0 0 5px #5cd053;
  border-color: #28921f;
}
</style>
<section class="mh-100 py-5" style="background-image: url('public/images/background-reg1.png');background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
          <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4" style=" font-size:40px;font-family: Comic Sans MS; color:green;">Thông tin của người dùng</p>
            <div class="row justify-content-center">
            
            
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
              
                <!-- List feedback -->
                <div class="container h-100 overflow-scroll">
				
						<!-- <th style="width: 5%">ID</th> -->
            <div>
						<span style=" font-size:20px;font-family: Comic Sans MS;">Tên tài khoản: 	
              <span style=" font-size:20px;font-family: Comic Sans MS; color:green;"><?php echo $this->list['username']; ?>
              </span>
</span>
</div>
<div>
            <span style="font-size:20px;font-family: Comic Sans MS;">Tên người dùng: 	
              <span style=" font-size:20px;font-family: Comic Sans MS; color:green;"><?php echo $this->list['name']; ?>
              </span>
</span>
</div>
<div style="width:500px;overflow:auto; word-wrap: normal ">
            <span style=" font-size:20px;font-family: Comic Sans MS;">Email: 	
              <span style=" font-size:20px;font-family: Comic Sans MS; color:green;"><?php echo $this->list['email']; ?>
              </span>
</span>
</div>

<div>
  <br>
  <br>
  <p style=" font-size:20px;font-family: Comic Sans MS;">Thay đổi thông tin người dùng: </p>
  <form  id="content" style="display:none" method="post" enctype="multipart/form-data">
  <!-- <label for="fname">Tên tài khoản:</label><br>
  <input type="text" id="fname" name="uname" class="name" placeholder="Username" pattern="^[a-zA-Z0-9]+$" required /><br> -->
  <label for="lname" style=" font-size:15px;font-family: Comic Sans MS;">Tên người dùng:</label><br>
  <input style="width:300px" type="text" id="lname" name="name" class="name" placeholder="Laptrinhweb" pattern="^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$" required /><br>
  <label for="lname" style=" font-size:15px;font-family: Comic Sans MS;">email:</label><br>
  <input style="width:300px" type="text" id="mname" name="mail" class="mail" placeholder="csek18@gmail.com" pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" required /><br><br>
  <input type="submit" value="Xác nhận thay đổi">
  <br>
  <br>
</form> </div>
<input type="button" id="btn2" value="Thay đổi thông tin"/>

        <script language="javascript">

            

            document.getElementById("btn2").onclick = function () {
                document.getElementById("content").style.display = 'block';
                document.getElementById("btn2").style.display = 'none';
            };

        </script>
						


                 <!-- <img src="/public/images/cmt/cmt1.jpeg" class="img-fluid" alt="Sample image" height = "60px"> -->
                

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</section>
<?php
    include "app/default/views/component/footer.php";
?>