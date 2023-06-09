
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
 
 if(isset($_POST['productId'])){
  $stmt = $conn->prepare("SELECT PName, details, price, stock, uses, img FROM products Where Pid=?");
  $stmt->bind_param("i", $pid);
  $stmt->execute();
    $stmt_result = $stmt->get_result();
    
  
    
        $data = $stmt_result->fetch_assoc();
       
        $PName = $data['PName'];
        $details = $data['details'];
        $price = $data['price'];
        $stock = $data['stock'];
        $img = $data['img'];
        $uses = $data['uses'];
        
        session_regenerate_id();
        $_SESSION['Active'] = TRUE;
        $_SESSION['product'] = $pid;   
        header('Location: viewProducts.php');
 }
}
      
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
  logout();
}
function logout()
{
  unset( $_SESSION['Active']);
  unset($_SESSION['product']);
}
           
    
    

?>
