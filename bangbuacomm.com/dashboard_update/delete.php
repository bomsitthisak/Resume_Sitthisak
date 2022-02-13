<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $userid = $_GET['del'];
        $deletedata = new DB_con();
        $delpic = $deletedata->deletepic($userid);
        if($delpic){
            $sql = $deletedata->delete($userid);
            if ($sql) {
                $ftp_server = "bangbuacomm.com";
                $ftp_user_name = "bangbuac";
                $ftp_user_pass = "Bangbua01";
                $conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
                $s_id = $userid;
                $path = "domains/bangbuacomm.com/public_html/pic/$s_id";
                $path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
                $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
                
                $contents = ftp_nlist($conn_id, $path_pic);
                $count = count($contents);
                //count = 2 meant to . and ..
                
                
                for($i=0;$i<$count;$i++){
                    //delpic($conn_id, $login_result, $host_file,$path)
                    if (!empty($contents[$i])) {
                        $check = str_replace($path_pic, "", $contents[$i]);
                        //$check = $contents[$i];
                        if (!empty($check) && $check!="." && $check!="..") {
                            //echo $check;
                            delpic($conn_id, $login_result, $check,$path);
                        }
                    }
                }
                ftp_chdir($conn_id, "/");
                //$here = ftp_pwd($conn_id);
                
                //echo "<script>alert('$here');</script>";
                if (ftp_rmdir($conn_id, $path)) {
                    //echo "<script>alert('ลบแล้ว!');</script>";
                    //echo "Successfully make $path\n";
                    ftp_close($conn_id);
                } else {
                    //echo "There was a problem while making $path\n";
                    echo "<script>alert('ขออภัย! มีข้อผิดพลาดในการลบโฟล์เดอร์รูปภาพ โปรดติดต่อผู้ดูแลระบบในเมนูช่วยเหลือ!');</script>";
                    ftp_close($conn_id);
                }
                echo "<script>alert('ลบข้อมูลสำเร็จ!');</script>";
                echo "<script>window.location.href='manageshop.php'</script>";          				
            }
        }
        else{
            echo "<script>alert('ขออภัยลบฐานข้อมูลรูปไม่สำเร็จ! โปรดติดต่อผู้ดูแลระบบในเมนูช่วยเหลือ!');</script>";
            echo "<script>window.location.href='manageshop.php'</script>";   
        }

    }
    function delpic($conn_id, $login_result, $host_file,$path){
        ftp_chdir($conn_id, $path);
        //echo ftp_pwd($conn_id);
        if (ftp_delete($conn_id, $host_file)) {
            //echo "<script>alert('การลบรูป $host_file สำเร็จ!');</script>";
            //echo "<script>window.location.href='manageshop.php'</script>";
           } else {
            echo "<script>alert('การลบรูป $host_file ผิดพลาด! กรุณาติดต่อผู้ดูแลระบบที่เมนูช่วยเหลือ!');</script>";
            //echo "<script>window.location.href='manageshop.php'</script>";
        }  
    }
?>
