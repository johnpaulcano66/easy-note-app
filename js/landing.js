
/* _____________________________landing script # 1___________________________________________________*/  
// para mo automatic scroll padung sa kung asa to ang  link # nga section 
document.addEventListener("DOMContentLoaded", function() {
    // Smooth scrolling to sections
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            target.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add active class to navigation links based on scroll position
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.left-menu a');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.classList.contains(current + '-btn')) {
                link.classList.add('active');
            }
        });
    });
});

/* ________________________________________________________________________________*/  

/* _____________________________landing script # 2___________________________________________________*/   

// Get all navbar list items
const navbarItems = document.querySelectorAll('.navbar .navbar-menu ul li a');

// Add event listener to each navbar list item
navbarItems.forEach(item => {
    item.addEventListener('click', function() {
        // Remove active class from all items
        navbarItems.forEach(item => {
            item.classList.remove('active');
        });

        // Add active class to the clicked item
        this.classList.add('active');
    });
});
/* ________________________________________________________________________________*/  

/* _____________________________landing script # 3___________________________________________________*/  

   document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.nav-container');
        var isDarkMode = document.body.classList.contains('dark-mode');
        var scrollTop = window.scrollY;

        // Check if the page is in dark mode
        if (isDarkMode) {
            // Handle background color for dark mode
            if (scrollTop > 0) {
                navbar.classList.add('colored');
                navbar.classList.remove('transparent');
            } else {
                navbar.classList.remove('colored');
                navbar.classList.add('transparent');
            }
            navbar.classList.remove('white-bg'); // Remove white background class
        } else {
            // Handle background color for light mode
            if (scrollTop > 0) {
                navbar.classList.add('colored');
                navbar.classList.remove('transparent');
            } else {
                navbar.classList.remove('colored');
                navbar.classList.add('transparent');
            }
            if (scrollTop > 0) {
                navbar.classList.add('white-bg'); // Add white background class when scrolled down
            } else {
                navbar.classList.remove('white-bg'); // Remove white background class when at the top
            }
        }
    });
});

 /* ________________________________________________________________________________*/
 
/* _____________________________landing script # 4___________________________________________________*/  

        // Function to simulate typewriter effect
function typeWriter(text, i, id) {
    if (i < text.length) {
        document.getElementById(id).innerHTML += text.charAt(i);
        i++;
        setTimeout(function() { typeWriter(text, i, id); }, 500); // Adjust typing speed here
    } else if (id === 'easyNote') {
        document.getElementById(id).style.opacity = 1; // Fade in EasyNote after typing is complete
         // Clear the text after typing is complete
         setTimeout(function() {
            document.getElementById(id).innerHTML = '';
            typeWriter(text, 0, id); // Restart typewriter for the same text
        }, 300); // Adjust delay before starting the next iteration
    }
}

// Call typewriter function for the word "EasyNote"
window.onload = function() {
    var text = "EasyNote";
    typeWriter(text, 0, 'easyNote');
};

 /* ________________________________________________________________________________*/
 
/* _____________________________landing script # 5___________________________________________________*/  

// Dark mode toggle functionality
document.getElementById('switch-button').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
});
/* ________________________________________________________________________________*/  
// Get the modal
var modal = document.getElementById("myModal");
var registerModal = document.getElementById("registerModal");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
function openModal() {
    modal.style.display = "block";
    formContainer.classList.add('active');
}

// When the user clicks on <span> (x), close the modal
function closeModal() {
    modal.style.display = "none";
    formContainer.classList.remove('active');
}
function openRegisterModal(){
    registerModal.style.display = "block";
    formContainer.classList.add('active');
}
function closeRegisterModal() {
    registerModal.style.display = "none";
    formContainer.classList.remove('active');
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/* ________________________________________________________________________________*/ 

/* _____________________________landing script # 5___________________________________________________*/   
document.addEventListener('DOMContentLoaded', function() {
  var mainContainer = document.querySelector('.main-container');
  mainContainer.classList.add('active'); // Add 'active' class to trigger transition
  document.querySelector('.feature-heading').classList.add('active');
document.querySelector('.features-container').classList.add('active');
document.querySelector('footer').classList.add('active');
document.querySelector('.navbar').classList.add('active');



});
/* ________________________________________________________________________________*/  

/* _____________________________landing script # 6___________________________________________________*/  
function submitLogin() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var formData = new FormData();
        formData.append("name", username);
        formData.append("password", password);

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        
                        swal("", "Successfully Logged In!", "success").then(function() {
                        window.location.href = 'dashboardpage.php';
                    });
                    } else {
                        document.getElementById("loginErrorContainer").innerHTML = "<span class='error-msg'>" + response.message + "</span>";
                        setTimeout(function() {
                            document.getElementById("loginErrorContainer").innerHTML = ""; 
                        }, 3000);
                    }
                } else {
                    console.error('Server error: ' + xhr.status);
                }
            }
        };

        xhr.open("POST", "login.php", true);
        xhr.send(formData);
    }
 /* ________________________________________________________________________________*/     
 
/* _____________________________landing script # 6___________________________________________________*/  
function submitForm() {
    var form = document.getElementById("registerForm");
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                        
                        swal("", "Successfully Registered!", "success").then(function() {
                        window.location.href = 'index.php';
                    });
                } else {
                  // Display error message with a time limit
                    document.getElementById("errorContainer").innerHTML = "<span class='error-msg'>" + response.message + "</span>";
                    setTimeout(function() {
                        document.getElementById("errorContainer").innerHTML = ""; // Clear error message after 5 seconds
                    }, 3000); 
                }
            } else {
                // Handle server errors
                console.error('Server error: ' + xhr.status);
            }
        }
    };

    xhr.open("POST", "register_form.php", true);
    xhr.send(formData);
}

/* ________________________________________________________________________________*/  