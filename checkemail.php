<?php
session_start();
include 'includes/db_conn.php';
if(isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name']; 
    
    $select = "SELECT name, email FROM user_form WHERE name = '$name'";
    $result = mysqli_query($conn, $select);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userName = $row['name']; 
        $email = $row['email'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection and other necessary configurations

    $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "<span style='color: red;'>Invalid email format</span>";
    } else {
        $checkQuery = "SELECT * FROM user_form WHERE email = '$newEmail'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<span style='color: red;'>Email already exists</span>";
        } else {
            echo "<span style='color: green;'>Email is valid</span>";
            // Update the email
            $update_query = "UPDATE user_form SET email = '$newEmail' WHERE name = '$name'";
            mysqli_query($conn, $update_query);
            
        }
    }
} else {
    // Handle other HTTP methods if needed
    echo "Method not allowed";
}



?>
