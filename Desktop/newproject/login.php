<?php

@include 'connection.php';

session_start();
$error ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //$username =$_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

   $sql = " SELECT * FROM user_register WHERE Email_id = '$email' && Password = '$password' ";

   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['Username'];
         $_SESSION['email'] = $row['Email_id'];
         header('location:.\admin_side\index.php');
         

      }else if($row['user_type'] == 'user'){

         $_SESSION['username'] = $row['Username'];
         $_SESSION['email'] = $row['Email_id'];
         header("location:index.php");

      }
     
   }else{
      $error = 'Incorrect Email or Password!';
   }

}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="css/log_regis.css">
    <style>
        .main{
            width: 80%;
            height: auto;
            margin: auto;
            margin-top: 4%;
            display: flex;
            justify-content: space-between;
            background: white;
            border-radius: 10px;
            box-shadow: 10px 10px 15px rgba(0,0,0,0.1);
        }
        .left{
            width: 100%;
            margin: 10px;

        }
        .left img{
            width: 100%;
            height: 100%;
        }

        .right{
            width: 100%;
            justify-content: center;
            display: flex;
            align-items: center;
            background: rgb(6,53,71);
            background: linear-gradient(110deg, rgba(6,53,71,1) 6%, rgba(44,152,194,1) 32%, rgba(6,53,71,1) 63%, rgba(44,152,194,1) 85%);
            border-radius: 0px 10px 10px 0px;

        }

        
    </style>
</head>
<body>
    <div class="main">
        <div class="left">
            <img src="images/logImg.jpg" alt="">
        </div>
        <div class="right">
            <div class="wrapper_log wrapper">
                <header>Login</header>
                <form action="" method="post">
                    <div class="main_error">
                        <div class="error_box">
                            <span><?php echo $error ?></span>
                        </div>
                    </div>
                    <div class="field email">
                    <label for="email">Email</label>
                        <div class="input-area">                    
                            <input type="text" placeholder="Email" name="email" id="email" required>
                            <i class="icon fas fa-envelope"></i>
                        </div>
                    </div>
                        <div class="field password">
                        <label for="password">Password</label>
                            <div class="input-area">
                                <input type="password" placeholder="Password" name="password" id="password" required>
                                <i class="icon fas fa-lock"></i>
                            </div>
                        </div>
        
                        <input type="submit" value="Login">
        
                        <div class="sign-txt">Don't have an account? <a href="registration.php">Register Now</a></div>
        
                    
                </form>
        
            </div>
        </div>

    </div>
    
</body>
</html>