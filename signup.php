<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>School Management System | Sign Up</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-danger p-3">Student Sign Up</h3>
                <h5 class="text-danger text-center"></h5>
                <form action="" method="post" class="p-4" id="register-form">
                    <div id="regAlert"></div>
                    <div class="form-group">
                        <input type="text" name="surname" id="sname" class="form-control" placeholder="Surname" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="remail" class="form-control" placeholder="E-Mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="rpass" class="form-control" placeholder="Password" required minlength="5">
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" id="cpass" class="form-control" placeholder="Confirm Password" required minlength="5">
                    </div>
                    <div class="form-group">
                         <div id="passError" class="text-danger font-weight-bold"></div>   
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" id="register-btn" class="btn btn-danger btn-block">
                    </div>
                    <a href="index.php">Already have account?</a>
                </form>
            </div>
        </div>
    </div>   

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        
        // Validate create account form
        $("#register-btn").click(function(e){
            if($("#register-form")[0].checkValidity()){
                e.preventDefault(); // prevent refresh
                $("#register-btn").val('Please Wait...');
                if($("#rpass").val() != $("#cpass").val()){
                  //console.log("Not matched");
                  $("#passError").text('* Password did not matched!');  
                  $("#register-btn").val('Sign Up');
                }
                else{
                    $("#passError").text('');  
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $("#register-form").serialize()+'&action=register',
                        success:function(response){
                            $("#register-btn").val('Sign Up');
                            //console.log(response);
                            if(response == 'register'){
                                window.location = 'profile.php';
                            }
                            else{
                                $("#regAlert").html(response);
                            }
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>