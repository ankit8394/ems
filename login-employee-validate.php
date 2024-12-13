<?php
include('data-con.php');
$eid=$_COOKIE['eid'];
$query=mysqli_query($con, "select * from employee where eid='$eid'");
$count=mysqli_num_rows($query);
if($count==1){

}
else{
    header('location:employee-login.php');
}
?>