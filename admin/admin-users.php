<?php

    require_once 'admin-header.php';

?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card my-2 border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="m-0">Total Registered Students</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="showAllUsers">
                      <p class="text-center align-self-center lead">Please Wait...</p>  
                    </div>
                </div>
            </div>
        </div>
    </div>
<!------------Footer Area-------------->
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#open-nav").click(function(){
                $(".admin-nav").toggleClass('animate');
            });
        });

        $(document).ready(function(){
            // Fetch All students Ajax Request
            fetchAllUsers();

            function fetchAllUsers(){
                $.ajax({
                    url: 'admin-action.php',
                    method: 'post',
                    data: { action: 'fetchAllUsers' },
                    success:function(response){
                        // console.log(response);
                        $("#showAllUsers").html(response);
                    }
                });
            }
        });
    </script>
</body>
</html>