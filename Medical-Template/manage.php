<?php
include 'connect.php';
include 'checkAuth.php';


    //รับค่าจากตาราง user
    $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
    $sql = "SELECT fname,lname,auth,pic FROM user WHERE user_id = $user_id;";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
           $imgURL = $row['pic'];
           $name = $row['fname']." ".$row['lname'];
           $auth = $row['auth'];
        }
    }

    //ห้ามลูกค้ามาดู
    if($auth == "ลูกค้า"){
        header( "Location: login.html" );
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใกล้หมอเนิสซิ่งโฮม</title>
	<link rel="shortcut icon" href="img/logos/logo.jpg" />	
    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
    <div class="row bg-primary text-white" style="padding:15px">
        <div class="col-md-10 col-6" >
            <img src="<?php echo 'upload/'.$imgURL?>" style="height:30px" alt="" srcset="">
            <?php echo $name."&nbsp(".$auth.")"?>
        </div>
        <div class="col-md-2 col-6" >
           <a href="logout.php" style="color:white;">ออกจากระบบ</a>
        </div>
  
    </div>
    
    <ul class="nav nav-tabs" style="margin-top:5px">
        <li class="nav-item">
            <a class="nav-link active" href="#">ผู้ป่วย</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="customer.php">ญาติ</a>
        </li>

    <?php
       if($auth==="admin" || $auth==="เจ้าของ"){
    ?> 
        <li class="nav-item">
            <a class="nav-link" href="staff.php">บุคลากร</a>
        </li>
    <?php
       }
    ?>  
    </ul>
    
    <!-- ตาราง --> 
   <div class="container">
        <h4 class="text-center" style="margin:20px;">ผู้ป่วย</h4>
        <div class="row">
            <div class="col-md-12 col-12" style="overflow-x:auto;">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        
                        <th>เตียงที่</th>
                        <th>ภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ชื่อญาติ</th>
                        <th>เบอร์ติดต่อญาติ</th>
                        <th>ตรวจสุขภาพ</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                       
                        $sql = "SELECT YEAR(CURDATE())-YEAR(elder.birthday) as age,elder.elder_id,elder.bed,elder.pic,elder.fname,elder.lname,elder.nname,CONCAT(user.fname,' ',user.lname) as rfname,user.phone,user.user_id FROM elder inner join user on elder.user_id = user.user_id;";
                        $result = $conn->query($sql);
                        
                        
                        if ($result->num_rows > 0) {
                            $show = '';

                            while($row = $result->fetch_assoc()) {
                                $show .= '<tr>';
                                    $show .= '<td>';
                                    $show .= $row['bed'];
                                    $show .= '</td>';
                                    $show .= '<td>';
                                    $show .= '<img class="rounded" src="upload/'.$row['pic'].'" alt="" srcset="">';
                                    $show .= '</td>';
                                    $show .= '<td>';
                                    $show .= $row['fname']." ".$row['lname']." ( ".$row['age']." ปี )";
                                    $show .= '</td>';
                                    $show .= '<td>';
                                    $show .= $row['rfname'];
                                    $show .= '</td>';
                                    $show .= '<td>';
                                    $show .= $row['phone'];
                                    $show .= '</td>';
                                    $show .= '<td>';

                                    $show .= '<a class="btn btn-primary vitalSignBtn " href="#" style="margin-top:2.5px;" role="button" data-toggle="modal" data-target="#addVitalSign" onclick="addVitalSign('.$row['elder_id'].')">บันทึกการตรวจ</a>';
                                    $show .= '<a class="btn btn-success " href="nursenote/addpam.php?elder_id='.$row['elder_id'].'" style="margin-top:2.5px;" role="button">เปลี่ยนผ้าอ้อม</a>';
                                    $show .= '<a class="btn btn-info " href="nurseNote.php?elder_id='.$row['elder_id'].'" style="margin-top:2.5px;" role="button">ข้อมูลการตรวจ</a>';
                                    
                                    
                                    

                            
                                    
                                    
                                    $show .= '</td>';
                                   
                                $show .= '</tr>';
                            }
                        }
                        echo $show;
                        
                   ?>
                </tbody>
        </table>
        
            </div>
        </div>
    </div>
    
 

    <!-- Modal -->
<div class="modal fade" id="addVitalSign" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="staticBackdropLabel">บันทึกการตรวจ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="nursenote/create.php" method="post">
                <div class="row">
                    <div class="col-md-12" id="elderTitle">
                        
                    </div>
                </div>
               <div class="row" style="margin-top:15px;">
                   <div class="form-group col-md-6 col-6 text-center" style="margin:auto">
                       <label for="temp">อุณหภูมิ(&#8451;)</label>
                       <input type="text" class="form-control" style="text-align:center;" name="temp" id="temp">
                       <input type="text" class="form-control" style="text-align:center;" name="elder_id" id="elder_id" hidden>
                   </div>
                </div>
               <div class="row" style="margin-top:15px;">
                    <div class="form-group col-md-6 col-6 text-center" style="margin:auto">
                       <label for="pleasuer">ความดัน(mmHg)</label>
                       <input type="text" class="form-control " style="text-align:center;" name="pleasuer1" id="pleasuer1">
                       <input type="text" class="form-control " style="text-align:center;" name="pleasuer2" id="pleasuer2">
                   </div>
               </div>
               <div class="row" style="margin-top:15px;">
                    <div class="form-group col-md-6 col-6 text-center" style="margin:auto">   
                            <label for="hart">O<sub>2</sub>%</label>
                            <input type="text" class="form-control" style="text-align:center;" name="hart" id="hart">
                    </div>
               </div>
            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
           </form>
        </div>
    </div>
  </div>
</div>



    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
     <script>
         $(document).ready(function() {
            $('#table_id').dataTable( {
                                "oLanguage": {
                                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                                "sSearch": "ค้นหา :"
                        }
            } );

            $('#table_id').DataTable();

                $( "#temp" ).change(function() {
                    var temp = $("#temp").val();
                    if(parseFloat(temp) > 37 || parseFloat(temp) < 35.4){
                        $( "#temp" ).removeClass("normal").addClass("critical");
                    }else{
                        $( "#temp" ).removeClass("critical").addClass("normal");
                    }
                });

                $( "#pleasuer1" ).change(function() {
                    var pleasuer1 = $("#pleasuer1").val();
                    if(parseFloat(pleasuer1) > 130 || parseFloat(pleasuer1) < 90){
                        $( "#pleasuer1" ).removeClass("normal").addClass("critical");
                    }else{
                        $( "#pleasuer1" ).removeClass("critical").addClass("normal");
                    }
                });

                $( "#pleasuer2" ).change(function() {
                    var pleasuer2 = $("#pleasuer2").val();
                    if(parseFloat(pleasuer2) > 90 || parseFloat(pleasuer2) < 60){
                        $( "#pleasuer2" ).removeClass("normal").addClass("critical");
                    }else{
                        $( "#pleasuer2" ).removeClass("critical").addClass("normal");
                    }
                });
        });

        function addVitalSign(id) {
            var bed = "";
            var name = "";
            
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                   bed = $(this).text();
                }
                if(this.cellIndex == 2){
                   name = $(this).text();
                }    
                //alert( 'index ' + this.cellIndex + ': ' + $(this).text() );
            });
            $("#elderTitle").html(" " + bed + " " + name);
            $("#elder_id").val(id);
            $("#temp").val("");
            $("#pleasuer1").val("");
            $("#pleasuer2").val("");
            $("#hart").val("");
        }

        function readCus(id){
                $.ajax({
                    url:"customer/read.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        var obj = jQuery.parseJSON(data);
                        $('#readUser').modal('show');
                        $('#rname').html("");
                        $('#ruser').html("");
                        $('#rpic').attr("src",'upload/'+obj.customer.pic);
                        $('#rname').append(" "+obj.customer.fname+" "+obj.customer.lname);                    
                        $('#ruser').append("<br>เบอร์โทร : "+obj.customer.phone);
                        $('#ruser').append("<br>idcard : "+obj.customer.idcard+" <br>ที่อยู่ : "+obj.customer.location);
                       
                        console.log(obj);
                    }
                });
        }

            
     </script>  
</body>
</html>