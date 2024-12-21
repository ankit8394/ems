<?php
include('data-con.php');
$eid=$_COOKIE['eid'];   
$mquery=mysqli_query($con,"select * from employee where eid='$eid'");
$rowpk=mysqli_fetch_assoc($mquery);
$fnamek=$rowpk['full_name'];
$photo=$rowpk['photo'];
?>


<div class="container-fluid">
            <div class="row" id="navrow">
                <div class="col-sm-9" id="nav1">
                    <ul>
                        <li><img src="assets/logo.jpeg" class="img-logo" alt="img"></li>
                        <li><a href="employee-dashboard.php">DASHBOARD</a></li>
                        <li><a href="employee-profile.php">PROFILE</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                    </ul>
                </div>
                <div class="col-sm-3" id="navbox2" >
                    <div ><p class="lastbox"><strong>Hi! <?php echo $fnamek;?></strong></p>
                    </div >
                        <div class="for"><img class="lastbox2" src="<?php echo $photo;?>" alt="img">
                    </div>
                    <div>
                        <a href="employee-logout.php"><button id="log-out" class="btn btn-danger">logout</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header2-employee">
            <nav>
                <ul class="one">
                <li><img src="assets/logo.jpeg" class="img-logo" alt="img"></li>
                    <li><button id="btn-header2"><i class="fa-solid fa-bars"></i></button>
                    <ul class="two">
                    <li><a href="employee-dashboard.php">DASHBOARD</a></li>
                    <li><a href="employee-profile.php">PROFILE</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="employee-logout.php"><button id="log-out" class="btn btn-danger">logout</button></a></li>
                    </ul>
                    </li>
                </ul>
            </nav>
        </div>