<?php
include('data-con.php');
$eid=$_COOKIE['eid'];   
$mquery=mysqli_query($con,"select * from employee where eid='$eid'");
$rowpk=mysqli_fetch_assoc($mquery);
$fnamek=$rowpk['full_name'];
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
    <div class="container-fluid" id="all-empl">
        <div class="row">
           <?php include('admin-sidebar.php');?>
            <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-1" id="none2">
                    <div id="btn-mini-div">
                        <button id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-sm-11">
                <div class="container-fluid" id="extra">
            <div class="row">
                <div class="col-sm-12">
                    <div class="end"><p>EMPLOYEES ATTENDANCE</p></div>
                </div>
        </div>
        </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead COLSPAN="6" style="text-align:center">
                    <th>SERIAL-NUMBER</th>
                    <th>EMPLOYEE-ID</th>
                    <th>NAME</th>
                    <th>PHOTO</th>
                    <th>Date and Time</th>
                </thead>
               
                <tbody>
                <?php
                include('data-con.php');
                $cnt = 1;
                $query=mysqli_query($con,"select * from employee_attendance");
                while($row=mysqli_fetch_array($query)){
                ?>
                    <tr  style="text-align:center">
                    <td><?php echo $cnt; $cnt++;?></td>
                    <td><?php echo $row['eid']; ?></td>
                    <td><?php echo $fnamek; ?></td>
                    <td><img class="pro" src="<?php echo $row['photo']; ?>" alt=""></td>
                    <td><?php echo $row['datetime'];?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
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