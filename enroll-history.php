<?php

require_once 'session.php';
include 'header.php';

?>
<br>
<br>
<br>
<div class="container">
    <div class="row">       
        <div class="col-lg-12">
            <div class="card my-2 border-info">
                <div class="card-header bg-info text-white">
                    <h4 class="m-0">Enrollment History</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="showAllUsers">
                      <p class="text-center align-self-center lead">Please Wait...</p>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

        $(document).ready(function(){
            // Fetch All students Ajax Request
            fetchAllUsers();

            function fetchAllUsers(){
                $.ajax({
                    url: 'action.php',
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