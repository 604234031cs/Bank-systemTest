<?php require 'header2.php'; ?>
<?php 
    require '../config/db.php';

    $sql = "SELECT * from customer";
    $stm = $connection->prepare($sql);
    $stm->execute();
    $customer =$stm->fetchAll(PDO::FETCH_ASSOC);  
    $cout =  count($customer)-1;

?>
<br>
<div>
    <title>admin</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>ผู้ใช้ทั้งหมด</h3>
            </div>
            <div class="card-body">
            <table class = "table table-bordared">
                <tr>
                    <th>รหัสผู้ใช้</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>email</th>
                    <th>adress</th>
                    <th>เพศ</th>
                    <th>เบอร์โทรติดต่อ</th>
                </tr>
                <?php  for($x=0;$x<=$cout;$x++):?>
                <tr>
                    <td><?php echo $customer[$x]['c_id']; ?></td>
                    <td><?php echo $customer[$x]['c_name']; ?></td>
                    <td><?php echo $customer[$x]['c_lastname']; ?></td>
                    <td><?php echo $customer[$x]['c_email']; ?></td>
                    <td><?php echo $customer[$x]['c_address']; ?></td>
                    <td><?php echo $customer[$x]['c_sex']; ?></td>
                    <td><?php echo $customer[$x]['phone_number']; ?></td>
                </tr>
                <?php endfor; ?>
                </table>
            </div>
        </div>
    </div>
</div>