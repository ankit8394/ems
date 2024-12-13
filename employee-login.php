<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    <?php include('index.css'); ?>
</style>
<body>
<?php include('login-header.php'); ?>
<main>
<div class="container" id="main-login">

    <div class="row" id="box">
    <h1>Employee Login!</h1><br>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Welcome Back! Please Log In</h2>
                </div>
            </div>
            <div class="row">
                <form method="post">
                <div class="col-sm-12">
                    <label for="" class="lab">Username</label><br>
                    <input type="text" class="inp1" placeholder="Enter Your Username" name="v1"><br>
                    <label for="" class="lab">Password</label><br>
                    <input type="Password" class="inp1" placeholder="Enter Your Password" name="v2"><br>
                    <span class="forgot"><a href="">Forgott password?</a></span>
                    <div>
                        <button type="submit" name="sbt" class="btn1">Login</button>
                    </div>
                </div>
                </form>
                    <?php
                        include('data-con.php');
                        if(isset($_POST['sbt'])){
                            $v1=$_POST['v1'];
                            $v2=$_POST['v2'];
                            $query=mysqli_query($con,"select eid from employee where username='$v1' and password='$v2'");
                            $count=mysqli_num_rows($query);
                            $row=mysqli_fetch_assoc($query);
                            if($count===1){
                                setcookie("eid",$row['eid']);
                                header('location:employee-dashboard.php');
                            }
                            else{
                                echo '<span style="color:red;font-weight:500">Please Enter Correct Username Or Password</span>';
                            }
                        }


                    ?>

            </div>
        </div>
    </div>
</div>
</main>
<?php include('footer.php'); ?>
</body>
</html>