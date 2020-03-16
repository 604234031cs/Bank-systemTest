<?php 
  session_start(); 
  $cid = $_SESSION["id"];
  require '../config/db.php';
    $sql = "SELECT * from loan where status='อนุมัติ' and c_id = $cid";
    $stm= $connection->prepare($sql);
    $stm->execute();
    // $reques = $stm->fetch(PDO::FETCH_ASSOC);
    $count = $stm->rowCount();
    // $cout = count($reques)+1;
    // echo $count;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sidebar.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div class="menu">
      <a href="index.php"> <header><?php echo $_SESSION["name"]; ?> <?php echo $_SESSION["lastname"];?> </header> </a>
      <ul>
     
        <li><a href="notication.php"><span>แจ้งเตือน</span><?php echo $count; ?></a></li>
        <li><a href=""><span>จัดการบัญชี</span></a> 
          <ul>
            <li><a href="userAccount.php"><span>บัญชีผู้ใช้ส่วนตัว</span></a></li>
            <li><a href="bankAccount.php"><span>บัญชีธนาคาร</span></a>
          </li>
        </ul>
        <li><a href="#"><span>ฝาก-โอน</span></a>
        <ul>
            <li><a href="deposit.php"><span>ฝากเงิน</span></a></li>
            <li><a href="withdraw.php"><span>โอนเงิน</span></a>
          </li>
        </ul>
        
        </li>
        <li><a href="loan.php"><span>เงินกู้</span></a></li>
        <li> <a href="../config/checklogin.php">ออกจากระบบ</a></li>
      </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>