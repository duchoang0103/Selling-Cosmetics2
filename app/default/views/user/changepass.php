<!DOCTYPE html>    
</body>
</html>
<html>
<head>
  <title>Quên mật khẩu</title>
    <link href="/public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/default/js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/admin/css/admin.css">
    <script src="/public/admin/js/const.js"></script>
    <script src="/public/admin/js/hao.js"></script>
    
    <!--Fontawesome CDN-->

  <!--Custom styles-->
</head>
<body>
        <div class="container">
            <form class="card p-5 m-5 mx-auto bg-light" style="width: 600px;" >
                <div class="text-center">
                  <a href="/">
                    <p class="d-inline-block text-success  my-3 text-center h-100" style="font-size:25px;">
                        <b><span class="h1 text-danger">W</span>EB <span class="h1 text-danger">A</span>SSIGNMENT</b>
                    </p>
                    </a>
                </div>
                <div class="title text-center">
                    <h1>Đổi mật khẩu</h1>
                </div>
                <div class="row mx-5 p-5">
                    <div><b>Bạn là: </b><?php echo $this->username; ?></div>
                    <div><b>Tài khoản: </b><?php echo $this->user; ?></div>
                </div>
                <div class="form-group">
                    <span class="form-alert text-danger float-right"></span>
                    <input type="password" class="form-control" id="npass" name="npass" placeholder="Mật khẩu mới" required>
                </div><br>
                <div class="form-group">
                    <span class="form-alert text-danger float-right"></span>
                    <input type="password" class="form-control" id="nnpass" name="nnpass" placeholder="Nhập lại mật khẩu mới" required>
                </div><br>
                <div class="form-check" style="margin-top: 10px;">
                        <p class="text-danger" id="message"></p>
                </div>
                <div class="d-grid">
                    <button type="button" id='submit' class="btn btn-primary btn-block m-2" style="font-weight: bold;" onclick="changePass()">Đổi mật khẩu</button>
                </div>
                <div class=" text-center mt-3 text-bold">
                    <a href="/login">Đăng nhập</a><br>
                    <a href="/">Về trang chủ</a>
                </div>
            </form>
        </div>
</body>
</html>