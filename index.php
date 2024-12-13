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
<header>
    <div class="container-fluid" id="ind">
        <div class="row" style="margin-top:32px">
            <div class="col-sm-12">
                <div class="logo">
                <img src="assets/logo.jpeg" class="img-logo-index" alt="img">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" id="system">
                <h2>ATTENDANCE SYSTEM</h2>
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="links">
                    <ul class="head">
                        <li><a href="admin-login.php">ADMIN LOGIN</a></li>
                        <li><a href="employee-login.php">EMPLOYEE LOGIN</a></li>
                    </ul>
                    <div class="head-replace">
                        <span class="head2"><a href="admin-login.php">ADMIN LOGIN</a></span><br>
                        <span class="head2"><a href="employee-login.php">EMPLOYEE LOGIN</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php include('footer.php'); ?>
</body>
</html>