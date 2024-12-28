<?php
ob_start();
include('data-con.php');

// Retrieve employee details from the database
$eid = $_COOKIE['eid'];   
$mquery = mysqli_query($con, "SELECT * FROM employee WHERE eid='$eid'");
$rowpk = mysqli_fetch_assoc($mquery);
$fnamek = $rowpk['full_name'];
$eid = $rowpk['eid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php include('index.css'); ?>
    </style>
</head>
<body>
    <?php include('employee-header.php'); ?>

    <div class="container-fluid" id="empl-dash">
        <div class="row">
            <?php include('employee-sidebar.php'); ?>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-1">
                        <div id="btn-mini-div">
                            <button id="btn-mini"><i class="fa-solid fa-bars"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-11">
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
                        // Handle photo submission
                        if (isset($_POST['sbt'])) {
                            $photo = $_POST['photo'];

                            if ($photo) {
                                // Save the photo
                                date_default_timezone_set("Asia/Kolkata");
                                $datetime = date('YmdHis');
                                $filePath = "attendance-picture/photo_" . $datetime . ".png";

                                // Ensure directory exists
                                if (!file_exists('attendance-picture')) {
                                    mkdir('attendance-picture', 0775, true);
                                }

                                // Decode and save the image
                                $imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $photo));
                                $fileSaved = file_put_contents($filePath, $imageData);

                                if ($fileSaved) {
                                    // Insert attendance into the database
                                    $query = "INSERT INTO employee_attendance (eid, photo, datetime) 
                                              VALUES ('$eid', '$filePath', NOW())";
                                    if (mysqli_query($con, $query)) {
                                        echo '<div style="text-align: center; font-size: 20px; font-weight: bold; color: green;">Attendance marked successfully!</div>';
                                    } else {
                                        echo '<div style="text-align: center; font-size: 20px; font-weight: bold; color: red;">Database error: ' . mysqli_error($con) . '</div>';
                                    }
                                } else {
                                    echo '<div style="text-align: center; font-size: 20px; font-weight: bold; color: red;">Failed to save photo!</div>';
                                }
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

                            startCameraButton.addEventListener('click', () => {
                                navigator.mediaDevices.getUserMedia({ video: true })
                                    .then(stream => {
                                        video.srcObject = stream;
                                        video.style.display = 'block';
                                        captureButton.style.display = 'inline-block';
                                        saveButton.style.display = 'inline-block';
                                        startCameraButton.style.display = 'none';
                                    })
                                    .catch(error => {
                                        console.error("Error accessing the camera: ", error);
                                        alert("Could not access the camera. Please ensure your camera is connected and permissions are granted.");
                                    });
                            });

                            captureButton.addEventListener('click', () => {
                                canvas.width = video.videoWidth;
                                canvas.height = video.videoHeight;
                                const context = canvas.getContext('2d');
                                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                                const imageDataURL = canvas.toDataURL('image/png');
                                photo.src = imageDataURL;
                                photo.style.display = 'block';
                                video.style.display = 'none';
                                photoInput.value = imageDataURL;
                            });
                        </script>
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
