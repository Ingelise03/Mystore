

        <?php

        session_start();

        $conn = new mysqli("localhost", "root", "", "aonlinestore");
        // unsuccessful connection
        if ($conn->connect_error) {
            die("Failed to connect: " . $conn->connect_error);
        } else {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $email = $_POST["email"];
                $password = $_POST["password"];

                //query database
                $stmt = $conn->prepare("SELECT * FROM customer WHERE password = ? ");
                // Bind in the user input data so as to avoid SQL injection
                $stmt->bind_param("s", $password);
                // Execute the query
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                //test that username exists
                if ($stmt_result->num_rows > 0) {

                    $data = $stmt_result->fetch_assoc();
                    if ($data['password'] === $password) {
                        $Name = $data['Name'];
                        $surname = $data['surname'];
                        $number = $data['cell'];
                        $address = $data['address'];
                        $password = $data['password'];
                        $email = $data['email'];
                        $ID = $data['cust_id'];

                        session_regenerate_id();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['cust_id'] = $ID;
                        header('Location:acountdetails.php');
                    } else {
                        echo 'email wrong';
                        header('Location:profile.php');
                    }
                } else {

                    header('Location:profile.php');
                }
            }




            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
                logout();
            }
            function logout()
            {
                unset($_SESSION['cust_id']);
                unset($_SESSION['loggedin']);
            }
        }

        ?>
    
 
