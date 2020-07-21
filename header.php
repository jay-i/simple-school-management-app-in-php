<?php  
    require_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>
        <?=  ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?> | SMS
    </title>
</head>
<body>
<div class="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar">
                   <span class="navbar-toggler-icon"></span> 
                </button>
                <a href="#" class="navbar-brand"><h3>SMS</h3></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class=nav-item><a href="profile.php" class="nav-link">Profile</a></li>
                        <li class=nav-item><a href="enroll.php" class="nav-link">Register Course</a></li>
                        <li class=nav-item><a href="enroll-history.php" class="nav-link">Enrollment History</a></li>
                        <li class=nav-item><a href="logout.php" class="nav-link">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>