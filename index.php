<?php
$insert=false;
if (isset($_POST['name'])){
    $server ="localhost";
    $username="root";
    $password="";

    $con= mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to this databse failed due to" .mysqli_connect_error());
    }
    // echo"Success connection to the db";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `trip`.`trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if ($con->query($sql)==true){
        // echo "Successfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="https://www.tripsavvy.com/thmb/vVG53bOHSHze8Z3NUvcx8fDwq7A=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/GettyImages-930881934-5ae56fe48023b90036464e72.jpg" alt="Manali Image">
    <div class="container">
        <h1>Welcome to "Trip to Manali" form of RGIT</h1>
        <p>Enter your details to confirm your registration</p>


        <?php
        if ($insert==true)
        echo "<p class='Submsg'>Thank you for submitting your form.</p>"
        ?>


        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
            
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
