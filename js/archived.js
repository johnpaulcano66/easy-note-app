function removeNote(id) {
    // Send an AJAX request to unarchive the note
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Reload the page after successful unarchiving
                window.location.reload();
            } else {
                // Display an error message if unarchiving fails
                alert('Error: Unable to unarchive the note.');
            }
        }
    };
    xhr.open('GET', 'unarchive_note.php?id=' + id, true);
    xhr.send();
}


function deleteAllNotes() {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete all archived notes!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send an AJAX request to delete all archived notes
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Reload the page after successful deletion
                        window.location.reload();
                    } else {
                        // Display an error message if deletion fails
                        Swal.fire('Error', 'Unable to delete all archived notes.', 'error');
                    }
                }
            };
            xhr.open('GET', 'delete_all_notes.php', true);
            xhr.send();
        }
    });
}