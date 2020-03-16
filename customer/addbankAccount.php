
<?php 
    require 'header2.php';  
    require '../config/db.php'; 
    $cid =$_SESSION['id'];
    $message = "";
    if(isset($_POST['add'])){
        $aid = $_POST['aid'];
        $aname= $_POST['aname'];
        $bank =$_POST['bank'];
        $pin = $_POST['pin'];
        $sql = "INSERT Into account_bank(acc_id,acc_name,c_id,branch_name,pin_suc) value (:aid,:aname,:cid,:bank,:pin)";
        $statment = $connection->prepare($sql);
        if($statment->execute([':aid'=>$aid,':aname'=>$aname,':cid'=>$cid,':bank'=>$bank,':pin'=>$pin])){
            $message = "เพิ่มบัญชีสำเร็จ";
            header("refresh:2;bankAccount.php"); 
        }else{
            $message = "เกิดช้อผิลดพลาด";
        }
    }
?>
<br>
<div>
    <title>เพิ่มบัญชี</title>
    <link rel="stylesheet" href="style.css">
    <div class="container mt-5">
        <div class="card ">
            <div class="card-header">
            <h2>เพิ่มบัญชี</h2>
            </div>
        </div>

        
        <div class="card-body">
        <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
            <label>เลขที่บัญชี</label>
            <input type="text" name="aid" required><br>
            <label >ชื่อเจ้าของบัญชี</label>
            <input type="text" name="aname" required ><br>
            <label >เลือกธนาคาร</label>
                <select name="bank">
                    <option selected>เลือกธนาคาร</option>
                    <option value="ธนาคารA">ธนาคารA</option>
                    <option value="ธนาคารB">ธนาคารB</option>
                    <option value="ธนาคารC">ธนาคารC</option>
                </select><br>
                <label >PIN 6 หลัก</label>
            <input type="password" name="pin"  pattern="{0-9}{6,}" required ><br>
            <input type="submit" name="add" value="เพิ่มบัญชี" required>
            </form>
        </div>
    </div>
</div>