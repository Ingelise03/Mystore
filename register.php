<?php

   session_start();
   

   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "aonlinestore";


   $con = new mysqli($host, $user, $pass, $dbname)
      or die('Could not connect to the database server' . mysqli_connect_error());

if (isset($_POST['ID'], $_POST['Name'], $_POST['LAstname'],  $_POST['Address'],  $_POST['email'],  $_POST['number'],  $_POST['password'])) {
   $Name = $_POST['Name'];
   $ID = $_POST['ID'];
   $surname= $_POST['LAstname'];
   $Address= $_POST['Address'];
  $email=  $_POST['email'];
  $cell=  $_POST['number'];
   $password= $_POST['password'];
   
$sql = "INSERT INTO customer (cust_id, Name, surname, address, cell, email, password)
VALUES ('$ID','$Name','$surname','$Address',' $cell', ' $email',  '$password' )";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location:profile.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}




}else{
    echo 'Fill whole form';
    header('Location:registeracc.php');
}

 ?> 


