<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;800&display=swap"
        rel="stylesheet">
   <?php

session_start();
if (!isset($_SESSION['product'])) {
    header('Location: index.php');
    exit;
  }
    $conn = new mysqli("localhost", "root", "", "aonlinestore");
// unsuccessful connection
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
}
//successful connection
else {  
 
 
   $stmt = $conn->prepare("SELECT PName, details, price, stock, uses, img FROM products Where Pid=?");
   $stmt->bind_param("i",  $_SESSION['product']);
   $stmt->execute();
     $stmt_result = $stmt->get_result();
     
   
     
         $data = $stmt_result->fetch_assoc();
        
         $PName = $data['PName'];
         $details = $data['details'];
         $price = $data['price'];
         $stock = $data['stock'];
         $img = $data['img'];
         $uses = $data['uses'];
        
}
      
   
    
    

?>
</head>
<body>
<div class="Navbar">
            <img src="assets/AfriplexLogo.png">
            <div class="normal">
            
                <a class="links" href="profile.php"><img src="assets/user.png"></a>
                <a class="links" href="populatedCart.php"><img src="assets/shopping-cart.png"></a>
                <form action="products.php" method="post">
        <input class="Blakfriday" type="submit" name="logout" value="Back to Shopping" />
        </form>
            </div>
            

        </div>
<div class="Productcard2">

            <h1><?php echo $PName  ?></h1>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($img)?>">
           
            <h2>R<?php echo $price ?></h2>
            <h2>Aplication form: <?php echo $details ?></h2>
            <h2>stock:<?php echo $stock ?></h2>
            <h2>Used for:<?php echo $uses ?></h2>
            <form  action="cart.php" method="POST">
          <input  type="hidden" name="productId" value="<?php echo  $_SESSION['product']?>"  id="productId">
          
          
            <input  type="submit" value="Add to cartt">
      
      
       
          </form>
          
         
          <a class="Blakfriday1" href="populatedCart.php">View Cart</a>
</div>  

</body>
</html>