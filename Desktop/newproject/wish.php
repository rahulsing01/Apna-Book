
<?php
   include './connection.php';

  
   session_start();
   if( $_SESSION['email']==true)
   {
    $bookid=$_GET['bookid'];
    $bookname=$_GET['bookname'];
    $auth=$_GET['auth'];
    $year=$_GET['year'];
   
   
   }
   else{
   
       header('location:login.php');
   }
  

   $usermail= $_SESSION['email'];

        //    error_reporting(0);
           
           $bookid=$_GET['bookid'];
         
           $bookname=$_GET['bookname'];
           $auth=$_GET['auth'];
           $year=$_GET['year'];

           $usermail= $_SESSION['email'];

           if( $_SESSION['email']==true)
           {
            $sql="INSERT INTO `wlist` VALUES (NULL, '$bookid',' $bookname','$auth','$year','$usermail')";
        }else{
            header('location:login.php');
        }
           
            if(mysqli_query($conn, $sql))
            {
               
                echo '<script>alert("Wishlist Added")</script>';
                header('Location:search.php ');
            
        }else{

                echo "failed";
            }


           
        
          
          
          ?>

              
   
      
        
 