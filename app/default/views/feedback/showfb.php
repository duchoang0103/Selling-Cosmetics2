
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./public/default/fontawesome5/css/fontawesome.css" rel="stylesheet">
    <link href="./public/default/fontawesome5/css/solid.css" rel="stylesheet">
    <link href="/public/default/css/bootstrap-rating.css" rel="stylesheet">
    <script type="text/javascript" src="/public/default/js/bootstrap-rating.js"></script>
    <style>
      div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}



    </style>

   
</head>
<body >
<section style="background-color: #eee; height:50vh;">
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100" style="overflow-y:auto;overflow-x:auto;">
      <div class="col-lg-12 col-xl-11"  >
        <!-- <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5"> -->
            <!-- <div class="row justify-content-center">
            
            
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
                
                <div class="container h-100 overflow-scroll"> -->
				
				
						<!-- <th style="width: 5%">ID</th> -->
						
						
						
					
				
				<!-- List feedback -->
				<?php foreach ($this->list as $feedback){ ?>
					
				
					<div> <span style=" font-weight: bold;">Người dùng: </span> <?php echo $feedback['username']; ?></div>
          <div> <span style=" font-weight: bold;">Vote: </span> <?php 
            // $star = round($this->product['star']);
            for ($i = 0 ; $i <  $feedback['star']; $i++){
                echo '<span class="fa fa-star checked_rating"></span>';
            }
            for ($i = 0 ; $i < 5 - $feedback['star'] ; $i++){
                echo '<span class="fa fa-star"></span>';
            }
            ?></div>
          <div> <span style=" font-weight: bold;">Đánh giá: </span> <?php echo $feedback['comment']; ?></div>
          <br>
          <div> <img style="width:30%!important;" src="../public/images/feedback/<?php echo $feedback['feedbackid'].'.'.'png';?>" onerror="this.style.display='none'"> </div>
          <hr style="align =center ;size=3; width=50px; noshade">

				<?php } ?>
				<!-- End List feedback -->
				
			
                 <!-- <img src="/public/images/cmt/cmt1.jpeg" class="img-fluid" alt="Sample image" height = "60px"> -->
                

              <!-- </div>
              
            </div>
          </div> -->
        <!-- </div>
      </div> -->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</section>
</body>
</html>