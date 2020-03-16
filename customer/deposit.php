<?php require 'header2.php'; ?>
<?php 
        require '../config/db.php';
   $message='';
    if(isset($_POST['deposit'])){
        $cid =$_SESSION['id'];
        $acid= $_POST['acid'];
        $nw = $_POST['number'];
        $pin= $_POST['pin'];
        $sql1 = "SELECT number_deposit From deposit where acc_id=:acid";
        $statement = $connection->prepare($sql1);
        $statement ->execute([':acid'=>$acid]);
        $deposit = $statement->fetch(PDO::FETCH_ASSOC);
        echo $deposit['number_deposit'];
        $sql = "SELECT pin_suc From account_bank where acc_id=:acid and pin_suc= :pin ";
        $statement = $connection->prepare($sql);
        $statement ->execute([':acid'=>$acid,':pin'=>$pin]);
        $pinaccount = $statement->fetch(PDO::FETCH_ASSOC);
       
        if($deposit['number_deposit']!=null && $pinaccount['pin_suc']!=false){
            $inaccount = $deposit['number_deposit'];
            $sumdeposit = $inaccount+$nw; 
            $sql= "UPDATE deposit set number_deposit=:sumdeposit WHERE acc_id=:acid";
            $statement = $connection->prepare($sql);
            $statement->execute([':sumdeposit'=>$sumdeposit,':acid'=>$acid]);
            echo  $sumdeposit;
             $message= "ฝากเงินสำเร็จ1";
        }elseif($deposit['number_deposit']==null && $pinaccount['pin_suc']!=false){
            $sql= "INSERT into deposit(number_deposit,c_id,acc_id) value (:n_w,:cid,:acid)";
            $statement = $connection->prepare($sql);
            $statement ->execute([':n_w'=>$nw,':cid'=>$cid,':acid'=>$acid]);
            $message= "ฝากเงินสำเร็จ2";
        }
        else{
            $message= "ฝากเงินไม่สำเร็จ";
        } 
}
?>


<br>
<div>
    <link rel="stylesheet" href="style.css">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>
                    ฝากเงินในบัญชี
                </h2>
                <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="card-body">
               <form  method="POST">
                   <label for="">เลขที่บัญชี</label><br>
                   <input type="text" name="acid"  required><br>
                   <label for="">จำนวนเงินฝาก</label><br>
                   <input type="text" name="number"required><br>
                   <label for="">PIN 6 หลัก </label><br>
                   <input type="password" name="pin"required><br>
                   <input type="submit" name="deposit" value="ฝากเงิน" >
                </form>
            </div>
        </div>
    </div>
</div>


