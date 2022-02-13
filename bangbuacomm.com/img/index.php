<?php
include('dashboard_update/functions.php');

session_start();
if($_SESSION["lang"] == "TH")
{
    include("th.php");
}
elseif($_SESSION["lang"] == "EN"){
  include("en.php");
}
else
{
    include("th.php");
}
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
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <script src="https://use.fontawesome.com/1ddd891d49.js"></script>

</head>

<body style="font-family: 'Prompt', sans-serif;">

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style=" background-color: #4C648A;">

    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="img/Logo1.svg" alt="" width="55" height="auto" t class="d-inline-block align-top">

      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item" style="border-radius: 0px; font-size:20px;">
            <a class="nav-link active" id="nav_home" aria-current="page" href="index.php"><?php echo $nav_home;?></a>
          </li>

          <li class="nav-item" style=" border-radius: 0px; font-size:20px ;">
            <a class="nav-link " id="nav_recomend" href="recommend.php"><?php echo $nav_recommend;?></a>
          </li>

          <li class="nav-item" style="   border-radius: 0px; font-size:20px ;">
            <a class="nav-link" id="nav_activity" href="index.php#activity"><?php echo $nav_activity;?></a>
          </li>


        </ul>

        &nbsp;
        

        <a href="change_index.php?lang=TH">
          <div style="color: white;">TH</div>
        </a>&nbsp;
        <a href="change_index.php?lang=EN">
          <div style="color: white;">EN</div>
        </a>
      </div>
    </div>
  </nav>

  <section class="recommend-store">
    <d iv class="container">
      <br>
      <br>

      <div style="color: #4C648A; ">
        <br>
        <br>
        <br>
        <center>
          <h1 class="header-index" id="discover"><b><?php echo $discover ;?> <br> <span id="Good"><?php echo $Good;?></span></b></h1>
        </center>
      </div>

      <div class="text-store">
        <div class="row">
          <div class="col-xl-12">

          </div>
        </div>
      </div>


      <div class="container">
        <div class="row mt-5">
          <?php

          $fetchdata = new DB_con();
          $sql = $fetchdata->fetchdatareccom();
          
          while ($row = mysqli_fetch_array($sql)) { 
            $sql2 = $fetchdata->fetchpic($row['s_id']);
            //print_r($row);
            //echo $row;
            //for($i=1;$i<=3;$i++;){
            while ($test = mysqli_fetch_array($sql2)) {
              //print_r($test);
              //echo($test);
              $pic[] = $test[0];
            }
            //print_r($pic);
            //echo $pic[1];
            ?>
            <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-6 mb-4">
              <div class="card" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['s_id']; ?>">
                <span class="shopping-mall-tag">
                <?php echo $span_recom;?>
                </span>
                <img class="img-fluid" src="<?php echo $pic[0]; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-titleh col text-truncate"><?php echo $row['s_name']; ?></h5>
                  <h4 class="card-titleh col text-truncate"><?php echo $row['s_name_eng']; ?></h4>
                  <h5 class="crop-text-2 "><?php echo $row['s_detail']; ?></h5>
                  <h5 class="card-title "><span id="card_tel"><?php echo $card_tel; ?></span> : <?php echo $row['s_phone']; ?></h5>
                </div>
              </div>
            </div>

            <div class="modal fade" id="Modal<?php echo $row['s_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header" style="height: 200; background-color: #EBF1F5; ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"  style="background-color: #EBF1F5;">
                    <div class="row">
                      <div class="col-xl-8 col-12">
                        <div id="carousel-modal<?php echo $row['s_id']; ?>" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carousel-modal" data-bs-slide-to="2" aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner" >
                            <div class="carousel-item active">
                              <img src="<?php echo $pic[0]; ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                              <img src="<?php echo $pic[1]; ?>" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                              <img src="<?php echo $pic[2]; ?>" class="d-block w-100" alt="">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carousel-modal<?php echo $row['s_id']; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carousel-modal<?php echo $row['s_id']; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>
                      <div class="col-xl-4 mt-2 col-12">
                        <h2 class="text-break" id="modal_name"><?php echo $row['s_name']; ?></h1>
                        <div>
                          <div>
                            <h4 style="color: #4C648A;" id="modal_type"><?php echo $row['s_name_eng']; ?></h4>
                          </div>
                          <div>
                            <h5 id="modal_type"><?php echo $modal_type;?> <?php echo $row['s_type']; ?></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div>
                            <h5 id="modal_detail"><?php echo $modal_detail; ?></h5>
                           
                          </div>
                          <div class="row fluid ">
                            <div class="card text-center">
                              <div class="card-body card text-center w-100 " style=" min-height: 200px; height: auto; min-width:280px;  ; background-color: white;">
                              <?php echo $row['s_detail']; ?>
                              </div>
                            </div>

                          </div>
                          <br>
                          <br>

                          <div class="row mt-2">
                            <br>
                            <div>
                              <h5 id="modal_addtext" class="col"><?php echo $modal_addtext; ?> <?php echo $row['s_address']; ?></h5>
                            </div>
                          </div>
                          <div class="row">
                            <div>
                              <h5 id="modal_time"><?php echo $modal_time;?> </h5>
                            </div>
                          </div>
                          <div class="row">
                            <div>
                              <h5><?php echo $row['s_time'];?> </h5>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div>
                                <h5><span id="modal_tel"><?php echo $modal_tel;?></span>&nbsp;<?php echo $row['s_phone']; ?></h5>
                              </div>
                            </div>
                          </div>
                          <div class="row text-center">
                            <div class="col-12">
                              <a href="<?php echo $row['s_map'];?>" target="_blank"><button type="button" id="modal_map" class="btn modalbutton" style="border-radius: 10px;"><img src="img/gps.png" alt="">
                              <?php echo $modal_map;?></button></a>
                            </div>
          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php //} //} 
        $pic=[]; } //print_r($pic);
        //echo $pic[1];
        ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center><a class="btn btn-primary" id="more" href="recommend.php" role="button" style=" width: 283px; border-radius: 5px ;background: #647BA4;">ดูเพิ่มเติม</a></center>
        <br>
        <br>
      </div>

        
  </section>
  <section class="activity " id="activity">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 ">
          <center><img class="img-fluid" src="img/bangbuatext.png" alt=""></center>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 col-12 "></div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-12 ">
          <div class="form-group has-search">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
            <form name="frmSearch" method="get" action="search.php">
           <input  href="search.php?id=<?php $_GET['txtKeyword']; ?>" type="text" name="txtKeyword" id="txtKeyword"  class="form-control " placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $searchbtn; ?>" style="font-size: 35px; height:80px ; border-radius:22px; background-color: #EBF1F5; "> 
                    
            </form>
            
         
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 col-3 "></div>
        <br>
      </div>
    </div>
    </div>

  </section>

  <section class="activity" id="activity" style=" background-image: url('img/BG2.png')">
    <div class="container">
      <br>
      <br>
      <br>
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-1 col-sm-12 col-12 p-4"></div>
        <div class="col-md-12 col-lg-12 col-xl-6 col-sm-12 col-12 p-4">
          <div>
            <h1 style="color: #4C648A;" id="button_activity"><?php echo $button_activity;?><h1>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-0 col-lg-0 col-xl-1 col-sm-12 col-12 p-4">

        </div>
        <div class="col-md-12 col-lg-12 col-xl-6 col-sm-12 col-12 p-4">
          <?php

          $fetchdata = new DB_con();
          $sql = $fetchdata->fetchvideo();
          while ($row = mysqli_fetch_array($sql)) { ?>
            <div class="ratio ratio-16x9">
              <?php $link = str_replace("watch?v=", "embed/", $row['vdo_url']); ?>

              <iframe  src="<?php echo $link ?>">
              </iframe>


            </div>
          <?php } ?>
        </div>

        <div class=" col-md-12 col-lg-12 col-xl-5 col-sm-12 col-12 p-4">
          <div id="fb-root">
            <center><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhttps%3A%2F%2Fwww.facebook.com%2FBangBua-Community-Platform-111649440962466&tabs=timeline&width=400&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe></center>
          </div>
        </div>
        





  </section>

  <div class="container">
    <center><img class="img-fluid" src="img/powerofbangbua.png" alt=""></center>
    <br>
    <br>

    <div style="color: #4C648A; ">
      <center>
        <h1 style="font-size: 36px"><b>ABOUT US</b> </h1>
      </center>
    </div>
    <br>
    <br>
    <div style="color: #0A1525; ">
      <center>
        <h1 style="font-size: 25px" id="aboutub"><?php echo $aboutub;?> <br>
         <span id="aboutub2"><?php echo $aboutub2;?></span><br>
         <span id="aboutub3"> <?php echo $aboutub3;?> </span></h1> 
      </center>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
  

  <!-- <a href="https://www.facebook.com/BangBua-Community-Platform-111649440962466" target="_blank" class="link-face-fix"><img src="img/facemessengerlogo.png" style="height:50px; width:50px ; "></a> -->

  <!-- footer -->
  <div class="container-fluid mt-5" style="background-color: #4C648A;">
    <div class="row">
      <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer pl-footer mt-4" id="footer_follow"><?php echo $footer_follow;?><span></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer"><img src="img/face-logo.png" alt="" class="icon-footer"><span class="pl-footer">BangBuaCommunity</span></a>
          </li>
          <li class="mt-2"><a href="#" class="text-footer"><img src="img/line-logo.png" alt="" class="icon-footer"><span class="pl-footer">OpenChat</span></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_other"><?php echo $footer_other;?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer padding-footer" id="footer_help"><?php echo $footer_help;?></a></li>
          <li class="mt-2"><a href="#" class="text-footer padding-footer" id="footer_contact"><?php echo $footer_contact;?></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_staff"><?php echo $footer_staff;?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer">E-Staff</a></li>
        </ul>
      </div>
      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-right margin-ver-center">
        <img class="img-footer" src="/img/footer-logo.png">
      </div>
    </div>
  </div>

              
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v10.0&appId=527896077921936&autoLogAppEvents=1" nonce="cpYjmCH5"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="js/slideshow.js"></script>
  <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="111649440962466"
        theme_color="#0A7CFF"
        logged_in_greeting="สวัสดีค่ะ มีอะไรให้เราช่วยเหลือมั้ยคะ ?"
        logged_out_greeting="สวัสดีค่ะ มีอะไรให้เราช่วยเหลือมั้ยคะ ?">
      </div>
</body>
<script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>


</html>