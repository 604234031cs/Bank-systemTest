<?php 
    require 'header2.php';
    require '../config/db.php';

    $sql = "SELECT * From loan where status ='รอ'";
    $stm = $connection->prepare($sql);
    $stm->execute();
    $show = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<br>
<div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3>คำขอกู้ยืม</h3>
            </div>
            <div class="card-body">
            <table class = "table table-bordared">
                    <tr>                      
                        <th><center>รหัสกู้ยืม</center></th>
                        <th><center>ธนาคารที่กู้</center></th>
                        <th><center>เลขที่บัญชี</center></th>
                        <th><center>วงเงินที่กู้ (บาท)</center></th>
                        <th><center>เวลาที่ขอกู้</center></th>
                        <th><center>ตรวจสอบข้อมูล</center></th>
                        <th><center>การอนุมัติ</center></th>
                    </tr>
                    <?php foreach($show as $get): ?>
                    <tr>
                        <td><center><?= $get['loan_id']; ?></center></td>
                        <td><center><?= $get['branch_name']; ?></center></td>
                        <td><center><?= $get['acc_id']; ?></center></td>
                        <td><center><?= $get['amount']; ?></center></td>
                        <td><center><?= $get['date_loan']; ?></center></td>
                        <td><center><a href="checkdata.php?acid=<?= $get['acc_id']; ?>" class ="btn btn-info">ตรวจสอบข้อมูล</a></center></td>
                        <td>
                            <center>
                                <a href="approve.php?acid=<?= $get['acc_id']; ?>" class ="btn btn-success">อนุมัติ</a>
                                <a href="notapproved.php?acid=<?= $get['acc_id']; ?>" class ="btn btn-danger">ไม่อนุมัติ</a>
                            </center>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>

            </div>
        </div>
    </div>

</div>
