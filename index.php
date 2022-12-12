<?php
$insert = false;
if(isset($_POST['name'])){
    //Set connection variables
$server = "localhost";
$username = "root";
$password = "";

// create a database connection
$con = mysqli_connect($server, $username, $password);

//check for connection scuess
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error() );
}
//echo "Sucess connection to the DataBase.";

// collect post variables
$name = $_POST ['name'] ;
$age = $_POST ['age'] ;
$gender = $_POST ['gender'] ;
$email = $_POST ['email'] ;
$phone = $_POST ['phone'] ;
$desc = $_POST ['desc'] ;

$sql =  " INSERT INTO `dbit_trip`.`trip` (`name`, `age`, `gender`, `email`, `phno`, `other`, `date`) VALUES ( $name, $age, $gender, $email, $phone, $desc, current_timestamp());" ;

//echo "$sql"

//Execute the query
if( $con->query($sql) == true ){
    //echo "sucessfully inserted";
    
    // Flag for sucessful insertion
    $insert == true;
}
else{
    echo "ERROR: $sql <br> $con->error" ;
}

//Close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap'); </style>

</head>
<body>
    <img class="bg" src="bg.jpg" alt="donbosko pic">
    <div class="container"> <h1>Welcome to Dbit Travel Form</h1>
        <p>Enter your Details to Participate in the College Trip</p>
        <?php
        if( $insert == true){
        echo " <p class='submit'>Your registration is Completed,Thank you.</p> " ;
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            <input type="number" name="age" id="age" placeholder="Enter your age:">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender:">
            <input type="email" name="email" id="email" placeholder="Enter your Email:">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No:">
            <textarea name="desc" id="dec" cols="10" rows="1" placeholder="Any questions related to the Trip?"></textarea>
            <br>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>