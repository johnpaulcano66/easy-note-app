<?php
session_start();
include 'includes/db_conn.php';

// Check if the user is logged in and retrieve the current username from the session
if(isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name']; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the new username from the AJAX request
    $newName = mysqli_real_escape_string($conn, $_POST['new_name']);

    // Check if the username already exists in the database
    $query = "SELECT * FROM user_form WHERE name = '$newName'";
    $result = mysqli_query($conn, $query);

    // Check if the username is a valid format
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $newName)) {
        echo '<span style="color: red;">Invalid username format</span>';
    } elseif (strpos($newName, ' ') !== false) {
        echo '<span style="color: red;">Username cannot contain whitespace</span>';
    } else {
        if (mysqli_num_rows($result) > 0) {
            // Username already exists
            echo '<span style="color: red;">Username already exists</span>';
        } else {
            echo '<span style="color: green;">Username is valid</span>';

            // Update the username
            $update_query = "UPDATE user_form SET name = '$newName' WHERE name = '$name'";
            mysqli_query($conn, $update_query);

            // Update the session variable with the new username
            $_SESSION['user_name'] = $newName;
   
        }
    }
}
?>
