<?php
 session_start();
   

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "trials";


$conn = new mysqli($host, $user, $pass, $dbname)
   or die('Could not connect to the database server' . mysqli_connect_error());

$sql = "SELECT hello FROM random";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["hello"]. " - Name: " .  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>