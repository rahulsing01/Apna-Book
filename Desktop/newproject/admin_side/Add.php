
<?php 
include './admin-header.php';
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    
    <style>
         /* Style for body */
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

        // function validateAlphabetsOnly(event) {
        //     const input = event.target;
        //     let value = input.value;

        //     // Remove non-alphabetic characters and multiple spaces
        //     value = value.replace(/[^A-Za-z\s]+/g, '');

        //     // Update the input field with the new value
        //     input.value = value;
        // }

        function validateAlphabetsWithSymbols(event) {
        const input = event.target;
        let value = input.value;

        // Remove non-alphabetic characters, except symbols and multiple spaces
        value = value.replace(/[^a-zA-Z\s!@#$%^&*(),.?":{}|<>[\]\\]+/g, '');

        // Update the input field with the new value
        input.value = value;
}

        function validateDigitsOnly(event) {
            const input = event.target;
            let value = input.value;

            // Remove non-digit characters
            value = value.replace(/\D/g, '');

            // Update the input field with the new value
            input.value = value;
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
          <li class="breadcrumb-item active">Add book form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->



            <h2>Add Book Details</h2>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h6>Note:</h6>
                <p>
                    <li>All (*) mark are mandatory to fill</li>
                    <li>Only 13 digit of ISBN is taken</li>
                    <li>Only JPEG, JPG, PNG and PDF formats are allowed to upload image</li>
                    <li>The image size should not be greater than 2MB</li>
                </p>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
              </div>
               
    <form  class="myform" action="" method="POST" enctype="multipart/form-data">

            
       

        <div class="outerdiv">
          
            <div class="inputbox">
                <input type="text" name="ISBN" oninput="restrictInputToThirteenDigits(event)" spellcheck="false" required> 
                <label>ISBN*</label>
            </div>

            <div class="inputbox">
                <input type="text" id="Book_Title" name="Book_Title"  spellcheck="false" required> 
                <label>Book Title*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" id="Author_Name" name="Author_Name" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required /> 
                <label>Author*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Publisher_Name" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Publisher*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" name="Publication_Year" oninput="restrictInputToFourDigits(event)" spellcheck="false" required> 
                <label>Publication Year*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Edition_Name" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Edition*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="number" name="No_Of_Page" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>No Of Pages*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="Language" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Language*</label>
            </div>

        </div>

        <div class="outerdiv">
              
            <div class="inputbox">
                <input type="number" name="Quantity" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>Quantity*</label>
            </div>

            <div class="inputbox">
                <input type="number" min="0.00" max="10000.00" step="0.01" name="Price" oninput="validateDigitsOnly(event)" spellcheck="false" required> 
                <label>Price*</label>
            </div>

        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="text" name="Category" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Category*</label>
            </div>

            <div class="inputbox">
                <input type="text" name="SubCategory" oninput="validateAlphabetsWithSymbols(event)" spellcheck="false" required> 
                <label>Sub-Category*</label>
            </div>
        </div>

        <div class="outerdiv">

            <div class="inputbox">
                <input type="file" name="image"> 
                <label>Uplaod Image*</label>
            </div>
        </div>

        <div class="mybutton">
            <button class="btn btn-primary" name="submit">Submit</button>
        </div>

   
   
      
           
   <?php
   include '../connection.php';
//    error_reporting(0);

$isbn = $bookname = $auth = $no_of_pages = $year = $imgupload = "";


if(isset($_POST['submit'])){

    $errors= array();
    $isbn=$_POST['ISBN'];
    $bookname=$_POST['Book_Title'];
    $author=$_POST['Author_Name'];
    $publisher=$_POST['Publisher_Name'];
    $year=$_POST['Publication_Year'];
    $edition=$_POST['Edition_Name'];
    $no_of_pages=$_POST['No_Of_Page'];
    $language = $_POST['Language'];
    $quantity=$_POST['Quantity'];
    $price=$_POST['Price'];
    $category=$_POST['Category'];
    $subcategory=$_POST['SubCategory'];

    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];

    // Check if the ISBN already exists in the database
    $existingISBNQuery = "SELECT COUNT(*) AS count FROM book_details WHERE ISBN = ?";
    $existingISBNStmt = $conn->prepare($existingISBNQuery);
    $existingISBNStmt->bind_param("s", $isbn);
    $existingISBNStmt->execute();
    $existingISBNResult = $existingISBNStmt->get_result();
    $existingISBNData = $existingISBNResult->fetch_assoc();

    if ($existingISBNData['count'] > 0) {
        $errors[] = "ISBN already exists. Please provide a unique ISBN.";
    }

    // Check if a file is selected
    if ($imageName) {

        // Get the file extension
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Define the allowed extensions and maximum file size
        $allowedExtensions = array("jpeg", "jpg", "png", "pdf");
        $maxFileSize = 2 * 1024 * 1024; // 2MB in bytes

        // Check the extension
        if (!in_array($imageExt, $allowedExtensions)) {
            $errors[] = "Only JPEG, JPG, PNG, and PDF files are allowed.";
        }

        // Check the file size
        if ($imageSize > $maxFileSize) {
            $errors[] = "File size should not exceed 2MB.";
        }

        // If no errors, proceed with storing the image in the database
        if (empty($errors)) {

            // Convert the image into binary data
            $img_upload = addslashes(file_get_contents($imageTmp));
        
            // Insert book details into the table
            $bookDetailsQuery = "INSERT INTO book_details (ISBN, Book_Title, No_Of_Page, Publication_Year, image) VALUES ('$isbn', '$bookname', '$no_of_pages', '$year', '$img_upload')";
            $query=mysqli_query($conn, $bookDetailsQuery);
            $bookid=mysqli_insert_id($conn);

            // // Insert author into the author table
            // $authorQuery = "INSERT INTO author (Author_Name) VALUES ('$author')";
            // mysqli_query($conn, $authorQuery);
            // $authorid = mysqli_insert_id($conn);

            // //joining both the id's
            // $bookauthor="INSERT INTO book_author(Author_id,Book_id) Values ('$authorid','$bookid')";
            // mysqli_query($conn,$bookauthor);
            // $bookauthorid=mysqli_insert_id($conn);

            // if already author in author table then do not enter the duplicate value

            //Check if the author already exists in the database
            $authord= " SELECT * from author where Author_Name =?";
            $existingauthor=$conn->prepare($authord);
            $existingauthor->bind_param("s",$author);
            $existingauthor->execute();
            $authorResult=$existingauthor->get_result();

            // // retrieve the author id

            if($authorResult->num_rows > 0){
                $authorData=$authorResult->fetch_assoc();
                $authorid=$authorData['Author_id'];

            }else{
            //     //Insert new author in database

                $insertauthorquery="INSERT into author (Author_Name) values (?)";
                $insertAuthor=$conn->prepare($insertauthorquery);
                $insertAuthor->bind_param("s",$author);
                $insertAuthor->execute();

            //     // retrive the author id

                $authorid=$insertAuthor->insert_id;
            }

            $bookAuthorQuery = "INSERT INTO book_author (Author_id, Book_id) VALUES (?, ?)";
            //mysqli_query($conn,$bookAuthorQuery);
            $bookAuthorStmt = $conn->prepare($bookAuthorQuery);
            $bookAuthorStmt->bind_param("ii", $authorid, $bookid);
            $bookAuthorStmt->execute();
            $bookAuthorId = $bookAuthorStmt->insert_id;

            // // Insert publisher into the publisher table
            // $publisherQuery = "INSERT INTO publisher (Publisher_Name) VALUES ('$publisher')";
            // mysqli_query($conn, $publisherQuery);
            // $publisherid = mysqli_insert_id($conn);

            // // Insert Book_publisher table 
            // $bookpublihser=" INSERT Into book_publisher(Publisher_id,Book_id) Values ('$publisherid','$bookid')";
            // mysqli_query($conn,$bookpublihser);
            // $bookpublisherid=mysqli_insert_id($conn);

             // //Check if the publisher already exists in the database
            
             $publisherquery = "SELECT * FROM publisher WHERE Publisher_Name=?";
             $existpublisher = $conn->prepare($publisherquery);
             $existpublisher->bind_param("s", $publisher);
             $existpublisher->execute();
             $publisherResult = $existpublisher->get_result();
 
             // retrieve the publisher id
             if ($publisherResult->num_rows > 0) {
                 $publisherData = $publisherResult->fetch_assoc();
                 $publisherid = $publisherData['Publisher_id'];
             } else {
                 // insert into publisher table
                 $insertpublisherquery = "INSERT INTO publisher (Publisher_Name) VALUES (?)";
                 $insertpublisher = $conn->prepare($insertpublisherquery);
                 $insertpublisher->bind_param("s", $publisher);
                 $insertpublisher->execute();
 
                 $publisherid = $insertpublisher->insert_id;
             }
 
             // insert into book_publisher table
             $bookpublisher = "INSERT INTO book_publisher (Publisher_id, Book_id) VALUES (?, ?)";
             $bookPublisherStmt = $conn->prepare($bookpublisher);
             $bookPublisherStmt->bind_param("ii", $publisherid, $bookid);
             $bookPublisherStmt->execute();
             $bookpublisherid = $bookPublisherStmt->insert_id;
 

            // // Insert edition into the edition table
            // $editionQuery = "INSERT INTO edition (Edition_Name) VALUES ('$edition')";
            // mysqli_query($conn, $editionQuery);
            // $editionid = mysqli_insert_id($conn);

            // $bookedition= " INSERT Into book_edition(Edition_id,Book_id) Values ('$editionid','$bookid')";
            // mysqli_query($conn,$bookedition);
            // $bookeditionid =  mysqli_insert_id($conn);

             // Edition already exist in table then apply this code

             $editionQuery = "SELECT * FROM edition WHERE Edition_Name = ?";
             $existedition = $conn->prepare($editionQuery);
             $existedition->bind_param("s", $edition);
             $existedition->execute();
             $editionResult = $existedition->get_result();
 
             // retrieve the edition id
             if ($editionResult->num_rows > 0) {
                 $editionData = $editionResult->fetch_assoc();
                 $editionid = $editionData['Edition_id'];
             } else {
                 // insert into edition table
                 $inserteditionquery = "INSERT INTO edition (Edition_Name) VALUES (?)";
                 $insertedition = $conn->prepare($inserteditionquery);
                 $insertedition->bind_param("s", $edition);
                 $insertedition->execute();
 
                 $editionid = $insertedition->insert_id;
             }
 
             // insert into book_edition table
             $bookedition = "INSERT INTO book_edition (Edition_id, Book_id) VALUES (?, ?)";
             $bookEditionStmt = $conn->prepare($bookedition);
             $bookEditionStmt->bind_param("ii", $editionid, $bookid);
             $bookEditionStmt->execute();
             $bookeditionid = $bookEditionStmt->insert_id;

            // $languageQuery= " INSERT into languages(Language_Name) values('$language')";
            // mysqli_query($conn,$languageQuery);
            // $languageid = mysqli_insert_id($conn);

            // $booklanguage= " INSERT into book_language(language_id,Book_id) values('$languageid','$bookid')";
            // mysqli_query($conn,$booklanguage);
            // $booklanguageid = mysqli_insert_id($conn);

             // language already exist in table then its code apply

             $languageQuery = "SELECT * FROM languages WHERE Language_Name = ?";
             $existinglanguage = $conn->prepare($languageQuery);
             $existinglanguage->bind_param("s", $language);
             $existinglanguage->execute();
             $languageResult = $existinglanguage->get_result();
 
             // retrieve the language id
             if ($languageResult->num_rows > 0) {
                 $languageData = $languageResult->fetch_assoc();
                 $languageid = $languageData['Language_id'];
             } else {
                 // insert into languages table
                 $insertlanguagequery = "INSERT INTO languages (Language_Name) VALUES (?)";
                 $insertlanguage = $conn->prepare($insertlanguagequery);
                 $insertlanguage->bind_param("s", $language);
                 $insertlanguage->execute();
 
                 $languageid = $insertlanguage->insert_id;
             }
 
             // insert into book_language table
             $booklanguage = "INSERT INTO book_language (Language_id, Book_id) VALUES (?, ?)";
             $booklanguageStmt = $conn->prepare($booklanguage);
             $booklanguageStmt->bind_param("ii", $languageid, $bookid);
             $booklanguageStmt->execute();
             $booklanguageid = $booklanguageStmt->insert_id;

            // Insert into quantity table
            $quantityQuery= "INSERT INTO book_quantity(Quantity,Book_id) Values ('$quantity','$bookid')";
            mysqli_query($conn,$quantityQuery);
            $quantityid=mysqli_insert_id($conn);

            //Insert into price table
            $priceQuery= "INSERT INTO book_price(Book_price,Book_id) Values ('$price','$bookid')";
            mysqli_query($conn,$priceQuery);
            $priceid=mysqli_insert_id($conn);

            //Insert into category table
            $categoryQuery= "INSERT INTO category(category_name,Book_id) Values ('$category','$bookid')";
            mysqli_query($conn,$categoryQuery);
            $categoryid=mysqli_insert_id($conn);

            //Insert into sub-category table
            $categoryQuery= "INSERT INTO sub_category(sub_category_name,category_id) Values ('$subcategory','$categoryid')";
            mysqli_query($conn,$categoryQuery);
            $categoryid=mysqli_insert_id($conn);

            echo '<script>alert("Sucessfully Inserted");</script>';

        }else{

        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
 
        // Display errors
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
        }
        echo '</div>';
    }
}

   
    
    
}
?>


   
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
  $(document).ready(function() {
  // Fetch the book titles from the database
  $.ajax({
    url: "fetchforautocomplete.php", // Replace with your PHP script to fetch data from the database
    method: "POST",
    dataType: "json",
    success: function(data) {
      // Set up autocomplete for the book title input field
      $("#Book_Title").autocomplete({
        source: data, // Use the fetched book titles as autocomplete suggestions
        minLength: 2 // Minimum number of characters required to trigger autocomplete
      });
    }
  });
});

</script>
   

</body>
</html>

<?php 

include './admin-footer.php';
?>

