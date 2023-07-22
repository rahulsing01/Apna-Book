<?php
   include './connection.php';

  
   session_start();
   if( $_SESSION['email']==true)
   {
    $bookid=$_GET['bookid'];
   
   
   
   }
   else{
   
       header('location:login.php');
   }
  

   $usermail= $_SESSION['email'];


 
 ?>

      <?php
           error_reporting(0);
           
           $bookid=$_GET['bookid'];
             $sql="delete from `wlist` where ISBN=' $bookid'";

           
           
            if(mysqli_query($conn, $sql))
            {
               
                echo "<script>alert('Wishlist Deleted successfully')</script>";
                header('Location:wishlist.php ');
                            
            ?>


<?php
            
    
        }
            else{

                echo "failed";
            }


           
        
          
          
          ?>