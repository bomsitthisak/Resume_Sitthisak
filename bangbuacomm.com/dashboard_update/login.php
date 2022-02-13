<?php 
    session_start();
    include_once('functions.php'); 
 
    $userdata = new DB_con();
	

    if (isset($_POST['login'])) {

		
		$mysqli = new mysqli("localhost","bangbuac_bangbua","Bangbua01","bangbuac_bangbua");
		
        $uname = $mysqli -> real_escape_string($_POST['id']);
		$password = $mysqli -> real_escape_string(md5($_POST['password']));
        
		
		// $uname = $_POST['id'];
        // $password = md5($_POST['password']);

        $result = $userdata->signin($uname, $password);
        $num = mysqli_fetch_array($result);
		
        if ($num > 0) {            
			$_SESSION['a_id'] = $num['a_id'];
			$_SESSION['a_fn'] = $num['a_fn'];
            echo "<script>alert('เข้าสู่ระบบสำเร็จ!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('การเข้าสู่ระบบผิดพลาด โปรดลองใหม่อีกครั้ง');</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
	

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>เข้าสู่ระบบ E-Staff</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="เข้าสู่ระบบ E-Staff">  
	<link rel="shortcut icon" href="pic/logo.png">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.php"><img class="logo-icon mr-2" src="pic/logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">เข้าสู่ระบบ E-Staff</h2>
					<h2 class="auth-heading text-center mb-5">สำหรับผู้ดูแลเท่านั้น</h2>
			        <div class="auth-form-container text-left">
						<form method="post" class="auth-form ">         
							<div class="mb-3">
								<label class="sr-only" for="id">ชื่อผู้ใช้</label>
								<input id="id" name="id" type="text" class="form-control " placeholder="ชื่อผู้ใช้"  required="required">
								<span id="usernameavailable"></span>
							</div><!--//form-group-->

							<div class="password mb-3">
								<label class="sr-only" for="password">รหัสผ่าน</label>
								<input id="password" name="password" type="password" class="form-control " placeholder="รหัสผ่าน" required="required">
								<div class="extra mt-3 row justify-content-between">

								</div><!--//extra-->
							</div><!--//form-group-->
							
							<div class="text-center">								
								<button type="submit" name="login" class="btn app-btn-primary btn-block theme-btn mx-auto">เข้าสู่ระบบ</button>
							</div>
						</form>
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
				<!--Credit DONT DELETE-->
				<footer class="app-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright"><a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank"></a></small>
					</div>
				</footer>	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder" >
		    </div>
		    <div class="auth-background-mask"></div>
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->



</body>
</html> 






