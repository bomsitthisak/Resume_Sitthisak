<?php

include('auth.php');
// insert|upload
include_once('functions.php');
$insertdata = new DB_con();
// $ftp = new FTP();





// $dbservername = "localhost";
// $dbname = "bangbualast";
// $dbusername = "root";
// $dbpassword = "12345678";
// $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
// $conn->exec("set name utf8");
// $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);


// $sqlAuto = "select * from $tablename";
// $resultAuto = $conn->prepare($sqlAuto);
//   $resultAuto->execute();
// $rsAuto = $resultAuto->fetch();

	
	
	// $startid = "S";
	// $tablename = "shop";
	// $startnumber = "";
			
if (isset($_POST['insert'])) {

	
	$sql = $insertdata->fetchdata();
	$first_id = mysqli_fetch_array($result);
	mysqli_data_seek($sql, (mysqli_num_rows($sql) - 1));
	$last_id = mysqli_fetch_array($sql);
	$last_id = $last_id['s_id'];
	$new_id = $last_id;
	
//	$rowcount = $resultAuto->rowCount();
	


	// $new_id =  str_ireplace("S", "", $new_id);
	
	//$new_id = (int)$new_id;
	$new_id += 1;

	// $new_id = strval($new_id);
	
	// $new_id = $startid . $startnumber . $new_id;
	
	//echo "<script>alert('$new_id');</script>";
	$s_id = $new_id;
	$s_name = $_POST['shop_name'];
	$s_name_eng = $_POST['shop_name_eng'];
	$s_detail = $_POST['shop_exp'];
	$s_type = $_POST['shop_type'];
	$s_map = $_POST['shop_map'];
	$s_time = $_POST['shop_time'];
	$s_phone = $_POST['shop_phone'];
	$s_address = $_POST['shop_address'];
	
	//$path_pic = "/home/bangbuac/domains/bangbuacomm.com/public_ftp/pic/";
	//$host_file = $_FILES['file']['name'];
	//$local_file = $_FILES['file']['tmp_name'];
	//$size_file=$_FILES['file']['size'];

	$sql = $insertdata->insert($s_id, $s_name, string_sanitize($s_name_eng), $s_detail, $s_type, $s_map, $s_time, $s_phone, $s_address);
	
	if ($sql) {
		//print_r($_POST);
		//print_r($host_file);
		$ftp_server = "bangbuacomm.com";
        $ftp_user_name = "bangbuac";
        $ftp_user_pass = "Bangbua01";
        $conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
        $path = "domains/bangbuacomm.com/public_html/pic/$s_id";
		$path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
		$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
		$count = count($_FILES['file']['name']);
		$id =1;
		$sql2 = $insertdata->fetchpicid();
			while ($test = mysqli_fetch_array($sql2)) {
				$picid[] = $test['ps_id'];
		}
		//print_r($picid);
		$cp = count($picid);
		$lastps_id = max($picid);
		/*
		if($lastps_id!=0){
			$lastps_id = end($picid); 
		}
		else{
			$lastps_id = 1; 
		}*/
		$ps_id = $lastps_id+1;
		//$ps_id_file = 1;
		//$countpic = $insertdata->countpic($s_id);
		//echo "<script>alert('$countpic');</script>";
		if (ftp_mkdir($conn_id, $path)) {
			
			//echo "count is ".$count."\n";
			//echo "<script>alert('count is $count !');</script>";
			
			for ($i=0;$i<$count;$i++) {
				if($_FILES["file"]["name"][$i] != ""){
					//ftp_chdir($conn_id, $path);
					if ( $_FILES['file']['error'][$i] ) { 
						echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
					} 
					if($_FILES['file']){
						//print_r($_FILES);
	
						$error_msg = validate_form($_FILES['file'][$i],$_FILES['file']["size"][$i],$_FILES['file']["type"][$i]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
						if ($error_msg) {
						   //die($error_msg);
						   echo $error_msg;
						} else {
							
							$host_file = $ps_id."_".$_FILES['file']['name'][$i];
							$local_file = $_FILES['file']['tmp_name'][$i];
							$size_file=$_FILES['file']['size'][$i];
							//echo $host_file."\n".$local_file."\n".$size_file."\n";
							//echo "<script>alert('hostfile now = $host_file ps id = $ps_id');</script>";
							//echo "<br>before = ".ftp_pwd($conn_id);
						   ftp_chdir($conn_id, $path_pic);
						   //echo "<br>after = ".ftp_pwd($conn_id);
						   $upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY); 
						   if ($upload) { //ทำการ copy ไฟล์มาที่ Server
							$path_db = '/pic'.'/'.$s_id.'/'.$host_file;
							//echo "ps id = ".$ps_id;
							//echo "<br>path db = ".$path_db;
							//echo "<br>s_id = ".$s_id;
							//$type1 = gettype($ps_id);
							//echo "<script>alert('$ps_id!');</script>";
							$insertpathpic = $insertdata->insertpic($ps_id, $path_db, $s_id);
								if($insertpathpic){
									//echo "<script>alert('การอัพโหลดรูปภาพ $host_file สำเร็จ! ".$path_db."');</script>";
									//echo "<script>alert('$type1');</script>";
									//echo "if1 work";
									$ps_id+=1;
									//echo "<script>alert('$ps_id after+');</script>";
									
								}
								
								else{
									echo "<script>alert('การสร้างฐานข้อมูลรูปมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
									//echo "if2 work";
								}
								
							  
							} else {
							  echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
						   }
						   //$ps_id_file +=1;
						   
						   //echo "<br> psid1 = ".$ps_id;
						   ftp_chdir($conn_id, '/');
						}
					}
				} 
				
				//$ps_id+=1;
				//echo $ps_id;
			} 
			//end loop
			//echo "<br> psid2 = ".$ps_id;
			//echo "<br> last psid1 = ".$lastps_id;
			//$lastps_id+=1;
			//echo "<br> last psid2 = ".$lastps_id;
			$picid=[];
            ftp_close($conn_id);
        } else {
            //echo "There was a problem while making $path\n";
            echo "<script>alert('ขออภัย! มีข้อผิดพลาดในการสร้างโฟล์เดอร์รูปภาพ โปรดติดต่อผู้ดูแลระบบในเมนูช่วยเหลือ!');</script>";
            ftp_close($conn_id);
        }
		//แจ้งเตือนสร้างข้อมูลสำเร็จ
		echo "<script>alert('บันทึกข้อมูลสำเร็จ!');</script>";
		echo "<script>window.location.href='manageshop.php'</script>";
		
	} else {
		echo "<script>alert('ขออภัยบันทึกข้อมูลผิดพลาด! โปรดติดต่อผู้ดูแลระบบในเมนู 'ช่วยเหลือ'');</script>";
		echo "<script>window.location.href='manageshop.php'</script>";
	}
	
}

