<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Ensure this is at the top before any output
}

if (!isset($_SESSION['user_name'])) {
    header('Location: includes/login.php');
    exit();
}

@include 'includes/db_conn.php';

$userName1 = '';
$name = $_SESSION['user_name'];

$select = "SELECT id, name FROM user_form WHERE name = '$name'";
$result = mysqli_query($conn, $select);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $userName1 = $row['name'];
    $_SESSION['user_id'] = $user_id;

    // Retrieve image path
    $selectImage = "SELECT imgpath FROM user_form WHERE id = $user_id";
    $resultImage = mysqli_query($conn, $selectImage);
    if ($resultImage && mysqli_num_rows($resultImage) > 0) {
        $rowImage = mysqli_fetch_assoc($resultImage);
        $imagePath = $rowImage['imgpath'];
    } else {
        $imagePath = 'default_image_path.jpg'; // Default image
    }
}
?>
