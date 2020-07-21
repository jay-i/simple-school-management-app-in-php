<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <?php
        $title = basename($_SERVER['PHP_SELF'], '.php');
        $title = explode('-', $title);
        $title = ucfirst($title[1]);
    ?>
    <title><?= $title; ?> | Admin Panel</title>

    <style>
        .admin-nav{
            width: 220px;
            min-height: 100vh;
            overflow: hidden;
            background-color: #343a40;
            transition: 0.3s all ease-in-out;
        }
        .admin-link{
            background-color: #343a40;
        }
        .admin-link:hover, .nav-active{
            background-color: #212529;
            text-decoration: none;
        }
        .animate{
            width: 0;
            transition: 0.3s all ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="admin-nav p-0">
                <h4 class="text-light text-center p-2">Admin Panel</h4>

                <div class="list-group list-group-flush">
                    <a href="admin-dashboard.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php') ?"nav-active":""; ?>"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>
                    <a href="admin-users.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php') ?"nav-active":""; ?>"><i class="fas fa-user"></i>&nbsp;&nbsp;Students</a>
                    <a href="admin-courses.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-courses.php') ?"nav-active":""; ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Course</a>
                    <a href="admin-department.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-department.php') ?"nav-active":""; ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Department</a>
                    <a href="admin-level.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-level.php') ?"nav-active":""; ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Level</a>
                    <a href="admin-semester.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-semester.php') ?"nav-active":""; ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Semester</a>
                    <a href="admin-session.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-session.php') ?"nav-active":""; ?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Session</a>
                </div>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col-lg-12 bg-primary pt-2 justify-content-between d-flex">
                        <a href="" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>

                        <h4 class="text-light"><?= $title; ?></h4>

                        <a href="logout.php" class="text-light mt-1"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </div>
                </div>