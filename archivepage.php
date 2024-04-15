
<?php
include_once 'dashboard.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived</title>
    <link rel="stylesheet" href="fonts-awesome/css/all.css">
    <link rel="stylesheet" href="styless/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styless/home.css"> 

    <style>

.unarchive-button {
    position: absolute;
    top: 0;
    left: 0; /* Changed to left */
    padding: 5px 10px;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.unarchive-button:hover {
    background-color: green;
}
       

    </style>
    </head>
    
<body>
<div id="main" class="content">
    <div class="notes-container">
    <div id="mainGeader" class="notes-header">
            <h1>
                <span class="favorites-header">Archived Notes</span>
                <button class="remove-button" onclick="removeSelectedNotes()">Remove</button>
            </h1>
           
            
            <button class="remove-all-button" onclick="deleteAllNotes()">Delete All Notes</button>
        </div>    
    
        <div class="notes-grid" id="notesGrid">
        <?php
            include_once 'includes/db_conn.php';

            if(isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];

                $query = "SELECT n_id, n_title, n_content, n_date
                        FROM tbl_notes
                        WHERE id = '$userId' AND archived = 1
                        ORDER BY n_id DESC"; 
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="note">' .
                    '<div class="note-actions"> 
                <i class="fas fa-ellipsis-h"></i>
                    <ul class="actions-dropdown">
                    <li><a href="javascript:void(0)" onclick="openEditNoteModal(' . $row['n_id'] . ')">View Note</a></li> 
                        
                        <li><a href="remove_note.php?id=' . $row['n_id'] . '" class="delete-note">Delete Note</a></li> 
                    </ul>
                </div>' .  
                '<h3>' . $row['n_title'] . '</h3>' . 
                '<p>' . $row['n_content'] . '</p>' . 
                '<p class="date"> Modified Date: ' . $row['n_date'] . '</p>' . 
                            '<button class="unarchive-button" onclick="removeNote(' . $row['n_id'] . ')">Restore</button>' .
                            '</div>'; 
                    }   
                } else { 
                    echo '<div class="no-notes">' .
                        '<i class="bx bx-note"></i>' . 
                        '<p>No archived notes found.</p>' .
                        '</div>';
                }
            } else {
                echo '<p>Please login to view archived notes.</p>';
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>
</div>

<div id="editNoteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditNoteModal()">&times;</span>
        <h2>View Note</h2>
        <form id="editNoteForm">
            <input type="hidden" id="editNoteId" value="">
            <div class="form-group">
                <label for="editTitle">Title:</label>
                <input type="text" id="editTitle" name="title" required>
            </div>
            <div class="form-group">
                <label for="editContent">Content:</label>
                <textarea id="editContent" name="content" rows="6" required></textarea>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="js/archived.js"></script>
<script src="js/script.js"></script>
</body>
</html>
