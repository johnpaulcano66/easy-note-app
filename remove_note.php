<?php

include 'includes/db_conn.php';

// DELETION SA MG NOTE MEMEORIES NINYO
if(isset($_GET['id'])) {
    $noteId = $_GET['id'];

    $selectQuery2 = "SELECT * FROM tbl_notes WHERE n_id = $noteId";
    $selectResult2 = mysqli_query($conn, $selectQuery2);

    if(mysqli_num_rows($selectResult2) > 0) {
        $row = mysqli_fetch_assoc($selectResult2);
        

    
        if($selectResult2) {
       
        $deleteQuery2 = "DELETE FROM tbl_notes WHERE n_id = $noteId";
        $deleteResult2 = mysqli_query($conn, $deleteQuery2);

        
            if($deleteResult2) {
            
            header('LOcation: archivepage.php');
                exit();
                                }
    
                    }
            }
    }




// CLOSE DB CONNECTION NINYONG DUHA
mysqli_close($conn);
?>
