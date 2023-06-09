

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;800&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <?php

session_start();
   

   $host = "localhost";
   $user = "root";
   $pass = "";
   $dbname = "aonlinestore";


   $conn = new mysqli($host, $user, $pass, $dbname)
      or die('Could not connect to the database server' . mysqli_connect_error());

      $stmt = $conn->prepare("SELECT Pid, PName, details, price, stock, uses, img FROM products");
      $stmt->execute();
        $stmt_result = $stmt->get_result();
        //test that username exists
       $record = array();
       while ($line =$stmt_result->fetch_assoc()){
        $record[] = $line;
       }
        
            
    

?>
</head>
<body>
     <div class="main">
        <div class="Navbar">
            <img src="assets/AfriplexLogo.png">
            <div class="normal">
               
                <a class="links" href="acountdetails.php"><img src="assets/user.png"></a>
                <a class="links" href="populatedCart.php"><img src="assets/shopping-cart.png"></a>
            
            </div>
          

        </div>
        
        
        <div  class="Navbar1">
            <h1>Discover our Natural remedies</h1>
        </div>
        <div class="decor">
            <img src="assets/nat.png">
        </div>
        <div class="Products">
        <?php foreach($record as $rec){ ?>
          <form  action="products.php" method="POST">
           
            <input type="hidden" name="productId" value="<?php echo  $rec['Pid'] ?>"  id="productId">
          <div class="Productcard">
            <h1><?php echo  $rec['PName'] ?></h1>
            <div class="prdim"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($rec['img'])?>"></div>
           
            <p>R <?php echo $rec['price'] ?></p>
          
            <input type="submit" value="View Product">
        </div>
           
          
       
          </form>
          
        <?php } ?>
        </div>
        
    </div>
</body>
</html>