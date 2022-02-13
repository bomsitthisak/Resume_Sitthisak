<?php
include('auth.php');
include_once('functions.php');
$insertdata = new DB_con();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>อัพเดตคอนเทนต์</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="อัพเดตคอนเทนต์">
	<link rel="shortcut icon" href="pic/logo.jpg">

	
	<!-- <link rel="stylesheet" href="../css/main.css"> -->
	<!-- FontAwesome JS-->
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

	<!--For table-->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

	<!--CSS for table-->
	<script>
		src = "https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"
	</script>
	<script>
		src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
	</script>


	<!--Style for pagination-->
	<style>
		.pagination>li>a {
			background-color: white;
			color: #5D6778;
		}

		.pagination>li>a:focus,
		.pagination>li>a:hover,
		.pagination>li>span:focus,
		.pagination>li>span:hover {
			color: #5a5a5a;
			background-color: #eee;
			border-color: #ddd;
		}

		.pagination>.active>a {
			color: white;
			background-color: rgb(164, 165, 164) !Important;
			border: solid 1px rgb(164, 165, 164) !Important;
		}

		.pagination>.active>a:hover {
			background-color: #5da85d !Important;
			border: solid 1px #5da85d;
		}
		.table-wrapper {
			max-height: 500px;
			overflow: auto;
			display:inline-block;
		}
	</style>

</head>

</head>

