<?php
    include "app/default/views/component/header.php";
?>

<div class="container mybody">
    <?php
        include "app/default/views/component/slider.php";
    ?>
    
    <!-- Sản phẩm bán chạy -->
    <div class="row mt-5">
        <h2 class="mx-auto">Sản phẩm bán chạy</h2>
    </div>
    <hr class="mt-1 mb-5">

    <div class="row mt-1">
        <?php 
            foreach($this->bestSellingProducts as $product){
                if($product['promotion'] == 0){
                    $price = $product['price'];
                }else{
                    $price = $product['price'] - round($product['promotion'] / 100 * $product['price'], -3) ;
                }
        ?>
        <!-- frame for 1 product -->
        <div class="mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
            <div class="product-top">
                <img width="100%" height="300px" src="./public/images/products/<?php echo $product['productid'];?>p0.png">
                <div class="overlay">
                    <a href="/product-detail?id_of_product=<?php echo $product['productid'];?>"><button type="button" class="btn btn-secondary" title="Xem sản phẩm"><i class="fa fa-eye"></i></button></a>
                    <button type="button" class="btn btn-secondary" title="Thêm vào giỏ hàng" 
                        onclick="addToCart(<?php echo $product['productid'];?>,'<?php echo $product['title'];?>',<?php echo $price;?>, <?php echo $this->info;?>)">
                    <i class="fa fa-shopping-cart"></i></button>
                </div>
            </div>
            <div class="product-bottom text-center">
                <a href="/product-detail?id_of_product=<?php echo $product['productid'];?>">
                    <h3 id="product-title"><?php echo $product['title']; ?></h3>
                </a>

                <?php if($product['promotion'] == 0){
                    echo '<h4 class="text-danger">'.number_format($price)." đ" ."</h4>";
                    }else{
                        echo '<s class="text-secondary pr-3">'.'<small>'.number_format($product['price'])." đ".'</small>'.'</s>'.
                        '<h4 class="text-danger">'.number_format($price)." đ" ."</h4>";
                    } 
                ?>
                <?php if($product['quantity'] == 0){
                    echo '<span style="color: red">Hết hàng</span>';
                }else{
                    echo '<span style="color: gray">Còn hàng</span>'; 
                }
                ?>
            </div>
        </div>

        <?php 
            }
        ?>
    </div>


    <!-- Xem gần đây -->
    <div class="row mt-5">
        <h2 class="mx-auto">Xem gần đây</h2>
    </div>
    <hr class="mt-1 mb-5">

    <div class="row mt-1">
        <div class="recently-seen-pro-wrraper col-12">
            <?php 
                foreach($this->recentlySeenProducts as $product){
                    if($product['promotion'] == 0){
                        $price = $product['price'];
                    }else{
                        $price = $product['price'] - round($product['promotion'] / 100 * $product['price'], -3) ;
                    }
            ?>
            <!-- frame for 1 product -->
            <div class="mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product-top">
                    <img width="100%" height="300px" src="./public/images/products/<?php echo $product['productid'];?>p0.png">
                    <div class="overlay">
                        <a href="/product-detail?id_of_product=<?php echo $product['productid'];?>"><button type="button" class="btn btn-secondary" title="Xem sản phẩm"><i class="fa fa-eye"></i></button></a>
                        <button type="button" class="btn btn-secondary" title="Thêm vào giỏ hàng" 
                            onclick="addToCart(<?php echo $product['productid'];?>,'<?php echo $product['title'];?>',<?php echo $price;?>,<?php echo $this->info ?>)">
                        <i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <a href="/product-detail?id_of_product=<?php echo $product['productid'];?>">
                        <h3 id="product-title"><?php echo $product['title']; ?></h3>
                    </a>

                    <?php if($product['promotion'] == 0){
                        echo '<h4 class="text-danger">'.number_format($price)." đ" ."</h4>";
                        }else{
                            echo '<s class="text-secondary pr-3">'.'<small>'.number_format($product['price'])." đ".'</small>'.'</s>'.
                            '<h4 class="text-danger">'.number_format($price)." đ" ."</h4>";
                        } 
                    ?>
                    <?php if($product['quantity'] == 0){
                        echo '<span style="color: red">Hết hàng</span>';
                    }else{
                        echo '<span style="color: gray">Còn hàng</span>'; 
                    }
                    ?>
                </div>
            </div>

            <?php 
                }
            ?>

        </div>
    </div>
</div>

<?php
    include "app/default/views/component/footer.php";
?>