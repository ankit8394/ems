
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
    <div class="container-fluid" id="main-dep">
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
                      <div class="col-sm-6">
                        <div class="end"><p>DEPARTMENT</p></div>
                      </div>
                      <div class="col-sm-6">
                        <div class="end">
                          <a href="add-department.php"><button>ADD DEPARTMENT</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                      <div>
                        <table class="table table-striped">
                          <thead COLSPAN="3" style="text-align:center">
                            <th>SR NO.</th>
                            <th>DEPARTMENT ID</th>
                            <th>DEPARTMENT NAME</th>
                            <th>ACTION</th>
                          </thead>
                          <tbody style="text-align:center">
                            <?php
                            include('data-con.php');
                            $cnt = 1;
                            $query=mysqli_query($con,"select * from department");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                            <tr>
                            <td><?php echo $cnt; $cnt++;?></td>
                              <td><?php echo $row['department_id'];?></td>
                              <td><?php echo $row['department_name'];?></td>
                              <td><a href="edit-department.php?department_id=<?php echo $row['department_id'];?>"><button class="btn btn-success">Edit</button></a>
                              <a href="remove-depart.php?department_id=<?php echo $row['department_id'];?>"><button class="btn btn-danger">Remove</button></a></td>
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