<?php 
    require 'db.php';
    session_start();                    
    if(isset($_GET['user']) && isset($_GET['pass'])){
        $user = $_GET['user'];
        $pass = $_GET['pass'];

        $sql = "SELECT * FROM userlogin WHERE uusername = :user and upassword = :pass ";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        $people = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION["uid"]=$people['uid'];

        if($people === false){
           echo "<script>";
           echo "alert('รหัสผิด')";
            echo "</script>";
           header("refresh:1;../index.php"); 
        }else{
            $uid = $people['uid'];
            if($people['status']=='customer'){
                $sql2 = 'SELECT * FROM customer where uid=:uid';
                $statement = $connection->prepare($sql2);
                $statement->execute([':uid'=>$uid]);
                $person = $statement->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["id"] = $person['c_id'];
                    $_SESSION["name"] = $person['c_name'];
                    $_SESSION["lastname"] = $person['c_lastname'];
                    $_SESSION["email"] = $person['c_email'];
                    $_SESSION["password"] = $person['c_password'];
                    $_SESSION["sex"] = $person['c_sex'];

                header('Location:../customer/index.php');
            }if($people['status']=='officer'){
                $sql2 = 'SELECT * FROM banker where uid=:uid';
                $statement = $connection->prepare($sql2);
                $statement->execute([':uid'=>$uid]);
                $person = $statement->fetch(PDO::FETCH_ASSOC);
                
                // echo $person['b_id'];
                // echo $person['b_name'];
                // echo $person['b_sname'];

                $_SESSION["id"] = $person['b_id'];
                $_SESSION["name"] = $person['b_name'];
                $_SESSION["lastname"] = $person['c_sname'];
                header('Location:../admin/index.php');
            }

            }
        }else{
        session_destroy();
        header('Location:../index.php');
    }
   
    ?>




 
 

 