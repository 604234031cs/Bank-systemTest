<?php 
    require '../config/db.php';
    session_start(); 
    $cid = $_SESSION["id"];
    if(isset($_POST['acid1']) &&isset($_POST['acid2']) &&isset($_POST['pin']) &&isset($_POST['number']) && isset($_POST['bankname']) ) {
        
        $acid1 = $_POST['acid1'];
        $acid2 = $_POST['acid2'];
        $pin = $_POST['pin'];
        $number = $_POST['number'];
        $bank = $_POST['bankname'];
        //account_1
        $sql ="SELECT * from account_bank where acc_id=$acid1 and pin_suc = $pin";
        $stm = $connection->prepare($sql);
        $stm->execute();
        $account1 =$stm->fetch(PDO::FETCH_ASSOC);
        // echo $account1['acc_id'];
        // echo $account1['pin_suc']; 

        //check deposit
        $sql2 = "SELECT * FROM deposit where c_id = $cid and acc_id = $acid1";
        $stm = $connection->prepare($sql2);
        $stm->execute();
        $deposit =$stm->fetch(PDO::FETCH_ASSOC);
        // echo $deposit['number_deposit'];
        $checkmoney = $deposit['number_deposit'];


        $sql ="SELECT * from account_bank where acc_id=:acid2 and branch_name = :bank";
        $stm = $connection->prepare($sql);
        $stm->execute([':acid2'=>$acid2,':bank'=>$bank]);
        $account2 =$stm->fetch(PDO::FETCH_ASSOC);

        $ac_id2 = $account2['acc_id'];
        $bank2 = $account2['branch_name'];

        // echo $account2['acc_id'];
        // echo $bank2;
       

        if($ac_id2==$acid2 &&  $bank2==$bank ){
            if($checkmoney>=$number){
            $del = $checkmoney- $number;
            // echo $del;
            $sql3= "UPDATE deposit set number_deposit=:sumdeposit WHERE acc_id=$acid1";
            $statement = $connection->prepare($sql3);
            $statement->execute([':sumdeposit'=>$del]);
            // echo  $sumdeposit;
            //  echo "โอนเงินสำเร็จ";
            $sql4= "UPDATE deposit set number_deposit=:sumdeposit WHERE acc_id=$acid2";
            $statement = $connection->prepare($sql4);
            $statement->execute([':sumdeposit'=>$number]);
            // echo  $sumdeposit;
             echo "โอนเงินสำเร็จ";
             header("refresh:2;withdraw.php"); 
            }
        }else{
            echo "Error";
        }
        



}
    




?>