<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USER', 'bangbuac_bangbua');
define('DB_PASS', 'Bangbua01');
define('DB_NAME', 'bangbuac_bangbua');

//define('DB_SERVER', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '12345678');
//define('DB_NAME', 'bangbuac_bangbua');

//FTP

/*$conn_id = ftp_connect($ftp_server,2121) or die("<script>alert('ไม่สามารถเชื่อมต่อระบบอัพโหลดได้ โปรดติดต่อผู้ดูแลในเมนูช่วยเหลือ!');</script>");

define('FTP_SERVER','bangbuacomm.com');
define('FTP_NAME','bangbuac');
define('FTP_PASS','Bangbua01');

$ftp_server = "bangbuacomm.com";
$ftp_user_name = "bangbuac";
$ftp_user_pass = "Bangbua01";*/


class DB_con
{

    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    public function insert($s_id, $s_name, $s_name_eng, $s_detail, $s_type, $s_map, $s_time, $s_phone, $s_address)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO shop(s_id, s_name, s_name_eng, s_detail, s_type, s_map, s_time, s_phone, s_address) 
            VALUES('$s_id', '$s_name', '$s_name_eng', '$s_detail', '$s_type', '$s_map','$s_time','$s_phone', '$s_address')");
        return $result;
    }

    //เพิ่มใหม่
    public function insertpic($ps_id, $ps_path, $s_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO pictureshop(ps_id, ps_path, s_id) 
            VALUES('$ps_id', '$ps_path', '$s_id')");
        return $result;
    }


    public function insertrec($r_id, $s_id)
    {      
        $result = mysqli_query($this->dbcon, "INSERT INTO recommend(r_id, r_s_id) VALUES('$r_id', '$s_id')"); 
        return $result;
    }

    public function insertvdo($vdo_id,$vdo_url)
    {      
        $result = mysqli_query($this->dbcon, "INSERT INTO recommend(r_id, r_s_id) VALUES('$vdo_id','$vdo_url')"); 
        return $result;
    }

    
    public function Countall()
    {
        $result = mysqli_query($this->dbcon, "SELECT COUNT(*) as total FROM shop");
        return $result;
    }

    public function CountShop($s_type)
    {
        $result = mysqli_query($this->dbcon, "SELECT COUNT(*) as total FROM shop WHERE s_type = '$s_type'");
        return $result;
    }
    
    public function countpic($s_id){
        $result = mysql_query($this->dbcon, "SELECT * FROM pictureshop WHERE pictureshop.s_id = '$s_id'");
        return $result;
    }
    
    public function fetchpic2()
    {      
        $result = mysqli_query($this->dbcon, "SELECT * FROM pictureshop LEFT JOIN shop ON pictureshop.s_id = shop.s_id");
        return $result;
    }

    public function fetchpic($s_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM pictureshop where s_id='$s_id'");
        return $result;
    }

    public function fetchvideo()
    {
        $result = mysqli_query($this->dbcon, "SELECT vdo_url FROM vdo LIMIT 1");
        return $result;
    }

    public function fetchpicid()
    {
        $result = mysqli_query($this->dbcon, "SELECT ps_id FROM pictureshop");
        return $result;
    }

    public function fetchsp($s_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop where s_id='$s_id'");
        return $result;
    }

    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop");
        return $result;
    }

    public function fetchdataedit($s_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop WHERE s_id = '$s_id'");
        return $result;
    }

    public function fetchdatfoodall()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop where s_type='ร้านอาหาร'");
        return $result;
    }

    public function fetchdatadrink()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop where s_type='ร้านของหวานและเครื่องดื่ม'");
        return $result;
    }

    public function fetchdataetc()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop where s_type='ร้านค้าและการบริการอื่นๆ'");
        return $result;
    }

    
    public function fetchdatareccom()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop INNER JOIN recommend ON shop.s_id = recommend.r_s_id LIMIT 4");
        return $result;
    }

    public function fetchdatareccomcheck()
    {

        $result = mysqli_query($this->dbcon, "SELECT * FROM shop LEFT JOIN recommend ON shop.s_id = recommend.r_s_id");
        return $result;
    }

    public function fetchdatafoodrandom()
    {
        $result = mysqli_query($this->dbcon, "SELECT  * FROM shop where s_type='ร้านอาหาร'ORDER BY RAND() LIMIT 4");
        // $result = mysqli_query($this->dbcon, "SELECT * FROM shop,type WHERE shop.t_id = type.t_id");
        return $result;
    }

    public function fetchdatadrinkrandom()
    {
        $result = mysqli_query($this->dbcon, "SELECT  * FROM shop where s_type='ร้านของหวานและเครื่องดื่ม'ORDER BY RAND() LIMIT 4");
        // $result = mysqli_query($this->dbcon, "SELECT * FROM shop,type WHERE shop.t_id = type.t_id");
        return $result;
    }

    public function fetchdataetcrandom()
    {
        $result = mysqli_query($this->dbcon, "SELECT  *  FROM shop where s_type='ร้านค้าและการบริการอื่นๆ'ORDER BY RAND() LIMIT 4");
        // $result = mysqli_query($this->dbcon, "SELECT * FROM shop,type WHERE shop.t_id = type.t_id");
        return $result;
    }

    public function v_link($v_link)
    {
        $result = mysqli_query($this->dbcon, "UPDATE vdo SET vdo_url = '$v_link' WHERE vdo_id ='V0001'");
        return $result;
    }
    
    public function fetchonerecord($s_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM shop WHERE s_id = '$s_id'");
        return $result;
    }

    public function updaterec($r_id, $r_s_id)
    {            
        $result = mysqli_query($this->dbcon, "UPDATE recommend SET r_s_id = '$r_s_id' WHERE r_id = '$r_id'"); 
        return $result;
    }
      
    public function search($data){

        $result = mysqli_query($this->dbcon, "SELECT * FROM shop WHERE s_name LIKE '%$data%' or s_name_eng LIKE '%$data%'");
        return $result;
    }

    public function update($s_name, $s_name_eng, $s_detail, $s_type, $s_map, $s_time, $s_phone, $s_address,$s_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE shop SET 
                
                s_name = '$s_name',
                s_name_eng = '$s_name_eng',
                s_detail = '$s_detail',
                s_type = '$s_type',
                s_map = '$s_map',
                s_time = '$s_time',
                s_phone = '$s_phone',
                s_address = '$s_address'
                WHERE s_id = '$s_id'
            ");
        return $result;
    }

    //เพิ่มใหม่
    public function updatepath($ps_path,$ps_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE pictureshop SET ps_path = '$ps_path' WHERE ps_id ='$ps_id'");
        return $result;
    }

    public function usernameavailable($uname)
    {
        $checkuser = mysqli_query($this->dbcon, "SELECT a_id FROM admin WHERE a_id = '$uname'");
        return $checkuser;
    }

    public function signin($uname, $password)
    {
        $signinquery = mysqli_query($this->dbcon, "SELECT a_id, a_fn FROM admin WHERE a_id = '$uname' AND a_password = '$password'");
        return $signinquery;
    }

    public function registration($id, $fname, $lname, $phone, $password)
    {
        $reg = mysqli_query($this->dbcon, "INSERT INTO admin(a_id, a_fn, a_ln, a_phone,  a_password) VALUES('$id','$fname', '$lname', '$phone', '$password')");
        return $reg;
    }

    public function changePassword($a_id){
	    $new_password = md5($_POST['new_password']);
	    $old_password = md5($_POST['old_password']);
	    $cf_password = md5($_POST['cf_password']);

	    if(!empty($new_password) && !empty($old_password) && !empty($cf_password)){
	    	if($new_password == $cf_password){
	    	 $query = "SELECT * FROM admin WHERE a_id = '$a_id'";
	    	 $result = $this->dbcon->query($query);
	    	if ($result->num_rows > 0 ) {
	    	    $row = $result->fetch_assoc();
	    	    $db_password = $row['a_password'];
	    		if($db_password == $old_password){
	    	    	    $update = "UPDATE admin SET a_password = '$new_password' WHERE a_id = '$a_id'";
	    		if ($this->dbcon->query($update)==true) {
	    		    return true;
	    		}else{
	    		    return false;
	    		}
		       }else{
		    	    return false;
		       }
		    }else{
		   	return false;
		    }
		 }else{
		    return false;
	        }
	    }
	}
   
    //เพิ่มใหม่
    public function deletepicbypsid($ps_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM pictureshop WHERE ps_id = '$ps_id'");
        return $deleterecord;
    }

    public function delete($s_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM shop WHERE s_id = '$s_id'");
        return $deleterecord;
    }

    public function deletepic($s_id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM pictureshop WHERE s_id = '$s_id'");
        return $deleterecord;
    }
    public function lastid()
    {
        $result = mysqli_query($this->dbcon, "SELECT s_id FROM shop   ORDER BY s_id DESC  LIMIT 1");
        echo $result;
        return $result;
    }

    public function autoid()
    {
        $query = "SELECT s_id FROM shop   ORDER BY s_id DESC  LIMIT 1";
        $result = mysqli_query($this->dbcon, $query);
        $row = mysqli_fetch_array($result);

        $id = $row['s_id'];
        return $id;
       
    }
}

