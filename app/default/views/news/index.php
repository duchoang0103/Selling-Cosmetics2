<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
    include "app/default/views/component/header.php";
?>
<section class="col-10 mx-auto my-0 p-0" style="min-height:100vh!important;" id="content">
    <div class="h-100 py-2" style="background-color:rgba(255,255,255,0.8);min-height:100vh!important;width:100%;">
        <div class="row" style="width:100%;">
            <div class="col-6 px-0 ms-4 me-2 mt-3 p-4 rounded-3 border border-success" style="background-image: url('public/images/news1_bg.jpg');background-repeat: no-repeat;background-size: cover;">
                <h2 style="cursor:pointer" onclick="loadPostContent(<?php echo($this->news_1['postid']); ?>)">
                    <strong style="color:var(--color1)"><?php echo($this->news_1["title"]); ?></strong>
                </h2>
                <p class="text-muted"><i>Ngày tạo:<?php echo($this->news_1["datecreated"]); ?></i></p>
            </div>
            <div class="col-5 px-0 ms-4">
                <?php
                if($this->news_2 != null){
                if(count($this->news_2) >0){
                    foreach($this->news_2 as &$news){
                        echo("
                            <div class='row my-2 py-2 bg-white border rounded-3'>
                                <h4 style='cursor:pointer;color:var(--color1)' onclick='loadPostContent(".$news["postid"].")'>".$news["title"]."</h4>
                                <span class='text-muted'><i>Ngày tạo: ".$news["datecreated"]."</i></span>
                            </div>
                        ");
                    }
                }
                }
                ?>
            </div>
        </div>
        <?php
            if($this->news_3 !== null){
            if(count($this->news_3) >0){
                foreach($this->news_3 as &$news){
                    echo("
                    <div class='row m-3 py-2 bg-white border rounded-3' style='background-color:white;'>
                        <div class='col-6 my-2 ml-4 '>
                            <h4 style='cursor:pointer' onclick='loadPostContent(".$news["postid"].")'>".$news["title"]."</h4>
                            <span class='text-muted'><i>Ngày tạo: ".$news["datecreated"]."</i></span>
                        </div>
                        <div class='col-4'>
                        </div>
                    </div>
                    ");
                }
            }
        }
        ?>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function loadPostContent(post_id){
        $.get(`news?post_id=${post_id}`,function(data){
            $('#content').html(data)
        })
    }
</script>
</body>
</html>
<?php
    include "app/default/views/component/footer.php";
?>