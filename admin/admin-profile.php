<?php

    require_once 'admin-header.php';

?>

    <div class="row">
  <h1><?= basename($_SERVER['PHP_SELF']) ?></h1>
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
    </script>
</body>
</html>