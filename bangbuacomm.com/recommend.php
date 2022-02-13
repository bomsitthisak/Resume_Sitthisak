<?php
include('dashboard_update/functions.php');

session_start();
if ($_SESSION["lang"] == "TH") {
  include("th.php");
} elseif ($_SESSION["lang"] == "EN") {
  include("en.php");
} else {
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
  <link rel="shortcut icon" href="/img/logo.png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.3/css/flag-icon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

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
            <a class="nav-link " id="nav_home" href="index.php"><?php echo $nav_home; ?></a>
          </li>

          <li class="nav-item" style=" border-radius: 0px; font-size:20px ;">
            <a class="nav-link active" id="nav_recommend" aria-current="page" href="#"><?php echo $nav_recommend; ?></a>
          </li>

          <li class="nav-item" style="   border-radius: 0px; font-size:20px ;">
            <a class="nav-link" id="nav_activity" href="index.php#activity"><?php echo $nav_activity; ?></a>
          </li>


        </ul>

        &nbsp;

        <a href="change_recommend.php?lang=TH">
          <div style="color: white;">TH</div>
        </a>&nbsp;
        <a href="change_recommend.php?lang=EN">
          <div style="color: white;">EN</div>
        </a>

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
          <img src="img/Banner/banner1.png" class="d-block w-100 h-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="img/Banner/banner2.png" class="d-block w-100 h-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="img/Banner/banner3.png" class="d-block w-100 h-100" alt="">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <br>
    </div>
  </div>

  <div class="container">
    <div class="row text-center">
      <div class="form-group has-search">
        <form name="fromSearch" method="get" action="search.php">
          <input href="search.php?id=<?php $_GET['txtKeyword']; ?>" type="text" name="txtKeyword" id="txtKeyword" class="form-control" placeholder="&nbsp;&nbsp;<?php echo $searchbtn; ?>" style="height:45px ; border-radius:30px; background-color: #EBF1F5; ">
        </form>
      </div>
    </div>
    <br>
    <div class="row text-center">
      <div class="col-xl-4 col-md-4 col-sm-12 p-2">
        <a href="food_all.php"><button type="button" id="shopfood" class="btn textstore w-100"><?php echo $shopfood; ?></button></a>
      </div>
      <div class="col-xl-4 col-md-4 col-sm-12 p-2">
        <a href="drink_all.php"><button type="button" id="shopdrink" class="btn textstore w-100"><?php echo $shopdrink; ?></button></a>
      </div>
      <div class="col-xl-4 col-md-4 col-sm-12 p-2">
        <a href="etc_all.php"> <button type="button" id="shopother" class="btn textstore w-100"><?php echo $shopother; ?></button> </a>
      </div>
    </div>

    <!-- ร้านเเนะนํา -->
    <br>
    <br>
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 mb-2 ">
        <h1 class="store-text" id="recommend"><?php echo $recommend; ?></h1>
      </div>

      <?php

          $fetchdata = new DB_con();
          $sql = $fetchdata->fetchdatareccom();
          
          while ($row = mysqli_fetch_array($sql)) { 
            $sql2 = $fetchdata->fetchpic($row['s_id']);
            while ($test = mysqli_fetch_array($sql2)) {
              $pic[] = $test['ps_path'];
            }

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

    </div>

    <hr>
    <!-- ร้านอาหาร -->
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 mb-2 ">
        <h1 class="store-text" id="foodall"><?php echo $foodall; ?><span class="f-right" id="morepage"><a href="food_all.php" style="color: #645C5C;"><?php echo $morepage; ?></a></span></h1>
      </div>

      <?php

      $fetchdata = new DB_con();
      $sql = $fetchdata->fetchdatafoodrandom();

      while ($row = mysqli_fetch_array($sql)) {
        $sql2 = $fetchdata->fetchpic($row['s_id']);
        while ($test = mysqli_fetch_array($sql2)) {
          $pic[] = $test['ps_path'];
        }

      ?>
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-6 mb-4">
          <div class="card" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['s_id']; ?>">
            <!-- <span class="shopping-mall-tag">
              recommend
            </span> -->
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

    </div>
    <hr>
    <!-- ร้านของหวานเเละเครื่องดื่ม -->
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 mb-2 ">
        <h1 class="store-text" id="shopdrink"><?php echo $shopdrink; ?></h1><span class="f-right"><a href="drink_all.php" style="color: #645C5C;"><?php echo $morepage; ?></a></span>
      </div>

      <?php

      $fetchdata = new DB_con();
      $sql = $fetchdata->fetchdatadrinkrandom();

      while ($row = mysqli_fetch_array($sql)) {
        $sql2 = $fetchdata->fetchpic($row['s_id']);
        while ($test = mysqli_fetch_array($sql2)) {
          $pic[] = $test['ps_path'];
        }

      ?>
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-6 mb-4">
          <div class="card" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['s_id']; ?>">
            <!-- <span class="shopping-mall-tag">
              recommend
            </span> -->
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

    </div>
    <hr>
    <!-- ร้านค้าเเละบริการอื่นๆ -->
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-12 mb-2 ">
        <h1 class="store-text" id="shopother"><?php echo $shopother; ?></h1><span class="f-right" id="morepage"><a href="etc_all.php" style="color: #645C5C;"><?php echo $morepage; ?></a></span></h1>
      </div>

      <?php

      $fetchdata = new DB_con();
      $sql = $fetchdata->fetchdataetcrandom();

      while ($row = mysqli_fetch_array($sql)) {
        $sql2 = $fetchdata->fetchpic($row['s_id']);
        while ($test = mysqli_fetch_array($sql2)) {
          $pic[] = $test['ps_path'];
        }

      ?>
        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-6 col-6 mb-4">
          <div class="card" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['s_id']; ?>">
            <!-- <span class="shopping-mall-tag">
              recommend
            </span> -->
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

    </div>
  </div>
  </div>
  <!-- Backtotopbtn -->

  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pr-btn-top text-right">
    <a href="#"><img src="img/backbtn.png"></a>
  </div>



  <!-- ลิ้งลอย -->
  <!-- <a href="https://www.facebook.com/BangBua-Community-Platform-111649440962466" target="_blank" class="link-face-fix"><img src="img/facemessengerlogo.png" style="height:50px; width:50px ; "></a> -->



  <!-- footer -->
  <div class="container-fluid mt-5" style="background-color: #4C648A;">
    <div class="row">
      <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer pl-footer mt-4" id="footer_follow"><?php echo $footer_follow; ?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer"><img src="img/face-logo.png" alt="" class="icon-footer"><span class="pl-footer">BangBuaCommunity</span></a>
          </li>
          <li class="mt-2"><a href="#" class="text-footer"><img src="img/line-logo.png" alt="" class="icon-footer"><span class="pl-footer">OpenChat</span></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-3 col-md-6 col-sm-6 col-6" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_other"><?php echo $footer_other; ?></h4>
        <ul type="none" class="p-1">
          <li class="mt-2"><a href="#" class="text-footer" id="footer_help"><?php echo $footer_help; ?></a></li>
          <li class="mt-2"><a href="#" class="text-footer" id="footer_contact"><?php echo $footer_contact; ?></a></li>
        </ul>
      </div>
      <div class="col-xl-1 col-lg-3 col-md-4 col-sm-4 col-4" style="color: white;">
        <h4 class="header-footer mt-4" id="footer_staff"><?php echo $footer_staff; ?></h4>
        <ul type="none" class="p-1">
          <li class="mt-1"><a href="dashboard_update/login.php" class="text-footer">E-Staff</a></li>
        </ul>
      </div>
      <div class="col-xl-8 col-lg-12 col-md-6 col-sm-6 col-6 text-right margin-ver-center">
        <img class="img-footer" src="img/footer-logo.png">
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="js/slideshow.js"></script>
  <script src="../Nine/bootstrap/bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
  <div class="fb-customerchat" attribution="setup_tool" page_id="111649440962466" theme_color="#0A7CFF" logged_in_greeting="สวัสดีค่ะ มีอะไรให้เราช่วยเหลือมั้ยคะ ?" logged_out_greeting="สวัสดีค่ะ มีอะไรให้เราช่วยเหลือมั้ยคะ ?">
  </div>
</body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml: true,
      version: 'v10.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

</html>