<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./public/default/fontawesome5/css/fontawesome.css" rel="stylesheet">
    <link href="./public/default/fontawesome5/css/solid.css" rel="stylesheet">
    <link href="/public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/default/js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/admin/css/admin.css">
</head>
<body style="background-color: #7A7">
<section class="vh-100" style="background-image: url('public/images/background-reg.png');background-attachment: fixed;">
  <div class="container h-100 ">
    <div class="row  h-100 col-8 mx-auto">
      <div class="col-12 mt-5 mb-4">
        <div class="card text-black mb-5" style="border-radius: 25px;">
          <div class="card-body">
            <div class="row ">
              <div class="col-10 mx-auto">
                <div class="text-center">
                  <a href="/">
                    <p class="d-inline-block text-success  my-3 text-center h-100" style="font-size:25px;">
                        <b><span class="h1 text-danger">W</span>EB <span class="h1 text-danger">A</span>SSIGNMENT</b>
                    </p>
                    </a>
                </div>

                <p class="text-center h3 fw-bold mb-2 mx-1 mx-md-4 mt-4">Đăng ký</p>

                <div class=" text-center mb-3 text-bold">
                   Đã có tài khoản?<a href="/login">Đăng nhập</a><br>
                </div>
                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="name" class="form-control"  name="reg[name]" placeHolder="Nhập họ và tên" required />
                      <label class="form-label" for="name" >Họ và tên</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center " style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->nameError) ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-envelope fa-lg fa-fw fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" class="form-control" name="reg[email]" placeHolder="Nhập email" required />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4" style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->emailError) ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-user fa-lg fa-fw fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="username" class="form-control" name="reg[username]" placeHolder="Nhập tên đăng nhập" required />
                      <label class="form-label" for="username">Tên đăng nhập</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4" style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->userNameError) ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-phone fa-lg fa-fw fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="phone" class="form-control" name="reg[phone]" placeHolder="Nhập số điện thoại" required  />
                      <label class="form-label" for="phone">Số điện thoại</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4" style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->phoneError) ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-lock fa-lg  fa-fw fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="psw" class="form-control" name="reg[psw]" placeHolder="Nhập mật khẩu" required  />
                      <label class="form-label" for="psw">Mật khẩu</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4" style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->pswError) ?>
                    </div> 
                  </div>

                  <div class="d-flex flex-row align-items-center">
                    <i class="fas fa-key fa-lg  fa-fw fa-fw mb-4 pb-2"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="repeatPsw" class="form-control" name="reg[repeatPsw]" placeHolder="Nhập lại mật khẩu" required  />
                      <label class="form-label" for="repeatPsw">Nhập lại mật khẩu</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4" style="color:red;">
                    <div class="col-md-auto ms-4 ps-1">
                      <?php echo($this->repeatPswError) ?>
                    </div> 
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-success btn-lg">Đăng kí</button>
                  </div>

                </form>

              </div>
              <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</section>
</body>
</html>