<?php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $db_name = 'fs101';

   try{
      $con = mysqli_connect($host,$user,$pass,$db_name);
   }catch(Exception $e){
    echo 'error';
   }