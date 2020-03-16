<?php require 'header2.php'; ?>
<?php 
    require '../config/db.php';
    $cid =$_SESSION['id'];
    $message= '';
    if(isset($_POST['acid']) && isset($_POST['bank']) && isset($_POST['amount'])&& isset($_POST['status'])){
        
        $acid = $_POST['acid'];
        $bank = $_POST['bank'];
        $amount = $_POST['amount'];
        $status = $_POST['status'];  
        // echo  $acid;
        // echo      $bank;
        // echo  $amount;
        $sql1 = "SELECT acc_id From account_bank where acc_id=:acid ";
        $statement = $connection->prepare($sql1);
        $statement ->execute([':acid'=>$acid]);
        $checkacid = $statement->fetch(PDO::FETCH_ASSOC);
        $passid = $checkacid['acc_id']; 

        $sql = "INSERT into loan(amount,acc_id,branch_name,c_id,status) value (:amount,:acid,:bank,:cid,:status)";
        $statement = $connection->prepare($sql);

        if($statement->execute([':acid'=>$passid,':bank'=>$bank,':amount'=>$amount,':cid'=>$cid,':status'=>$status])){
            $message= "ทำรายการสำเร็จ";
            header("refresh:2;loan.php"); 
        }else{
            $message= "ทำรายการล้มเหลว";
            header("refresh:2;loan.php"); 
        }

    }


?>
<br>
<div>
    <link rel="stylesheet" href="card.css">
    <div class="container">
    <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
           <h2>กู้ยืมเงิน</h2>
            <form method="post">
                <label for="">เลขที่บัญชี</label>
                <input type="" name="acid"><br>
                <label for="">เลือกธนาคาร</label>
                <select name ="bank">
                    <option selected>เลือกธนาคาร</option>
                    <option value="ธนาคารA">ธนาคารA</option>
                    <option value="ธนาคารB">ธนาคารB</option>
                     <option value="ธนาคารC">ธนาคารC</option>
                </select><br>
                <label for="">จำนวนเงินที่กู้</label>
                <input type="text"name="amount">
                <input type="hidden" name="status" value="รอ">
                <br>
                <center>
                <input type="submit" value="ทำรายการกู้ยืม" class="btn btn-primary">
                </center>
            </form>
        
    </div>

</div>