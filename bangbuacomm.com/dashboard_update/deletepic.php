<?php 

    include_once('functions.php');

    if (isset($_GET['del'])) {
        $userid = $_GET['del'];
        $deletedata = new DB_con();
        echo $userid;
    }
?>
