<?php

        //set up basic connection
        $ftp_server = "bangbuacomm.com";
        $ftp_user_name = "bangbuac";
        $ftp_user_pass = "Bangbua01";
        $conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
        $s_id = "test";
        $path = "domains/bangbuacomm.com/public_html/pic/$s_id";
        $path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
        //$path_pic = "/home/bangbuac/domains/bangbuacomm.com/public_ftp/pic/";
        //$host_file = $_FILES['file']['name'];
        //$local_file = $_FILES['file']['tmp_name'];
        //$size_file=$_FILES['file']['size'];
        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
    //upload file
    
    if($_POST['test']){
        echo "work";
        $count = count($_FILES['file']['name']);
        echo "count is ".$count."\n";
        print_r($_FILES['file']['name'][0]);
        print_r($_FILES['file']['name'][1]);
        print_r($_FILES['file']['name'][2]);
        //for($i=0;$i<$count;$i++){
            /*$host_file = $_FILES['file']['name'][$i];
            $local_file = $_FILES['file']['tmp_name'][$i];
            $size_file=$_FILES['file']['size'][$i];
            echo $host_file."\n".$local_file."\n".$size_file."\n";*/
            //echo $i;
        //}
        for ($i=0;$i<$count;$i++) {
            $host_file = $_FILES['file']['name'][$i];
            $local_file = $_FILES['file']['tmp_name'][$i];
            $size_file=$_FILES['file']['size'][$i];
            echo $host_file."\n".$local_file."\n".$size_file."\n";
            if($_FILES["file"]["name"][$i] != ""){
                ftp_chdir($conn_id, $path);
                if ( $_FILES['file']['error'][$i] ) { 
                    die($_FILES["file"]["error"][$i]);
                } 
                if($_FILES['file']){
                    print_r($_FILES);

                    $error_msg = validate_form($_FILES['file'][$i],$_FILES['file']["size"][$i],$_FILES['file']["type"][$i]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
                    if ($error_msg) {
                       die($error_msg);
                    } else {
                       ftp_chdir($conn_id, $path_pic);
                       $upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY); 
                       if ($upload) { //ทำการ copy ไฟล์มาที่ Server
                          echo "ไฟล์ Upload เรียบร้อย";
                       } else {
                          die("ไฟล์ Upload มีปัญหา ".$_FILES["file"]["error"][$i]);
                       }
                    }
                }
            } 
        }
    }

    if($_POST['test2']){
        //$contents = ftp_nlist($conn_id, $path_pic);
        //ftp_chdir($conn_id, $path);
       // $contents = ftp_nlist($conn_id, ".");
        //$lists = ftp_mlsd($conn_id, $path);
        //unset($contents[0]);
        //unset($lists[1]);
        //for($i=1;$i<count($contents-2);$i++){
            //delpic($conn_id, $login_result, $host_file,$path)
        //}
        //print_r($contents);
        //$lists = ftp_mlsd($conn_id, $path_pic);
        //unset($contents[1]);
        //unset($contents[2]);

        $contents = ftp_nlist($conn_id, $path_pic);
        //var_dump($contents);
        //echo count(ftp_nlist($conn_id, $path_pic))-2;
        //echo count($contents)-2;
        /*
        for($i=0;$i<count($contents);$i++){
            //delpic($conn_id, $login_result, $host_file,$path)
            if (!empty($contents[$i])) {
                $check = str_replace($path_pic, "", $contents[$i]);
                //$check = $contents[$i];
                if (!empty($check) && $check!="." && $check!="..") {
                    echo $check;
                    delpic($conn_id, $login_result, $check,$path);
                }
                //echo '<pre>'; print_r($contents); echo '</pre>';
                //print_r($contents[$index]);
            }
        }
        ftp_close($conn_id);*/
        print_r($contents);
        /*
        if (!empty($contents[0])) {
            $check = str_replace($path_pic, "", $contents[0]);
            if (!empty($check)) {
                //echo $check."\n";

            }
            //echo '<pre>'; print_r($contents); echo '</pre>';
            //print_r($contents[$index]);
        } */
        //print_r($contents);
        /*
        foreach($lists as $list){
            $full = $path . '/' . $list['name'];
    
            if($list['type'] == 'dir'){
                ftp_rmdir($conn_id, $full);
            }else{
                ftp_delete($conn_id, $full);
            }
        }
        */

    }
                /*
                if($_FILES["file"]["name"][$i] != "")
                {   
                    ftp_chdir($conn_id, $path);
                    if ( $_FILES['file']['error'][$i] ) { 
                        die($_FILES["file"]["error"][$i]);
                    } 
            
                    if($_FILES['file']){
                        print_r($_FILES);

                        $error_msg = validate_form($_FILES['file'][$i],$_FILES['file']["size"][$i],$_FILES['file']["type"][$i]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
                        if ($error_msg) {
                           die($error_msg);
                        } else {
                           ftp_chdir($conn_id, $path_pic);
                           $upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY); 
                           if ($upload) { //ทำการ copy ไฟล์มาที่ Server
                              echo "ไฟล์ Upload เรียบร้อย";
                           } else {
                              die("ไฟล์ Upload มีปัญหา ".$_FILES["file"]["error"][$i]);
                           }
                        }
                    */
                   
    
    
    /*
    if($_POST['btn_uppic']){
        echo "<script>alert('บันทึกข้อมูลสำเร็จ!');</script>";
    }
    
    if($_POST['upload']){
        //print_r($_FILES);
        ftp_chdir($conn_id, $path);
        //echo ftp_pwd($conn_id);
        if ( $_FILES['file']['error'] ) { 
            die($_FILES["file"]["error"]);
        } 

        if($_FILES['file']){
            print_r($_FILES);
            $error_msg = validate_form($_FILES['file'],$_FILES['file']["size"],$_FILES['file']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
            if ($error_msg) {
               die($error_msg);
            } else {
               ftp_chdir($conn_id, $path_pic);
               $upload = ftp_put($conn_id,$host_file, $local_file, FTP_BINARY); 
               if ($upload) { //ทำการ copy ไฟล์มาที่ Server
                  echo "ไฟล์ Upload เรียบร้อย";
               } else {
                  die("ไฟล์ Upload มีปัญหา ".$_FILES["file"]["error"]);
               }
            }
        }
/*
        if($_FILES['file']){
            print_r($_FILES);
            $error_msg = validate_form($_FILES['file'],$_FILES['file']['size'],$_FILES['file']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
            //     echo getcwd();
            if ($error_msg) {
            die($error_msg);
            } else {
            //print_r($_FILES);
            print_r("ok");
            //upload($conn_id, $login_result, $host_file, $local_file,$path_pic);
            }
        }
        
    }
    
    if($_POST['del']){
        delpic($conn_id, $login_result, $host_file,$path_pic);
    }
*/
    function validate_form($file_input,$size_file,$file_type) { //เป็น function ที่เอาไว้ตรวจสอบว่าไฟล์ที่ผู้ใช้ upload ตรงตามเงื่อนไขหรือเปล่า
        $Max_File_Size = 5242880; //5 MB กำหนดขนาดไฟล์ที่ ใหญ่ที่สุดที่อนุญาตให้ upload มาที่ Server มีหน่วยเป็น bit
        $File_Type_Allow = array('image/jpeg', 'image/png','image/jpg',); //กำหนดประเภทของไฟล์ว่าไฟล์ประเภทใดบ้างที่อนุญาตให้ upload มาที่ Server
        if ($file_input == "none") {
           $error = "ไม่มี file ให้ Upload";
        } elseif ($size_file > $Max_File_Size) {
            //echo $size_file;
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
                print_r( error_get_last() );
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
            //echo "<script>window.location.href='manageshop.php'</script>";
           } else {
            echo "<script>alert('การลบรูป $host_file ผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
            //echo "<script>window.location.href='manageshop.php'</script>";
        }
        
    }
    
?>