function validate_form($file_input,$size_file,$file_type) { //เป็น function ที่เอาไว้ตรวจสอบว่าไฟล์ที่ผู้ใช้ upload ตรงตามเงื่อนไขหรือเปล่า
	$Max_File_Size = 5242880; //5 MB กำหนดขนาดไฟล์ที่ ใหญ่ที่สุดที่อนุญาตให้ upload มาที่ Server มีหน่วยเป็น bit
	//$Max_File_Size = 00; 
	$File_Type_Allow = array('image/jpeg', 'image/png','image/jpg',); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
	if ($file_input == "none") {
	   //$error = "ไม่มี file ให้ Upload";
	   $error = "<script>alert('เงื่อนไขการอัพโหลดรูปไม่ถูกต้อง : ไม่มีรูปภาพที่จะอัพโหลด ');</script>";
	} elseif ($size_file > $Max_File_Size) {
		//echo $size_file;
		//echo "Max file".$Max_File_Size;
	   //$error = "ขนาดไฟล์ใหญ่กว่า 5 MB";
	   $error = "<script>alert('เงื่อนไขการอัพโหลดรูปไม่ถูกต้อง : ไฟล์ขนาดใหญ่เกิน 5 MB ');</script>";
	} elseif (!check_type($file_type)) {
	   $error = "<script>alert('เงื่อนไขการอัพโหลดรูปไม่ถูกต้อง : ไม่อนุญาตให้อัพโหลดไฟล์ประเภทนี้ อัพโหลดได้เฉพาะไฟล์นามสกุล .jpeg, .jpg, .png เท่านั้น');</script>";
	} else {
	   $error = false;
	}
	//<script>alert('การลบรูป $host_file สำเร็จ!');</script>

	return $error;
 }
  
 function check_type($type_check) { //เป็น ฟังก์ชัน ที่ตรวจสอบว่า ไฟล์ที่ upload อยู่ในประเภทที่อนุญาตหรือเปล่า
	$File_Type_Allow = array('image/jpeg', 'image/gif', 'image/png','image/jpg'); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
	for ($i=0;$i<count($File_Type_Allow);$i++) {
	   if ($File_Type_Allow[$i] == $type_check) {
		  return true;
	   }
	}
	return false;
 }
 function upload($conn_id, $login_result, $host_file, $local_file,$path_pic){
	ftp_chdir($conn_id, $path_pic);
	// check connection  
		echo ftp_pwd($conn_id);
		if ((!$conn_id) || (!$login_result)) {
			echo "<script>alert('การเชื่อมต่อระบบผิดพลาด โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>";
			echo "<script>window.location.href='manageshop.php'</script>";
			exit;
		}   
		// upload the file  
		$upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY);    
		// check upload status  
		if (!$upload) {
			echo "<script>alert('การอัพโหลดรูป $host_file ผิดพลาด โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>";
			echo "<script>window.location.href='manageshop.php'</script>";
		}    
		else{
			//print_r( error_get_last() );
			echo "<script>alert('การอัพโหลดรูป $host_file สำเร็จ! ขนาดไฟล์รูปคือ $size_file');</script>";
			echo "<script>window.location.href='manageshop.php'</script>";
		}
		ftp_close($conn_id);
}

