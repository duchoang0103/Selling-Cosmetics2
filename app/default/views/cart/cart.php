<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($this->title); ?></title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./public/default/css/style.css">
    <link rel="stylesheet" href="./public/default/css/dao/sidebar.css">
   
</head>
<body>
<?php
    include "app/default/views/component/header.php";
?>
<div class="container-fluid py-5 my-5" style="background-color:rgba(255,255,255,0.6);">
<div class="row mx-auto" style="background-color:rgba(255,255,255); width: 90%;border-radius: 5px;min-height: 50vh;">

<div class="col-12">
    <div class="row">
        <div class="col-md-8">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <span class="h1" style="color:var(--color1);">Giỏ hàng</span>
                    </div>
                </div>
            </div>
            <?php
            foreach($this->items as &$item){
            echo("<div class='row border m-2 p-2 d-flex align-items-center' style='border-radius:4px;background-color:#eee;'>
                    <div class='col-4 ml-3 py-1'>
                        <div class='row'>".$item['title']."</div>   
                    </div>
                    <div class='col-2'><input style='width:100%' id='quantity-".$item['productid']."' type='number' value='".$item['quantity']."' onchange='updateItem(".$item['productid'].")'></div>
                    <div class='col-3 d-flex justify-content-end mx-2 px-0'>".number_format($item['price'])."&#8363;</div>
                    <div class='col-2 d-flex justify-content-end'><button class='btn btn-danger py-1'  onclick='removeItem(".$item['productid'].")'>Xóa</button></div>
                
            </div>");
            }
            ?>
           
        </div>
        <div class="text-white col-lg-4" >
            <div class="my-5 p-4" style="background-color:var(--color11);border-radius: 4px;">
                <div class="row" >
                    <div class="col-12">Số lượng <?php echo(count($this->items)) ?></div>
                    <div class="col-12">Thành tiền: <span id="total_item"><?php echo(number_format($this->totalPrice)) ?></span> </div>
                </div>
                <form>
                    <h5>Vận chuyển</h5> 
                    <select class="form-control" id="shipfee">
                        <option class="text-muted" value="<?php echo($this->priceOptions["normal"]); ?>">Vận chuyển thông thường - <?php echo(number_format($this->priceOptions["normal"])); ?>&#8363;</option>
                        <option class="text-muted" value="<?php echo($this->priceOptions["fast"]); ?>">Chuyển phát nhanh - <?php echo(number_format($this->priceOptions["fast"])); ?>&#8363;</option>
                    </select>
                    <h5>Địa chỉ</h5> <input class="form-control" id="delivery_address" placeholder="Nhập địa chỉ giao hàng">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                 
                </div> 
                <div class="row d-flex justify-content-center">
                    <button class="btn btn-light" onclick="onOrder()">ĐẶT HÀNG</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function removeItem($id){
        $.post('/cart',
        {
            remove: true,
            id: $id,
        },function(data){
            if(data == "Xóa thành công"){
                alert(data);
                setTimeout(()=>{
                    window.location.reload();
                },1000);
            }else{
                alert(data)
            }
            
        })
    }

    function updateItem(id){
        const quantity = $(`#quantity-${id}`).val();
        if(quantity == 0){
            alert("Vui lòng nhập số khác 0");
        }else{
            $.post('/cart',
            {
                updateQuantity: true,
                id: id,
                quantity: quantity,
            },function(data){
                if(data != "Cập nhật thất bại"){      
                    $("#total_item").text(data); 
                }else{
                    alert(data)
                }
            })
        }
        
    }

    function onOrder(){
        const address = $("#delivery_address").val().trim();
        const shipfee = $("#shipfee").val();
        if(address == ""){
            alert("Vui lòng nhập địa chỉ");
        }else{
            if(window.confirm("Bạn có chắc mình muốn đặt hàng?")){
                $.post('/cart',
            {
                makeOrder: true,
                address: address,
                shipfee: shipfee,
            },function(data){
                alert(data);
                setTimeout(()=>{
                    window.open(`/saleorder`,"_self");
                },1000);
            })
            }
        }
    }

</script>
    <script src="./public/default/js/jquery-3.6.0.js"></script>
</body>
</html>
<?php
    include "app/default/views/component/footer.php";
?>