<?php 
    require 'header2.php'; ?>
<br>
<div>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <div class="container">
        
    <form action="save.php" method="post">
    <input type="text" name="msg_text"/>
    <input type="hidden" name="member_token" value="customer"/>
    <button type="submit">ส่งข้อความ Notify</button>
    </div>
</form>
</div>