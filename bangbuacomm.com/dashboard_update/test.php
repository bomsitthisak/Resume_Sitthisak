<?php
 /*echo "test";
 if($_POST['test']){
    echo "yes";
    $ftp_server = "bangbuacomm.com";
    $ftp_user_name = "bangbuac";
    $ftp_user_pass = "Bangbua01";
    $conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
    $s_id = 1;
    $path = "domains/bangbuacomm.com/public_html/pic/$s_id";
    $path_pic = "domains/bangbuacomm.com/public_html/pic/$s_id/";
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");
    //upload file
    if (ftp_rmdir($conn_id, $path)) {
        echo "<script>alert('ลบแล้ว!');</script>";
        //echo "Successfully make $path\n";
        ftp_close($conn_id);
    } else {
        //echo "There was a problem while making $path\n";
        echo "<script>alert('ขออภัย! มีข้อผิดพลากในการลบโฟล์เดอร์รูปภาพ โปรดติดต่อผู้ดูแลระบบในเมนูช่วยเหลือ!');</script>";
        ftp_close($conn_id);
    }
 }*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>KUY</title>
</head>
<body>
<h2>Please provide the following information:</h2>

<form method="post" action="testlooparray.php" enctype="multipart/form-data">
    <!--Host <br />
    <input type="text" name="host" /><p />

    Username <br />
    <input type="text" name="user" /><p />

    Password <br />
    <input type="password" name="pass" /><p />

    Destination directory <br />
    <input type="text" name="dir" /><p />
-->
    File <br />
    
    <input type="file" name="file[]" accept="image/*"/>
    <input type="file" name="file[]" accept="image/*"/>
    <input type="file" name="file[]" accept="image/*"/>
    
    <input type="submit" name="upload" value="upload" />
    <input type="submit" name="test" value="test" />
    <input type="submit" name="test2" value="test2" />
    <input type="submit" name="del" value="delete list" />

    <!--<input type="submit" name="del" value="Delete File" />-->
</form>

</body>
</html>
