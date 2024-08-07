<?php
    
    if(isset($_POST['act'])& !empty($_POST['act'])){
        require "connection.php";
        $act = $_POST['act'];

        if($act == 'login'){
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);

            $query = "SELECT * FROM users where email='".$email."' and pass = '".$pass."' LIMIT 1";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run)>0){
                $get = mysqli_fetch_array($run);
                session_start();
                $_SESSION['user_id'] = $get['id']; 
                $_SESSION['user_Fname'] = $get['ad']; 
                $_SESSION['user_Lname'] = $get['soyad']; 
                $_SESSION['user_email'] = $get['email']; 
                header("Location: cabinet.php");
            }else{
                header("Location: login-signup.php");
            }
        }   

        if($act=='reg'){
            $ad = $_POST['firstName'];
            $soyad = $_POST['lastName'];
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            
            $query = "INSERT INTO users (ad,soyad,email,pass)
                VALUES ('".$ad."','".$soyad."','".$email."','".$pass."')   
                ";
            try{
                mysqli_query($con,$query);
                header("Location: login-signup.php");
            }catch(Exception $e){
                echo "
                    <script>alert('Ugursuz qeydiyyat')</script>
                ";
            }
        }
    }