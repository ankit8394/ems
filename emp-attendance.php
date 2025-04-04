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
    <?php include('admin-header.php'); ?>
    <div class="container-fluid" id="all-empl">
        <div class="row">
            <?php include('admin-sidebar.php'); ?>
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
                                <div class="col-sm-12">
                                    <div class="end"><p>EMPLOYEES ATTENDANCE</p></div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Form -->
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 20px;">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="date" name="start_date" class="form-control" placeholder="Start Date" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" name="end_date" class="form-control" placeholder="End Date" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" name="filter" class="btn btn-primary">Search Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Attendance Table -->
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped">
                                    <thead style="text-align:center">
                                        <tr>
                                            <th>SERIAL-NUMBER</th>
                                            <th>EMPLOYEE-ID</th>
                                            <th>NAME</th>
                                            <th>EMP PHOTO</th>
                                            <th>ATTENDANCE PHOTO</th>
                                            <th>Date and Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('data-con.php');
                                        $cnt = 1;
                                        
                                        // Default query
                                        $queryStr = "
                                            SELECT ea.eid, ea.datetime, e.full_name, e.photo, ea.att_photo 
                                            FROM employee_attendance ea
                                            JOIN employee e ON ea.eid = e.eid
                                        ";
                                        
                                        // Check if filtering is applied
                                        if (isset($_POST['filter']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
                                            $start_date = $_POST['start_date'];
                                            $end_date = $_POST['end_date'];
                                        
                                            // Using prepared statements to prevent SQL injection
                                            $queryStr .= " WHERE DATE(ea.datetime) BETWEEN ? AND ?";
                                            $stmt = mysqli_prepare($con, $queryStr);
                                            mysqli_stmt_bind_param($stmt, "ss", $start_date, $end_date);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                        } else {
                                            $result = mysqli_query($con, $queryStr);
                                        }
                                        
                                        // Display filtered data
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr style="text-align:center">
                                                <td><?php echo $cnt++; ?></td>
                                                <td><?php echo htmlspecialchars($row['eid']); ?></td>
                                                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                                <td>
                                                    <img class="pro" src="<?php echo htmlspecialchars($row['photo']); ?>" alt="No Photo" style="width:50px; height:50px; border-radius:50%;">
                                                </td>
                                                <td>
                                                    <img class="pro" src="<?php echo htmlspecialchars($row['att_photo']); ?>" alt="No Attendance Photo" style="width:50px; height:50px; border-radius:50%;">
                                                </td>
                                                <td><?php echo htmlspecialchars($row['datetime']); ?></td>
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

    <?php include('footer.php'); ?>
    <script>
        $(document).ready(function() {
            $("#btn-header2").click(function() {
                $(".two").slideToggle("slow");
            });
            $("#btn-mini").click(function() {
                $("#hide").fadeIn(1000);
                $("#btn-mini-div").fadeOut();
                $("#extra").css("padding-left", "150px");
                $("#extra").css("transition", ".75s");
            });
            $("#btn-big").click(function() {
                $("#hide").fadeOut(1000);
                $("#btn-mini-div").fadeIn();
                $("#extra").css("padding-left", "10px");
                $("#extra").css("transition", ".75s");
            });
        });
    </script>
</body>
</html>
