<?php
ob_start()
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
    <div class="container-fluid" id="add-imp">
        <div class="row">
           <?php include('admin-sidebar.php');?>
            <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-1">
                    <div id="btn-mini-div">
                        <button id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-sm-11">
                <div class="container-fluid" id="extra">



                <div class="row">
                    
    <div class="container">
   <form method="post" enctype="multipart/form-data">
   <div class="row" >
        <div class="col-sm-6" >
            <div>
                <label class="lable-all" for="name">Full Name</label><br>
                <input class="inp-all" type="text" placeholder="Enter Your First Name" name="v1">
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">Email ID</label><br>
                <input class="inp-all" type="email" placeholder="Enter Your Email ID" class="inp" name="v2">
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
           <label for="" class="lable-all">Username</label><br>
           <input type="text" class="inp-all" placeholder="Enter Your Username Here" name="v3">
        </div>
        <div class="col-sm-6">
            <div>
                <label for="browser" class="lable-all">Department</label><br>
                <select id="cars" class="inp-all" name="v4">
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Sales">Sales</option>
                    <option value="Finance">Finance</option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">Mobile Number</label><br>
                <input class="inp-all" type="tel" placeholder="Enter Your Mobile Number" name="v5">
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="">Address</label><br>
                <input class="inp-all" type="text" placeholder="Enter your address" name="v6">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">DOB</label><br>
                <input class="inp-all" type="date" placeholder="Enter Date of joining" name="v7">
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">Date of joining</label><br>
                <input class="inp-all" type="date" placeholder="Enter Date of joining" name="v8">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">Photo</label><br>
                <input class="upl" type="file" placeholder="Select your photo"  name="fileToUpload" id="fileToUpload">
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <label class="lable-all" for="name">Password</label><br>
                <input class="inp-all" type="password" placeholder="Enter Password" name="v10">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align:center;padding-top:20px">
            <div>
                <button type="submit" style="width:50%" name="sbt" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>








    <?php
include('data-con.php');
if(isset($_POST['sbt']))
{
  $fname=$_POST['v1'];
  $email=$_POST['v2'];
  $username=$_POST['v3'];
  $department=$_POST['v4'];
  $number=$_POST['v5'];
  $address=$_POST['v6'];
  $dob=$_POST['v7'];
  $doj=$_POST['v8'];
  $password=$_POST['v10'];

  $target_dir = "profile/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
    mysqli_query($con, "insert into employee(full_name,email,department,username,number,address,dob,date_of_joining,photo,password)values('$fname','$email','$department','$username','$number','$address','$dob','$doj','$target_file','$password')");

    header('location:all-employee-admin.php');
  }
}

?>


   </form>





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