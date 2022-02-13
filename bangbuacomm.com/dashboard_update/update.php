<?php

		include_once('functions.php');

		$updatedata = new DB_con();

		if (isset($_POST['btn_edit'])) {


            $s_id = $_POST['shop_id'];
			$s_name = $_POST['shop_name'];
            $s_name_eng = $_POST['shop_name_eng'];
			$s_detail = $_POST['shop_exp'];
			$s_type = $_POST['shop_type'];
            $s_map = $_POST['shop_map'];
			$s_time = $_POST['shop_time'];
			$s_phone = $_POST['shop_phone'];
			$s_address = $_POST['shop_address'];

			//setup pic
			
			$editchoice1 = $_POST['editchoice1'];
			$editchoice2 = $_POST['editchoice2'];
			$editchoice3 = $_POST['editchoice3'];
			$addpic1 = $_POST['addpic1'];
			$addpic2 = $_POST['addpic2'];
			$addpic3 = $_POST['addpic3'];
			$idpic1 = $_POST['ps_id1'];
			$idpic2 = $_POST['ps_id2'];
			$idpic3 = $_POST['ps_id3'];
			$picpath1 = $_POST['ps_path1'];
			$picpath2 = $_POST['ps_path2'];
			$picpath3 = $_POST['ps_path3'];

			//print_r($_POST);
			$sql3 = $updatedata->fetchpicid();		
			while ($test2 = mysqli_fetch_array($sql3)) {
				$picidall[] = $test2[0];
			}
			//print_r($picidall);
			$lastps_id = max($picidall); 
			
			//echo "id pic 2 is ".$_POST['ps_id2'];
			//echo "id pic 3 is ".$_POST['ps_id3'];
			//echo $_FILES['e_pic2']['name'];
			//echo "show coice".$editchoice1.$editchoice2.$editchoice3;
			/*
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			echo '<pre>';
			print_r($_FILES);
			echo '</pre>';	
			*/
			/*
			if($delpic!=""){
				echo $delpic;
				
			}*/

			//setup ftp
			$ftp_server = "bangbuacomm.com";
			$ftp_user_name = "bangbuac";
			$ftp_user_pass = "Bangbua01";
			$conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
			//$s_id = $userid;
			$path = "domains/bangbuacomm.com/public_html/pic/$s_id";
			//$path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
			$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
			//$pic[] = $test[0];
			for($i=1;$i<=3;$i++){
				$choice = ${'editchoice'.$i};
				$checkadd = ${'addpic'.$i};
				//echo "test";
				if($choice!=null) {
					//echo $i.$choice;
					$choose[] = $choice;
				}
				if($checkadd!=null) {
					//echo $i.$checkadd;
					$choose[] = $checkadd;
				}
			}
			//print_r($choose);
			//$i = loop id -- $x loop index
			
			for($i=1;$i<=count($choose);$i++){
				//echo "ตัวเลือก ".$i.' is '.$choose[$i]."<br>";
				
				$x=$i-1;
				//echo "choice is ".$x.$choose[$x];
				if($choose[$x]=="เปลี่ยนรูป"){
					//echo "<br>$i ".$choose[$x]." ชื่อ ".$_FILES['e_pic'.$i.'']['name']."<br>";
					$ps_id = ${'idpic'.$i};
					//$ps_id=$lastps_id+1;
					$host_file = $ps_id."_".$_FILES['e_pic'.$i.'']['name'];
					//$host_file = $lastps_id."_".$_FILES['e_pic'.$i.'']['name'];
					$local_file = $_FILES['e_pic'.$i.'']['tmp_name'];
					$size_file=$_FILES['e_pic'.$i.'']['size'];
					$path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
					$path = "domains/bangbuacomm.com/public_html".${'picpath'.$i};
					$host_file = $ps_id."_".$_FILES['e_pic'.$i.'']['name'];

					//echo "pwd before is ".ftp_pwd($conn_id);
					ftp_chdir($conn_id, "/");
					//echo "pwd after is ".ftp_pwd($conn_id);
					//echo $i."---".$i;
					//echo "hostfile ".$host_file;
					//echo "<br>";
					//echo "path ".$path;
					//echo ftp_delete($conn_id, $path);
					if (ftp_delete($conn_id, $path)) {
						//echo $i."+++".$i;
						//echo "if1 work<br>";
						$deletepicbypsid = $updatedata->deletepicbypsid($ps_id);
						if($deletepicbypsid){
							//echo "if2 work<br>";
							//echo "ลบจากฐานข้อมูลแล้ว";
							if($_FILES['e_pic'.$i.'']["name"] != ""){
								//echo "if3 work<br>";
								if ( $_FILES['e_pic'.$i.'']['error']) { 
									echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
									//echo "if4 work<br>";
								} 
								if($_FILES['e_pic'.$i.'']){
									//echo "if5 work<br>";
				
									$error_msg = validate_form($_FILES['e_pic'.$i.''],$_FILES['e_pic'.$i.'']["size"],$_FILES['e_pic'.$i.'']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
									if ($error_msg) {
										//echo "if6 work<br>";
										
									    //echo $error_msg;
									} else {
										//echo "if7 work<br>";
										//echo "pwd before is ".ftp_pwd($conn_id);
										ftp_chdir($conn_id, $path_pic);
										//echo "pwd after is ".ftp_pwd($conn_id);
									   
									   $upload = ftp_put($conn_id,$host_file,$local_file, FTP_BINARY);
									   if ($upload) { //ทำการ copy ไฟล์มาที่ Server
										//echo "if8 work<br>";
										$path_db = '/pic'.'/'.$s_id.'/'.$host_file;
										//echo ftp_pwd($conn_id);
										$insertpathpic = $updatedata->insertpic($ps_id, $path_db, $s_id);
										
											if($insertpathpic){
												//echo "if9 work<br>";
												//echo "<script>alert('การอัพโหลดรูปภาพ $host_file สำเร็จ! ".$path_db."');</script>";
												//ftp_close($conn_id);
											}
											
											else{
												//echo "if10 work<br>";
												//ftp_close($conn_id);
												echo "<script>alert('การสร้างฐานข้อมูลรูปมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
											}
											
										  
										} else {
											//echo "if11 work<br>";
											//ftp_close($conn_id);
										  	echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
									   }
									}
								}
							} 
						}

						else{
							echo "<script>alert('การลบข้อมูลจากฐานข้อมูลผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
						}
						//echo "<script>alert('ลบรูป $host_file เรียบร้อยแล้ว!');</script>";
						//ftp_close($conn_id);     
					} else {
						//echo "ลบไม่ได้";
						echo "<script>alert('การลบรูป $host_file ผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
						//echo "<script>window.location.href='manageshop.php'</script>";
						//ftp_close($conn_id);
					} 

					//upload new file with old ps_id

				}
				
				
				else if($choose[$x]=="ลบรูป"){
					//echo "ลบรูป ".$i." ไอดี ".${'idpic'.$i};
					$path = "domains/bangbuacomm.com/public_html".${'picpath'.$i};
					$ps_id = ${'idpic'.$i};
					//echo "pwd before is ".ftp_pwd($conn_id);
					ftp_chdir($conn_id, "/");
					//echo "pwd after is ".ftp_pwd($conn_id);
					if (ftp_delete($conn_id, $path )) {
						//echo "if1 work<br>";
						$deletepicbypsid = $updatedata->deletepicbypsid($ps_id);
						if($deletepicbypsid){
							//echo "if2 work<br>";
							//echo "ลบจากฐานข้อมูลแล้ว";
						}
						else{
							//echo "if3 work<br>";
							echo "<script>alert('การลบข้อมูลจากฐานข้อมูลผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
						}
						echo "<script>alert('ลบรูป $host_file เรียบร้อยแล้ว!');</script>";
						//ftp_close($conn_id);   
					} else {
						//echo "if4 work<br>";
						//echo "ลบไม่ได้";
						echo "<script>alert('การลบรูป $host_file ผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
						//echo "<script>window.location.href='manageshop.php'</script>";
						//ftp_close($conn_id);
					}  
				}
				else if($choose[$x]=="เพิ่มรูป"){
					//echo "ตัวเลือก ".$i.' is '.$checkadd;
					//echo "***เพิ่มรูป ".$i." ชื่อ ".$_FILES['e_pic'.$i.'']['name'];
					$ps_id=$lastps_id+1;
					$host_file = $ps_id."_".$_FILES['e_pic'.$i.'']['name'];
					//$host_file = $_FILES['e_pic'.$i.'']['name'];
					$local_file = $_FILES['e_pic'.$i.'']['tmp_name'];
					$size_file=$_FILES['e_pic'.$i.'']['size'];
					$path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
					if($_FILES['e_pic'.$i.'']["name"] != ""){
						//echo "if1 work<br>";
						//echo $_FILES['e_pic'.$i.'']["name"];
						if ( $_FILES['e_pic'.$i.'']['error']) { 
							echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
							//echo "if2 work<br>";
						} 
						if($_FILES['e_pic'.$i.'']){
							//print_r($_FILES);
							//echo "if3 work<br>";
							$error_msg = validate_form($_FILES['e_pic'.$i.''],$_FILES['e_pic'.$i.'']["size"],$_FILES['e_pic'.$i.'']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
							if ($error_msg) {
							   //die($error_msg);
							   //echo "if4 work<br>";
							   echo $error_msg;
							   //echo "<script>alert('เงื่อนไขการอัพโหลดรูปผิดพลาด: $error_msg!);</script>";
							} else {
								/*
								echo "if5 work<br>";
								echo "<br>";
								echo "path pic is ".$path_pic;
								echo "<br>";
								echo "host file pic is ".$host_file;
								echo "<br>";
								echo "pwd before is ".ftp_pwd($conn_id);*/
								//echo "path pic is ".$path_pic;
							   ftp_chdir($conn_id, $path_pic);
							   //echo "pwd after is ".ftp_pwd($conn_id);
							   $upload = ftp_put($conn_id,$host_file,$local_file, FTP_BINARY);
							   if ($upload) { //ทำการ copy ไฟล์มาที่ Server
								$path_db = '/pic'.'/'.$s_id.'/'.$host_file;
								//echo ftp_pwd($conn_id);
								//echo "if6 work<br>";
								$insertpathpic = $updatedata->insertpic($ps_id, $path_db, $s_id);
								
									if($insertpathpic){
										//$ps_id+=1;
										//echo "if7 work<br>";
										//echo "<script>alert('การอัพโหลดรูปภาพ $host_file สำเร็จ! ".$path_db."');</script>";
										//ftp_close($conn_id);
									}
									
									else{
										//echo "if8 work<br>";
										//ftp_close($conn_id);
										echo "<script>alert('การสร้างฐานข้อมูลรูปมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
									}
									
								  
								} else {
									//ftp_close($conn_id);
								  echo "<script>alert('การอัพโหลดรูปภาพมีปัญหา กรุณาติดต่อผู้ดูและระบบในเมนูช่วยเหลือ!);</script>";
							   }
							}
						}
					} 
					


				}
				else{

				}
				$lastps_id+=1;
				//$ps_id+=1;
				ftp_chdir($conn_id, "/");
				//$ps_id+=1;
				
			}
			
			
			//check เพิ่มรูปภาพ
			ftp_close($conn_id);
			$sql = $updatedata->update($s_name, string_sanitize($s_name_eng), $s_detail, $s_type, $s_map ,$s_time, $s_phone, $s_address,$s_id);
			 if ($sql) {
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
