<?php
// Include database connection
include 'includes/db_conn.php';

// Check if the note ID is provided
if (isset($_GET['id'])) {
    // Sanitize the input
    $noteId = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute SQL query to fetch note details
    $query = "SELECT * FROM tbl_notes WHERE n_id = '$noteId'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Check if the note exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch note details
            $noteData = mysqli_fetch_assoc($result);

            // Encode note data to JSON format
            $jsonNoteData = json_encode($noteData);

            // Output JSON
            echo $jsonNoteData;
        } else {
            // Note not found
            http_response_code(404);
            echo json_encode(array("error" => "Note not found."));
        }
    } else {
        // Error fetching note details
        http_response_code(500);
        echo json_encode(array("error" => "Error fetching note details."));
    }
} else {
    // Note ID not provided
    http_response_code(400);
    echo json_encode(array("error" => "Note ID not provided."));
}

// Close database connection
mysqli_close($conn);
?>
