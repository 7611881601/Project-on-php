<?php
$insert=false;
if(isset($_POST['name'])){
 $server="localhost";
 $username="root";
 $password="";

 $con=mysqli_connect($server,$username,$password);

 if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
 }
//  echo "Successfully connected";
$name =$_POST['name'];
$gender =$_POST['gender'];
$age =$_POST['age'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$desc =$_POST['desc']; 
 $sql="INSERT INTO `iiit_bgp`.`iiit` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

if($con->query($sql)==true){
    // echo "Successfully Inserted";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Database</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,400;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="styles.css">
</head>

<body>
    <img src="bg.jpg" alt="IIIT Bhagalpur" class="bg">
    <div class="container">
        <h1>
            Welcome to The Database of IIIT Bhagalpur
        </h1>
        <p>Enter Your details and submit this form to save the data in database</p>
        <?php 
               if($insert==true){
               echo  "<p class='submitmsg'>Thanks for submiting your response</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="name" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Comments"></textarea>
            <button class="btn">Submit</button>
         
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>