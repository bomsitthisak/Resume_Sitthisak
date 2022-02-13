<?php
        //set up basic connection
        $ftp_server = "bangbuacomm.com";
        $ftp_user_name = "bangbuac";
        $ftp_user_pass = "Bangbua01";
        $conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
        $s_id = 2;
        $path = "domains/bangbuacomm.com/public_html/pic/$s_id";
        $path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
        //$path_pic = "/home/bangbuac/domains/bangbuacomm.com/public_ftp/pic/";
        $host_file = $_FILES['file']['name'];
        $local_file = $_FILES['file']['tmp_name'];
        $size_file=$_FILES['file']['size'];
        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
    //upload file
    
    if($_POST['test']){
        echo "work";
        
        if (ftp_mkdir($conn_id, $path)) {
            echo "<script>alert('make it!');</script>";
            echo "Successfully make $path\n";
            ftp_close($conn_id);
        } else {
            echo "There was a problem while making $path\n";
            echo "<script>alert('cant make it!');</script>";
            ftp_close($conn_id);
        }
        ftp_chdir($conn_id, $path);
        echo ftp_pwd($conn_id);
        ftp_close($conn_id);
    }
    if($_POST['upload']){
        print_r($_POST);

        
        if ( $_FILES['file']['error'] ) { 
            die($_FILES["file"]["error"]);
        } 
        
        if($_FILES['file']){
            $error_msg = validate_form($_FILES['file'],$size_file,$_FILES['file']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
            //     echo getcwd();
            if ($error_msg) {
            die($error_msg);
            } else {
            print_r[$_FILES];
            //upload($conn_id, $login_result, $host_file, $local_file,$path_pic);
            
        }
                
    }
 
   
     
    function validate_form($file_input,$size_file,$file_type) { //เป็น function ที่เอาไว้ตรวจสอบว่าไฟล์ที่ผู้ใช้ upload ตรงตามเงื่อนไขหรือเปล่า
       $Max_File_Size = 5242880; //5 MB กำหนดขนาดไฟล์ที่ ใหญ่ที่สุดที่อนุญาตให้ upload มาที่ Server มีหน่วยเป็น bit
       $File_Type_Allow = array('image/jpeg', 'image/png','image/jpg',); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
       if ($file_input == "none") {
          $error = "ไม่มี file ให้ Upload";
       } elseif ($size_file > $Max_File_Size) {
           echo $size_file;
           echo "Max file".$Max_File_Size;
          $error = "ขนาดไฟล์ใหญ่กว่า 5 MB";
       } elseif (!check_type($file_type)) {
          $error = "ไฟล์ประเภทนี้ ไม่อนุญาตให้ Upload <strong>อัพโหลดได้เฉพาะไฟล์นามสกุล .jpeg, .jpg, .png</strong>";
       } else {
          $error = false;
       }
     
       return $error;
    }
     
    function check_type($type_check) { //เป็น ฟังก์ชัน ที่ตรวจสอบว่า ไฟล์ที่ upload อยู่ในประเภทที่อนุญาตหรือเปล่า
       $File_Type_Allow = array('image/jpeg', 'image/gif', 'image/png','image/jpg',); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
       for ($i=0;$i<count($File_Type_Allow);$i++) {
          if ($File_Type_Allow[$i] == $type_check) {
             return true;
          }
       }
       return false;
    }
     

/*
    function upload($conn_id, $login_result, $host_file, $local_file,$path_pic){
        ftp_chdir($conn_id, $path_pic);
        // check connection  
            echo ftp_pwd($conn_id);
            if ((!$conn_id) || (!$login_result)) {
                echo "<script>alert('การเชื่อมต่อระบบผิดพลาด โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>";
                exit;
            }   
            // upload the file  
            $upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY);    
            // check upload status  
            if (!$upload) {
                echo "<script>alert('การอัพโหลดรูป $host_file ผิดพลาด โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>";
            }    
            else{
                print_r( error_get_last() );
                echo "<script>alert('การอัพโหลดรูป $host_file สำเร็จ! ขนาดไฟล์รูปคือ $size_file');</script>";
            }
            ftp_close($conn_id);
    }


    //}
/*
    //List data from host part
    if($_POST['ck']){
        set_time_limit(3000);
        // output $contents
        echo getImgName($conn_id,$path_pic,0);
        
        ftp_close($conn_id);
    }
*/
    function getImgName($conn_id,$path_pic,$index){
        $contents = ftp_nlist($conn_id, $path_pic);
        //var_dump($contents);
        //echo count(ftp_nlist($conn_id, $path_pic))-2;
        if (!empty($contents[0])) {
            $check = str_replace($path_pic, "", $contents[0]);
            if (!empty($check)) {
                echo $check;
            }
            echo '<pre>'; print_r($contents); echo '</pre>';
            return $contents[$index];
        }
    }
    //สร้าง fuction make folder
   /* if (ftp_mkdir($conn_id, $path)) {
        echo "Successfully make $path\n";
    } else {
        echo "There was a problem while making $path\n";
    }
    
    //สร้าง fuction ลบ dir 


    if (ftp_chmod($conn_id, 0777, $path) !== false) {
        echo "$file chmoded successfully to 777\n";
       } else {
        echo "could not chmod $file\n";
       }

    // try to delete $file
    if($_POST['del']){
        set_time_limit(3000);
        // output $contents
        if (ftp_delete($conn_id, "/public_html/pic/S0001/122201.jpg")) {
            echo "deleted successful\n";
        } else {
            echo "could not delete \n";
        }
        
        ftp_close($conn_id);
    }
*/
    
    
?>