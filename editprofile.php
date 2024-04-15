<?php
session_start();
include 'includes/db_conn.php';
include 'dashboard.php';

if(isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name']; 
    
    $select = "SELECT name, email, password FROM user_form WHERE name = '$name'";
    $result = mysqli_query($conn, $select);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userName = $row['name']; 
        $email = $row['email'];
        $password = $row['password'];
    }
}


if(isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name']; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form is submitted for email update
        if(isset($_POST['new_email'])) {
            // Retrieve the new email from the AJAX request
            $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);

            // Update the email in the database
            $updateQuery = "UPDATE user_form SET email = '$newEmail' WHERE name = '$name'";
            $result = mysqli_query($conn, $updateQuery);

            // Check if the update was successful
            if($result && mysqli_affected_rows($conn) > 0) {
                // Send a success response back to JavaScript
                echo "Update successful";
            } else {
                // Send an error response back to JavaScript
                echo "Failed to update email";
            }
        }

        // Check if the form is submitted for name update
        if(isset($_POST['new_name'])) {
            // Retrieve the new name from the AJAX request
            $newName = mysqli_real_escape_string($conn, $_POST['new_name']);

            // Perform the database update
            $update_query = "UPDATE user_form SET name = '$newName' WHERE name = '$name'";
            $result = mysqli_query($conn, $update_query);

            if($result) {
                if(mysqli_affected_rows($conn) > 0) {
                    // Update the session variable if needed
                    $_SESSION['user_name'] = $newName;
                    echo "Update successful"; // Send response back to JavaScript
                    exit();
                } else {
                    echo "No rows affected"; // Send response back to JavaScript
                    exit();
                }
            } else {
                // Handle query execution error
                echo "Error: " . mysqli_error($conn); // Send response back to JavaScript
                exit();
            }
        }

        // Check if the form is submitted for password update
        if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
            $currentPassword = mysqli_real_escape_string($conn, $_POST['current_password']);
            $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
            $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

            // Fetch the current password from the database
            $selectQuery = "SELECT password FROM user_form WHERE name = '$name'";
            $result = mysqli_query($conn, $selectQuery);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $storedPassword = $row['password'];

                // Verify if the current password matches the stored password
                if (password_verify($currentPassword, $storedPassword)) {
                    // Check if the new password and confirm password match
                    if ($newPassword === $confirmPassword) {
                        // Hash the new password
                        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Update the password in the database
                        $updateQuery = "UPDATE user_form SET password = '$hashedPassword' WHERE name = '$name'";
                        $result = mysqli_query($conn, $updateQuery);

                        // Check if the update was successful
                        if ($result && mysqli_affected_rows($conn) > 0) {
                            // Send a success response back to JavaScript
                            echo "Password updated successfully";
                        } else {
                            // Send an error response back to JavaScript
                            echo "Failed to update password";
                        }
                    } else {
                        // Send an error response back to JavaScript
                        echo "New password and confirm password do not match";
                    }
                } else {
                    // Send an error response back to JavaScript
                    echo "Incorrect current password";
                }
            } else {
                // Send an error response back to JavaScript
                echo "Error fetching current password";
            }
        }
    }
} else {
    // Send a response indicating that the user is not logged in
    echo "User not logged in";
}

?>

