<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username ,$password);

    if(!$con){
        die("connection to this database falied due to" . mysqli_connect_error());
    }
    //echo "Sucess connecting to the db";

    $name = $_POST['name'];         
    $gender =$_POST['gender']; 
    $age = $_POST['age']; 
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
    $desc= $_POST['desc'];
    $sql ="INSERT INTO `trip`.`trip` (`sno` ,`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('0', '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;
    
    if($con->query($sql)== true){
        //echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "Error : $sql <br> $con->error";
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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg"src="bg.jpg" alt="Sethu Institute Of Technology">
    <div class="conatiner">
        <h2>       Welcome tO Sethu Institute Of Technology     </h2>
        <p>Enter your details and sumbit to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='sumbitMsg'>Thanks For sumbitting This form.</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other info"></textarea>
            <button class="btn">Sumbit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>