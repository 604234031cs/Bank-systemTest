<?php require 'header2.php'; ?>

<br>
<div>
    <title>โอน</title>
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>ถอนเงิน</h2>
            </div>
            <div class="card-body">
                <form action = "checktranfer.php" method="POST">
                    <h2>บัญชีที่ใช้ในการโอน</h2>
                    <label for="">เลขที่บัญชี</label><br>
                        <input type="text" name="acid1" placeholder="หมายเลขบัญชีผู้โอน" required><br>
                    <label for="">จำนวนเงิน</label><br>
                        <input type="text" name="number" placeholder="ระบุจำนวนเงิน" required><br>
                    <label for="">PIN 6 หลัก</label><br>
                        <input type="password" name="pin" placeholder="ใส่รหัส pin 6 หลัก"required><br><br>
                    <h2>บัญชีที่ต้องการโอน</h2>
                    <label for="">ธนาคารปลายทาง</label><br>
                        <select name="bankname">
                                <option selected>เลือกธนาคาร</option>
                                <option value="ธนาคารA">ธนาคารA</option>
                                <option value="ธนาคารB">ธนาคารB</option>
                                <option value="ธนาคารC">ธนาคารC</option>
                        </select><br>
                    <label for="">เลขที่บัญชี</label><br>
                        <input type="text" name="acid2" placeholder="หมายเลขบัญชีผู้รับ"required><br>
                    <label for=""></label><br>
                    <input type="submit" name="withdraw" value = "ทำรายการโอน">
                </form>
            
            </div>
        </div>
    </div>
</div>