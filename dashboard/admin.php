<?php 
include_once "../include/db.php";
include_once "../include/session.php";
$userlogin = logindetails();
$type = $userlogin[2];
//to make sure the logged in user is admin
if($type != 1){
    header("location:../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    :root{
        scroll-behavior: smooth;
    }
    .admin_top_nav {
        background: linear-gradient(to right, #8e44ad, #3498db);
        /*animation: waveAnimation 5s infinite alternate ease-in-out;   */ }
    /* Set a specific width for a column */
    .table th, .table td {
    width: 100px;
    }

    /* Allow columns to shrink to fit content */
    .table th, .table td {
    min-width: 0;
    white-space: wrap;
    }
    

    
    
    
    
</style>
<title>Admin Page</title>
</head>
<body class="bg-dark text-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-sm navbar-dark admin_top_nav fixed-top" >
                    <a class="navbar-brand" href="#"><img  class="logo" src="../assets/images/logo/velvet-logo.png" alt=""></a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"></button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto my-auto mx-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#bookings">Bookings</a>
                                    <a class="dropdown-item" href="#users">Users</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../login.php"><i class="fas fa-door-open    "></i> Logout</a>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </div>
        <div class="row " style="margin-top: 70px;">
            <div class="col-sm-12">
                <h1 id="bookings" class="center">Clients Bookings Data</h1>
                <!-- switch b2n charts type -->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="graphchanger">
                    <label class="form-check-label" for="graphchanger">line</label>
                </div>
            </div>
            <div class="col-sm-4 bg-light"> <!--chart-->
                <canvas id="bookingChart"  height="300px"></canvas>

            </div>
            
            <div class="col-sm-8 " id="bookingTable">
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 id="users" class="center">Users</h1>
                <hr>
                <!-- switch b2n charts type -->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="userchanger">
                    <label class="form-check-label" for="userchanger">bar</label>
                </div>
                
            </div>
           
        </div>
        <div class="row">
        <div class="col-sm-4 bg-light text-light">
        <canvas id="userschart"  height="300px"></canvas>
        </div>
        <div class="col-sm-8 " id="usersTable">
            

        </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="../assets/js/style.js"></script>

<script>
    $(document).ready(function () {
        updatebookingtbl();
        updateuserstbl();
        //refresh the bookingtable
        function updateuserstbl(){
            $.ajax({
                method: "GET",
                url: "./adminhandler.php",
                data:{updateuserstbl:1},
                success: function (data) {
                    $("#usersTable").html(data);
                }
            });
            
        }
        function updatebookingtbl(){
            $.ajax({
                method: "GET",
                url: "./adminhandler.php",
                data:{updatebookingtbl:1},
                success: function (data) {
                    $("#bookingTable").html(data);
                }
            });
        }
        //buttons
        //users delete button
        $("body").on("click", ".btn-users", function() {
            var confirmation = confirm("Are you sure you want to delete this user?");  // The default button labels are "OK" and "Cancel"

            if (confirmation) {
                // User clicked "OK"
                var id = $(this).data("id");

                $.ajax({
                    url: "./adminhandler.php",
                    method: "get",
                    data: { id: id, usersdelete: 1 },
                    dataType: "json",
                    success: function(data) {
                        alert(data);
                        updateCharts();
                        updateuserstbl();
                    }
                });
            } else {
                // User clicked "Cancel" or closed the dialog
                return;
            }


        });
        //bookings btn
        $("body").on("click", ".btn-bookings", function() {
            var confirmation = confirm("Are you sure?");  // The default button labels are "OK" and "Cancel"

            if (confirmation) {
                // User clicked "OK"
                var id = $(this).data("id");

                $.ajax({
                    url: "./adminhandler.php",
                    method: "get",
                    data: { id: id, bookingsdelete: 1 },
                    dataType: "json",
                    success: function(data) {
                        alert(data);
                        updateCharts();
                        updatebookingtbl();
                    }
                });
            } else {
                // User clicked "Cancel" or closed the dialog
                return;
            }
        });

        // Bookings chart
        var ctx = $('#bookingChart')[0].getContext('2d');
        var bookingsChart = null;
        var toggle1type = "bar";
        var toggle2type = "pie";
        
        // Users chart
        var ctx_users = $('#userschart')[0].getContext('2d');
        var usersChart = null;
    
        $("#graphchanger").on("change", function(){
            if ($(this).is(':checked')) {
                toggle1type = 'line';
            } else {
                toggle1type = 'bar';
            }
            updateCharts();
        });
        $("#userchanger").on("change", function(){
            if ($(this).is(':checked')) {
                toggle2type = 'bar';
            } else {
                toggle2type = 'pie';
            }
            updateCharts();
        });
    
    
        function updateCharts() {
            // Bookings chart
            $.ajax({
                url: "./adminhandler.php",
                type: "GET",
                data: { bookings: 1 },
                dataType: "json",
                success: function (data) {
                    var tbdata = data;
    
                    // Separate arrays for datetime and count
                    var datetimeValues = [];
                    var countValues = [];
    
                    // Extract datetime and count values from tbdata
                    tbdata.forEach(function (item) {
                        // Format the date and push it to the array
                        var date = new Date(item.datetime);
                        var formattedDate = date.toString().split(' ').slice(0, 4).join(' '); // Extract day, month, dayOfMonth, and year
                        datetimeValues.push(formattedDate);
                        countValues.push(parseInt(item.count));
                    });

    
                    // Initial chart data
                    var initialData = {
                        labels: datetimeValues,
                        datasets: [{
                            label: 'Hotel Bookings based on Date',
                            data: countValues,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };
    
                    // If the chart instance exists, destroy it before creating a new one
                    if (bookingsChart) {
                        bookingsChart.destroy();
                    }
    
                    bookingsChart = new Chart(ctx, {
                        type: toggle1type,
                        data: initialData,
                        options: {
                            // Additional chart options
                        }
                    });
                }
            });
    
            // Users chart
            $.ajax({
                url: "./adminhandler.php",
                type: "GET",
                data: { users: 1 },
                dataType: "json",
                success: function (data) {
                    var tbdata1 = data;
    
                    // Separate arrays for datetime and count
                    var datetimeValues1 = [];
                    var countValues1 = [];
    
                    // Extract datetime and count values from tbdata
                    tbdata1.forEach(function (item) {
                        // Format the date and push it to the array
                        var date = new Date(item.datetime);
                        var formattedDate = date.toString().split(' ').slice(0, 4).join(' '); // Extract day, month, dayOfMonth, and year
                        datetimeValues1.push(formattedDate);
                        countValues1.push(parseInt(item.count));
                    });

    
                    // Initial chart data for Users chart
                    var initialData1 = {
                        labels: datetimeValues1,
                        datasets: [{
                            label: 'User registrations based on Date',
                            data: countValues1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };
    
                    // If the chart instance exists, destroy it before creating a new one
                    if (usersChart) {
                        usersChart.destroy();
                    }
    
                    usersChart = new Chart(ctx_users, {
                        type: toggle2type,
                        data: initialData1, // Use initialData1 for Users chart
                        options: {
                            // Additional chart options
                        }
                    });
                }
            });
        }
    
        // Initial chart rendering
        updateCharts();
    });
    

</script>
</body>
</html>