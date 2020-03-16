<?php 
    require 'header2.php'; 
    require '../config/db.php';
    $cid = $_SESSION['id'];
    $sql = "SELECT *
            FROM bill 
            INNER JOIN loan     
            ON bill.loan_id = loan.loan_id
            INNER JOIN account_bank
            On bill.acc_id = account_bank.acc_id
            ORDER BY loan.loan_id DESC LIMIT 1";
    $stm = $connection->prepare($sql);
    $stm->execute();
    $show = $stm->fetch(PDO::FETCH_ASSOC);
    // print_r($show);
    // $acid = $show['acc_id'];
    // echo $show['acc_id'];
?>
ิ<br>
<div>
    <link rel="stylesheet" href="style.css">
    <title>แจ้งเตือน</title>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>รายการแจ้งเตือน</h2>
            </div>
            <div class="card-body">
                <label for="">รหัสใบเสร็จ</label>
                <input type="text" value="<?php echo $show['loan_id']; ?>" disabled>
                <label for="">เลขที่บัญชี</label>
                <input type="text" value="<?php echo $show['acc_id']; ?>" disabled><br>
                <label for="">ชื่อบัญชี</label>
                <input type="text" value="<?php echo $show['acc_name']; ?>" disabled>
                <label for="">ธนาคาร</label>
                <input type="text" value="<?php echo $show['branch_name']; ?>" readonly><br>
                <label for="">วันเวลาที่กู้</label> 
                <input type="text" value="<?php echo $show['date_loan']; ?>" readonly>
                <label for="">สถานะ</label>
                <input type="text" value="<?php echo $show['status']; ?>" readonly>
            </div>
        </div>
    </div>  


</div>