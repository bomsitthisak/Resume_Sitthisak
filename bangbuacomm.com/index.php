<?php
include('dashboard_update/functions.php');

// change language
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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="bootstrap/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="/img/logo.png">
  <script src="https://use.fontawesome.com/1ddd891d49.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NYRLZLD88M"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-NYRLZLD88M');
  </script>
</head>

<body style="font-family: 'Prompt', sans-serif;">
  <!-- navbar -->
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
        <!--start loop-->
          <?php

          $fetchdata = new DB_con();
          $sql = $fetchdata->fetchdatareccom();
          
          while ($row = mysqli_fetch_array($sql)) { 
            //echo $row['s_id'];
            $sql2 = $fetchdata->fetchpic($row['s_id']);
            while ($test = mysqli_fetch_array($sql2)) {
              //$pic[] = $test[0];
              $pic[]  = $test['ps_path'];
            }
            //print_r($pic);
            

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
                          <button type="button" data-bs-target="#carousel-modal<?php echo $row['s_id']; ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
						  <?php
                              if(count($pic)>1){
                                for($i=1;$i<count($pic);$i++){
                                  echo '<button type="button" data-bs-target="#carousel-modal'.$row['s_id'].'" data-bs-slide-to="'.$i.'" aria-label="Slide'.$i.'"></button>';
                                  //echo $i;
                                }
                              }

                            ?>
                          </div>

                          <div class="carousel-inner"  role="listbox" >
                          <?php
                          
                            $result .= '<div class="carousel-item active">';
                            $result .= '<img src="'.$pic[0].'" class="d-block w-100" alt="">';
                            $result .= "</div>";
                            
                            for($i=1;$i<count($pic);$i++){
                             
                              $result .= "<div class='carousel-item'>";
                              $result .= '<img src="'.$pic[$i].'" class="d-block w-100" alt="">';
                              $result .= '</div>';
                            }
                            
                            echo $result;
                            $result = "";
                          ?> 
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
                            <div class="col-sm-12">
                              <div class="card-body card d-flex w-100 " style=" min-height: 150px; height: auto; min-width:280px;  ; background-color: white;">
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
                                <h5 style="color:#0A1525;"><span id="modal_tel" style="color:black;" ><?php echo $modal_tel;?></span>&nbsp;<?php echo $row['s_phone']; ?></h5>
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
          <?php 
        $pic=[]; }  ?>
        <!--end loop-->
        </div>
        
        <br>
        <br>
        <br>
        <br>
        <br>
        <center><a class="btn btn-primary" id="more" href="recommend.php" role="button" style=" width: 283px; border-radius: 5px ;background: #647BA4;"><?php echo $more; ?></a></center>
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
            <h1 style="color: #4C648A;" id="button_activity"><?php echo $nav_activity;?><h1>
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
        <!-- <div class="col-md-12 col-lg-12 col-xl-6 col-sm-12 col-12 p-4">

        <div class="ratio ratio-16x9">
        <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F111649440962466%2Fvideos%2F714413309249050%2F&show_text=false&width=560" 
        width="560" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
        allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
        </div>  

        </div> -->

        <div class=" col-md-12 col-lg-12 col-xl-5 col-sm-12 col-12 p-4">
          <div id="fb-root">
            <center><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhttps%3A%2F%2Fwww.facebook.com%2FBangBua-Community-Platform-111649440962466&tabs=timeline&width=400&height=426&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe></center>
          </div>
        </div>
        





  </section>
  

  <div class="container">
             
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-1 col-sm-12 col-12 p-4"></div>
        <div class="col-md-12 col-lg-12 col-xl-6 col-sm-12 col-12 p-4">
          <div>
            <a href="https://heyzine.com/flip-book/3da6ef68eb.html#page/1" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- E-Book<h5>
            </a>
            <br>
            <a href="https://www.youtube.com/channel/UCjtD5rU7ERFBRSPpTTF4D2w/featured" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- YouTube content<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/176124634514946/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- Infograpic เกี่ยวกับต้นทุนอาชีพ<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/media/set/?set=a.131001365693940&type=3" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- ร้านเด่นประจำสัปดาห์<h5>
            </a>
            <br>
            <a href="https://fb.watch/5OQI5PnVhC/" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- รีวิวอาหาร จากคุณ อนันเป็ด<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/176099894517420/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- ส่งมอบและติดตั้งไวนิลประชาสัมพันธ์โครงการ<h5>
            </a>
            <br>
            <a href="https://www.spu.ac.th/activities/30056" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- SPU รวมพลังคนรุ่นใหม่ ยุวชนอาสาระยะ 2 สานต่อ“BangBua Community Platform”สร้างความแข็งแกร่งให้ชุมชน<h5>
            </a>
            <br>
            <a href="https://talk.mthai.com/pr/520022.html" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- ส่งมอบเอกสารโครงการและรายงานผลการดำเนินงานระยะที่ 1<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/176150354512374/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- รูปภาพบรรยากาศการลงพื้นที่เพื่อพูดคุยกับผู้นำชุมชนและสัมภาษณ์ความรู้สึกการเข้าร่วมโครงการของผู้ประกอบการร้านค้า<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/119428026851274/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- รูปภาพบรรยากาศการลงพื้นที่ ครั้งที่ 3<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/118880150239395/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- รูปภาพบรรยากาศการลงพื้นที่ ครั้งที่ 2<h5>
            </a>
            <br>
            <a href="https://www.facebook.com/111649440962466/posts/118548253605918/?d=n" target="_blank">
              <h5 style="color: #4C648A;" id="button_activity"  target="_blank">- รูปภาพบรรยากาศการลงพื้นที่ ครั้งที่ 1<h5>
            </a>
            <br>                  
          </div>
        </div>       
      </div>

        
    <br>
    <br>
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
          <li class="mt-2"><a target="_blank" href="https://www.facebook.com/bangbuacomm" class="text-footer"><img src="img/face-logo.png" alt="" class="icon-footer"><span class="pl-footer">BangBuaCommunity</span></a>
          </li>
          <li class="mt-2"><a target="_blank" href="https://line.me/ti/g2/FkONaslmdkslVzay6BhPaA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default&fbclid=IwAR0U4DfHPEFJRej_I5F8DNuVDg8WHKvoHfD8gCE9XGOb6Smn0-kcHiyJtVI" class="text-footer"><img src="img/line-logo.png" alt="" class="icon-footer"><span class="pl-footer">OpenChat</span></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_other"><?php echo $footer_other;?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a target="_blank" href="https://line.me/ti/g2/FkONaslmdkslVzay6BhPaA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default&fbclid=IwAR0U4DfHPEFJRej_I5F8DNuVDg8WHKvoHfD8gCE9XGOb6Smn0-kcHiyJtVI" class="text-footer padding-footer" id="footer_help"><?php echo $footer_help;?></a></li>
          <li class="mt-2"><a target="_blank" href="https://line.me/ti/g2/FkONaslmdkslVzay6BhPaA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default&fbclid=IwAR0U4DfHPEFJRej_I5F8DNuVDg8WHKvoHfD8gCE9XGOb6Smn0-kcHiyJtVI" class="text-footer padding-footer" id="footer_contact"><?php echo $footer_contact;?></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-6 col-md-3 col-sm-3 col-3" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_staff"><?php echo $footer_staff;?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="dashboard_update/login.php" class="text-footer">E-Staff</a></li>
        </ul>
      </div>
      <div class="col-xl-8 col-lg-12 col-md-6 col-sm-6 col-6 text-right margin-ver-center">
        <img class="img-footer" src="/img/footer-logo.png">
      </div>
    </div>
  </div>

              
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v10.0&appId=527896077921936&autoLogAppEvents=1" nonce="cpYjmCH5"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="js/slideshow.js"></script>
 
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="111649440962466"
        logged_in_greeting="สวัสดีค่ะ วันนี้มีอะไรให้เราช่วยมั้ยคะ ?"
        logged_out_greeting="สวัสดีค่ะ วันนี้มีอะไรให้เราช่วยมั้ยคะ ?">
      </div>
</body>

<!-- messenger facebook -->
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
      }(document, 'script', 'facebook-jssdk'));
</script>



</html>