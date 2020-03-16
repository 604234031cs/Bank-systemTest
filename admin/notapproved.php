<?php 
     require '../config/db.php';
     $id = $_GET['acid'];
     $sql = "UPDATE loan set status ='ไม่อนุมัติ'";
     $stm = $connection->prepare($sql);
     $stm->execute();
     header("refresh:2;showreques.php");
?>