<?php
include 'header.php'; // Header includes session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="fonts-awesome/css/all.css">
    <link rel="stylesheet" href="styless/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styless/home.css">
    <style>
        .color-alter {
            color: #28a745;
            font-size: 25px;
        }
    </style>
</head>
<body>
    <!-- Header section -->
    <header>
        <div class="logosec">
            <a href="#" class="logo">
                <img src="images/note-image.png" alt="Logo">
                <div class="logo-name" style="color:white; font-size: 25px; font-weight:bold;">Easy<span class="color-alter">Note</span></div>
            </a>
        </div>
        <div class="menu-icon" onclick="toggleNav()">
            <i class="fas fa-bars"></i>
        </div>
        <input type="text" class="search-bar" id="searchBar" placeholder="Search...">
      
        <div class="user-profile">
            <a href="#" class="profile-link">
                <?php if (!empty($imagePath)): ?>
                    <div class="profile-icon">
                        <img src="<?php echo $imagePath; ?>" alt="Profile Picture">
                    </div>
                <?php else: ?>
                    <i class='bx bxs-user user-icon'></i>
                <?php endif; ?>
                Hi, <?php echo $userName1; ?> Welcome
            </a>
            <div class="profile-info">
                <div class="profile-menu">
                    <ul>
                        <li><a href="userpage.php">Profile Settings</a></li>
                        <li><a href="includes/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="main-container">
        <!-- Sidebar -->
        <div id="mySidebar" class="navcontainer">
            <nav class="nav">
                <div class="main-navigation-label">Main Navigation</div>
                <div class="break-line"></div>
                <div class="nav-upper-options">
                    <ul>
                        <li><a href="dashboardpage.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboardpage.php') ? 'class="active"' : ''; ?>><i class="fas fa-house"></i> <span>Dashboard</span></a></li>
                        <li><a href="notebook.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'notebook.php') ? 'class="active"' : ''; ?>><i class="fas fa-sticky-note"></i> <span>All Notes</span></a></li>
                        <li><a href="favorite.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'favorite.php') ? 'class="active"' : ''; ?>><i class="fas fa-heart"></i> <span>Favorites</span></a></li>
                        <li><a href="archivepage.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'archivepage.php') ? 'class="active"' : ''; ?>><i class="fas fa-archive"></i> <span>Archives</span></a></li>
                    </ul>
                </div>
                <div class="break-line"></div>
            </nav>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll('.nav-upper-options ul li a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
