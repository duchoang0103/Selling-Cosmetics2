<!DOCTYPE html>
<?php 
    $cookie = isset($_COOKIE["seen_recently"]) ? $_COOKIE["seen_recently"] : '';
    $cookie .= strval($this->product['productid']) . ',';
    setcookie("seen_recently", $cookie, time() + 86400);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?php  echo $this->title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <li class="nav-item"><a class="nav-link" href="/"><span class="fa fa-home"></span>Trang ch???</a></li>
                        <li class="nav-item"><a class="nav-link" href="/intro">Gi???i thi???u</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="/products">S???n ph???m</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/products" id="navbarDropdown" role="button" data-toggle="dropdown">
                                S???n ph???m</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="/products?catalog=T???t c??? s???n ph???m" class="dropdown-item">T???t c??? s???n ph???m</a>
                                <a href="/products?catalog=K??? m??y" class="dropdown-item">K??? m??y</a>
                                <a href="/products?catalog=Kem ch???ng n???ng" class="dropdown-item">Kem ch???ng n???ng</a>
                                <a href="/products?catalog=Kem d?????ng ???m" class="dropdown-item">Kem d?????ng ???m</a>
                                <a href="/products?catalog=Kem l??t" class="dropdown-item">Kem l??t</a>
                                <a href="/products?catalog=Kem n???n" class="dropdown-item">Kem n???n</a>
                                <a href="/products?catalog=Kem trang ??i???m" class="dropdown-item">Kem trang ??i???m</a>
                                <a href="/products?catalog=Mascara" class="dropdown-item">Mascara</a>
                                <a href="/products?catalog=N?????c t???y trang" class="dropdown-item">N?????c t???y trang</a>
                                <a href="/products?catalog=Ph???n m??" class="dropdown-item">Ph???n m??</a>
                                <a href="/products?catalog=Ph???n ph???" class="dropdown-item">Ph???n ph???</a>
                                <a href="/products?catalog=Son m??i" class="dropdown-item">Son m??i</a>
                                <a href="/products?catalog=S???a r???a m???t" class="dropdown-item">S???a r???a m???t</a>
                                <a href="/products?catalog=T???y da ch???t" class="dropdown-item">T???y da ch???t</a>
                                <a href="/products?catalog=Toner" class="dropdown-item">Toner</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/news">Tin t???c</a></li>
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
                                    Li??n h???
                            </a>
                        </li>
                        <?php if(!isset($_SESSION['user'])){ ?>
                        <li class="nav-item">
                            <span>
                                <a class="nav-link px-0" href="/login">????ng nh???p</a>
                                <i style="color:var(--color2)">/</i><a class="nav-link px-0" href="/register">????ng k??</a>
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
                                    Gi??? h??ng
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link dropdown-toggle" href="/products" id="user" role="button" data-toggle="dropdown">
                                <?php echo $_SESSION['user']['name'];?>
                                <i class='fas fa-user-alt' style="margin-left:5px;color:var(--color2)"></i>
                            </a>
                            
                            <div class="dropdown-menu mx-lg-5" aria-labelledby="user" style="position: absolute;right: 0px;">
                                <a href="/userinfo" class="dropdown-item">Th??ng tin ng?????i d??ng</a>
                                <a href="/saleorder" class="dropdown-item">????n h??ng ???? mua</a>
                                <a href="/logout" class="dropdown-item">????ng xu???t</a>
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

<section class="container mybody">
    <div class="row mt-2">
        <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-1" id="main-img" src="./public/images/products/<?php echo $this->product['picture'][0] ?>">
            
            <div class="d-flex flex-row">
                <?php
                    foreach ($this->product['picture'] as $pic) {
                ?>
                    <div class="mr-1 pe-auto">
                        <img class="small-img" src="./public/images/products/<?php echo $pic ?>" width="100%" height="100px" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
            <h5><?php echo $this->product['title'] ;?></h5>
            <?php if($this->product['promotion'] == 0){
                $price = $this->product['price'];
                echo '<h4 class="text-danger" >'.number_format($price)." ??" ."</h4>";
            }else{
                $price = $this->product['price'] - round($this->product['promotion'] / 100 * $this->product['price'], -3) ;
                echo 
                '<s class="text-secondary pr-3">'.'<small>'.number_format($this->product['price'])." ??".'</small>'.'</s>'.
                '<h4 class="text-danger" >'.number_format($price)." ??" ."</h4>";
            } 
            ?>
            
            <div class="form-inline">
                <input class="form-control w-25 mr-5" type="number" value="1" id="quantity">
                <button class="btn btn-primary" 
                    onclick="addToCartInDetail(<?php echo $this->product['productid']?>,'<?php echo $this->product['title'];?>',<?php echo $price;?>,<?php echo $this->info; ?>)">
                    Th??m v??o gi??? h??ng
                </button>
            </div>
            
            <p class="mt-5"><?php echo $this->product['descri'] ;?></p>
        </div>
    </div>
    <h4 class="mt-5 ml-3">????nh gi??</h4>
    <div class="ml-3">
    <?php 
        $star = round($this->product['star']);
        for ($i = 0 ; $i <  $star; $i++){
            echo '<span class="fa fa-star checked_rating"></span>';
        }
        for ($i = 0 ; $i < 5 - $star ; $i++){
            echo '<span class="fa fa-star"></span>';
        }
    ?>
    </div>
    
    <h4 class="mt-3 ml-3">B??nh lu???n</h4>
    <div class="comments"></div>
</section>

<script>
    $(".small-img").each(function(index){
        console.log($(this).attr('src'));
        $(this).click(function(){
            $("#main-img").attr("src",$(this).attr('src'));
        });
    });

    $.get('/payment?productid=<?php echo $this->product['productid']?>', function(data){
        $('.comments').html(data);
    })

    function addToCartInDetail(productid, product_title, product_price,verify){
        if(verify == null){
            alert("B???n ph???i ????ng nh???p!");
        }else{
            let data = new Object();
            data.product_id = productid;
            data.product_title = product_title;
            data.quantity = $('#quantity').val();
            data.price = Number(product_price);
            //console.log(data);
            $.post('/cart',{product:JSON.stringify(data),addProduct:true},function(data){
                alert(data);
            });
        }
        
    }
</script>



<?php
    include "app/default/views/component/footer.php";
?>