<body class="app">
	<header class="app-header fixed-top">
		<div class="app-header-inner">
			<div class="container-fluid py-2">
				<div class="app-header-content">
					<div class="row justify-content-between align-items-center">

						<div class="col-auto">
							<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
									<title>เมนู</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div>
						<!--//col-->


					</div>
					<!--//row-->
				</div>
				<!--//app-header-content-->
			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-header-inner-->
		<div id="app-sidepanel" class="app-sidepanel">
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
			<div class="sidepanel-inner d-flex flex-column">
				<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
				<div class="app-branding">
					<a class="app-logo" href="index.php"><img class="logo-icon mr-2" src="pic/logo.png" alt="logo"><span class="logo-text"><?php echo $_SESSION['a_fn']; ?></span></a>

				</div>
				<!--//app-branding-->

				<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
					<ul class="app-menu list-unstyled accordion" id="menu-accordion">
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="index.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
										<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
									</svg>
								</span>
								<span class="nav-link-text">ภาพรวม</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link active" href="updatecontent.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
									</svg>
								</span>
								<span class="nav-link-text">อัพเดตคอนเทนท์</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="manageshop.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
										<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
										<circle cx="3.5" cy="5.5" r=".5" />
										<circle cx="3.5" cy="8" r=".5" />
										<circle cx="3.5" cy="10.5" r=".5" />
									</svg>
								</span>
								<span class="nav-link-text">จัดการร้านค้า</span>
							</a>
							<!--//nav-link-->
						</li>
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link" href="help.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
										<path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
									</svg>
								</span>
								<span class="nav-link-text">ช่วยเหลือ</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
						<li class="nav-item">
							<a class="nav-link" href="settings.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
										<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
									</svg>
								</span>
								<span class="nav-link-text">ตั้งค่า</span>
							</a>
							<!--//nav-link-->
						</li>
						<!--//nav-item-->
					</ul>
					<!--//app-menu-->
				</nav>
				<!--//app-nav-->
				<div class="app-sidepanel-footer">
					<nav class="app-nav app-nav-footer">
						<ul class="app-menu footer-menu list-unstyled">

							<li class="nav-item">
								<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<a class="nav-link" href="logout.php">
									<span class="nav-icon">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
											<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
										</svg>
									</span>
									<span class="nav-link-text">ออกจากระบบ</span>
								</a>
								<!--//nav-link-->
							</li>
						</ul>
						<!--//footer-menu-->
					</nav>
				</div>
				<!--//app-sidepanel-footer-->

			</div>
			<!--//sidepanel-inner-->
		</div>
		<!--//app-sidepanel-->
	</header>
	<!--//app-header-->

	<?php



	if (isset($_POST['submitrec'])) {



		// $sql = $insertdata->fetchdatarec();
		// $first_id = mysqli_fetch_array($result);
		// mysqli_data_seek($sql, (mysqli_num_rows($sql) - 1));
		// $last_id = mysqli_fetch_array($sql);
		// $last_id = $last_id['r_id'];
		// $r_id = $last_id;
		// $r_id += 1;

		$r_s_id = $_POST['check'];
		

		// foreach ($_POST['check'] as $value) {
		// 	echo "$value[check] <br>";
		//   }

		for ($i = 0; $i < count($r_s_id); $i++) {
			
			$r_id = $i + 1;			
			$sql = $insertdata->updaterec($r_id, $r_s_id[$i]);
			if ($sql) {
				echo "<script>alert('บันทึกข้อมูลสำเร็จ!');</script>";
				echo "<script>window.location.href='updatecontent.php'</script>";
			} else {
				echo "<script>alert('ขออภัยบันทึกข้อมูลผิดพลาด! โปรดติดต่อผู้ดูแลระบบในเมนู 'ช่วยเหลือ'');</script>";
				echo "<script>window.location.href='updatecontent.php'</script>";
			}
		}
	}
	?>
	<!--Page's content-->
	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">


			<div class="container-xl">
				<div class="row g-3 mb-4 align-items-center justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">อัพเดตคอนเทนท์</h1>
					</div>

					<div class="app-card app-card-accordion shadow-sm mb-4">
						<div class="app-card-header p-3">
							<h3 class="app-card-title text-primary">จัดการร้านค้าแนะนำ</h3>
						</div>
						<!--//app-card-header-->

						<div class="app-card-body p-4 pt-0">

							<div class="row">

								<div class="col-sm-12  mt-3">
									<div class="card">


										<div class="card-body">
											<h5 class="app-card-title">เลือกร้านค้าแนะนำ (สูงสุด 4 ร้าน)<span><h6 class="text-danger">สามารถกดที่หัวตารางเพื่อเรียงชื่อ และประเภทได้ กรุณากดติ๊กให้ครบทั้ง 4 ร้าน</h6></span> </h5>
											<form class="table-search-form row gx-1 align-items-center" method="post">
											<!--
												<div class="col-auto input-group mt-2">
													<div class="input-group-append">
														<span class="input-group-text" style="height: 37px;">
															<i class="fas fa-search"></i>
														</span>
													</div>
													<input type="text" class="form-control" id="search-orders" placeholder="ค้นหา...">
												</div>
											-->
												<div class="table-responsive overflow-scroll table-wrapper">
													<table id="table_shop" class="table app-table-hover mb-0 text-left ">
														<thead>
															<tr>
																<th class="cell" style="max-width: 50px;">
																</th>
																<th class="cell ">ชื่อร้านค้า</th>
																<th class="cell  align-items-center overflow-auto">ประเภท</th>
															</tr>
														</thead>

														<tbody>
															<?php
															$fetchdata = new DB_con();
															$sql = $fetchdata->fetchdatareccomcheck();
															while ($row = mysqli_fetch_array($sql)) { ?>
																<tr style="color: #3a3a3a;">
																	<td><input action="#" method="post" class="form-check-input" name="check[]"  type="checkbox" <?php if ($row['r_s_id'] != '') {echo 'checked ="checked"';} ?> value ="<?php echo $row['s_id']; ?>"></td>
																	<td class="cell "><?php echo $row['s_name']; ?></td>
																	<td class="cell"><?php echo $row['s_type']; ?>
																</tr>
															<?php } ?>
														</tbody>
													</table>
													<label id="ckchoice">เลือกทั้งหมด 4/4 ร้าน</label>
												</div>

												<div class="modal-footer text-center ">

													<div class="col-lg-12 col-12">
														<button type="submit" id="submitrec" name="submitrec" class="text-center btn app-btn-primary col-lg-3  ">ยืนยันการเลือก</button>
													</div>
												</div>

												<!--//table-responsive-->
											</form>

										</div>
									</div>
								</div>

							</div>
							<!--//app-card-body-->

						</div>
						<?php
						if (isset($_POST['updatevideo'])) {

							$fetchdata = new DB_con();
							$v_link = $_POST['v_link'];
							$sql = $fetchdata->v_link($v_link);
							if ($sql) {

								echo "<script>alert('แก้ไขวีดีโอสำเร็จ!');</script>";
								echo "<script>window.location.href='updatecontent.php'</script>";
							} else {
								echo "<script>alert('ขออภัยบันทึกข้อมูลผิดพลาด! โปรดติดต่อผู้ดูแลระบบในเมนู 'ช่วยเหลือ'');</script>";
								echo "<script>window.location.href='updatecontent.php'</script>";
							}
						}
						?>
						<!--//app-card-->
						<div class="app-card app-card-accordion shadow-sm mb-4 ">
							<div class="app-card-header p-3">
								<h4 class="app-card-title text-primary">จัดการวิดีโอแนะนำ</h4>
							</div>
							<!--//app-card-header-->
							<div class="app-card-body p-5 pt-0 col-lg-12 ">
								<div class="row ">
										<div class="col-12 col-md- col-lg-12 ">
											<!--เอา v_link จากในฐานข้อมูลมาใส่-->
											<?php
											$fetchdata = new DB_con();
											$sql = $fetchdata->fetchvideo();
											$row = mysqli_fetch_array($sql);
											$link = str_replace("watch?v=", "embed/", $row['vdo_url']);

											?>
											<h5 class="app-card-title mt-3 ">ลิงค์วิดีโอปัจจุบัน: <a class="text-primary" target="_blank" href="<?php echo $row['vdo_url']; ?>"><?php echo $row['vdo_url']; ?></a></h5>
											ตัวอย่างวิดีโอแนะนำ
											<br>
												
												<div class="ratio ratio-16x9 text-center p-5">
												<?php $link = str_replace("watch?v=", "embed/", $row['vdo_url']); ?>

												<iframe src="<?php echo $link ?>"></iframe>
												
											
										</div>
										<br>
									
										<div class="input-group row ">

											<form action="" method="post">
												<div class="row ">
												<div class=" col-md-2 col-xl-3 d-flex flex-column text-center">
												
												</div>
													<div class="col-7 col-md-6 col-xl-5 d-flex flex-column text-center">
														<input type="text" class="form-control flex-column text-center" id="txt" name="v_link" onkeyup="check(this)" placeholder="แก้ไขลิงค์วิดีโอ">
													</div>

													<div class="col-5 col-md-4 col-xl-4 d-flex flex-row text-center  ">
														<input class="btn app-btn-primary text-center" type="submit" id="updatevideo" name="updatevideo" value="ยืนยันการแก้ไข" >
													</div>
												</div>

											</form>
										</div>
									
								 </div>


								</div>

							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
					</div>
				</div>

				<!--Credit DONT DELETE-->
				<footer class="app-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright"><a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank"></a></small>
					</div>
				</footer>
				<!--//app-footer-->
				<!--Credit DONT DELETE-->

			</div>
			<!--//app-wrapper-->
			<!--end Page's content-->

			<!-- Javascript -->
			<script src="assets/plugins/popper.min.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


			<!-- Page Specific JS -->
			<script src="assets/js/app.js"></script>

			<script>
				$(document).ready(function() {
					var table = $("table").DataTable({
						"dom": '<"p-3"t<"row mt-3"<"col-sm-4"i><"col-sm-4 pagination justify-content-center "p><"col-sm-4 ">>>',
						"oLanguage": {
							"oPaginate": {
								"sFirst": "หน้าแรก", // This is the link to the first page
								"sPrevious": "ก่อนหน้า", // This is the link to the previous page
								"sNext": "ถัดไป", // This is the link to the next page
								"sLast": "หน้าสุดท้าย" // This is the link to the last page}
							},
							"sInfo": "แสดงจาก _START_ ถึง _END_ จากจำนวนทั้งหมด _TOTAL_ ร้าน",
							"sInfoFiltered": "",
							"sInfoEmpty": "ไม่พบข้อมูล",
							"sEmptyTable": "ไม่มีข้อมูลในตาราง",
							"sZeroRecords": "ไม่พบข้อมูล"
						},
						'columnDefs': [{
							'targets': 0,
							'checkboxes': {
								'selectRow': true,
								'selectAllPages': true
								
							}
						}],
						'select': {
							'style': 'multi',
							'selector': 'td:first-child'
						},
						'order': [
							[1, 'asc']
						],
						"paging": false

					}); // "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"p><"col-sm-4"f>>tip'

					/*
					$('#search-orders').on('keyup', function() {
						table.search(this.value).draw();
					});
					*/

					//check total of selected
					$('input:checkbox').click(function() {
						var data = table.row({
							selected: true
						}).data();
						var rowIdx = table.row({
							selected: true
						}).index();
						var cellData = table.cell(rowIdx, 1).data();
						//var rows_selected = table.column(0).checkboxes.selected();
						//alert($('input:checkbox:checked').length);
						var countcheck = $('input:checkbox:checked').length;
						var text = "เลือกทั้งหมด " + countcheck + "/4 ร้าน";
						$("#ckchoice").text(text);
						console.log(data);
					});
					//var dataSelected = table.rows({ selected: true }).data();
					//limit select card shop
					$('input:checkbox').click(function() {
						
						if ($("input:checkbox:checked").length > 4) {
							alert("คุณสามารถเลือกร้านค้าแนะนำได้เพียง 4 ร้านเท่านั้น");
							return false;

						}
						if ($("input:checkbox:checked").length < 4) {
							$('#submitrec').attr('disabled', 'disabled');

						}
						if ($("input:checkbox:checked").length == 4) {
							$('#submitrec').removeAttr('disabled');
						}
					});

					

				});
				function matchYoutubeUrl(url) {
					var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
					var matches = url.match(p);
					if (matches) {
						return matches[1];
					}
					return false;
				}


				function check(sender) {
					var url = $('#txt').val();
					var id = matchYoutubeUrl(url);
					if (id != false) {						
						alert('URL ถูกต้อง!');
					} else {
						alert('URL ไม่ถูกต้อง กรุณาใช้ Link Youtube เท่านั้น!');
						
					}
				}
				
			</script>
			

</body>

</html>