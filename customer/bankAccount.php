<?php 
require 'header2.php'; 
// session_start(); 
require '../config/db.php';
$cid = $_SESSION["id"];
// error_reporting(0);
echo $cid;
$message = '';
  $sql = "SELECT account_bank.acc_id,account_bank.branch_name,account_bank.acc_name,
                deposit.number_deposit
          FROM account_bank 
          INNER JOIN deposit 
          ON account_bank.acc_id = deposit.acc_id 
          and account_bank.c_id = :cid";
$statement = $connection->prepare($sql);
$statement->execute([':cid'=>$cid]);
$person = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($person[0]);
// $json = json_encode($person);
// echo $json;
$cout =  count($person)-1;

// echo "<br>";
// echo  json_encode($person);
// echo "<br>";
// echo $person[0]['acc_id'];

?>


<br><br>
<div class="container">

<br>
<br>
<link rel="stylesheet" href="style.css">
    <div class="card">
        <div class="card-header">
           <h1>บัญชีทั้งหมด</h1>
           <a href="addbankAccount.php" class ="btn btn-warning"><span>เพิ่มบัญชี</span></a>
           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
            ลบบัญชี
            </button>
        </div>
    </div>
        <div class="card-body">
                <table class = "table table-bordared">
                    <tr>                      
                        <th><center>ธนาคาร</center></th>
                        <th><center>ชื่อบัญชี</center></th>
                        <th><center>เลขที่บัญชี</center></th>
                        <th><center>ยอดเงินในบัญชี (บาท)</center></th>
                    </tr>
                          <?php  for($x=0;$x<=$cout;$x++):?>
                            <tr>
                                <td><center><?php echo $person[$x]['branch_name']; ?></center></td>
                                <td><center><?php echo $person[$x]['acc_name']; ?></center></td>
                                <td><center><?php echo $person[$x]['acc_id']; ?></center></td>
                                <td><center><?php echo $person[$x]['number_deposit']; ?></center></td> 
                            </tr>
                          <?php endfor; ?>
                </table>       
        </div>

       
</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

     
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      
      <div class="modal-body">
        <form action="deletbankAccount.php" method= "POST">
            <label for="">เลขบัญชี</label>   
            <input type="text" name="acid"><br>
            <label for="">pin(6หลัก)</label>
            <input type="text" name="pin"><br>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" name="delok" class= "btn btn-secondary right" value="ยืนยัน">
      </div>
           
               
        </form>
         
      </div>

     
    </div>
  </div>
</div>









