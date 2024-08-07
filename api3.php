<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

 if(isset($_POST['act'])& !empty($_POST['act'])){
  require "baglanti.php";
  $act = $_POST['act'];

  if ($act == 'login'){
    $email = $_POST['email'];
    $pass = md5($_POST['pswd']);

    $query = "SELECT * FROM qeydiyyat where email='".$email."' and pass='".$pass."' LIMIT 1";
    $run = mysqli_query($con,$query);
    if(mysqli_num_rows($run) > 0){
      $get = mysqli_fetch_array($run);
      session_start();
    
      $_SESSION['user_id'] = $get['id']; 
      $_SESSION['username'] = $get['username']; 
      $_SESSION['user_email'] = $get['email']; 
      $_SESSION['user_tel'] = $get['tel']; 
      $_SESSION['is_admin'] = $get['is_admin']; 
      if ($_SESSION['is_admin'] == 1) {
        header("Location: admin.php");
    } else if ($_SESSION['is_admin'] == 0) {
        header("Location: user.php");
    } 
  }else {
    header("Location: register.php");
} 
}  




if ($act == 'reg'){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $pass = md5($_POST['pswd']);


  $query = "INSERT INTO qeydiyyat(username,email,tel,pass)
            VAlUES('".$username."','".$email."','".$tel."','".$pass."')
            ";
  try{
    mysqli_query($con,$query);
    header("Location: register.php");
  }catch(Exception $e){
    echo 
    " <script>alert('Ugursuz qeydiyyat')</script> ";
   }

 }

}