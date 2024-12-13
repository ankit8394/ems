<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        video, canvas {
            width: 60%;
            max-width: 400px;
            border: 2px solid #ddd;
            margin: 10px 0;
        }
        #capture, #save, #startCamera {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        #capture, #save, #startCamera:hover {
            background-color: #0056b3;
        }
        img {
            margin-top: 20px;
            display: none;
            border: 2px solid #ddd;
        }
    </style>

    <div class="container">
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
                echo "Attendance marked successfully!";
            }
        }
        ?>
    </div>

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