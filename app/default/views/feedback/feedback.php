
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
<section class="vh-100" style="background-image: url('public/images/image_news_1.jpg');background-attachment: fixed;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="background-color:#ddd0d0 ;border-radius: 25px; height: 592px;width: 1102px; ">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
            
            
            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-2 order-lg-1">

                  <img style="width: 80%!important; border: 10px dashed  #044a2a; " src="../public/images/products/<?php echo $this->list.'p0'.'.'.'png';?>">
                
              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 order-1 order-lg-2">

                <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4" style=" font-size:30px;font-family: Comic Sans MS; color:green;">Đánh giá sản phẩm</p>
                
                
               

                <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">
                    
              

                  <div class="d-flex flex-row align-items-center mb-4">
                  	<div class="form-outline flex-fill mb-0">

                      <input class="star star-5" value ="5" id="star-5" type="radio" name="rate[s5]"/>
                      <label class="star star-5"  for="star-5"></label>
                      <input class="star star-4" value ="4" id="star-4" type="radio" name="rate[s4]"/>
                      <label class="star star-4"  for="star-4"></label>
                      <input class="star star-3" value ="3" id="star-3" type="radio" name="rate[s3]"/>
                      <label class="star star-3"  for="star-3"></label>
                      <input class="star star-2" value ="2" id="star-2" type="radio" name="rate[s2]"/>
                      <label class="star star-2"  for="star-2"></label>
                      <input class="star star-1" value ="1" id="star-1" type="radio" name="rate[s1]"/>
                      <label class="star star-1"  for="star-1"></label>
                      <label style=" font-family: Comic Sans MS;font-style: italic;margin-top: 25px; font-size: 25px;" >Vote: </label>
                      
                    
                          <!-- <select name = "rate" class="form-select" aria-label="Default select example">
                          <option selected value="5">Đánh giá số sao</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>  -->
               
                        </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                  	<div class="form-outline flex-fill mb-0">
                        <textarea style="border: 2px solid red;" name="feedcmt" id="comment"  cols="30" rows="5" class="form-control" placeHolder="Bình luận sản phẩm" style="background-color: white;" required></textarea>
                       
                        </div>
                  </div>

                  <br>  
                  <div class="ro">
                    <div style= "float:left; font-family: Comic Sans MS;">Thêm hình ảnh:    </div>
                    <div style= "float:left;margin-left: 15px;"> <input style= " width : 250px;" type="file" name="myFile"> </div>
                    <!-- <input type="file" name="proImg[]"> -->
                    
                    <!-- <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit"> -->
                  
                  </div>
                  <br>
                  <br>
                  <br>
                

                  
                  
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" >Gửi đánh giá</button>
                    &emsp;&emsp;
                    <a href="/"><button class="btn btn-primary btn-lg" type="button">Trang chủ</button></a>

                  </div>

                </form>

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