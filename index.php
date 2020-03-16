<?php require 'css/header.php'; ?>

<?php
    require 'config/db.php';
    session_start();
    $message = '';
if(isset($_POST['name']) && isset($_POST['lastname']) &&  isset($_POST['email']) && isset($_POST['pass'])&& isset($_POST['sex'])){
           $name  = $_POST['name'];
           $lastname = $_POST['lastname'];
           $email = $_POST['email'];
           $pass = $_POST['pass'];
           $sex = $_POST['sex'];
           $status = $_POST['status'];

    $sql1 ="INSERT into userlogin(uusername,upassword,status) value(:user,:pass,:status)";
    $statment = $connection->prepare($sql1);
    $statment->execute([':user'=>$email,':pass'=>$pass,':status'=>$status]);

    $sql2 = "SELECT uid FROM userlogin ORDER BY uid DESC LIMIT 1";
    $statment = $connection->prepare($sql2);
    $statment->execute();
    $people = $statment->fetch(PDO::FETCH_ASSOC);
    $uid=$people['uid'];
    echo $uid;
   
    $sql3 = 'INSERT INTO customer(c_name,c_lastname,c_sex,c_email,uid,c_password) values(:name,:lastname,:sex,:email,:uid,:pass)';
    $statment = $connection->prepare($sql3);
    if($statment->execute([':name'=> $name,':lastname'=>$lastname,':sex'=>$sex,':email'=>$email,':pass'=>$pass,':uid'=>$uid]) ) {
        $message = "ลงทะเบียนสำเร็จ";
        header("refresh:2;index.php"); 
    }else{
        echo "Error someting";
    }

}
?>

</div>
    <div class="container ">
        <div class="card mt-5" >
            <div class="card-header">
                <h2><b>สร้างบัญชีใหม่</b></h2>
            </div>
            <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
                <form name = "signin"  method="post">

                <div class="form-group">
                    
                    <!-- ชื่อ -->
                     <input type="text" name= "name" id="name" class = "form-control" placeholder ="ชื่อ" required > 
                     </div>

                     <div class="form-group">
                    <!-- นามสกุล -->
                     <input type="text" name= "lastname" id="lastname" class = "form-control" placeholder ="นามสกุล"  required> 
                     </div>
                     <div class="form-group">
                    <!-- email -->
                     <input type="email" name= "email" id="email" class = "form-control" placeholder ="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                     </div> 
                     <div class="form-group">
                    <!-- pasword -->
                     <input type="password" name= "pass" id="pass" class = "form-control" placeholder ="Password" required>
                     </div> 
                     <div>
                     <label for="sex"><h3>เพศ</h3></label>
                     </div>
                     <div class="form-check">

                         <input class="form-check-input" type="radio" name="sex" id="exampleRadios1" value="ชาย" checked required>
                         <label class="form-check-label" for="exampleRadios1">ชาย</label> &nbsp; &nbsp; &nbsp; 

                         <input class="form-check-input" type="radio" name="sex" id="exampleRadios2" value="หญิง" required>
                         <label class="form-check-label" for="exampleRadios1">หญิง</label>
                    </div>
                    <input type="hidden" id="custId" name="status" value="customer">
                     <div class="form-group">
                        <button type ="submit" class="btn btn-info">สมัคร</button>
                     </div>

                </form>
            
            </div>       
       </div>
                
    </div>
