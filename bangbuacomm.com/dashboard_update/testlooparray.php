<?php
    if($_POST['test']){
        echo "work";
        $c = array("เปลี่ยนรูป", "เพิ่มรูป", "ลบรูป");
        for($i=0;$i<count($c);$i++){
            //echo $c[$i];
            if($c[$i]=="เปลี่ยนรูป"){
                
                echo $i.$c[$i];
                echo "เปลี่ยนได้";
            }
            else if($c[$i]=="เพิ่มรูป"){
                echo $i.$c[$i];
                echo "เพิ่มได้";
            }
            else if($c[$i]=="ลบรูป"){
                echo $i.$c[$i];
                echo "ลบได้";
            }
            else{
                
            }
        }
    }
?>