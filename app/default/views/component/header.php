<?php 
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?php  echo $this->title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="./public/default/js/hoang.js"></script>
	<link rel="stylesheet" href="./public/default/css/style.css">
    <link rel="stylesheet" href="./public/default/css/style1.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
</head>
<body>
    <!-- header -->
<div style="position: -webkit-sticky; position: sticky;top: 0;z-index: 2000;"  class="container-fluid p-0">
    <div class="container-fluid mx-0 px-0 default-header d-inline-flex" >
        <div>
            <nav id="nav1" class="navbar navbar-expand-md  navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar"style="position: relative;top:-10px;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                      <a class="navbar-brand" href="/">
                        <p class="d-inline-block text-center h-100 mx-2" style="font-size:15px;color:var(--color2)">
                            <b><span class="h1 text-white">W</span>EB <span class="h1 text-white">A</span>SSIGNMENT</b>
                        </p>
                        </a>
                </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="/"><span class="fa fa-home"></span>Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="/intro">Giới thiệu</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="/products">Sản phẩm</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/products" id="navbarDropdown" role="button" data-toggle="dropdown">
                                Sản phẩm</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="/products?catalog=Tất cả sản phẩm" class="dropdown-item">Tất cả sản phẩm</a>
                                <a href="/products?catalog=Kẻ mày" class="dropdown-item">Kẻ mày</a>
                                <a href="/products?catalog=Kem chống nắng" class="dropdown-item">Kem chống nắng</a>
                                <a href="/products?catalog=Kem dưỡng ẩm" class="dropdown-item">Kem dưỡng ẩm</a>
                                <a href="/products?catalog=Kem lót" class="dropdown-item">Kem lót</a>
                                <a href="/products?catalog=Kem nền" class="dropdown-item">Kem nền</a>
                                <a href="/products?catalog=Kem trang điểm" class="dropdown-item">Kem trang điểm</a>
                                <a href="/products?catalog=Mascara" class="dropdown-item">Mascara</a>
                                <a href="/products?catalog=Nước tẩy trang" class="dropdown-item">Nước tẩy trang</a>
                                <a href="/products?catalog=Phấn má" class="dropdown-item">Phấn má</a>
                                <a href="/products?catalog=Phấn phủ" class="dropdown-item">Phấn phủ</a>
                                <a href="/products?catalog=Son môi" class="dropdown-item">Son môi</a>
                                <a href="/products?catalog=Sữa rửa mặt" class="dropdown-item">Sữa rửa mặt</a>
                                <a href="/products?catalog=Tẩy da chết" class="dropdown-item">Tẩy da chết</a>
                                <a href="/products?catalog=Toner" class="dropdown-item">Toner</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/news">Tin tức</a></li>
                    </ul>
                </div>
            </div>
            </nav>
        </div>

        <div class="flex-grow-1"></div>
        <div class="">
            <nav class="navbar navbar-expand-lg  navbar-dark h-100 my-auto container-fluid px-0">
                <div class="container-fluid d-inline-flex ps-0 justify-content-end">
                    <div class="navbar-header mx-2">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#subnav">
                            <span class="fas fa-user-alt"></span>
                        </button>
                    </div>
                <div class="collapse navbar-collapse" id="subnav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">
                               <img src="public/images/contact.svg" height="30px" alt="">
                                    Liên hệ
                            </a>
                        </li>
                        <?php if(!isset($_SESSION['user'])){ ?>
                        <li class="nav-item">
                            <span>
                                <a class="nav-link px-0" href="/login">Đăng nhập</a>
                                <i style="color:var(--color2)">/</i><a class="nav-link px-0" href="/register">Đăng ký</a>
                                <i class='fas fa-user-alt' style="margin-left:5px;color:var(--color2)"></i>
                            </span>
                        </li>
                        <?php 
                            }
                            else{
                            ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                               <img src="public/images/cart.svg" height="30px" alt="">
                                    Giỏ hàng
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link dropdown-toggle" href="/products" id="user" role="button" data-toggle="dropdown">
                                <?php echo $_SESSION['user']['name'];?>
                                <i class='fas fa-user-alt' style="margin-left:5px;color:var(--color2)"></i>
                            </a>
                            
                            <div class="dropdown-menu mx-lg-5" aria-labelledby="user" style="position: absolute;right: 0px;">
                                <a href="/userinfo" class="dropdown-item">Thông tin người dùng</a>
                                <a href="/saleorder" class="dropdown-item">Đơn hàng đã mua</a>
                                <a href="/logout" class="dropdown-item">Đăng xuất</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>              
                  </div>
                </div>
            </nav>
        </div>
     </div>
</div>
    <script>
        // $('.dropdown-item').click(function(e){
        //     e.preventDefault();
        //     console.log($(this).text());
        //     $.ajax({
        //         url: './products?catalog='+$(this).text(),
        //         type: "GET",
        //         // success: function (data){
        //         //     console.log(data);
        //         // }
        //     });
        // });
        // function chooseCatalog(catalog){
        //     $.get('./products?catalog='+catalog,);
        // }
    </script>
