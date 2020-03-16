<?php
    require 'header2.php';
    // session_start(); 
    require '../config/db.php';
    $id =  $_SESSION["id"];
    $useid = $_SESSION["uid"];
    $sql = 'SELECT * FROM customer where c_id =:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id'=> $id]);
    $person = $statement->fetch(PDO::FETCH_OBJ);  
    $message = '';
   
    if(isset ($_POST['name']) && isset($_POST['lastname']) && isset ($_POST['email'])&& isset ($_POST['pass'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone= $_POST['phonenumber'];
        $address=$_POST['address'];

        $sql = "UPDATE userlogin set upassword=:pass WHERE uid=:useid";
        $statement = $connection->prepare($sql);
        $statement ->execute([':pass'=>$pass,':useid'=>$useid]);
        // echo $name;
        // echo $lastname;
        // echo $email;
        // echo $pass;
        // echo $phone;
        // echo $address;
        $sql = "UPDATE customer set c_name=:name,c_email=:email,c_lastname=:lastname ,c_password=:pass,c_address=:address,phone_number=:phone WHERE c_id=:id ";
        $statement = $connection->prepare($sql);
        if($statement->execute([':name'=> $name,':email'=> $email,':lastname'=> $lastname,':id' => $id,':pass'=>$pass,':address'=>$address,':phone'=>$phone])){
            $message = 'แก้ไขข้อมูลสำเร็จ';
            header("refresh:2;useraccount.php"); 
        }else{
            $message = 'แก้ไขล้ม้เหลว';
            header("refresh:2;useraccount.php"); 
        }
    }
?>
<br>
        <div>
        <title>บัญชีผู้ใช้</title>
            <link rel="stylesheet" href="style.css">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-haeder">
                   <h2>บัญชีผู้ใช้</h2>
                    </div>
                    <div class="card-body">
                            <?php if(!empty($message)): ?>
                            <div class="alert alert-success">
                                 <?= $message; ?>
                            </div>
                                 <?php endif; ?>
                        <form name = "signin"  method="post">                                 
                            <label for="">ชื่อ</label>
                            <input type="text" name ="name"  value="<?= $person->c_name;?>" ><br>
                
                            <label for="">นามสกุล</label>
                            <input type="text" name ="lastname"  value="<?= $person->c_lastname;?>"><br>
                        
                    
                            <label for="">Email</label>
                            <input type="email" name ="email" value="<?= $person->c_email;?>"><br>
                     
                        
                            <label for="">ที่อยู่</label>
                            <input type="text" name ="address" value="<?= $person->c_address;?>"><br>
                        
                      
                            <label for="">เบอร์โทรศัพท์</label>
                            <input type="text" name ="phonenumber" value="<?= $person->phone_number;?>"><br>
                        
                            <label for="">Passworld</label>
                            <input type="password" name ="pass" value="<?= $person->c_password;?>"><br>
                        
                        
                            <input type="submit" name ="update" value="แก้ไขข้อมูลส่วนตัว">
                         </form>
                     
                    </div>
                </div>
            </div>
        </div>
