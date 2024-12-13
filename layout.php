<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    <?php include('index.css'); ?>
</style>
<body>
    <nav class="header">
        <div class="container-fluid">
            <div class="row" id="navrow">
                <div class="col-sm-10" id="nav1">
                    <ul>
                        <li><img src="assets/logo.jpeg" class="img-logo" alt="img"></li>
                        <li><a href="dashboard-admin.php">DASHBOARD</a></li>
                        <li><a href="department.php">DEPARTMENT</a></li>
                        <li><a href="employee-admin.php">EMPLOYEE</a></li>
                    </ul>
                </div>
                <div class="col-sm-2" id="navbox2">
                    <div ><p class="lastbox"><strong>Hi admin </strong></p>
                    </div>
                        <div class="for" ><img class="lastbox2" src="" alt="img">
                        <ul class="blo">
                        <li><a href="">setting</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" id="main-dep">
        <div class="row">
            <div class="col-sm-2" id="hide">
                <aside id="sidebar">
                    
                         <div  class="side-div">
                            <ul class="ul-4">
                                <button id="btn-big" onclick="toggle()" class="btn-side"><i class="fa-solid fa-x"></i></button>
                                <li><a href="dashboard-admin.php">DASHBOARD</a></li>
                        <li><a href="department.php">DEPARTMENT</a></li>
                        <li><a href="employee-admin.php">EMPLOYEE</a></li>
                        
                            </ul>
                         </div>
                </aside>
            </div>
            <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-1">
                    <div id="btn-mini-div">
                        <button onclick="back()" id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-sm-11">
                <div class="container-fluid" id="main">
                    
                    
                </div>
</div>
            </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script>
$(document).ready(function(){
    $("#btn-mini").click(function()
    {
        $("#hide").fadeIn(1000);
        $("#btn-mini-div").fadeOut();
        $("#main").css("padding-left","150px");
        $("#main").css("transition",".75s");
  });
    });
    
$(document).ready(function(){
    $("#btn-big").click(function(){
        $("#hide").fadeOut(1000);
        $("#btn-mini-div").fadeIn();
        $("#main").css("padding-left","0px");
        $("#main").css("transition",".75s");
    });
 
});
</script>


    </body>
</html>