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

if (!isset($_SESSION['online'])) {
    header('Location: emptycart.php');
    exit;
  }
  $conn = new mysqli("localhost", "root", "", "aonlinestore");
  // unsuccessful connection
  if ($conn->connect_error) {
      die("Failed to connect: " . $conn->connect_error);
  }
  //successful connection
  else {  
    $stmt = $conn->prepare("SELECT cart.amount,  products.* from products  INNER JOIN cart on cart.Pid=products.Pid ");
   
    $stmt->execute();
$stmt_result = $stmt->get_result();
      
     $record = array();
     while ($line =$stmt_result->fetch_assoc()){
      $record[] = $line;
    
     } 


     $stmt1 = $conn->prepare("SELECT amount, SUM(Price) as total  FROM cart ");
     $stmt1->execute();
 $stmt_result1 = $stmt1->get_result();
 $record1 = array();
while($data = $stmt_result1->fetch_assoc()){
  $Total = $data['total']* $data['amount'];
  $record1[] = $line;
} 


 }
     
     
            
    
    

?>
</head>
<body>
    <div class="CartContainer">
        <div class="Header">
            <h1 class="Heading">Shopping Cart</h1>
            <a href="index.php" class="Blakfriday1">Continue shopping</a>
        </div>

        <?php foreach($record as $rec){ ?>
            <form method="post" action="cart.php">
            <input type="hidden" name="productId" value="<?php echo  $rec['Pid'] ?>"  id="productId">
          <div class="Productcard">
            <div class="info">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rec['img'])?>">
          <h2><?php echo  $rec['PName'] ?></h2>
           
            </div>
           <div class="amount">
           <input class="Blakfriday2" type="submit" name="amount" value="+">
           <h2> Amount:  <?php echo  $rec['amount'] ?></h2>
           <input class="Blakfriday2" type="submit" name="amount" value="-">
           </div>
          <div>
          <h2>R <?php echo $rec['price'] ?></h2>
          </div>
           
           
          <input class="Blakfriday1" type="submit" name="amount" value="Delete">
          
           
        </div>
        <input class="Blakfriday1" type="submit" name="amount" value="Checkout">
            </form>
           
       
         
        <?php } ?>
<div class="Productcard1"> <h1>Total = <?php echo $Total?></h1></div>
  
        
         
    </div>

</body>
</html>