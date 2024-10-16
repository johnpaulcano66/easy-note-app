<?php
include 'includes/db_conn.php';
// include 'includes/login.php';

session_start(); // Start the session
$error = array(); // Initialize error array

if (isset($_POST['submit'])) {


    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE name = '$name' AND password ='$pass'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (!empty($row['name'])) { 
            $_SESSION['user_name'] = $row['name'];
            header('location: dashboardpage.php');
            exit();
        }
    } else {
        $error[] = 'Incorrect username or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyNote</title>
    <link rel="stylesheet" href="styless/landing.css">
    <link rel="stylesheet" href="fonts-awesome/css/all.css">
    <style>
        /* Style for success message */
.success-msg {
    color: #4CAF50; /* Green color */
    font-size: 16px;
    margin-top: 10px; /* Add some space between message and form elements */
}

/* Style for error message */
.error-msg {
    color: #F44336; /* Red color */
    font-size: 16px;
    margin-top: 10px; /* Add some space between message and form elements */
}

/* Style for form container */
.form-container {
    max-width: 400px; /* Adjust as needed */
    margin: 0 auto; /* Center the form horizontally */
    padding: 20px;
}

/* Style for close button (optional) */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>

</head>
<body>
<!-- /* ________________________________________________________________________________*/   -->


<div class="nav-container">
        <nav class="navbar">     
            <div class="left-section">
                <div class="logo-name">Easy<span class="color-alter">Note</span></div>
                <ul class="left-menu">
                <li><a href="#home" class="home-btn active">Home</a></li>
                <li><a href="#services" class="services-btn active">Services</a></li>
                <li><a href="#contact" class="contact-btn active">Contact</a></li>
                </ul>
            </div>
            <div class="right-section">
                <ul class="right-menu">
                    <li>
                        <input type="checkbox" id="switch-button">
                        <label for="switch-button">
                            <i class="fas fa-sun"></i>
                            <i class="fas fa-moon"></i>
                        </label>
                    </li>
                    <li><button class="signin-btn" onclick="openModal()"><span>Log in</span></button></li>
                    <li><button class="register-btn" onclick="openRegisterModal()"><span>Sign up</span></button></li>

                </ul>
            </div>
        </nav>
</div> 

 <!-- /* ________________________________________________________________________________*/   -->
 
<!-- The Modal -->
<div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="form-container">    
            <form id="loginForm">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3>LOGIN NOW</h3>
                <div id="loginErrorContainer"></div>
                <div id="loginSuccessContainer"></div>
                <input type="text" name="name" id="username" required placeholder="Enter your username"> 
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                <input type="button" onclick="submitLogin()" value="Login Now" class="form-btn">
                <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
            </form>
        </div>
</div>
 <!-- /* ________________________________________________________________________________*/   -->
  <!-- The Modal -->
<div id="registerModal"  class="modal">
    <!-- Modal content -->
    <div class="form-container">    
        <!-- Your form content goes here -->
        <form action="" method="post" id="registerForm">
        <span class="close" onclick="closeRegisterModal()">&times;</span>
            <h3>SIGN UP NOW</h3>
            <div id="errorContainer"></div>
            <div id="successContainer"></div>
        
            <input type="text" name="name" required placeholder="enter your username">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
        

            <input type="button" onclick="submitForm()" value="Register Now" class="form-btn">       
            <p>already have an account? <a href="login.php">Login now</a></p>
        </form>
        </div>
</div>
 <!-- /* ________________________________________________________________________________*/   -->


<div class="main-container" id="home">
     
            <div class="container">
                
                    <div class="main-container-left">
                        <div class="card">
                            <h2 id="typewriter">CANO's product that can Unlock Your Creativity <br> With <span id="easyNote"></span> Today!</h2>
                            <p>
                            EasyNote revolutionizes the way you capture and manage your thoughts. EasyNote empowers you to effortlessly jot down ideas, organize your notes, and unleash your creativity without any hassle. Whether you're a writer, student, or professional, our user-friendly platform provides a seamless experience, allowing you to focus on what truly matters-bringing your ideas to life. 
                            </p>
                            <div class="button-group">
                            <button type="button" class="button-signin">Demo</button>
                            </div>
                        </div>
                    </div>
                
                <div class="main-container-right">
                    <img src="images/note-image.png" alt="main image">
                
                </div>
            </div>
</div>
<!-- /* ________________________________________________________________________________*/   -->
<div class="main-feature-container" id="services">
            <div  class="feature-heading">
                <h1>Amazing <span class="feature-alter"> Features </span>For You</h1>
                <img src="images/heading-line-dec.png" alt="">
            </div> 
            <div class="features-container">
                <div class="feature-card">
                <div class="icon-container">
                        <img src="images/add-task.png" alt="Notepad"> <!-- Image for notepad -->
                    </div>
                    <h3>Create Notes</h3>
                    <p>The Creating Notes feature streamlines the process of jotting down ideas, tasks, and reminders, fostering productivity and organization within the note system.</p>
                </div>
                <div class="feature-card">
                <div class="icon-container">
                        <img src="images/favorite.png" alt="Notepad"> <!-- Image for notepad -->
                    </div>
                    <h3>Favorites</h3>
                    <p>The Favorite feature allows users to mark and access important notes or items with ease, facilitating quick retrieval and prioritization within the note system.</p>
                </div>
                <div class="feature-card">
                <div class="icon-container">
                        <img src="images/rejected.png" alt="Notepad"> <!-- Image for notepad -->
                    </div>
                    <h3>Archived</h3>
                    <p>The Archived feature provides users with a way to store and manage notes or items that are no longer actively used, ensuring a clutter-free and organized workspace within the note system.</p>
                </div>
            </div>
</div>
  <!-- /* ________________________________________________________________________________*/   -->
  
<footer id="contact">
        <!-- Social media icons with default (white) icons -->
        <div class="social-media-icons">
            <a href="https://www.facebook.com/" class="facebook"><img src="images/facebook-color.png" alt="Facebook"></a>
            <a href="https://www.instagram.com/" class="snapchat"><img src="images/snapchat-color.png" alt="Snapchat"></a>
            <a href="https://www.snapchat.com/" class="instagram"><img src="images/instagram-color.png" alt="Instagram"></a>
            <a href="https://www.whatsapp.com/" class="whatsapp"><img src="images/whatsapp-color.png" alt="Whatsapp"></a>
            
        </div>
        
        <!-- Copyright notice and names -->
        <p>&copy; 2024 SCC iTech | Edwin & Peter</p>
</footer>
    
<!-- /* ________________________________________________________________________________*/   -->

    <script src="js/landing.js"> </script>
    <script src="js/sweetalert.js"></script>
    <script>window.history.forward();</script>
</body>
</html>
