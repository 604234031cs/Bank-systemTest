<?php 
    require 'header2.php';
    require'../config/db.php';
     $id = $_GET['acid'];
    //  echo $id;

     $sql = "SELECT *
            FROM account_bank
            INNER JOIN customer
            ON account_bank.c_id=customer.c_id
            and account_bank.acc_id = :id";
    $stm = $connection->prepare($sql);
    $stm->execute([':id'=>$id]);
    $show = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
ิ<br>
<div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>ข้อมูลผู้ข้อกู้</h2>
            </div>
            <div class="card-body">
                <center>
                <label for="">ชื่อ</label>
                <input type="text" value="<?php echo $show[0]['c_name'];?>" readonly>
                <label for="">นามสกุล</label>
                <input type="text" value="<?php echo $show[0]['c_lastname'];?>" readonly>
                <label for="">เพศ</label>
                <input type="text" value="<?php echo $show[0]['c_sex'];?>" readonly><br>
                <label for="">ที่อยู่</label>
                <input type="text" value="<?php echo $show[0]['c_address'];?>" readonly>
                <label for="">Email</label>
                <input type="text"  value="<?php echo $show[0]['c_email'];?>" readonly>
                <label for="">เบอร์โทรติดต่อ</label>
                <input type="text"  value="<?php echo $show[0]['phone_number'];?>" readonly>
                </center>
                <a href="showreques.php" class = "btn btn-info">ย้อนกลับ</a>
            </div>
        </div>
    </div>
</div>