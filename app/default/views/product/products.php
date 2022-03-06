<div class="container mt-2">
            <!-- Selector for sort -->
            <label for="sortSelector">Sắp xếp theo</label>
            <select id="sortSelector" onchange="sortBy();" class="form-control mb-3" style="width:20%">
                <option selected value="0">---</option>
                <option value="1">Giá thấp nhất</option>
                <option value="2">Giá cao nhất</option>
            </select>

            <div class="row">
                <h2 class="mx-auto" id="catalogProducts"><?php echo $this->catalogProducts ?></h2>
            </div>
            <hr class="mt-1 mb-5" style="background-color:gray; height:5px" >
            
            <div class="row mt-1">
            <?php
                foreach ($this->lstProducts as $product) {
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
                                onclick="addToCart(<?php echo $product['productid'];?>,'<?php echo $product['title'];?>',<?php echo $price;?>,<?php echo $this->info; ?>)">
                            <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <span class="fa fa-star checked_rating"></span>
                        <span class="fa fa-star checked_rating"></span>
                        <span class="fa fa-star checked_rating"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>

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