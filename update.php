<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
if (!isset($_SESSION['loggedin'])) {
   
	header('Location: profile.php');
	exit;
}
   session_start();
   

   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "aonlinestore";


   $con = new mysqli($host, $user, $pass, $dbname)
      or die('Could not connect to the database server' . mysqli_connect_error());

if (isset(  $_POST['ID'],$_POST['Name'], $_POST['LAstname'],  $_POST['Address'],  $_POST['email'],  $_POST['number'],  $_POST['password'])) {
   $Name = $_POST['Name'];
   $ID = $_POST['ID'];
   $surname= $_POST['LAstname'];
   $Address= $_POST['Address'];
  $email=  $_POST['email'];
  $cell=  $_POST['number'];
   $password= $_POST['password'];
   $sql = "UPDATE `customer` SET `cust_id`='$ID',`Name`='$Name',`surname`='$surname',`address`='$Address',`cell`='$cell',`email`='$email',`password`='$password'"; 
// $sql = "UPDATE customer Set cust_id ='$ID' Name ='$Name', surname ='$surname', address ='$Address', cell =' $cell', email =' $email', password = '$password'";
if ($con->query($sql) === TRUE) {
    echo "updated   successfully";
    header('Location:profile.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
echo ' success';



}else{
    echo 'Fill whole form';
    header('Location:accountdetails.php');
}
$con->close();
 ?> 
</head>
<body>
    
</body>
</html>

