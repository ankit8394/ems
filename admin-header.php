<?php
include('data-con.php');
$aid=$_COOKIE['aid'];   

$mquery=mysqli_query($con,"select * from admin where aid='$aid'");
$rowpk=mysqli_fetch_assoc($mquery);
$fnamek=$rowpk['full_name'];
$photo=$rowpk['photo'];
?>

<nav class="header">
        <div class="container-fluid">
            <div class="row" id="navrow">
                <div class="col-sm-9" id="nav1">
                    <ul>
                        <li><img src="assets/logo.jpeg" class="img-logo" alt="img"></li>
                        <li><a href="dashboard-admin.php">DASHBOARD</a></li>
                        <li><a href="department.php">DEPARTMENT</a></li>
                        <li><a href="all-employee-admin.php">EMPLOYEES</a></li>
                    </ul>
                </div>
                <div class="col-sm-3" id="navbox2">
                    <div ><p class="lastbox"><strong>Hi <?php echo $fnamek;?></strong></p>
                    </div>
                        <div class="for" ><img class="lastbox2" src="<?php echo $photo;?>" alt="img">
                       
                    </div>
                    <div>
                        <a href="admin-logout.php"><button id="log-out" class="btn btn-danger">logout</button></a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <nav class="admin-header2">
        <ul class="one">
            <li><img src="assets/logo.jpeg" class="img-logo" alt="img"></li>
            <li><button id="btn-header2"><i class="fa-solid fa-bars"></i></button>
                <ul class="two">
                    <li><a href="dashboard-admin.php">DASHBOARD</a></li>
                    <li><a href="department.php">DEPARTMENT</a></li>
                    <li><a href="all-employee-admin.php">EMPLOYEES</a></li>
                    <li><a href="admin-logout.php"><button id="log-out" class="btn btn-danger">logout</button></a></li>
                </ul>
            </li>
        </ul>
    </nav>