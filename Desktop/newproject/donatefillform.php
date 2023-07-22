<?php
include './header.php';
include './connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Donation System</title>
    <style>
        .inputbox {
            position: relative;
            width: fit-content;
            margin: 20px;
            border-radius: 6px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }

        .inputbox input {
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

        .inputbox input[type=file] {
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

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: black;
            font-size: 19px;
            pointer-events: none;
            transition: 0.3s;
        }

        input:focus {
            border: 2px solid #4154f1;
        }

        input:focus ~ label,
        input:valid ~ label {
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

        .mybutton {
            text-align: center;
            margin-bottom: 10px;
        }

        .btn {
            width: 25%;
            height: 45px;
            font-size: 20px;
        }

        .outerdiv {
            display: flex;
        }
    </style>
    <script>
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
    </script>

</head>

<body>
<center><h1>Book Donation System</h1></center>

<br>
<form class="myform" action="submit.php" method="post">
    <div class="outerdiv">
        <div class="inputbox">
        <input type="text" name="isbn" required oninput="restrictInputToThirteenDigits(event)">
            <label>ISBN Number*</label>
        </div>

        <div class="inputbox">
            <input type="text" name="title" required>
            <label>Book Title*</label>
        </div>
    </div>

    <div class="outerdiv">
        <div class="inputbox">
            <input type="text" name="author" required oninput="validateAlphabetsWithSymbols(event)">
            <label>Author Name*</label>
        </div>

        <div class="inputbox">
            <input type="text" name="publisher" required oninput="validateAlphabetsWithSymbols(event)">
            <label>Publisher Name*</label>
        </div>

        
    </div>

    <div class="outerdiv">

        <div class="inputbox">
            <input type="text" name="publication_year" required oninput="restrictInputToFourDigits(event)">
            <label>Publication Year*</label>
        </div>

        <div class="inputbox">
            <input type="text" name="edition" required oninput="validateAlphabetsWithSymbols(event)">
            <label>Edition Name*</label>
        </div>
    </div>

    <div class="outerdiv">
        <div class="inputbox">
            <input type="text" name="no_of_pages" required oninput="restrictInputToNumbers(event)">
            <label>No. of Pages*</label>
        </div>

        <div class="inputbox">
            <input type="text" name="language" required oninput="validateAlphabetsWithSymbols(event)">
            <label>Language*</label>
        </div>
    </div>

    <div class="outerdiv">
        <div class="inputbox">
            <input type="text" name="quantity" required oninput="restrictInputToNumbers(event)">
            <label>Quantity*</label>
        </div>

        <div class="inputbox">
            <input type="text" name="image" required>
            <label>Image URL*</label>
        </div>

        <!-- <div class="inputbox">
            <input type="text" name="category" required oninput="restrictInputToAlphabets(event)">
            <label>Category</label>
        </div> -->
    </div>

    <!-- <div class="outerdiv"> -->
        <!-- <div class="inputbox">
            <input type="text" name="subcategory"  required oninput="restrictInputToAlphabets(event)">
            <label>Subcategory</label>
        </div> -->

        
    <!-- </div> -->

 

    <div class="mybutton">
        <button class="btn btn-primary" name="submit">Donate Book</button>
    </div>
    </form>
</body>
</html>

<?php
include './footer.php';
?>
