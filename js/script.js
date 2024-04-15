
/* ________________________________________________________________________________*/
/* dashboard.php javascript function*/
document.addEventListener("DOMContentLoaded", function () {
    const profileLinks = document.querySelectorAll('.profile-link');

    profileLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const profileMenu = this.nextElementSibling;
            profileMenu.classList.toggle('show');
        });
    });

    // Close profile menu when clicking outside
    window.addEventListener('click', function (event) {
        profileLinks.forEach(link => {
            const profileMenu = link.nextElementSibling;
            if (!link.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.remove('show');
            }
        });
    });
});

/* ________________________________________________________________________________*/
/* notebook.php javascript function*/
/* used dynamically to different features pages javascript function*/
// Function to toggle sidebar

function toggleNav() {
    var sidebar = document.getElementById("mySidebar");
    var main = document.getElementById("main");
    var mainHeader = document.getElementById("mainHeader");
    var sidebarLeft = window.getComputedStyle(sidebar).left;
    if (sidebarLeft === "0px") {
        sidebar.style.transition = "left 0.3s ease"; // Add transition effect
        sidebar.style.left = "-250px";
        main.style.transition = "margin-left 0.3s ease"; // Add transition effect
        main.style.marginLeft = "26px"; // Adjusted margin when sidebar is closed
        mainHeader.style.transition = "margin-left 0.3s ease"; // Add transition effect
        mainHeader.style.marginLeft = "26px"; // Adjusted margin when sidebar is closed
    } else {
        sidebar.style.transition = "left 0.3s ease"; // Add transition effect
        sidebar.style.left = "0";
        main.style.transition = "margin-left 0.3s ease"; // Add transition effect
        main.style.marginLeft = "250px"; // Adjusted margin when sidebar is open
        mainHeader.style.transition = "margin-left 0.3s ease"; // Add transition effect
        mainHeader.style.marginLeft = "250px"; // Adjusted margin when sidebar is open
    }
    const target = document.querySelector(this.getAttribute('href'));
    target.scrollIntoView({
        behavior: 'smooth'
    });
}

/* ________________________________________________________________________________*/
/* used dynamically to different features pages javascript function*/
/* notebook.php javascript function*/
document.getElementById("searchBar").addEventListener("input", function() {
    var input = this.value.toLowerCase();
    var notes = document.getElementsByClassName("note");

    for (var i = 0; i < notes.length; i++) {
        var title = notes[i].getElementsByTagName("h3")[0].textContent.toLowerCase();
        if (title.includes(input)) {
            notes[i].style.display = "block";
        } else {
            notes[i].style.display = "none";
        }
    }
});
/* ________________________________________________________________________________*/
/* used dynamically to different features pages javascript function*/
/* notebook.php javascript function*/
document.addEventListener("DOMContentLoaded", function() {
    var dotIcons = document.querySelectorAll(".fa-ellipsis-h");
    dotIcons.forEach(function(dotIcon) {
        var dropdown = dotIcon.parentElement.querySelector(".actions-dropdown");
        dropdown.style.display = "none"; 

        dotIcon.addEventListener("click", function(event) {
            event.stopPropagation(); 
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        });
    });
});
/* ________________________________________________________________________________*/
/* used dynamically to different features pages javascript function*/
/* notebook.php javascript function*/
function toggleFavorite(icon, noteId) {
    // Toggle the 'clicked' class for the heart icon
    icon.classList.toggle('clicked');

    // Toggle between 'far' (empty heart) and 'fas' (filled heart) classes
    icon.classList.toggle('far');
    icon.classList.toggle('fas');

    // Toggle the 'favorite' class for the heart icon
    icon.classList.toggle('favorite');

    // Get the color of the heart icon
    var heartColor = icon.classList.contains('fas') ? 'red' : 'black';

    // Update the heart color in the DOM
    icon.style.color = heartColor;

    // Send an AJAX request to update the favorite status and heart color in the database
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'addtofavorite.php?id=' + noteId + '&favorite=' + (heartColor === 'red' ? 1 : 0) + '&color=' + heartColor, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Favorite status updated successfully');
        } else {
            console.error('Error updating favorite status');
        }
    };
    xhr.send();
}
/* ________________________________________________________________________________*/
/* notebook.php javascript function*/

  // Get the modal
  var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
function openModal() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/* ________________________________________________________________________________*/


/* ________________________________________________________________________________*/

 // Function to open the edit note modal and populate the form with note data
 function openEditNoteModal(noteId) {
    var modal = document.getElementById("editNoteModal");
    modal.style.display = "block";

    // Send AJAX request to fetch note details
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var noteData = JSON.parse(xhr.responseText);
                document.getElementById("editNoteId").value = noteData.n_id;
                document.getElementById("editTitle").value = noteData.n_title;
                document.getElementById("editContent").value = noteData.n_content;
            } else {
                alert('Error: Unable to fetch note details.');
            }
        }
    };
    xhr.open('GET', 'viewnote.php?id=' + noteId, true);
            xhr.send();
        }

        // Function to close the edit note modal
        function closeEditNoteModal() {
            var modal = document.getElementById("editNoteModal");
            modal.style.display = "none";
            
            // Reload the current page
            location.reload();
        }

        // Function to automatically update the note
        document.getElementById("editNoteForm").addEventListener("input", function() {
            var noteId = document.getElementById("editNoteId").value;
            var title = document.getElementById("editTitle").value;
            var content = document.getElementById("editContent").value;

            // Send AJAX request to update the note
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Optional: Handle success response if needed
                        console.log('Note updated successfully');
                    } else {
                        alert('Error: Unable to update note.');
                    }
                }
            };
            xhr.open('POST', 'updatenote.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('n_id=' + noteId + '&n_title=' + encodeURIComponent(title) + '&n_content=' + encodeURIComponent(content));
        });

        /* ________________________________________________________________________________*/
        /* ________________________________________________________________________________*/

        