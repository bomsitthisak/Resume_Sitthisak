<?php
    include 'connect.php';
    session_start();
    //ฟังชัน
    function toThaiDate($date) {
      if($date != ""){
        $Arr = explode("-",$date);
        $y = $Arr[0] + 543;
        $y = substr($y,2);
        $m = $Arr[1];
        $d = $Arr[2];
        return $d."/".$m."/".$y;
      }
      return " ";
   }

   function toPeriod($time) {
    if( strtotime('6:00:00') <= strtotime($time) && strtotime('10:00:00') > strtotime($time) ){
      $result = "6:00 - 6:30";
    }elseif(strtotime('10:00:00') <= strtotime($time) && strtotime('14:00:00') > strtotime($time)){
      $result = "10:00 - 10:30";
    }elseif(strtotime('14:00:00') <= strtotime($time) && strtotime('18:00:00') > strtotime($time)){
      $result = "14:00 - 14:30";
    }elseif(strtotime('18:00:00') <= strtotime($time) && strtotime('22:00:00') > strtotime($time)){
      $result = "18:00 - 18:30";
    }elseif(strtotime('22:00:00') <= strtotime($time) && strtotime('2:00:00') > strtotime($time)){
      $result = "22:00 - 22:30";
    }elseif(strtotime('2:00:00') <= strtotime($time) && strtotime('6:00:00') > strtotime($time)){
      $result = "2:00 - 2:30";
    }else{
      $result = "";
    }
    return $result;
 }
    // รับค่า
    $elder_id = $_GET['elder_id'];
    $sql = "SELECT YEAR(CURDATE())-YEAR(birthday) as age,elder_id,bed,pic,fname,lname,nname,pic FROM elder where elder_id = $elder_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $pic = $row['pic'];
          $age = $row['age'];
          $fname = $row['fname'];
          $lname = $row['lname'];
      }
    }
    if($_SESSION['auth'] == "admin" || $_SESSION['auth'] == "เจ้าของ" || $_SESSION['auth'] == "พยาบาล" || $_SESSION['auth'] == "ผู้ช่วยพยาบาล" || $_SESSION['auth'] == "หมอ"  )
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .rounded{
        object-fit: cover;
        border-radius: 70%;
        height: 50px;
        width: 50px;
        }

        .critical{
        background-color: red;
        color: white;
        }

        .normal{
        background-color: white;
        color: black;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12">
                <img src="upload/<?php echo $pic;?>" class="rounded" alt="" srcset=""><strong style="margin-left:15px"><?php echo $fname." ".$lname." (".$age."ปี)"?> </strong> 
                <a href="elderUpdateForm.php?elder_id=<?php echo $_GET['elder_id']?>" style="margin-top:15px"  >< แก้ไขข้อมูล</a>
                <a href="manage.php" style="margin-top:15px" class="float-right">< กลับหน้าเก่า</a>
                
            </div>
           
        </div>
        <hr>
        <?php
            //รับค่าล่าสุดที่ไม่เป็น 0
            $sql = "SELECT DATE(time_stampt) as mydate,temp,pleasuerup,pleasuerdown,hart,pam FROM nursenote where elder_id = $elder_id and  temp != 0 and ( DATEDIFF(CURDATE(), time_stampt) = 0 or DATEDIFF(CURDATE(), time_stampt) = 1)  ORDER BY time_stampt DESC LIMIT 1";
            $result = $conn->query($sql);
            $show = "";
            if ($result->num_rows == 1) {
              while($row = $result->fetch_assoc()) {
                  $tempdate = $row['mydate'];
                  $temp = $row['temp'];
              }
            }else{
              $tempdate = "";
              $temp = "";
            }

            $sql = "SELECT DATE(time_stampt) as mydate,temp,pleasuerup,pleasuerdown,hart,pam FROM nursenote where elder_id = $elder_id and (pleasuerup !=0 and pleasuerdown != 0) and ( DATEDIFF(CURDATE(), time_stampt) = 0 or DATEDIFF(CURDATE(), time_stampt) = 1)  ORDER BY time_stampt DESC LIMIT 1";
            $result = $conn->query($sql);
            $show = "";
            if ($result->num_rows == 1) {
              while($row = $result->fetch_assoc()) {
                  $pleasuerdate = $row['mydate'];
                  $pleasuerup = $row['pleasuerup'];
                  $pleasuerdown = $row['pleasuerdown'];
              }
            }else{
                $pleasuerdate = "";
                $pleasuerup = "";
                $pleasuerdown = "";
            }

            $sql = "SELECT DATE(time_stampt) as mydate,temp,pleasuerup,pleasuerdown,hart,pam FROM nursenote where elder_id = $elder_id and hart !=0  and ( DATEDIFF(CURDATE(), time_stampt) = 0 or DATEDIFF(CURDATE(), time_stampt) = 1)  ORDER BY time_stampt DESC LIMIT 1";
            $result = $conn->query($sql);
            $show = "";
            if ($result->num_rows == 1) {
              while($row = $result->fetch_assoc()) {
                  $hartdate = $row['mydate'];
                  $hart = $row['hart'];
              }
            }else{
                  $hartdate = "";
                  $hart = "";
            }

            //จำนวนการเปลี่ยนผ้าอ้อมในวันนี้
            $sql = "SELECT count(pam) as pam_num FROM nursenote where elder_id = $elder_id and pam = 1 and DATE(time_stampt) = DATE(CURDATE()) ";
            $result = $conn->query($sql);
            $show = "";
            if ($result->num_rows == 1) {
              while($row = $result->fetch_assoc()) {
                  $pamdate = date("Y-m-d");
                  $pam_num = $row['pam_num'];
              }
            }else{
                  $pamdate = "";
                  $pam_num =  "";
            }
        ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">อุณหภูมิ (<?php echo toThaiDate($tempdate);?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $temp;?> &#8451;</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ความดัน (<?php echo toThaiDate($pleasuerdate);?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pleasuerup."/".$pleasuerdown;?> mmHg</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">O<sub>2</sub>% (<?php echo toThaiDate($hartdate);?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hart."%";?> </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">เปลี่ยนผ้าอ้อม (<?php echo toThaiDate($pamdate);?>)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pam_num." ครั้ง";?> </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              

              <table class="table  text-center">
                <thead>
                  <tr>
                    <th scope="col">วันที่</th>
                    <th scope="col">ช่วงเวลา</th>
                    <th scope="col">เวลา</th>
                    <th scope="col">อุณหภูมิ(&#8451;)</th>
                    <th scope="col">ความดัน(mmHg)</th>
                    <th scope="col">O<sub>2</sub>%</th>
                    <th scope="col">เปลี่ยนผ้าอ้อม</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                          //เลือกของผู้สูงอายุคนนี้ เฉพาะวันนี้และเมื่อวาน
                          $sql = "SELECT DATE(time_stampt) as mydate,TIME(time_stampt) as mytime,temp,pleasuerup,pleasuerdown,hart,pam,user_id as date FROM nursenote where elder_id = $elder_id and ( DATEDIFF(CURDATE(), time_stampt) = 0 or DATEDIFF(CURDATE(), time_stampt) = 1)";
                          //$sql = "SELECT DATE(time_stampt) as mydate,TIME(time_stampt) as mytime,temp,pleasuerup,pleasuerdown,hart,pam,user_id as date FROM nursenote where elder_id = $elder_id ";
                          $result = $conn->query($sql);
                          $show = "";
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               //แปลงวันที่เป็นแบบ พศ
                               $date = $row['mydate'];
                               $mydate = toThaiDate($date);
                               //แปลงเวลาเป็นช่วงเวลาตรวจ
                               $time = $row['mytime'];
                               $mytime = toPeriod($time);
                               //ตั้งค่าที่จะแสดง
                               if($row['temp'] == 0){
                                  $t = $row['temp'] = "-";
                                }else{
                                  $t = $row['temp'];
                                }

                                if($row['pleasuerup'] == 0 || $row['pleasuerdown'] == 0){
                                  $p1 = $row['pleasuerup'];
                                  $p2 = $row['pleasuerdown'];
                                  $temp = "-";
                                }else{
                                  $p1 = $row['pleasuerup'];
                                  $p2 = $row['pleasuerdown'];
                                  $temp = $row['pleasuerup']."/".$row['pleasuerdown'];
                                }

                                if($row['hart'] == 0){
                                  $row['hart'] = "-";
                                }else{
                                  $row['hart'] .= "%";
                                }

                                if($row['pam'] == 0){
                                  $row['pam'] = "-";
                                }else{
                                  $row['pam'] = "&#10003;";
                                }
                               //แสดงตารางทีละแถว
                               $show .= "<tr>";
                                  $show .= "<td>".$mydate."</td>";
                                  $show .= "<td>".$mytime."</td>";
                                  $show .= "<td>".$row['mytime']."</td>";
                                  //กรณีปกติ และ ไม่ปกติ
                                  if(($row['temp'] >= 35.4 && $row['temp'] <= 37.4) || $row['temp'] == "-")
                                      $show .= "<td>".$row['temp']."</td>";
                                  else{
                                    $show .= "<td style='color:#D98880;'>".$row['temp']."</td>";
                                  }

                                  if( ($p1 >= 90 && $p1 <= 130 && $p2 >= 60 && $p2 <= 90) || $temp == "-")
                                      $show .= "<td>".$temp."</td>";
                                  else{
                                    $show .= "<td style='color:red;'>".$temp."</td>";
                                  }
                                  $show .= "<td>".$row['hart']."</td>";
                                  $show .= "<td>".$row['pam']."</td>";
                                $show .= "</tr>";
                            }
                          }
                          echo $show;
                    ?>
                </tbody>
              </table>

              
    
        </div>
        
        
    </div>

    
    

    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="chart.js/Chart.min.js"></script>
    
    
</body>
</html>
<?php } ?>