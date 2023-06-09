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
</head>
<body>
<div class="main">
    <div class="Navbar">
            <img src="assets/AfriplexLogo.png">
            <div class="normal">
            <a class="Blakfriday" href="index.php"><p>Back to shopping</p> </a>
                <a class="links" href="profile.php"><img src="assets/user.png"></a>
                <a class="links" href="populatedCart.php"><img src="assets/shopping-cart.png"></a>
            </div>
        </div>   

</div>
    <div class="content">
        <h1>Register New Account</h1>
        <div class="login">
        <form class="black" action="register.php" method="POST">
       
       <input type="text" name="Name" placeholder="Name" id="Name" required>
  
       <input type="number" name="ID" placeholder="ID" id="ID" required>
    
       <input type="text" name="LAstname" placeholder="Last name" id="LAstname" required>
    
       <input type="number" name="number" placeholder=" phone number" id="number" required>
  
       <input type="text" name="email" placeholder="email" id="email" required>
   
       <input type="text" name="Address" placeholder="Address" id="Address" required>
     
       <input type="text" name="password" placeholder="Password" id="password" required>
       <input class="Blakfriday1" type="submit" value="REGISTER">
   </form>

        </div>
        
        <a class="Blakfriday" href="profile.php"><p>BACK TO LOGIN</p> </a>
    </div>
</body>
</html>