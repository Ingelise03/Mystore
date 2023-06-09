

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
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
   
	header('Location: profile.php');
	exit;
}
    $conn = new mysqli("localhost", "root", "", "aonlinestore");
    // unsuccessful connection
    if ($conn->connect_error) {
        die("Failed to connect: " . $conn->connect_error);
    }
    //successful connection
   
        //query database
        $stmt = $conn->prepare("SELECT * FROM customer WHERE cust_id = ? ");
        // Bind in the user input data so as to avoid SQL injection
        $stmt->bind_param("i", $_SESSION['cust_id']);
        // Execute the query
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $data = $stmt_result->fetch_assoc();
        $Name = $data['Name'];
        $surname = $data['surname'];
        $number = $data['cell'];
        $address = $data['address'];
        $password = $data['password'];
        $email = $data['email'];
        $ID = $data['cust_id'];
            

    ?>
     </head>
    <body>
    <div class="main">
        <div class="Navbar">
            <img src="assets/AfriplexLogo.png">
            <div class="normal">
               
               
                <a class="Blakfriday" href="index.php"><p>Back to shopping</p> </a>
                <a class="links" href="populatedCart.php"><img src="assets/shopping-cart.png"></a>
            
            </div>
          

        </div>
    
    <div class='content'>
        
   
                        <div class="black">
                            <h1>Your account details are below:</h1>
                            <div class="DataDisp">
                            <p>First Name : </p>
                            <p><?php echo $Name ?></p>

                            </div>
                           
                        </div>
                        <div class="DataDisp">
                            <p>Last Name : </p>
                            <p><?php echo $surname ?></p>

                        </div>
                        <div class="DataDisp">
                            <p>Phopne Number : </p>
                            <p><?php echo $number ?></p>

                        </div>
                        <div class="DataDisp">
                            <p>Address : </p>
                            <p><?php echo $address ?></p>

                        </div>
                        <div class="DataDisp">
                            <p>Password : </p>
                            <p><?php echo $password ?></p>

                        </div>
                        <div class="DataDisp">
                            <p>Email : </p>
                            <p><?php echo $email ?></p>
                            
                        </div>
                        </div>
        <!-- <p> Would You lIke to update your profile? Please select field you would like to change:
        <select id="select1" onchange="getOption()">
            <option data-typeid="Name" value="Name">name</option>
            <option data-typeid="LAstname" value="LAstname">Surname</option>
            <option data-typeid="number" value="number">phone Number</option>
            <option data-typeid="email" value="email">email</option>
            <option data-typeid="Address" value="Address">Address</option>
            <option data-typeid="password" value="password">password</option>
        </select>
    </p>        
            
        <div id="black1" class="black1">
        <form class="black" action="update.php" method="POST">
      
      <input type="text" name="ID"  id="testInput" required>
  
    
     
      <input type="submit" value="update account">
  </form>
        </div>
        <div id="black2" class="black2">
        <form class="black" action="update.php" method="POST">
      
      
    
      <input type="number" name="LAstname" id="other"placeholder="" required>
    
     
      <input type="submit" value="update account">
  </form>
            </div>
         
        
       
                    </div>
                    <form action="account.php" method="post">
        <input class="Blakfriday" type="submit" name="logout" value="Log Out" />
        
                    </div>
           
                    <script>
    
    function move() {
    
        document.getElementById('black1').style.display='flex';
     
    
  }
  function move2() {
    
    document.getElementById('black2').style.display='flex';
 

}
  function getOption() {
        selectElement = document.querySelector('#select1');
        output = selectElement.value;
       
         if(output==="number"){
            document.getElementById("other").name =output;
            move2();
         document.getElementById('other').placeholder = output;
         }
           else{
            document.getElementById("testInput").name =output;
            move();
         document.getElementById('testInput').placeholder = output;
           }
            
            
        
            // var type_id = $('select option:selected').attr('data-typeid'); //to get value
           
        
           
    }
        
       
        </script> -->
    </body>
    </html>
 

 