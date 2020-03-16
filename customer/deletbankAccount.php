<?php
require '../config/db.php';
// $pin = $_POST['pin'];
$acid = $_POST['acid'];
$pin = $_POST['pin'];
// echo $pin;
$sql = 'DELETE FROM account_bank WHERE acc_id=:id and pin_suc =:pin';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $acid,':pin'=>$pin]);
header("refresh:2;bankAccount.php"); 
// if () {
//     echo "<script>";
//     echo "alert('บัญชีถูกลบสำเร็จ')";
//      echo "</script>";
//     header("refresh:1;bankAccount.php");
// }else{
//     echo "<script>";
//     echo "alert('ตรวจสอบเลขบัญชี หรือ pin ให้ถูกต้อง')";
//      echo "</script>";
//     header("refresh:1;bankAccount.php"); 
//  }
?>




