<?php
// Include database connection
include 'includes/db_conn.php';

// Check if the necessary data is provided via POST request
if (isset($_POST['n_id']) && isset($_POST['n_title']) && isset($_POST['n_content'])) {
    // Sanitize and escape the input data
    $noteId = mysqli_real_escape_string($conn, $_POST['n_id']);
    $title = mysqli_real_escape_string($conn, $_POST['n_title']);
    $content = mysqli_real_escape_string($conn, $_POST['n_content']);

    // Prepare and execute SQL query to update the note
    $query = "UPDATE tbl_notes SET n_title = '$title', n_content = '$content' WHERE n_id = '$noteId'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Note updated successfully
        echo json_encode(array("success" => true));
    } else {
        // Error updating note
        http_response_code(500);
        echo json_encode(array("error" => "Error updating note."));
    }
} else {
    // Required data not provided
    http_response_code(400);
    echo json_encode(array("error" => "Required data not provided."));
}

// Close database connection
mysqli_close($conn);
?>
