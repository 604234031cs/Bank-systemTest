<?php
    // require 'header2.php';
    require '../config/db.php';
    session_start();
    $sql = "SELECT count(loan_id) from loan where loan_id=1";
    $stm= $connection->prepare($sql);
    $stm->execute();
    $reques = $stm->fetch(PDO::FETCH_OBJ);  
    // echo $reques[count('loan_id')];
    $cout =  count($reques);
    $_SESSION['reques'] = $cout;
    
?>
