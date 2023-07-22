<?php 
    include '../connection.php';
    $id=$_POST['bookid'];
            $name=$_POST['bookname'];
            $auth=$_POST['auth'];
            $year=$_POST['year'];
            
$bookid=$_GET['bookid'];

        print_r($book_id);
        // $sql = "select * from book_details where Book_id = $book_id";
        // $Record = mysqli_query($conn,$sql);
        // $data = mysqli_fetch_array($Record); 
        
    ?>