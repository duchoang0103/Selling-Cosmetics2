
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

/* .ro{
  
  display:flex;
  
}
.ro > div {
  
  margin: 10px;
  padding: 50px;
} */


    </style>

   
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
            
            
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">
                <!-- List feedback -->
                <div class="container h-100 overflow-scroll">
				<table id='table' class="table table-hover">
				<thead style="position: sticky;top: 0;" class="bg-white">
					<tr>
						<!-- <th style="width: 5%">ID</th> -->
						<th style="width: 20%">Tên người dùng</th>
						<th style="width: 10%">Tên tài khoản</th>
						<th style="width: 10%">Số điện thoại</th>
						<th style="width: 30%">Email</th>
						
						
					</tr>
				</thead>
				<tbody>
				<!-- List feedback -->
				<?php foreach ($this->list as $feedback){ ?>
					
				<tr>
					<td><?php echo $feedback['productname']; ?></td>
					<td><?php echo $feedback['productid']; ?></td>
					<td><?php echo $feedback['username']; ?></td>
					<td><?php echo $feedback['comment']; ?></td>
					<td><?php echo $feedback['star']; ?></td>

         

					
				</tr>
				<?php } ?>
				<!-- End List feedback -->
				</tbody>
			</table>
                 <!-- <img src="/public/images/cmt/cmt1.jpeg" class="img-fluid" alt="Sample image" height = "60px"> -->
                

              </div>
              
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