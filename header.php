<?php


// Include the database connection file
@include 'includes/db_conn.php';

// Retrieve the user information from the session
$userName1 = '';
$name = $_SESSION['user_name'];

// Optimize query to fetch user id, name, and imgpath in one go
$select = "SELECT id, name, imgpath FROM user_form WHERE name = '$name'";
$result = mysqli_query($conn, $select);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $userName1 = $row['name'];
    $_SESSION['user_id'] = $user_id;

    // Use the fetched image path or set a default
    $imagePath = !empty($row['imgpath']) ? $row['imgpath'] : 'default_image_path.jpg';
} else {
    // Handle case where user is not found in the database
    // Redirect to login or show an error, depending on the application logic
    header('Location: includes/login.php');
    exit();
}
?>