function delpic($conn_id, $login_result, $host_file,$path){
	ftp_chdir($conn_id, $path);
	//echo ftp_pwd($conn_id);
	if (ftp_delete($conn_id, $host_file)) {
		echo "<script>alert('การลบรูป $host_file สำเร็จ!');</script>";
		echo "<script>window.location.href='manageshop.php'</script>";
	   } else {
		echo "<script>alert('การลบรูป $host_file ผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
		echo "<script>window.location.href='manageshop.php'</script>";
	}
	ftp_close($conn_id);
}
function string_sanitize($s) {
    $result = str_replace("'", "''", $s);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>จัดการร้านค้า</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="จัดการร้านค้า">
	<link rel="shortcut icon" href="pic/logo.png">

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
	</style>
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
									<title>Menu</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div>


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
							<a class="nav-link " href="updatecontent.php">
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
							<a class="nav-link active" href="manageshop.php">
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

	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">จัดการร้านค้า</h1>
					<br>
				</div>
				<div class="row g-3 mb-4 align-items-center justify-content-between">
					<div class="col-auto">
						<button type="button" class="btn app-btn-primary" data-toggle="modal" data-target="#addModal" style="color: rgb(251, 251, 251);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
							</svg> เพิ่มร้านค้า</button>					
					</div>
					<div class="col-auto">
						<div class="page-utilities">
							<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
								<div class="col-auto">
									<form class="table-search-form row gx-1 align-items-center">
										<div class="col-auto input-group">
											<div class="input-group-append">
												<span class="input-group-text" style="height: 37px;">
													<i class="fas fa-search"></i>
												</span>
											</div>
											<input type="text" class="form-control" id="search-orders" placeholder="ค้นหาชื่อร้านค้า, ประเภทร้านค้า....">
										</div>
									</form>
								</div>
								<!--//col-->
								<div class="col-auto ml-3">
									การแสดงผล
								</div>
								<div class="col-auto">
									<select id='len-menu' class="form-select w-auto">
										<option selected value="l_10">10</option>
										<option value="l_20">20</option>
										<option value="l_50">50</option>
										<option value="l_all">ทั้งหมด</option>
									</select>
								</div>
							</div>
							<!--//row-->
						</div>
						<!--//table-utilities-->
					</div>
					<!--//col-auto-->
				</div>
				<!--//row-->


				<div class="tab-content" id="orders-table-tab-content">
					<!--tab-all-->
					<div class="tab-pane fade show active" id="shops-all" role="tabpanel" aria-labelledby="shops-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-center">
										<thead>
											<tr>
												<th class="cell  text-truncate" style="max-width: 150px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
														<path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
													</svg> รหัสร้านค้า
												<th class="cell">ชื่อร้านค้า</th>
												<th class="cell">Shop Name</th>
												<th class="cell">คำอธิบายร้านค้า</th>
												<th class="cell text-truncate">ประเภทร้านค้า</th>
												<th class="cell ">เวลาเปิด-ปิด</th>
												<th class="cell ">เบอร์โทรศัพท์</th>
												<th class="cell text-truncate" >Google Map</th>
												<th class="cell"></th>
											</tr>
										</thead>
										
										<!-- แสดงข้อมูลร้านทั้งหมด -->
										
											<tbody>
												<?php

													$s_id = $_GET['s_id'];
													$fetchdata = new DB_con();
													$sql = $fetchdata->fetchdata();										
													while ($row = mysqli_fetch_array($sql)) {
												?>
												<!--loop ข้อมูลเริ่มจากข้างล่าง-->
												<tr>
													<td class="cell"><?php echo $row['s_id']; ?></td>
													<td class="cell"><?php echo $row['s_name']; ?></td>
													<td class="cell"><?php echo $row['s_name_eng']; ?></td>
													<td class="cell text-truncate" style="max-width: 200px;"><?php echo $row['s_detail']; ?></td>
													<td class="cell"><?php echo $row['s_type']; ?></td> <!-- หา t_name จาก t_id -->
													<td class="cell text-truncate"><?php echo $row['s_time']; ?></td>
													<td class="cell" style="max-width: 200px;"><?php echo $row['s_phone']; ?></td>
													<!--map link อย่าเปลี่ยนตรงคำว่า ลิงค์ เอาข้อมูลใส่ใน href= -->
													<td class="cell"><a href="<?php echo $row['s_address']; ?>" target="_blank">
															<h5><span class="badge app-btn-secondary text-center">ลิงค์</span></h5>
														</a></td>
														
													<td class="cell">
														<div class="dropdown">
															<div class="btn btn-warning" data-toggle="dropdown" aria-expanded="false">
																แก้ไข/ลบ
																<i class="bi bi-caret-down-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
																	<path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
																</svg>
															</div>
															<!--//dropdown-toggle-->
															<ul class="dropdown-menu dropdown-menu-right">
															
															 
																<li><a class="dropdown-item" data-toggle="modal" data-target="#editModal<?php echo $row['s_id']; ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
																		</svg>แก้ไข</a></li>

																<li>
																	<hr class="dropdown-divider">
																</li>

																<li><a onclick="setdelmodal('<?php echo $row['s_id']; ?>','<?php echo $row['s_name']; ?>')"  class="dropdown-item text-danger" data-toggle="modal" data-target="#delModal"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
																			<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
																		</svg>ลบข้อมูล</a>
																</li>
															</ul>
														</div>
														<!--//dropdown-->
													</td>
												</tr>
										<!--Edit modal-->
												
										<?php
										include 'editmodal.php';
										$picbyid=[];
										$picpath=[];
										$picidall=[];
										$id =1;

										}
										?>
										
										
										<!--จบ loop-->
											</tbody>
									</table>
								</div>
								<!--//table-responsive-->
							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
					</div>
					<!--//end tab-all-->

					<!--tab food-->
					<div class="tab-pane fade show " id="shops-food" role="tabpanel" aria-labelledby="shops-food-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-center">
										<thead>
											<tr>
												<th class="cell  text-truncate" style="max-width: 150px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
														<path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
												</svg> รหัสร้านค้า
												<th class="cell">ชื่อร้านค้า</th>
												<th class="cell">Shop Name</th>
												<th class="cell">คำอธิบายร้านค้า</th>
												<th class="cell text-truncate">ประเภทร้านค้า</th>
												<th class="cell ">เวลาเปิด-ปิด</th>
												<th class="cell ">เบอร์โทรศัพท์</th>
												<th class="cell text-truncate" >Google Map</th>
												<th class="cell"></th>
											</tr>
										</thead>
										
										<!-- แสดงข้อมูลร้านทั้งหมด -->
										
											<tbody>
												<?php

													//$s_id = $_GET['s_id'];
													$fetchdata = new DB_con();
													$sql = $fetchdata->fetchdatfoodall();										
													while ($row = mysqli_fetch_array($sql)) {
														echo $row['s_id'];
												?>
												<!--loop ข้อมูลเริ่มจากข้างล่าง-->
												<tr>
													<td class="cell"><?php echo $row['s_id']; ?></td>
													<td class="cell"><?php echo $row['s_name']; ?></td>
													<td class="cell"><?php echo $row['s_name_eng']; ?></td>
													<td class="cell text-truncate" style="max-width: 200px;"><?php echo $row['s_detail']; ?></td>
													<td class="cell"><?php echo $row['s_type']; ?></td> <!-- หา t_name จาก t_id -->
													<td class="cell text-truncate"><?php echo $row['s_time']; ?></td>
													<td class="cell" style="max-width: 200px;"><?php echo $row['s_phone']; ?></td>
													<!--map link อย่าเปลี่ยนตรงคำว่า ลิงค์ เอาข้อมูลใส่ใน href= -->
													<td class="cell"><a href="<?php echo $row['s_address']; ?>" target="_blank">
															<h5><span class="badge app-btn-secondary text-center">ลิงค์</span></h5>
														</a></td>
														
													<td class="cell">
														<div class="dropdown">
															<div class="btn btn-warning" data-toggle="dropdown" aria-expanded="false">
																แก้ไข/ลบ
																<i class="bi bi-caret-down-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
																	<path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
																</svg>
															</div>
															<!--//dropdown-toggle-->
															<ul class="dropdown-menu dropdown-menu-right">
															
															 
																<li><a class="dropdown-item" data-toggle="modal" data-target="#editModal<?php echo $row['s_id']; ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
																		</svg>แก้ไข</a></li>

																<li>
																	<hr class="dropdown-divider">
																</li>

																<li><a onclick="setdelmodal('<?php echo $row['s_id']; ?>','<?php echo $row['s_name']; ?>')"  class="dropdown-item text-danger" data-toggle="modal" data-target="#delModal"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																			<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
																			<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
																		</svg>ลบข้อมูล</a>
																</li>
															</ul>
														</div>
														<!--//dropdown-->
													</td>
												</tr>
										<!--Edit modal-->
												
										<?php
										include 'editmodal.php';
										$picid=[];
										$picpath=[];
										//$id =1;
										}
										?>
										
										
										<!--จบ loop-->
											</tbody>
									</table>
								</div>
								<!--//table-responsive-->
							</div>
							<!--//app-card-body-->
						</div>
						<!--//app-card-->
					</div>
					<!--//end tab-food-->
					
				</div>
				
				<!--//tab-content-->

			</div>
			<!--//container-fluid-->
		</div>
		<!--//app-content-->

		<!--Modal zone
<form action=""><input type="text" id="sphone"></form>-->

		<!--Add shop modal2-->						
		<div class="modal" tabindex="-1" id="addModal" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
			  	<div class="modal-content" style="background-color: whitesmoke;">
					<div class="modal-header" style="background-color: #15A362;">
						<h4 class="col-12 modal-title text-center text-white">เพิ่มร้านค้า</h4>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="color: rgb(36, 36, 36);">
						
						<div class="container">
							<form name="insert" action="" method="POST" id="addshopForm" enctype="multipart/form-data">
								<div class="app-card-header p-3">
									<h5 class="app-card-title text-primary" >ส่วนที่ 1 ： ข้อมูลร้านค้า</h5>
								</div>
								<div class="app-card-body p-4 pt-0"></div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
											<label for="shop_name" class="col-sm-3 col-form-label">ชื่อร้านค้า</label>
											<div class="col-sm-7">
												<input type="text"  class="form-control" name="shop_name" id="shop_name" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$" required placeholder="โปรดระบุชื่อร้านค้า">
											</div>
										</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
											<label for="shop_name_eng" class="col-sm-3 col-form-label">Shop Name</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" name="shop_name_eng" id="shop_name_eng" title="โปรดใส่ข้อมูลให้ถูกต้อง อนุญาตให้ใช้ 's ลงในข้อความได้" pattern="^(\w|(\w(\w|'|\ )*\w))$" required placeholder="Please input shop name (โปรดระบุชื่อร้านค้าภาษาอังกฤษ)">
											</div>
									</div>	
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_type" class="col-sm-3 col-form-label">ประเภทร้านค้า</label>
										<div class="col-sm-7" name="shop_type">
											<div class="col-auto mt-2" name="shop_type">
												<input class="form-check-input" type="radio" value = "ร้านอาหาร" name="shop_type" id="food">
												<label class="form-check-label" for="food">ร้านอาหาร</label>
											</div>
											<div class="col-auto mt-1 ">
												<input class="form-check-input" type="radio" value = "ร้านของหวานและเครื่องดื่ม" name="shop_type" id="drink" >
												<label class="form-check-label" for="drink">ร้านของหวานและเครื่องดื่ม</label>
											</div>
											<div class="col-auto mt-1 ">
												<input class="form-check-input" type="radio" value = "ร้านค้าและการบริการอื่นๆ" name="shop_type" id="others">
												<label class="form-check-label" for="others">ร้านค้าและบริการอื่นๆ</label>
											</div>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_phone" class="col-sm-3 col-form-label" >เบอร์โทรศัพท์</label>
										<div class="col-sm-7">
											<input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="ข้อมูลไม่ถูกต้องโปรดใส่ในรูปแบบ 012-345-6789" class="form-control" name="shop_phone" id="shop_phone" required placeholder="โปรดใส่หมายเลขให้ครบ 9-10 หลัก" onkeyup="autoTab(this)" min="9" max="10">
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_map" class="col-sm-3 col-form-label">แผนที่ Google Map</label>
										<div class="col-sm-7 ">
											<input type="url" class="form-control" name="shop_map" id="shop_map" placeholder="โปรดระบุแผนที่ Google Map เป็นลิงค์" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^']*$" >
											
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_address" class="col-sm-3 col-form-label">ที่อยู่ร้านค้า</label>
										<div class="col-sm-7 form-floating">
											<textarea class="form-control"  name="shop_address" id="shop_address" style="height: 80px;" required placeholder="โปรดกรอกที่อยู่ร้านค้าให้ถูกต้อง" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$" ></textarea>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_time" class="col-sm-3 col-form-label">เวลาเปิด-ปิด</label>
										<div class="col-sm-7 form-floating">
											<textarea class="form-control"  name="shop_time" id="shop_time" style="height: 100px;" required placeholder="โปรดระบุวัน และเวลาเปิด-ปิดของร้านค้า" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$" ></textarea>
											 <p style="color: red;"> กรุณาอย่านำข้อความ &#60;br&#62; ออก </p>
										</div>
									</div>
									<div class="form-group row mb-3">
										<div class="col-sm-1"></div>
										<label for="shop_exp" class="col-sm-3 col-form-label">คำอธิบายร้านค้า</label>
										<div class="col-sm-7 form-floating">
											<textarea type="text" class="form-control" name="shop_exp" id="shop_exp" style="height: 100px;" placeholder="โปรดระบุคำอธิบายร้านค้าสั้นๆ" title="โปรดใส่ข้อมูลให้ถูกต้อง ไม่อนุญาตให้ใช้สัญลักษณ์พิเศษณ์เช่น ' ลงในข้อความ" pattern="[^':]*$" ></textarea>
										</div>
									</div>
									<div class="app-card-header p-3">
								<h5 class="app-card-title text-primary">ส่วนที่ 2 ： รูปภาพร้านค้า</h5>
								รูปภาพร้านค้าควรมีขนาดไม่เกิน 1280*853 pixel และจำกัดขนาดไฟล์ต่อรูปไม่เกิน 5 MB
							</div>
							<div class="app-card-body p-3 pt-0 ">
								<div class="form-group row bg-white" >
									<div class="col-lg-4 col-12" >
										<label for="shop_pic1" class="col-form-label text-primary"><b>รูปภาพที่ 1</b></label>
										<button class="btn btn-outline-danger float-right mt-1 " type="button" id="emp1">ลบ</button>
										<div class="col-12 text-center" >
											<img id="img_pic1" width="210" height="142" class="rounded mx-auto d-block"/>
											<input type="file" name="file[]" class="form-control form-control-sm mb-1" id="shop_pic1"  accept="image/gif, image/jpeg, image/png, image/jpg" required  title="โปรดใส่ข้อมูล"  onchange="document.getElementById('img_pic1').src = window.URL.createObjectURL(this.files[0])">
											
										</div>
									</div>
									
									<div class="col-lg-4 col-12" >
										<label for="shop_pic2" class="col-form-label text-primary"><b>รูปภาพที่ 2</b></label>
										<button class="btn btn-outline-danger float-right mt-1 " type="button" id="emp2">ลบ</button>
										<div class="col-12 text-center " >
											<img id="img_pic2" width="210" height="142" class="rounded mx-auto d-block"/>
											<input type="file" name="file[]" class="form-control form-control-sm mb-1" id="shop_pic2" accept="image/gif, image/jpeg, image/png, image/jpg"  disabled onchange="document.getElementById('img_pic2').src = window.URL.createObjectURL(this.files[0])" >

										</div>
									</div>
									
									<div class="col-lg-4 col-12" >
										<label for="shop_pic3" class="col-form-label text-primary" ><b>รูปภาพที่ 3</b></label>
										<button class="btn btn-outline-danger float-right mt-1 " type="button" id="emp3">ลบ</button>
										<div class="col-12 text-center" >
											<img id="img_pic3" width="210" height="142" class="rounded mx-auto d-block"/>
											<input type="file" name="file[]" class="form-control form-control-sm mb-1" id="shop_pic3" accept="image/gif, image/jpeg, image/png, image/jpg"  disabled onchange="document.getElementById('img_pic3').src = window.URL.createObjectURL(this.files[0])">

										</div>
									</div>
								</div>
								
									<div class="modal-footer">
										<!-- <input type="submit" name="insert" class="btn app-btn-primary" value="สร้างข้อมูล"> -->
										<input type="submit" name="insert" class="btn app-btn-primary btn-lg" value="สร้างข้อมูล">
										<button type="button" class="btn btn-secondary " data-dismiss="modal">ยกเลิก</button>
									</div>
								</div> <!--End card body -->
							</form> <!--End first form -->

							
							<!--Upload pic-->
							
						</div>
					</div>
				</div>
			</div>
		</div>								


		<!--Delete Modal-->
		<div class="modal" tabindex="-1" id="delModal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<h5 class="col-12 modal-title text-center text-white">ลบข้อมูล</h5>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="color: rgb(36, 36, 36);">
						<div>
							<br>
							<h6 class="text-center">คุณยืนยันที่จะลบ " <span id="del_name"></span> " หรือไม่?</h6>
							<br>
						</div>
					</div>
					<div class="modal-footer">
						<button onclick="deleteid()" type="button" class="btn btn-danger text-white">ยืนยัน</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
					</div>
				</div>
			</div>
		</div>
		<!--End Modal zone-->
		<div class="wrapper flex-grow-1"></div>
		<footer class="app-footer">
		<div class="container text-center py-3">
				<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			   <small class="copyright"><a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank"></a></small>
		   </div>
	    </footer><!--//app-footer-->

	</div>
	
	<!--//app-wrapper-->


	<!-- Javascript -->
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


	<!-- Page Specific JS -->
	<script src="assets/js/app.js"></script>

	<script>


		$(document).ready(function() {

		/*
			//$('#test').DataTable();
			//var table = $('#test').DataTable({searching: false, paging: false, info: false});
			var phone = "";
			//console.log("TESTsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss");
			$( "#addshopForm #shop_phone" ).keyup(function() {
				
				var length = $('#addshopForm #shop_phone').val().length;
				console.log(length);
				if(length==12){
					phone = $('#addshopForm #shop_phone').val();
					console.log(phone);
					var place_id = "";
					var search_placeid_url = "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=%2B+66"+phone+"&inputtype=phonenumber&fields=name,place_id&key=AIzaSyCoIOCwmeiyH7Q4pWoi68r2SD2AmJTZ_Ws";
					console.log(search_placeid_url);
					$.getJSON(search_placeid_url, function(data) {
						place_id = data.candidates[0].place_id;
						console.log(data);
						//$('#addshop #place_id').val(place_id);
						var search_time_url = "https://maps.googleapis.com/maps/api/place/details/json?place_id="+place_id+"&language=th&fields=name,opening_hours/weekday_text&key=AIzaSyCoIOCwmeiyH7Q4pWoi68r2SD2AmJTZ_Ws";
						$.getJSON(search_time_url, function(time) {
							console.log(time.result.opening_hours.weekday_text);
							var time = time.result.opening_hours.weekday_text;
							var txt = time[0]+"\n<br>\n"+time[1]+"\n<br>\n"+time[2]+"\n<br>\n"+time[3]+"\n<br>\n"+time[4]+"\n<br>\n"+time[5]+"\n<br>\n"+time[6];
							$('#addshopForm #shop_time').text(txt);
						});
					});
				}
			});

			$( "#sname" ).keyup(function(){
				alert('work');
			});
			//$( "#addshop #shop_phone" ).val('kuyyyyyy');
			*/
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
				}
			}); // "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"p><"col-sm-4"f>>tip'

			// give search function to search box
			$('#search-orders').on('keyup', function() {
				table.search(this.value).draw();
			});

			// give select length of table function when select
			$('#len-menu').change(function() {
				if ($(this).val() === 'l_all') {
					table.page.len(-1).draw();
				}
				if ($(this).val() === 'l_10') {
					table.page.len(10).draw();
				}
				if ($(this).val() === 'l_20') {
					table.page.len(20).draw();
				}
				if ($(this).val() === 'l_50') {
					table.page.len(50).draw();
				}
			});


			$('input:checkbox').attr('checked', false);
			//$('input:checkbox[name="addpic'+2+'"]').attr('disabled','disabled');
			//$('input:checkbox[name="addpic'+3+'"]').attr('disabled','disabled');
			$('input:radio').attr("required", true);
			
			//setting disabled and check for radio
				$('input:radio[name="editchoice'+1+'"]').change(function() {
					//$('#delcheck1').attr('disabled','disabled');
					//alert(i);
					if ($(this).val() === 'ไม่เปลี่ยนแปลง') {
						//alert('ไม่เปลี่ยนแปลง');
						$('input:file[name="e_pic'+1+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+1+'"]').val('');
						
					}
					else if ( $(this).val() === 'เปลี่ยนรูป') {
						//$("#pic1_02").append('<input type="file" name="file[]" class="form-control form-control-sm mb-1" accept="image/*"">');
						$('input:file[name="e_pic'+1+'"]').removeAttr("disabled");
						//$('input:file[name="e_pic'+1+'"]').attr('required', 'required');
						//$("#changecheck2").prop('checked', true);
					}
					else{
						//alert('ลบ');
						$('input:file[name="e_pic'+1+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+1+'"]').val('');
					}
				});
				
	
			$('input:radio[name="editchoice'+2+'"]').change(function() {
					//alert(i);
					if ($(this).val() === 'ไม่เปลี่ยนแปลง') {
						//alert('ไม่เปลี่ยนแปลง');
						$('input:file[name="e_pic'+2+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+2+'"]').val('');
						
					}
					else if ( $(this).val() === 'เปลี่ยนรูป') {
						//$("#pic1_02").append('<input type="file" name="file[]" class="form-control form-control-sm mb-1" accept="image/*"">');
						$('input:file[name="e_pic'+2+'"]').removeAttr("disabled");
						
					}
					else{
						//alert('ลบ');
						$('input:file[name="e_pic'+2+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+2+'"]').val('');
					}
				});

				$('input:radio[name="editchoice'+3+'"]').change(function() {
					//alert(i);
					if ($(this).val() === 'ไม่เปลี่ยนแปลง') {
						//alert('ไม่เปลี่ยนแปลง');
						$('input:file[name="e_pic'+3+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+3+'"]').val('');
						
					}
					else if ( $(this).val() === 'เปลี่ยนรูป') {
						//$("#pic1_02").append('<input type="file" name="file[]" class="form-control form-control-sm mb-1" accept="image/*"">');
						$('input:file[name="e_pic'+3+'"]').removeAttr("disabled");
					}
					else{
						//alert('ลบ');
						$('input:file[name="e_pic'+3+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+3+'"]').val('');
					}
				});
			
				//checkbox for remove disable pic
				$('input:checkbox[name="addpic'+1+'"]').click(function() {				
					if( $(this).is(':checked') ){
						$('input:file[name="e_pic'+1+'"]').removeAttr("disabled");
					}
					else{
						$('input:file[name="e_pic'+1+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+1+'"]').val('');
					}
				});	
				$('input:checkbox[name="addpic'+2+'"]').click(function() {				
					if( $(this).is(':checked') ){
						$('input:file[name="e_pic'+2+'"]').removeAttr("disabled");
					}
					else{
						$('input:file[name="e_pic'+2+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+2+'"]').val('');
					}
				});	

				$('input:checkbox[name="addpic'+3+'"]').click(function() {				
					if( $(this).is(':checked') ){
						$('input:file[name="e_pic'+3+'"]').removeAttr("disabled");
					}
					else{
						$('input:file[name="e_pic'+3+'"]').attr('disabled','disabled');
						$('input:file[name="e_pic'+3+'"]').val('');
					}
				});	

