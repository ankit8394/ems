<?php
include('data-con.php');
$aquery=mysqli_query($con, "select * from employee");
$count=mysqli_num_rows($aquery);
$akquery=mysqli_query($con, "select * from department");
$countd=mysqli_num_rows($akquery)

?>


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
    <?php include('admin-header.php');?>
    <div class="container-fluid" id="main">
        <div class="row">
            <?php include('admin-sidebar.php');?>
            <div class="col-sm-12">
            <div class="row" id="none">
                <div class="col-sm-1">
                    <div id="btn-mini-div">
                        <button  id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-sm-11">
                <div class="container-fluid" id="extra">
                    

<div id="ssbig">
            <div class="row" id="d1col">     
                <div class="col-sm-10" >
                <i class="fa-solid fa-house"  style="font-size:14pt;margin:10px"></i><a href="dashboard-admin.php" class="admi"><span id="ds1">Dashboard</span></a>
                </div>
                <div class="col-sm-2" id="d2">
                <i class="fa-solid fa-house" style="font-size:12pt;padding:5px"></i><span style="padding:4px">/</span><a href="dashboard-admin.php" class="admi">Dashboard</a>
                </div>
            </div>
            <div class="row" id="row123">
                <div class="col-sm-12">
                    <div class="row" >
                        <div class="col-sm-6">
                            <div class="back">
                                <i  id="sp1" class="fa-solid fa-users"></i><span class="same"><a class="admi" href="#">Registered Employees</a></span><span class="upd"><?php echo $count; ?></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="back">
                        <i id="sp1" style="background-color:#FFC107" class="fa-solid fa-file"></i><span class="same"><a class="admi" href="#">Listed Department</a></span><span class="upd"><?php echo $countd; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <hr>
            <div class="row">
               
                <div class="col-sm-12" id="att">
                    Attandence Details
                </div>
            </div>
            <hr>
            <div class="row">
                        <div class="col-sm-6">
                             <div class="back">
                                <i  id="sp1" style="background:#17A2B8" class="fa-solid fa-user"></i><span class="same"><a class="admi" href="#">Employee Checkin Today</a></span><span class="upd">0</span>
                            </div>                        </div>
                        <div class="col-sm-6">
                             <div class="back">
                                <i  id="sp1" style="background:#F05D06" class="fa-regular fa-calendar-days"></i><span class="same"><a class="admi" href="#">Employee Checkin Yesterday</a></span><span class="upd">0</span>
                            </div>
                        </div>
                    </div>
                    </div>
</div>
        </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
                        <div class="col-sm-12">
                            <div class="dash-small">
                                <div class="back">
                                    <i  id="sp1" class="fa-solid fa-users"></i><span class="same"><a class="admi" href="#">Registered Employees</a></span><span class="upd">0</span>
                                </div>
                                <div class="back">
                                    <i id="sp1" style="background-color:#FFC107" class="fa-solid fa-file"></i><span class="same"><a class="admi" href="#">Listed Department</a></span><span class="upd">0</span>
                                </div>
                                <hr>
                                <div class="col-sm-12" id="att">
                                     Attandence Details
                                </div>
                                <hr>
                                <div class="back">
                                    <i  id="sp1" style="background:#17A2B8" class="fa-solid fa-user"></i><span class="same"><a class="admi" href="#">Employee Checkin Today</a></span><span class="upd">0</span>
                                </div>
                                <div class="back">
                                    <i  id="sp1" style="background:#F05D06" class="fa-regular fa-calendar-days"></i><span class="same"><a class="admi" href="#">Employee Checkin Yesterday</a></span><span class="upd">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php include('footer.php'); ?>
<script>
$(document).ready(function(){
    $("#btn-header2").click(function()
    {
        $(".two").slideToggle("slow"); 
        
  });
    $("#btn-mini").click(function()
    {
        $("#hide").fadeIn(1000);
        $("#btn-mini-div").fadeOut();
        $("#extra").css("padding-left","150px");
        $("#extra").css("transition",".75s");
  });
    });
    
$(document).ready(function(){
    $("#btn-big").click(function(){
        $("#hide").fadeOut(1000);
        $("#btn-mini-div").fadeIn();
        $("#extra").css("padding-left","10px");
        $("#extra").css("transition",".75s");
    });
 
});
</script>

    </body>
</html>