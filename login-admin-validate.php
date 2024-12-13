<?php

include('data-con.php');
$aid=$_COOKIE['aid'];
$query=mysqli_query($con, "select * from admin where aid='$aid'");
$count=mysqli_num_rows($query);
if($count==1){

}
else{
    header('location:admin-login.php');
}

?>