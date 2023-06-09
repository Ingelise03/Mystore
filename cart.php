<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;800&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <?php

session_start();

$pid= $_POST['productId'];
    $conn = new mysqli("localhost", "root", "", "aonlinestore");
   // unsuccessful connection
   if ($conn->connect_error) {
       die("Failed to connect: " . $conn->connect_error);
   }
   //successful connection
   else {  
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $stmt = $conn->prepare("SELECT PName, details, price, stock, uses, img FROM products Where Pid=?");
        $stmt->bind_param("i", $_POST['productId']);
        $stmt->execute();
          $stmt_result = $stmt->get_result();
          
          session_regenerate_id();
          $_SESSION['online'] = TRUE;
           $_SESSION['Pid'] = $pid; 
          
              $data = $stmt_result->fetch_assoc();
             
              $PName = $data['PName'];
              $details = $data['details'];
              $price = $data['price'];
              $stock = $data['stock'];
              $img = $data['img'];
              $uses = $data['uses'];
             
            if($stmt1 = $conn->prepare("SELECT ProductName, Price, amount FROM cart Where Pid=?")) {
                $stmt1->bind_param("i", $_POST['productId']);
                $stmt1->execute();
                $result = $stmt1->get_result();
                
                  if ($result->num_rows > 0) {
                   
                   while($row = $result->fetch_assoc()) {
                    $ammount = $row['amount']+1;
                   }
                   $stmt2 = $conn->prepare("UPDATE cart  SET amount=? WHERE Pid=?");
                   $stmt2->bind_param("ii", $ammount, $_POST['productId']);
                   $stmt2->execute();
                   header('Location: viewProducts.php');
               }
                 else{
                    $sql = "INSERT INTO cart (Pid, ProductName, Price, amount)
                    VALUES ('$pid','$PName','$price', ' 1' )";
                    if ($conn->query($sql) === TRUE) {
                     echo 'adding new entry';
                     header('Location: viewProducts.php');
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                 }
                  
               
                
            } else{
                echo 'fail';
            }
           
            if(isset($_POST['amount'])){
                $task = $_POST['amount'];
                $stmt1 = $conn->prepare("SELECT  amount FROM cart Where Pid=?") ;
                    $stmt1->bind_param("i", $_POST['productId']);
                    $stmt1->execute();
                    $result = $stmt1->get_result();
                    $data = $result->fetch_assoc();
                    $ams = $data['amount'];
                switch ($task) {
                  case "+":
                    $ams= $ams+1;
                    $stmt2 = $conn->prepare("UPDATE cart  SET amount=? WHERE Pid=?");
                    $stmt2->bind_param("ii", $ams, $_POST['productId']);
                    $stmt2->execute();
                    header('Location: populatedCart.php');
                    break;
                  case "-":
                    $ams= $ams-1;
                    $stmt2 = $conn->prepare("UPDATE  cart  SET amount=? WHERE Pid=?");
                    $stmt2->bind_param("ii", $ams, $_POST['productId']);
                    $stmt2->execute();
                    if($ams==0){
                    $stmt2 = $conn->prepare("DELETE  FROM cart  WHERE Pid=?");
                    $stmt2->bind_param("i", $_POST['productId']);
                    $stmt2->execute();
                    
                    }
                    header('Location: populatedCart.php');
                    break;
                  case "Delete":
                    $stmt2 = $conn->prepare("DELETE  FROM cart  WHERE Pid=?");
                    $stmt2->bind_param("i", $_POST['productId']);
                    $stmt2->execute();
                    header('Location: populatedCart.php');
                    break;
                    case "Checkout":
                        clear();
                        header('Location: populatedCart.php');
                        break;
                  default:
                    echo "Your favorite color is neither red, blue, nor green!";
                }
            }
              
        
         
            
    }else{
       
        
   
            header('Location: emptycart.php');
            
    }
   

     
  
 }
         
     
 function clear()
 {
     unset($_SESSION['Pid']);
     unset($_SESSION['online']);
 }         
    
    

?>

    

