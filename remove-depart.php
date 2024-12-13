<?php
include('data-con.php');
$department_id=$_GET['department_id'];
mysqli_query($con,"delete from department where department_id='$department_id'");
header('location:department.php');
?>