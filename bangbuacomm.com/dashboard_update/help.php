<?php 
    include('auth.php'); 
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ช่วยเหลือ</title>
    
    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="ช่วยเหลือ">
	<link rel="shortcut icon" href="pic/logo.png">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.php"><img class="logo-icon mr-2" src="pic/logo.png" alt="logo"><span class="logo-text"><?php echo $_SESSION['a_fn']; ?></span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="index.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">ภาพรวม</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="updatecontent.php">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
						        </span>
		                         <span class="nav-link-text">อัพเดตคอนเทนท์</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="manageshop.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">จัดการร้านค้า</span>
					        </a><!--//nav-link-->
					    </li>
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link active" href="help.php">
								<span class="nav-icon">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg>
								 </span>
								 <span class="nav-link-text">ช่วยเหลือ</span>
							</a><!--//nav-link-->
						</li><!--//nav-item-->	
						<li class="nav-item">
							<a class="nav-link" href="settings.php">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
										<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
									</svg>
								</span>
								<span class="nav-link-text">ตั้งค่า</span>
							</a><!--//nav-link-->
						</li><!--//nav-item-->
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">

							<li class="nav-item">
								<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<a class="nav-link" href="logout.php">
									<span class="nav-icon">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
											<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
										</svg>
									 </span>
									 <span class="nav-link-text">ออกจากระบบ</span>
								</a><!--//nav-link-->
							</li>
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
				<h1 class="app-page-title">ช่วยเหลือ</h1>
				<div class="app-card app-card-accordion shadow-sm mb-4 ">
				    <div class="app-card-header p-3">
				       <h4 class="app-card-title">อัพเดตคอนเทนท์</h4>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4 pt-0">
					    <div id="faq3-accordion" class="faq3-accordion faq-accordion accordion">
                            <div class="card">
                                <div class="card-header" id="faq3-heading-1">
                                    <h4 class="card-title">    
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq3-1" aria-expanded="false" aria-controls="faq3-1"><span class="pe-icon pe-7s-plus"></span>เมนูในการอัพเดตคอนเทนต์</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq3-1" aria-labelledby="faq3-heading-1" data-parent="#faq3-accordion">
                                    <div class="card-body p-3 text-center">
                                        <div >
                                        <img src="pichelp/อัพเดตคอนเทนท์.png" width="70%" height="auto">
                                        </div >
                                        <div class="float-center">
                                        1.แถบเมนูอัพเดตคอนเทนท์
                                        <br>
                                        2.ส่วนจัดการร้านค้าแนะนำ
                                        <br>
                                        3.แสดงส่วนให้เลือกร้านค้าแนะนำ
                                        <br>
                                        4.ปุ่มยืนยันการเลือก
                                        </div >
                                    </div>
                                </div>
                            </div>
                         
                            <div class="card">
                                <div class="card-header" id="faq3-heading-1">
                                    <h4 class="card-title">    
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq3-3" aria-expanded="false" aria-controls="faq3-3"><span class="pe-icon pe-7s-plus"></span>วิธีแก้ไขร้านค้าแนะนำ</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq3-3" aria-labelledby="faq3-heading-1" data-parent="#faq3-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div class = ""  >
                                    <img src="pichelp/แก้ร้านค้าแนะนำ1.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        1.เลือกที่เมนูอัพเดตคอนเทนท์
                                        </div >
                                        <div >
                                        2.จะเห็นหัวข้อการจัดการร้านค้าแนะนำ เลือกมา4ร้านค้าจากร้านค้าทั้งหมด
                                        </div >
                                        <div >
                                        3.เมื่อเลือกร้านค้าแนะนำได้แล้วกด “ยืนยันการเลือก”
                                        </div >
                                        <div class = "p-3"  >
                                    <img src="pichelp/แก้ร้านค้าแนะนำ2.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        4.หลักจากยืนยันการเลือกจะขึ้นแจ้งเตือน “บันทึกข้อมูสำเร็จ”
                                        </div >
                                        <div class = "p-3"  >
                                    <img src="pichelp/แก้ร้านค้าแนะนำ3.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        5.หากเลือกร้านค้าแนะนำเกิน 4 ร้านจะขึ้นแจ้งเตือนบอกให้เลือกเพียง 4 ร้านค้าเท่านั้น
                                        </div >
                                    </div>
                                </div>
                            </div>
          
							<div class="card">
                                <div class="card-header" id="faq3-heading-2">
                                    <h4 class="card-title"> 
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq3-2" aria-expanded="false" aria-controls="faq3-2"><span class="pe-icon pe-7s-plus"></span>วิธีแก้ไขวิดีโอแนะนำ</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq3-2" aria-labelledby="faq3-heading-2" data-parent="#faq3-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div   >
                                    <img src="pichelp/แก้วิดีโอ1.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        1.เลือกที่เมนูอัพเดตคอนเทนท์
                                        </div >
                                        <div >
                                        2.นำลิ้งก์วิดีโอที่จะใส่เป็นวิดีโอแนะนำมาวางในช่อง
                                        </div >
                                        <div >
                                        3.กดปุ่มแก้ไข
                                        </div >
                                        <div   >
                                    <img src="pichelp/แก้วิดีโอ2.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        4.หลังจากกดปุ่มแก้ไขแล้วจะขึ้นแจ้งเตือนว่า “แก้ไขวิดีโอสำเร็จ”
                                        </div >
                                        <div  >
                                    <img src="pichelp/แก้วิดีโอ3.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        5.เสร็จแล้วจะแสดงวิดีโอดังภาพ
                                        </div >
                                    </div>
                                </div>
                            </div>
                            <!--//card-->                                       
	                    </div><!--//faq3-accordion-->
				    </div><!--//app-card-body-->
				</div><!--//app-card-->
			    
                <div class="app-card app-card-accordion shadow-sm mb-4">
				    <div class="app-card-header p-4 pb-2  border-0">
				       <h4 class="app-card-title">การจัดการร้านค้า</h4>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4 pt-0">
					    <div id="faq1-accordion" class="faq1-accordion faq-accordion accordion">
							<div class="card">
                                <div class="card-header" id="faq1-heading-4">
                                    <h4 class="card-title">
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq1-4" aria-expanded="false" aria-controls="faq1-4"><span class="pe-icon pe-7s-plus"></span>เมนูการในจัดการร้านค้า</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq1-4" aria-labelledby="faq1-heading-4" data-parent="#faq1-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div  >
                                    <img src="pichelp/จัดการร้านค้า.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        1.แถบเมนูจัดการร้านค้า
                                        </div >
                                        <div >
                                        2.ส่วนตารางแสดงผลร้านค้าทั้งหมดในระบบ
                                        </div >
                                        <div >
                                        3.ส่วนค้นหาร้านค้า 
                                        </div >
                                        <div >
                                        4.ตัวเลือกจำนวนการแสดงผลร้านค้า
                                        </div >
                                        <div >
                                        5.ปุ่มเพิ่มร้านค้า
                                        </div >
                                        <div >
                                        6.ปุ่มแก้ไข/ลบ ข้อมูลร้านค้า
                                        </div >
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faq1-heading-1">
                                    <h4 class="card-title">
                                       
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq1-1" aria-expanded="false" aria-controls="faq1-1"><span class="pe-icon pe-7s-plus"></span>วิธีเพิ่มข้อมูลร้านค้า</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq1-1" aria-labelledby="faq1-heading-1" data-parent="#faq1-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div  >
                                    <img src="pichelp/เพิ่มร้านค้า1.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        <div >
                                        1.กดเลือกที่เมนูจัดการร้านค้า
                                        </div >
                                        <div >
                                        2.เลือกปุ่ม เพิ่มร้านค้า
                                        </div >
                                    </div >
                                    <div >
                                    <img src="pichelp/เพิ่มร้านค้า2.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        3.กรอกข้อมูลรายละเอียดร้านค้าให้ครบถ้วนไม่ให้ใส่ตัวอักษรพิเศษเช่น ' ลงในข้อความ ในการเขียนชื่อภาษาอังกฤษอนุญาตให้เขียน 's ได้เท่านั้น 
                                        </div >
                                        <div >
                                        4.ใส่รูปภาพร้านค้าอย่างน้อย 1 รูป มากสุด 3 รูป
                                        </div >
                                        <div >
                                        5.หลังจากกรอกข้อมูลเสร็จ คลิก สร้างข้อมูล
                                        </div >
                                        </div >
                                    <div  >
                                    <img src="pichelp/เพิ่มร้านค้า3.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        6.จะขึ้นแจ้งเตือนว่า “บันทึกข้อมูลสำเร็จ” กดตกลงเป็นอันบันทึกข้อมูลเสร็จเรียบร้อย
                                        </div >
                                        <div >
                                        *หากข้อมูลไม่ขึ้นลองเพิ่มข้อมูลใหม่อีกครั้ง ถ้าเพิ่มไม่ได้ให้ติดต่อผู้ดูแลระบบในเมนูช่วยเหลือ
                                        </div >
                                        </div >
                                    <div  >
                                    <img src="pichelp/เพิ่มร้านค้า4.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        7.หลังจากบันทึกข้อมูลเสร็จจะขึ้นข้อมูลของร้านค้าที่กรอกไปตามภาพ
                                        </div >
                                        </div >
                                    </div>
                                </div>
                            </div>
                            <!--//card-->
                            <div class="card">
                                <div class="card-header" id="faq1-heading-2">
                                    <h4 class="card-title">
                                       
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq1-2" aria-expanded="false" aria-controls="faq1-2"><span class="pe-icon pe-7s-plus"></span>วิธีแก้ไขข้อมูลร้านค้า</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq1-2" aria-labelledby="faq1-heading-2" data-parent="#faq1-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div  >
                                    <img src="pichelp/แก้ไขข้อมูล1.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        1.เลือกเมนูจัดการร้านค้า
                                        </div >
                                        <div >
                                        2.คลิกที่ แก้ไข / ลบ
                                        </div >
                                        <div >
                                        3.จากนั้นเลือกแก้ไข
                                        </div >
                                    </div>
                                    <div  >
                                    <img src="pichelp/แก้ไขข้อมูล2.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        4.สามารถเลือกหัวข้อและรูปภาพที่จะแก้ไขได้
                                        </div >
                                    </div>
                                    <div  >
                                    <img src="pichelp/แก้ไขข้อมูล3.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        5.สามารถเพิ่มข้อมูลจัดการรูปภาพได้ 3 แบบ 1.ไม่เปลี่ยนแปลง(ค่าเริ่มต้น) 2. เปลี่ยนรูป 3. ลบรูป 4. เพิ่มรูปใหม่
                                        </div >
                                        <div >
                                        6.หลังจากแก้ไขข้อมูลเสร็จกดปุ่ม แก้ไขข้อมูลจะขึ้นแจ้งเตือนบันทึกข้อมูลเสร็จสิ้นเป็นอันแก้ไขข้อมูลเสร็จ
                                        </div >
                                    </div >
                                    </div>
                                </div>
                            </div>
                            <!--//card-->
                            <div class="card">
                                <div class="card-header" id="faq1-heading-3">
                                    <h4 class="card-title">
                                       
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq1-3" aria-expanded="false" aria-controls="faq1-3"><span class="pe-icon pe-7s-plus"></span>วิธีลบข้อมูลร้านค้า</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq1-3" aria-labelledby="faq1-heading-3" data-parent="#faq1-accordion">
                                    <div class="card-body p-3 text-center">
                                    <div >
                                    <img src="pichelp/ลบข้อมูล1.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        1.เลือกเมนูจัดการร้านค้า
                                        </div >
                                        <div >
                                        2.เลือกปุ่ม แก้ไข / ลบ
                                        </div >
                                        <div >
                                        3.เลือกปุ่มลบข้อมูล
                                        </div >
                                    </div >
                                    <div  >
                                    <img src="pichelp/ลบข้อมูล2.png" width="70%" height="auto">
                                    </div >
                                        <div >
                                        <div >
                                        4.จะขึ้นแจ้งเตือนยืนยันการลบ
                                        </div >
                                        <div >
                                        5.ถ้าต้องการลบ กด “ยืนยัน” หากไม่ต้องการลบกด “ยกเลิก”
                                        </div >
                                    </div >
                                    <div >
                                    <img src="pichelp/ลบข้อมูล3.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        <div >
                                        6.หากกดยืนยันการลบจะขึ้นแจ้งเตือนดังภาพ
                                        </div >
                                    </div >
                                    </div>
                                </div>
                            </div>
                            <!--//card-->
                                                  
	                    </div><!--//faq1-accordion-->
				    </div><!--//app-card-body-->
				</div><!--//app-card-->

                <div class="app-card app-card-accordion shadow-sm mb-4">
				    <div class="app-card-header p-4 pb-2  border-0">
				       <h4 class="app-card-title">การตั้งค่า</h4>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4 pt-0">
					    <div id="faq1-accordion2" class="faq1-accordion faq-accordion accordion">
							<div class="card">
                                <div class="card-header" id="faq1-heading-4">
                                    <h4 class="card-title">
                                        <button class="card-toggle btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq1-5" aria-expanded="false" aria-controls="faq1-4"><span class="pe-icon pe-7s-plus"></span>วิธีเปลี่ยนรหัสผ่าน</button>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="faq1-5" aria-labelledby="faq1-heading-4" data-parent="#faq1-accordion2">
                                    <div class="card-body p-3 text-center">
                                    <div >
                                    <img src="pichelp/ตั้งค่ารหัส.png" width="70%" height="auto">
                                    </div >
                                    <div >
                                        <div >
                                        1.กดเลือกที่เมนูตั้งค่า
                                        </div >
                                        <div >
                                        2.ใส่รหัสผ่านในช่อง รหัสผ่านปัจจุบัน และตั้งค่ารหัสผ่านใหม่
                                        </div >
                                        <div >
                                        3.กดปุ่มบันทึกจะเปลี่ยนเป็นรหัสตั้งค่าใหม่
                                        </div >
                                    </div >
                                    </div>
                                </div>
                            </div>
                                                  
	                    </div><!--//faq1-accordion-->
				    </div><!--//app-card-body-->
				</div><!--//app-card-->
				

				<div class="row g-4">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder icon-holder-mono">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-headset" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 1a5 5 0 0 0-5 5v4.5H2V6a6 6 0 1 1 12 0v4.5h-1V6a5 5 0 0 0-5-5z"/>
  <path d="M11 8a1 1 0 0 1 1-1h2v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V8zM5 8a1 1 0 0 0-1-1H2v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8z"/>
  <path fill-rule="evenodd" d="M13.5 8.5a.5.5 0 0 1 .5.5v3a2.5 2.5 0 0 1-2.5 2.5H8a.5.5 0 0 1 0-1h3.5A1.5 1.5 0 0 0 13 12V9a.5.5 0 0 1 .5-.5z"/>
  <path d="M6.5 14a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2h-1a1 1 0 0 1-1-1z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">ต้องการติดต่อขอความช่วยเหลือ？</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4">
							    <div class="intro mb-3">หากคุณมีปัญหาเกี่ยวกับการใช้งานเว็บไซต์โปรดแจ้งไปที่ข้อมูลการติดต่อด้านล่าง</div>
							    <ul class="list-unstyled">
								    <li><strong>facebook : </strong> <a target="_blank" href="https://www.facebook.com/bangbuacomm">BangBua Community Platform</a></li>
							    </ul>
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto col-12 text-center ">
							   <a class="btn app-btn-primary" style="width: 200px;" target="_blank" href="https://line.me/ti/g2/FkONaslmdkslVzay6BhPaA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default&fbclid=IwAR0U4DfHPEFJRej_I5F8DNuVDg8WHKvoHfD8gCE9XGOb6Smn0-kcHiyJtVI">Line</a>
						    </div><!--//app-card-footer-->
                            
						</div><!--//app-card-->
					</div><!--//col-->

                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder icon-holder-mono">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
  <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
  <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
					<div class="col-auto">
						<h4 class="app-card-title">ติดตามข่าวสารโครงการ</h4>
						</div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4">
							    <div class="intro mb-3"><p class="intro mb-3 card-text">ติดตามข่าวสารได้ทาง <a class="text-primary" target="_blank" href="https://www.facebook.com/bangbuacomm">BangBua Community Platform</a></p></div>

                                
                                
                            </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto col-12 text-center row">
                                <div >
                                <img src="pic/bangbua_facebook.png" class="img-thumbnail mx-auto d-block" width="200" height="200" alt="Facebook fanpage">
                                </div>
                                <div>
                                <a class="btn app-btn-secondary mt-3" style="width: 200px;" target="_blank" href="https://www.facebook.com/bangbuacomm">Facebook</a>
                                </div>
							   
						    </div><!--//app-card-footer-->
                            
						</div><!--//app-card-->
                        
                    <div>

				</div><!--//row-->

                
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
				<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			   <small class="copyright"><a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank"></a></small>
		   </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 

