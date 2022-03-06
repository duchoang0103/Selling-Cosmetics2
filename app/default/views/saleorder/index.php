<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($this->title); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/default/css/dao/sidebar.css">
</head>
<body>
<?php
    include "app/default/views/component/header.php";
?>
<div class="row">
    <div class="col-2" >
    <?php
        include "app/default/views/component/usersidebar.php";
    ?>
    </div>
    <div class="col-8 pt-3" style="background-color: rgba(0,0,0,0.3);min-height: 50vh;">
    <?php
    echo '<div class="h2">'.count($this->items).' đơn hàng đã đặt</div>';
    foreach($this->items as $key=>$item){
    echo("
        <div id='accordion".$item['orderid']."'>
        <div class='card my-3'>
          <div class='card-header' id='heading".$item['orderid']."'>
            <h5 class='mb-0'>
              <button class='btn text-success' data-toggle='collapse' data-target='#collapse".$item['orderid']."' aria-expanded='true' aria-controls='collapse".$item['orderid']."'>
                Đơn hàng #".$item['orderid']."
              </button>
            </h5>
          </div>
      
          <div id='collapse".$item['orderid']."' class='collapse ".($key == 0? "show":"")."' aria-labelledby='heading".$item['orderid']."' data-parent='#accordion".$item['orderid']."'>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-auto'>
                        Địa chỉ: ".$item['address']."
                    </div>
                    <div class='col-auto'>
                         Phí ship: ".number_format($item['shipfee'])."
                    </div>
                </div>
                <div class='row px-3'>
                    Tổng tiền: ".$item['total']."
                </div>
                <div class='row px-3'>
                    Trạng thái: ".$item['status_map']."
                </div>");
                if($item['status'] == 5){
                    echo("
                    <div class='row px-3'>
                        Lý do hủy đơn: ".$item['reason']."
                    </div>
                    ");
                }
                echo("
                <div class='row px-3'>
                    Chi tiết:
                </div>
                <table class='table'>
                    <thead>
                        <tr>
                       
                            <th scope='col'>Tên</th>
                            <th scope='col'>Số lượng</th>
                            <th scope='col'>Giá</th>
                            <th scope='col'>Thành tiền</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                    <tbody>");

                    foreach($item['items'] as &$subItem){
                        echo("
                        <tr >
                            <td class='align-middle'>".$subItem['name']."</td>
                            <td class='align-middle'>".$subItem['quantity']."</td>
                            <td class='align-middle'>".number_format($subItem['price'])."</td>
                            <td class='align-middle'>".number_format($subItem['price']*$subItem['quantity'])."</td>
                            <td class='align-middle'><button class='btn btn-info' onclick='showFeedback(".$subItem['productid'].",".$item['orderid'].")'>Đánh giá</button></td>
                        </tr>
                        ");
                    }
            echo("</tbody>
                </table>
            </div>
          </div>
      </div>
      </div>
        "
        );
    }
?>
    </div>
    <div class="col-2">

    </div>
</div>    

<script>
    function showFeedback(productid, orderid){
        window.open(`/feedback?productid=${productid}&orderid=${orderid}`, "_blank");
    }
</script>
</body>
</html>
<?php
    include "app/default/views/component/footer.php";
?>