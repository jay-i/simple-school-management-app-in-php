<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('location: home.php');
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
    <title>School Management System | Login</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-danger p-3">Student Sign In</h3>
                <h5 class="text-danger text-center"></h5>
                <form action="" method="post" class="p-4" id="login-form">
                    <div id="loginAlert"></div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="E-Mail or Reg. Number" required value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required minlength="5" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rem" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>> Remember me</label>
                        </div>
                    </div>
                    <div class="form-group">
                         <div id="passError" class="text-danger font-weight-bold"></div>   
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign In" id="login-btn" class="btn btn-danger btn-block">
                    </div>
                    <a href="signup.php" class="text-center">Don't have account?</a>
                </form>
            </div>
        </div>
    </div>   

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        
        // Validate create account form
        $("#login-btn").click(function(e){
            if($("#login-form")[0].checkValidity()){
                e.preventDefault();

                $("#login-btn").val('Please Wait...');
                $.ajax({
                   url: 'action.php',
                   method: 'post',
                   data: $("#login-form").serialize()+'&action=login',
                   success:function(response){
                    //    console.log(response);
                       $("#login-btn").val('Sign In');
                       if(response === 'login'){
                           window.location = 'profile.php';
                       }
                       else {
                           $("#loginAlert").html(response);
                       }
                   } 
                });
            }
        });
    </script>
</body>
</html>