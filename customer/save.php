<?php 
     require '../config/db.php';
    session_start();
    $msg_text = $_POST['msg_text']; // รับข้อความจาก send.php
    $member_token = $_SESSION['member_token']; // ไอดีที่เป็นตัวกำหนดว่าจะแสดง badge ที่หน้าเว็บใคร

    if(isset($msg_text) && isset($member_token)){
        $sql ="INSERT INTO notification( member_token,msg_text,msg_status) 
                                value ('$member_token','$msg_text','1')";
        $statment = $connection->prepare($sql);
        if($statment->execute()){
            echo "Succec";
        }else{
            echo "Fail";
        }
    

    }

    header('Location:index.php');
?>