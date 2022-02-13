<?php
include('dashborad_update/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

</head>
<body style="font-family: 'Prompt', sans-serif;">
  
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style=" background-color: #4C648A;">

        <div class="container-fluid">

                <a class="navbar-brand"  href="index.php">
                    <img src="img/Logo1.svg" alt="" width="55" height="auto" t class="d-inline-block align-top">
                    
                </a>         

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"  id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item" style= "border-radius: 0px; font-size:20px;">
                    <a class="nav-link " id="nav_home"  href="index.php">หน้าหลัก</a>
                </li>

                <li class="nav-item" style=" border-radius: 0px; font-size:20px ;">
                    <a class="nav-link " id="nav_recommend" href="recommend.php">ร้านค้าแนะนำ</a>
                </li>
                
                <li class="nav-item" style="   border-radius: 0px; font-size:20px ;">
                    <a class="nav-link" id="nav_activity" href="index.php#activity">กิจกรรม</a>
                </li>

                    
                </ul>
                <div class="form-group has-search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    <input type="text" id="nav_search" class="form-control" placeholder="ค้นหาชื่อร้าน">
                  </div>
                  &nbsp;&nbsp;

                  <a  href="index.php#activity"> <div style="color: white;">TH</div></a>&nbsp; 
                  <a  href="index.php#activity"><div style="color: white;">EN</div></a>
                
            </div>
        </div>
      </nav>
     <!-- หน้าเลื่อนสไลด์ -->
     <div class="container-fluid prleftprright">
      <br>
      <br>
      <br>
     <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
       <div class="carousel-indicators">
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
         <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
       </div>
       <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/Banner/Banner1.png" class="d-block w-100 h-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="img/Banner/Banner2.png" class="d-block w-100 h-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="img/Banner/Banner3.png" class="d-block w-100 h-100" alt="">
        </div>
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
       <br>
       </div>
     </div>
       
        <div class="container">
          <div class="row text-center">
            <div class="form-group has-search">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
              <input type="text" id="nav_search" class="form-control" placeholder="&nbsp;&nbsp;Search Restaurant, Food" style="height:45px ; border-radius:30px; background-color: #EBF1F5; " >
            </div>
          </div>
          <br>
          <div class="row text-center">
            <div class="col-xl-4 col-md-4 col-sm-12 p-2">
             <a href="food_all.php"><button type="button" id="shopfood" class="btn textstore w-100">ร้านอาหาร</button></a> 
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 p-2">
             <a href="drink_all.php"><button type="button" id="shopdrink" class="btn textstore w-100">ร้านของหวานและเครื่องดื่ม</button></a>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 p-2">
             <a href="etc_all.php"> <button type="button" id="shopother"class="btn textstore w-100">ร้านค้าเเละบริการอื่นๆ</button> </a>
            </div>
          </div>
<!-- ร้านค้าเเละบริการอื่นๆ -->
<br>
<br>
<div class="row mt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 mb-2 ">
        <h1 class="store-text" id="foodall">ร้านค้าเเละบริการอื่นๆทั้งหมด</h1>
      </div>

      <?php     
      echo "yessssssss";
      $fetchdata = new DB_con();
      $sql = $fetchdata->fetchdataetc();
      while ($row = mysqli_fetch_array($sql)) { echo no; ?>
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-6 mb-4">
          <div class="card" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['s_id']; ?>">
            <!-- <span class="shopping-mall-tag">
              recommend
            </span> -->
            <img class="img-fluid" src="img/food1.JPG" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-titleh col text-truncate"><?php echo $row['s_name']; ?></h5>
              <h5 class="crop-text-2 "><?php echo $row['s_detail']; ?></h5>
              <h5 class="card-title "><span id="card_tel">โทร</span> : <?php echo $row['s_phone']; ?></h5>

            </div>
          </div>
        </div>
        <div class="modal fade" id="Modal<?php echo $row['s_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header" style="height: 200; background-color: #EBF1F5; ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: #EBF1F5;">
                <div class="row">
                  <div class="col-xl-8 col-12">
                    <div id="carousel-modal" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="img/food1.JPG" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                          <img src="img/food1.JPG" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                          <img src="img/food1.JPG" class="d-block w-100" alt="">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-modal" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carousel-modal" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-xl-4 mt-2 col-12">
                    <h1 class="text-break" id="modal_name"><?php echo $row['s_name']; ?></h1>
                    <div>
                      <div>
                        <h6 id="modal_type">ประเภท <?php echo $row['s_type']; ?></h6>
                      </div>
                    </div>
                    <div class="row">
                      <div>
                        <h6 id="modal_detail">คำอธิบายร้าน</h6>
                        
                      </div>
                      <div class="row fluid ">
                        <div class="card ">
                          <div class="card-body w-100 " style=" min-height: 200px; height: auto; min-width:320px;  ; background-color: white;">
                          <?php echo $row['s_detail']; ?>
                          </div>
                        </div>

                      </div>
                      <br>
                      <br>

                      <div class="row mt-2">
                        <br>
                        <div>
                          <h5 id="modal_addtext" class="col text-truncate">ตำเแหน่ตั้ง : <?php echo $row['s_address']; ?></h5>
                        </div>
                      </div>
                      <div class="row">
                        <div>
                          <h5 id="modal_time">เวลาเปิดร้าน </h5>
                        </div>
                      </div>
                      <div class="row">
                        <div>
                          <h5>ทุกวัน 00.00-00.00</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div>
                            <h5><span id="modal_tel">โทร</span>&nbsp;<?php echo $row['s_phone']; ?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="row text-center">
                        <div class="col-4">
                          <a href="food_all.php"><button type="button" id="modal_map" class="btn modalbutton" style="border-radius: 10px;"><img src="img/gps.png" alt="">
                              เส้นทาง</button></a>
                        </div>
                        <div class="col-4">
                          <a href="food_all.php"><button type="button" id="modal_share" class="btn modalbutton" style="border-radius: 10px;"><img src="img/share.png" alt="">
                              แชร์</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div><br>     




</div><br>
<br>
<br>
<br>
</div>
<!-- Backtotopbtn -->
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-btn-top text-right">
      <a href="#"><img src="img/backbtn.png" ></a>
  </div>
 
<!-- เลื่อนลอย -->
<a href="https://www.facebook.com/BangBua-Community-Platform-111649440962466" target="_blank"
class="link-face-fix"><img src="img/facemessengerlogo.png" style="height:50px; width:50px ; "></a>


 
<!-- footer -->
 <!-- footer -->
 <div class="container-fluid mt-5" style="background-color: #4C648A;">
  <div class="row">
      <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6" style="color: white;">
          <h4 class="header-footer pl-footer mt-4" id="footer_follow">ติดตามเราได้ที่</h4>
          <ul type="none" class="p-1">
              <li class="mt-2"><a href="#" class="text-footer"><img src="img/face-logo.png" alt="" class="icon-footer"><span class="pl-footer">BangBuaCommunity</span></a>
              </li>
              <li class="mt-2"><a href="#" class="text-footer"><img src="img/line-logo.png" alt="" class="icon-footer"><span class="pl-footer">OpenChat</span></a></li>
          </ul>
      </div>
      <div class="col-xl-1 col-lg-3 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_other">อื่นๆ</h4>
          <ul type="none" class="p-1">
              <li class="mt-2"><a href="#" class="text-footer padding-footer" id="footer_help">ช่วยเหลือ</a></li>
              <li class="mt-2"><a href="#" class="text-footer padding-footer" id="footer_contact">ติดต่อสอบถาม</a></li>
          </ul>
      </div>
      <div class="col-xl-1 col-lg-3 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_staff">บุคลากร</h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer">E-Staff</a></li>
        </ul>
      </div>
      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-right margin-ver-center">
          <img class="img-footer" src="img/footer-logo2.png" >
      </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="height: 200; background-color: #EBF1F5; ">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color: #EBF1F5;">
        <div class="row">
          <div class="col-xl-8 col-12">
            <div id="carousel-modal" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/food1.JPG" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="img/food1.JPG" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="img/food1.JPG" class="d-block w-100" alt="">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carousel-modal"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-modal"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-xl-4 mt-2 col-12">
            <h1 class="text-break" id="modal_name">ชื่อร้าน ร้านยายนวนที่ขายโตเกียว</h1>
            <div>
              <div>
                <h6 id="modal_type">ประเภทร้านอาหาร</h6>
              </div>
            </div>
            <div class="row" >
              <div>
                <h6 id="modal_detail">คำอธิบายร้าน</h6>
              </div>
              <div class="row fluid ">
                <div class="card ">
                  <div class="card-body w-100 " style=" min-height: 200px; height: auto; min-width:320px;  ; background-color: white;">
                    เป็นร้านที่สะอาดจัดๆ สวยสุดๆอาหารสุดจะอร่อย เป็นร้านที่สะอาดจัดๆ สวยสุดๆอาหารสุดจะอร่อย
                    เป็นร้านที่สะอาดจัดๆ สวยสุดๆอาหารสุดจะอร่อย เป็นร้านที่สะอาดจัดๆ สวยสุดๆอาหารสุดจะอร่อย
                    เป็นร้านที่สะอาดจัดๆ สวยสุดๆอาหารสุดจะอร่อยเป็นร้านที่สะอาดจัดๆ
                    สวยสุดๆอาหารสุดจะอร่อยเป็นร้านที่สะอาดจัดๆ
                  </div>
                </div>

              </div>
              <br>
              <br>

              <div class="row mt-2">
                <br>
                <div>
                  <h6 id="modal_time">เวลาเปิดร้าน</h6>
                </div>
              </div>
              <div class="row">
                <div>
                  <h5>ทุกวัน 00.00-00.00</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div>
                    <h5><span id="modal_tel">โทร</span>&nbsp;000-000-0000</h5>
                  </div>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-4">
                  <a href="food_all.php"><button type="button" id="modal_map" class="btn modalbutton"
                      style="border-radius: 10px;"><img src="img/gps.png" alt="">
                      เส้นทาง</button></a>
                </div>
                <div class="col-4">
                  <a href="food_all.php"><button type="button" id="modal_share" class="btn modalbutton"
                      style="border-radius: 10px;"><img src="img/share.png" alt="">
                      แชร์</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="js/slideshow.js"></script>
<script src="../Nine/bootstrap/bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
  </body>
</html>