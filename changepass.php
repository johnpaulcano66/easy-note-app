<?php
include 'includes/db_conn.php';

$currentPasswordErr = $newPasswordErr = $confirmPasswordErr = '';
$passwordUpdated = false;
$response = '';

if (isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $currentPassword = mysqli_real_escape_string($conn, $_POST['old_password']);
        $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        // Validate current password
        $select = "SELECT password FROM user_form WHERE name = ?";
        $stmt = mysqli_prepare($conn, $select);
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if (password_verify($currentPassword, $storedPassword)) {
                // Validate new password
                if (strlen($newPassword) < 8) {
                    $response = 'Password must be at least 8 characters long';
                } elseif ($newPassword != $confirmPassword) {
                    $response = 'Passwords do not match';
                } else {
                    // Update password
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updateQuery = "UPDATE user_form SET password = ? WHERE name = ?";
                    $stmt = mysqli_prepare($conn, $updateQuery);
                    mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $name);
                    mysqli_stmt_execute($stmt);
                    $response = 'success';
                }
            } else {
                $response = 'Incorrect current password';
            }
        } else {
            // Handle case where user does not exist
            $response = 'User not found';
        }
    }
}

// Send the response back to JavaScript
echo $response;
?>