class FTP
{


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
    //upload file    
    public function upload($conn_id, $login_result, $host_file, $local_file,$path_pic){
        if ( $_FILES['file']['error'] ) { 
            die($_FILES["file"]["error"]);
        } 
        
        if($_FILES['file']){
            $error_msg = validate_form($_FILES['file'],$_FILES['size'],$_FILES['file']["type"]); // ตรวจดูว่า ไฟล์ที่ upload ตรงตามเงื่อนไขหรือเปล่า
            //echo getcwd();
            if ($error_msg) {
            die($error_msg);
            } else {
    
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
                    echo "<script>alert('การอัพโหลดรูป $host_file สำเร็จ!');</script>";
                }
                ftp_close($conn_id);
            }
            
        }


    }

    public function getImgName($conn_id,$path_pic,$index){
        $contents = ftp_nlist($conn_id, $path_pic);
        //var_dump($contents);
        //นับจำนวนรูป
        //echo count(ftp_nlist($conn_id, $path_pic))-2;
        if (!empty($contents[0])) {
            $check = str_replace($path_pic, "", $contents[0]);
            if (!empty($check)) {
                echo $check;
            }
            echo '<pre>'; print_r($contents); echo '</pre>';
            return $contents[$index];
        }
        ftp_close($conn_id);
    }

    public function makefolder($conn_id, $path)
    {
        //สร้าง fuction make folder
        if (ftp_mkdir($conn_id, $path)) {
            echo "สร้างโฟล์เดอร์สำเร็จ！ $path\n";
        } else {
            echo "ขออภัยเกิดปัญหาระหว่างสร้างโฟล์เดอร์ $path โปรดติดต่อผู้ดูแลระบบที่เมนนู 'ช่วยเหลือ'\n";
        }

        ftp_close($conn_id);

    }


        //สร้าง fuction ลบ  
        public function  deletepic($conn_id)
        {
            // try to delete $file
                set_time_limit(3000);
                // output $contents
                if (ftp_delete($conn_id, "/public_html/pic/S0001/122201.jpg")) {
                    echo "ลบรูปภาพเรียบร้อย\n";
                } else {
                    echo "ขออภัยไม่สามารถลบรูปภาพได้\n";
                }

                ftp_close($conn_id);
        }
}
