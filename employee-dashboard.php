<?php
include('data-con.php');
$eid=$_COOKIE['eid'];   
$mquery=mysqli_query($con,"select * from employee where eid='$eid'");
$rowpk=mysqli_fetch_assoc($mquery);
$fnamek=$rowpk['full_name'];
$eid=$rowpk['eid'];
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
        <?php include('employee-header.php');?>

    <div class="container-fluid" id="empl-dash">
        <div class="row">
            <?php include('employee-sidebar.php');?>
            <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-1">
                    <div id="btn-mini-div">
                        <button id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-sm-11">
<div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12" style="text-align:center">
                    <h1>Mark Your Attendance</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="att-img">
                        <video id="video" autoplay style="display:none;"></video>
                        <canvas id="canvas" style="display:none;"></canvas>
                        <br>
                        <img id="photo" alt="Captured Photo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="text-align:center">
                    <div>
                        <button type="button" id="startCamera">Start Camera</button>
                        <button type="button" id="capture" style="display:none;">Take Photo</button>
                        <input type="hidden" name="photo" id="photoInput">
                        <button id="save" style="display:none;" class="btn btn-primary" type="submit" name="sbt">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        include('data-con.php');
        if (isset($_POST['sbt'])) {
            // Get the image data from the POST request
            $photo = $_POST['photo'];

            if ($photo) {
                // Remove the base64 header and save the file
                $imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $photo));

                // Create a unique filename
                date_default_timezone_set("Asia/kolkata");
                $datetime = date('dmyhis');
                $filePath = "attendance-picture/photo_" . $datetime . ".png";

                // Save the image to the directory
                file_put_contents($filePath, $imageData);

                // Insert the photo path into the database
                $eid = $rowpk['eid']; // Get the employee ID
                $query = "INSERT INTO employee_attendance (eid, photo, datetime) VALUES ('$eid', '$filePath', '$datetime')";
                mysqli_query($con, $query);
                 echo '<div style="text-align: center; font-size: 20px; font-weight: bold; color: green;">Attendance marked successfully!</div>';;
            }
        }
        ?>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const photo = document.getElementById('photo');
        const startCameraButton = document.getElementById('startCamera');
        const captureButton = document.getElementById('capture');
        const saveButton = document.getElementById('save');
        const photoInput = document.getElementById('photoInput');

        let imageDataURL = '';

        // Start camera when "Start Camera" button is clicked
        startCameraButton.addEventListener('click', () => {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    video.srcObject = stream;
                    video.style.display = 'block'; // Show the video element
                    captureButton.style.display = 'inline-block'; // Show the capture button
                    saveButton.style.display = 'inline-block'; // Show the save button
                    startCameraButton.style.display = 'none'; // Hide the start camera button
                })
                .catch(error => {
                    console.error("Error accessing the camera: ", error);
                    alert("Could not access the camera. Please ensure your camera is connected and permissions are granted.");
                });
        });

        // Capture photo when "Take Photo" button is clicked
        captureButton.addEventListener('click', () => {
            // Do not hide the video element after capturing photo
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Display the captured photo
            imageDataURL = canvas.toDataURL('image/png');
            photo.src = imageDataURL;
            photo.style.display = 'block'; // Show the captured image

            // Hide the video feed
            video.style.display = 'none';

            // Set the hidden input field with the captured image data
            photoInput.value = imageDataURL;
        });
    </script>    
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