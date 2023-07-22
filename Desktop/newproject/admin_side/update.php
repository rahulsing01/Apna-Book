
<?php 
include './admin-header.php';
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update Book</title>
  <!---Custom CSS File--->
  <style>
    .inputbox{
    position: relative;
    width: fit-content;
    margin: 20px;
    border-radius: 6px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    .inputbox input{
        width: 400px;
        height: 60px;
        border-radius: 6px;
        font-size: 18px;
        padding: 0 15px;
        border: 2px solid black;
        background: transparent;
        color: black;
        outline: none;
    }

    .inputbox input[type=file]{
        width: 400px;
        height: 60px;
        border-radius: 6px;
        font-size: 18px;
        padding: 13px 15px;
        border: 2px solid black;
        background: transparent;
        color: black;
        outline: none;
    }

    .inputbox label{
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: black;
    font-size: 19px;
    pointer-events: none;
    transition: 0.3s;
    }

    input:focus{
    border: 2px solid #4154f1;
    }

    input:focus ~ label,
    input:valid ~ label{
    top: 0;
    left: 15px;
    font-size: 16px;
    padding: 0 2px;
    background: #fff;
    }

    h2 {
        font-family: "Open Sans", sans-serif;
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
    }

    .myform {
        
        width: fit-content;
        margin: auto;
        padding: 20px;
        background-color: #fffafa;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }
    
    .mybutton{
        text-align: center;
        margin-bottom: 10px;
    }


    .btn{
        width: 25%;
        height: 45px;
        font-size: 20px;
    }
    .outerdiv{
        display: flex;
    }



  </style>
   <script>
    function restrictInputToThirteenDigits(event) {
            const input = event.target;
            let value = input.value;

            // Remove non-digit characters
            value = value.replace(/\D/g, '');

            // Restrict to 13 digits
            value = value.slice(0, 13);

            // Update the input field with the new value
            input.value = value;
        }
        function validateAlphabetsWithSymbols(event) {
        const input = event.target;
        let value = input.value;

        // Remove non-alphabetic characters, except symbols and multiple spaces
        value = value.replace(/[^a-zA-Z\s!@#$%^&*(),.?":{}|<>[\]\\]+/g, '');

        // Update the input field with the new value
        input.value = value;
        }
        function restrictInputToNumbers(event) {
            var input = event.target;
            var value = input.value;
            input.value = value.replace(/\D/g, '');
        }
        function restrictInputToFourDigits(event) {
            const input = event.target;
            const value = input.value;

            // Remove non-digit characters and restrict to four digits
            const newValue = value.replace(/\D/g, '').slice(0, 4);

            // Update the input field with the new value
            input.value = newValue;
}
    </script>
</head>
<body>


<main id="main" class="main">

<div class="pagetitle">
      <h1>Forms</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Update book form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <?php 
    include '../connection.php';
    $book_id=$_GET['bookid'];
    // print_r($book_id);
            // $name=$_POST['bookname'];
            // $auth=$_POST['auth'];
            // $year=$_POST['year'];


        //   $sql =  "SELECT DISTINCT book_details.Book_Title,  book_details.ISBN, book_details.Publication_Year, author.Author_Name, edition.Edition_Name, publisher.Publisher_Name,book_quantity.Quantity,book_price.Book_price
		// 	FROM book_details, author, book_author, edition, book_edition, publisher, book_publisher,book_quantity,book_price
		// 	where book_details.Book_id = book_author.Book_id and author.Author_id = book_author.Author_id
		// 	and book_edition.Edition_id = edition.Edition_id
		// 	and book_publisher.Publisher_id = publisher.Publisher_id where book_details.Book_id=$book_id";

        // $sql =  "SELECT book_details.Book_Title,book_details.No_Of_Page,book_details.ISBN,book_details.Publication_Year, author.Author_Name, publisher.Publisher_Name, edition.Edition_Name
        // FROM book_details
        // INNER JOIN author ON book_author.Author_id = author.Author_id
        // INNER JOIN publisher ON book_publisher.Publisher_id = publisher.Publisher_id
        // INNER JOIN edition ON book_edition.Edition_id = edition.Edition_id
        // WHERE book_details.Book_id = $book_id";




        // print_r($book_id);
        // $sql = "select * from book_details where Book_id = $book_id";
        $sql ="SELECT book_details.*, author.Author_Name, publisher.Publisher_Name, edition.Edition_Name,book_price.Book_price,book_quantity.Quantity, languages.Language_Name, category.category_name, sub_category.sub_category_name
        FROM book_details
        JOIN book_author ON book_details.Book_id = book_author.Book_id 
        JOIN author ON book_author.Author_id = author.Author_id
        
        JOIN book_publisher ON book_details.Book_id = book_publisher.Book_id
        JOIN publisher ON book_publisher.Publisher_id = publisher.Publisher_id
        
        JOIN book_edition ON book_details.Book_id = book_edition.Book_id
        JOIN edition ON book_edition.Edition_id = edition.Edition_id

        Join book_price On book_details.Book_id = book_price.Book_id
        Join book_quantity On book_details.Book_id = book_quantity.Book_id

        join book_language on book_details.Book_id=book_language.Book_id
        join languages on book_language.Language_id=languages.Language_id

        JOIN category ON book_details.Book_id = category.Book_id
        
        JOIN sub_category ON category.category_id = sub_category.category_id

        WHERE book_details.Book_id = ?  ";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

        // $result = mysqli_query($conn, $sql);
        // if (!$result) {
        // die("Query error: " . mysqli_error($conn));
        // }else{
        // // $Record = mysqli_query($conn,$sql);

        // // Check if the book exists in the database
        // if (mysqli_num_rows($result) > 0) {
        // Fetch the book details
        // $row = mysqli_fetch_assoc($result); 

        $isbn=$row['ISBN'];
        $bookname=$row['Book_Title'];
        $no_of_pages=$row['No_Of_Page'];
        $year=$row['Publication_Year'];
        $publisher=$row['Publisher_Name'];
        $author=$row['Author_Name'];
        $edition=$row['Edition_Name'];
        $language=$row['Language_Name'];
        $quantity=$row['Quantity'];
        $price=$row['Book_price'];
        $category=$row['category_name'];
        $subcategory=$row['sub_category_name'];
        }else {
            echo "Book not found in the database.";
          }
        
        
        
    ?>



<h2>Update Book Details</h2>
<form  class="myform" action="" method="POST" enctype="multipart/form-data">

            
       

        <div class="outerdiv">
          
            <div class="inputbox">
                <input type="text" name="ISBN" value="<?php echo "$isbn"?>" oninput="restrictInputToThirteenDigits(event)" spellcheck="false" required> 
                <label>ISBN*</label>
            </div>

            <div class="inputbox">
                <input type="text" id="Book_Title" value="<?php echo "$bookname"?>" name="Book_Title"  spellcheck="false" required> 
                <label>Book Title*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" id="Author_Name" value="<?php echo "$author"?>" name="Author_Name" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required /> 
                <label>Author*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Publisher_Name" value="<?php echo "$publisher"?>" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Publisher*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" name="Publication_Year" value="<?php echo "$year"?>" oninput="restrictInputToFourDigits(event)" spellcheck="false" required> 
                <label>Publication Year*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Edition_Name" value="<?php echo "$edition"?>" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Edition*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="number" name="No_Of_Page" value="<?php echo "$no_of_pages"?>" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>No Of Pages*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Language_Name" value="<?php echo "$language"?>" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Language*</label>
            </div>

        </div>

        <div class="outerdiv">
              
            <div class="inputbox">
                <input type="number" name="Quantity" value="<?php echo "$quantity"?>" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>Quantity*</label>
            </div>

            <div class="inputbox">
                <input type="number" min="0.00" max="10000.00" step="0.01" name="Book_price" value="<?php echo "$price"?>" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>Price*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" name="category_name" value="<?php echo "$category"?>" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Category*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="sub_category_name" value="<?php echo "$subcategory"?>" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Sub-Category*</label>
            </div>
        </div>

        <!-- <div class="outerdiv">

            <div class="inputbox">
                <input type="file" name="image"> 
                <label>Uplaod Image*</label>
            </div>
        </div> -->

        <div class="mybutton">
            <button class="btn btn-primary" name="update">Update</button>
        </div>


      

        

        

       

<?php 

// Retrieve the book ID, title, author, publisher, edition , category , subcategory  from the form

if(isset($_POST['update'])){

    $isbn=$_POST['ISBN'];
    $title=$_POST['Book_Title'];
    $author=$_POST['Author_Name'];
    $publisher=$_POST['Publisher_Name'];
    $year=$_POST['Publication_Year'];
    $edition=$_POST['Edition_Name'];
    $pages=$_POST['No_Of_Page'];
    $language = $_POST['Language_Name'];
    $quantity=$_POST['Quantity'];
    $price=$_POST['Book_price'];
    $category=$_POST['category_name'];
    $subcategory=$_POST['sub_category_name'];
   

    // Update the book details in the database
    $updateBook_details = "UPDATE book_details SET Book_Title = '$title' , ISBN='$isbn' , Publication_Year='$year' , No_Of_Page='$pages' WHERE Book_id = $book_id";
    mysqli_query($conn,$updateBook_details);
    // if (!$result) {
    //     die('Update error: ' . mysqli_error($conn));
    // }
    // $bookupdate=mysqli_insert_id($conn);
    // $stmt1 = $conn->prepare($updateBook_details);
    //     $stmt1->bind_param("si", $title, $isbn, $year, $no_of_pages, $img_upload, $book_id);
    //     $stmt1->execute();



    $updateAuthor= "UPDATE author set Author_Name='$author' WHERE Author_id IN (SELECT Author_id FROM book_author WHERE Book_id = $book_id)";
    mysqli_query($conn,$updateAuthor);


    $updateEdition = "UPDATE edition set Edition_Name='$edition' WHERE Edition_id IN (SELECT Edition_id FROM book_edition WHERE Book_id = $book_id) ";
    mysqli_query($conn,$updateEdition);

    $updatePublisher= " UPDATE publisher set Publisher_Name='$publisher' WHERE Publisher_id IN (SELECT Publisher_id FROM book_publisher WHERE Book_id = $book_id)";
    mysqli_query($conn,$updatePublisher);

    $updateLanguage=" UPDATE languages set Language_Name='$language' where Language_id In (Select Language_id from book_language where Book_id=$book_id)";
    mysqli_query($conn,$updateLanguage);

    $updateprice= "UPDATE book_price set Book_price=$price where Book_id = (select Book_id from book_details where ISBN=$isbn)";
    mysqli_query($conn,$updateprice);

    $updateQuantity= "UPDATE book_quantity set Quantity=Quantity+ $quantity where Book_id = (select Book_id from book_details where ISBN=$isbn)";
    mysqli_query($conn,$updateQuantity);

    $updatecategory=" UPDATE category set category_name=$category where Book_id =(select Book_id from book_details where ISBN=$isbn)";
    mysqli_query($conn,$updatecategory);

    $updatesubcategory= " UPDATE sub_category set sub_category_name=$subcategory where category_id(select category_id from category where Book_id = (select Book_id from book_details where ISBN=$isbn))";
    mysqli_query($conn,$updatesubcategory);

    echo '<script>alert("Book Updated Sucessfully");</script>';
}



?>

</form>
</main>

</body>

</html>

<?php 



include './admin-footer.php';
?>
