
<?php
include_once 'dashboard.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="fonts-awesome/css/all.css">0

    <style>
     #main {
    margin-top:70px; 
}

.main-feature-container{
  padding: 100px 0;
  margin: 0 auto;
  /* border: 2px solid  #4b8ef1; */
  /* margin-left:600px; */
  display:flex;
  align-items: center;
  justify-content: center;
}
.col-1{
  background-color:  none;
  display: flex;
  flex-wrap: wrap;
  float: left;
  flex-direction: column;
  justify-content: center;
  padding: 10px 0; 
  align-items: center;
  padding-top: 50px;
  margin-right: 100px;
}
.col-2 {
  background-color:  none;
  display: flex;
  flex-wrap: wrap;
  float: left;
  flex-direction: column;
  justify-content: center;
  padding: 10px 0; 
  align-items: center;
  margin-right: 100px;
}
.col-3 {
  background-color:  none;
  display: flex;
  flex-wrap: wrap;
  float:left;
  flex-direction: column;
  justify-content: center;
  padding: 10px 0; 
  align-items: center;
  padding-top: 50px;
  margin-right: 100px;
}

.feature-card {
    
  width: 250px;
  padding: 20px;
  margin: 20px;
  border: 1px solid #ccc;
  border-radius: 10px 50px 0 0;
  text-align: center;
  position: relative;
  box-shadow: 5px 5px 10px #bfbfbf;
  transition: all .3s;

  background-image: url(images/regular-table-bottom.png);
  background-position: right top;
  background-repeat: no-repeat;
  background-size: cover;
}

.feature-card h3 {
transition: all .3s;
font-size: 20px;
margin-bottom: 10px;
display: flex;
align-items: center; /* Align items vertically */
justify-content: center; /* Center items horizontally */
}

.feature-card:hover{
    background-color: #4b8ef1;
}
.feature-card p {
  transition: all .3s;
  font-size: 16px;
  color: #555;
}

.feature-card:hover h3,
.feature-card:hover p {
  color: #fff;
}

.feature-card:hover {
  background-image: url(images/service-bg.jpg);
  background-position: right top;
  background-repeat: no-repeat;
  background-size: cover;
}

.feature-heading {
  text-align: center;
  
}

.features-container .feature-heading .line-dec {
  margin: 0 auto;
}

.feature-alter {
  color: #4b8ef1;
}

.feature-card .icon {
  margin-right: 10px; /* Adjust margin as needed */
}

.icon-container img {
  width: 60px; /* Adjust the width as needed */
  height: auto; /* Maintain aspect ratio */
}


    </style>

</head>
<body>

<div id="main" class="main-feature-container" id="services">
          
            <div class="col-1">
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



            <div class="col-2">
                <div class="feature-card">
                <div class="icon-container">
                        <img src="images/add-task.png" alt="Notepad"> <!-- Image for notepad -->
                    </div>
                    <h3>Create Notes</h3>
                    <p>The Creating Notes feature streamlines the process of jotting down ideas, tasks, and reminders, fostering productivity and organization within the note system.</p>
                </div>
                <div class="feature-card" style="padding: 100px 0px;">
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
                    <p>The Archived feature provides users with a way to store and manage notes or items that are no longer actively used, ensuring a clutter-free and organized workspace within the note system.The Archived feature provides users with a way to store and manage notes or items that are no longer actively used, ensuring a clutter-free and organized workspace within the note system.</p>
                </div>
            </div>




            <div class="col-3">
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
    

</body>
</html>
