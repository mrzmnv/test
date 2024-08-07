<?php
    session_start();
?>

<h2><?=$_SESSION['username']?></h2>
<h2><?=$_SESSION['user_email']?></h2>
<h2><?=$_SESSION['user_tel']?></h2>
<h2><?=$_SESSION['is_admin']?></h2>

