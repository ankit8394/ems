<?php
include('data-con.php');
$aquery=mysqli_query($con, "select * from employee");
$count=mysqli_num_rows($aquery);//this is how many emp are registered//
$akquery=mysqli_query($con, "select * from department");
$countd=mysqli_num_rows($akquery)//this is how many dep are registered//
?>



<?php
include('data-con.php');

// Get today's date and yesterday's date
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));

// Query to count today's check-ins
$query_today = "SELECT COUNT(*) as checkin_today FROM employee_attendance WHERE DATE(datetime) = '$today'";
$result_today = mysqli_query($con, $query_today);
$row_today = mysqli_fetch_assoc($result_today);
$checkin_today = $row_today['checkin_today'];

// Query to count yesterday's check-ins
$query_yesterday = "SELECT COUNT(*) as checkin_yesterday FROM employee_attendance WHERE DATE(datetime) = '$yesterday'";
$result_yesterday = mysqli_query($con, $query_yesterday);
$row_yesterday = mysqli_fetch_assoc($result_yesterday);
$checkin_yesterday = $row_yesterday['checkin_yesterday'];
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
                <div class="col-sm-12" >
                <i class="fa-solid fa-house"  style="font-size:14pt;margin:10px"></i><a href="dashboard-admin.php" class="admi"><span id="ds1">Dashboard</span></a>
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
                                <i  id="sp1" style="background:#17A2B8" class="fa-solid fa-user"></i><span class="same"><a class="admi" href="#">Employee Checkin Today</a></span><span class="upd"><?php echo $checkin_today; ?></span>
                            </div>                        </div>
                        <div class="col-sm-6">
                             <div class="back">
                                <i  id="sp1" style="background:#F05D06" class="fa-regular fa-calendar-days"></i><span class="same"><a class="admi" href="#">Employee Checkin Yesterday</a><span class="upd"><?php echo $checkin_yesterday; ?></span>
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
                                    <i  id="sp1" class="fa-solid fa-users"></i><span class="same"><a class="admi" href="#">Registered Employees</a></span><span class="upd"><?php echo $count; ?></span>
                                </div>
                                <div class="back">
                                <i id="sp1" style="background-color:#FFC107" class="fa-solid fa-file"></i><span class="same"><a class="admi" href="#">Listed Department</a></span><span class="upd"><?php echo $countd; ?></span>
                                </div>
                                <hr>
                                <div id="att">
                                     Attandence Details
                                </div>
                                <hr>
                                <div class="back">
                                <i  id="sp1" style="background:#17A2B8" class="fa-solid fa-user"></i><span class="same"><a class="admi" href="#">Employee Checkin Today</a></span><span class="upd"><?php echo $checkin_today; ?></span>
                                </div>
                                <div class="back">
                                <i  id="sp1" style="background:#F05D06" class="fa-regular fa-calendar-days"></i><span class="same"><a class="admi" href="#">Employee Checkin Yesterday</a></span><span class="upd"><?php echo $checkin_yesterday; ?></span>
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