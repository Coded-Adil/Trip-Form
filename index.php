<?php
$submit = false;
if (isset($_POST['name'])) {
    
    // Sect connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";
    // Set connection to DataBase
    $con = mysqli_connect($server, $username, $password);

    // Check for connection Success
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connect to DB";


    // Collect POST variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // Creating Query
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    // Execute the Query
    if ($con->query($sql) == true) {
        // echo "Successfully Inserted";
        // FLAG FOR SUCCESSFUL SUBMISSION
        $submit = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the DATABASE Connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel-Form</title>
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bg.jpg" alt="IUS" class="bg">
    <div class="container">
        <h1>Welcome to IUS,Dhaka Bandarbon Trip Form</h1>
        <p>ENTER YOUR DETAILS TO CONFIRM YOUR PARTICIPATION</p>
        <?php
        if ($submit == true) {
            echo "<p class='submit-msg'>Thank You for Submitting this form, We are really Happy to see you Joining OUR TRIP TO BANDARBAN</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

    


    <!-- JS script -->
    <script src="index.js"></script>
</body>
</html>