/*
				//reset choice when clicked btn_edit{
				$('#btn_edit').click(function() {				
					alert('Checked');

				});	
*/	
			$("#editModal").on('show.modal', function(event){
				var button = $(event.relatedTarget);           
				var id 	=	document.getElementById("shop_id_edit").value;
				//$('input:radio').attr('checked', false);
				//alert(id);	
				//alert("ok".id);        
				$.get('update.php?id='+id,
					function(data) {
					$("#editModal").html(data);   
					
				});
			});

			//set upload 1>2>3
			//$('#shop_pic3').attr('disabled','disabled');
			//$('#shop_pic2').attr('disabled','disabled');
			
			$('#shop_pic1').change(function() {
				if($(this).val()){
					$('#shop_pic2').removeAttr("disabled");
					$('#shop_pic2').change(function() {
						if($(this).val()){
							$('#shop_pic3').removeAttr("disabled");
						}
					});
				}
				//$('#shop_pic2').attr('disabled','disabled');
				//$('#shop_pic3').attr('disabled','disabled');
			});

			//set click ลบ file is empty
			$('#emp1').click(function() {
				$('#shop_pic1').val('');
				$('#shop_pic2').val('');
				$('#shop_pic3').val('');
				$('#img_pic1').removeAttr('src');
				$('#img_pic2').removeAttr('src');
				$('#img_pic3').removeAttr('src');
				$('#shop_pic2').attr('disabled','disabled');
				$('#shop_pic3').attr('disabled','disabled');
			});
			$('#emp2').click(function() {
				$('#shop_pic2').val('');
				$('#shop_pic3').val('');
				$('#img_pic2').removeAttr('src');
				$('#img_pic3').removeAttr('src');
				$('#shop_pic3').attr('disabled','disabled');
			});
			$('#emp3').click(function() {
				$('#shop_pic3').val('');
				$('#img_pic3').removeAttr('src');
				
			});



			
			$('input:checkbox[name="addpic'+2+'"]').change(function() {
				if(this.checked){
					$('input:checkbox[name="addpic'+3+'"]').removeAttr("disabled");
				}
				else{
					$('input:checkbox[name="addpic'+3+'"]').attr('disabled','disabled');
				}
			});
			


			if($('[name="img_pic_edit'+1+'"]').attr('src') != ''){
				$('input:checkbox[name="addpic'+2+'"]').removeAttr("disabled");
			}
			else{
				$('input:checkbox[name="addpic'+2+'"]').attr('disabled','disabled');
			}
			if($('[name="img_pic_edit'+2+'"]').attr('src') != ''){
				$('input:checkbox[name="addpic'+3+'"]').removeAttr("disabled");
			}
			else{
				$('input:checkbox[name="addpic'+3+'"]').attr('disabled','disabled');
			}
			
			
	}); //end document ready
		var setid = null;

		function setdelmodal(id, shop_name) {
			setid = id
			//console.log(shop_name);
			document.getElementById("del_name").innerHTML = shop_name;
		}

		function deleteid() {
			window.location.href = "delete.php?del="+ setid;
		}

		function deletepic($s_id) {
			window.location.href = "deletepic.php?del="+ $s_id;
		}

		function is_checked($db_value, $html_value){
			if($db_value == $html_value){
				return "checked";
			}
			else{
				return "";
			}
		}
		function autoTab(obj){
		/* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
		หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
		4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
		รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น ___-___-____
		หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
		ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
		*/
			var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
			var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
			var returnText=new String("");
			var obj_l=obj.value.length;
			var obj_l2=obj_l-1;
			for(i=0;i<pattern.length;i++){           
				if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
					returnText+=obj.value+pattern_ex;
					obj.value=returnText;
				}
			}
			if(obj_l>=pattern.length){
				obj.value=obj.value.substr(0,pattern.length);           
			}
		}

		
	</script>
</body>

</html>