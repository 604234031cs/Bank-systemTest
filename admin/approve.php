<?php 
    require '../config/db.php';
    $id = $_GET['acid'];
    $sql = "UPDATE loan set status ='อนุมัติ'";
    $stm = $connection->prepare($sql);
    $stm->execute();


    $sql1 = "SELECT * FROM loan where acc_id=:acid";
    $stm= $connection->prepare($sql1);
    $stm->execute([':acid'=>$id]);
    $insert = $stm->fetch(PDO::FETCH_ASSOC);
    // echo $insert['amount'];
    // echo $insert['branch_name'];
    $loan_id = $insert['loan_id'];
    $namebank = $insert['branch_name'];
    $assets = $insert['amount'];

    $sql3 = "SELECT * FROM branch WHERE branch_name = :bank";
    $stm = $connection->prepare($sql3);
    $stm->execute([':bank'=>$namebank]);
    $show = $stm->fetch(PDO::FETCH_ASSOC);
    // print_r($show);
        $money = $show['assets'];
    // echo $show['assets'];

    if($money>=$assets){
        $total = $money-$assets;
        $sql4 = "UPDATE branch set assets = :total where branch_name =:bank";
        $stm = $connection->prepare($sql4);
        $stm->execute([':total'=>$total,':bank'=>$namebank]);
    }

    $sql5 = "INSERT into bill(loan_id,acc_id) value (:loan_id,:acid)";
    $stm = $connection->prepare($sql5);
    $stm->execute([':loan_id'=>$loan_id,':acid'=>$id]);
    



    header("refresh:2;showreques.php");

?>