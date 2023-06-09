<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;800&display=swap"
        rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="Navbar">
            <img src="assets/AfriplexLogo.png">
            <div class="normal">
            <a class="Blakfriday" href="index.php"><p>Back to shopping</p> </a>
                <a class="links" href="profile.php"><img src="assets/user.png"></a>
                <a class="links" href="cart.php"><img src="assets/shopping-cart.png"></a>
            </div>
        </div>   

</div>
    <div class="content">
        <h1>Hello Please sign in</h1>
        <div class="login">
            
            <form class="black" action="account.php" method="post">
                <!-- <label for="email">
                    <i class="fas fa-user"></i>
                </label> -->
                <input type="text" name="email" placeholder="email" id="email" required>
                <!-- <label for="password">
                    <i class="fas fa-lock"></i>
                </label> -->
                <input type="text" name="password" placeholder="Password" id="password" required>
                <input class="Blakfriday1" type="submit" value="LOGIN">
            </form>
        </div>
        <a class="Blakfriday1" href="registeracc.php"><p>Dont Have an account? Sign up!</p></a>
    </div>
</body>
</html>