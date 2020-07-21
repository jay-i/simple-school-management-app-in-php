<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('location: admin-dashboard.php');
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
    <title>School Management System | Admin Login</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-danger p-3">Admin Panel Login</h3>
                <h5 class="text-danger text-center"></h5>
                <form action="" method="post" class="p-4" id="adminlogin-form">
                    <div id="adminLoginAlert"></div>
                    <div class="form-group">
                        <input type="text" name="username" id="uname" class="form-control" placeholder="Usernanme" required value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required minlength="5" value="">
                    </div>
                    <div class="form-group">
                         <div id="passError" class="text-danger font-weight-bold"></div>   
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" id="adminlogin-btn" class="btn btn-danger btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>   

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        
        // Validate form
        $(document).ready(function(){
            $("#adminlogin-btn").click(function(e){
                if($("#adminlogin-form")[0].checkValidity()){
                    e.preventDefault();
                    // change login button to text when click
                    $(this).val('Please Wait...');
                    $.ajax({
                        url: 'admin-action.php',
                        method: 'post',
                        data: $("#adminlogin-form").serialize()+'&action=adminLogin',
                        success:function(response){
                            // console.log(response);
                            if(response === 'admin_login'){
                                window.location = 'admin-dashboard.php';
                            }
                            else {
                                $("#adminLoginAlert").html(response);
                            }
                            $("#adminlogin-btn").val('login');
                        }

                    });
                }
            });
        });
    </script>
</body>
</html>