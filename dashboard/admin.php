<?php 
include_once "../include/db.php";
include_once "../include/session.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
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
    white-space: nowrap;
}

    
    
    
    
</style>
<title>Admin Page</title>
</head>
<body class="bg-dark text-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-sm navbar-dark admin_top_nav" >
                    <a class="navbar-brand" href="#"><img  class="logo" src="../assets/images/logo/velvet-logo.png" alt=""></a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"></button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row my-1">
            <div class="col-sm-12">
                <h1 class="center">Clients Bookings Data</h1>
            </div>
            <div class="col-sm-6 bg-light"> <!--chart-->
                <canvas id="bookingChart"  height="300px"></canvas>

            </div>
            
            <div class="col-sm-6">
                <table class="text-dark bg-light table-striped table-hover table-responsive">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>From</th>
                        <th>To</th>
                        <th><abbr title="Number Of People">NOP</abbr></th>
                        <th>DateTime</th>
                        <th>Delete</th>
                    </tr>
                    
                        <?php 
                        $query = "SELECT * FROM booking";
                        $result = $conn->query($query);
                        if (!$result) {
                            echo "Error executing the query: ". $conn->error;
                            exit();
                        }
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $user_id = $row['user_id'];
                            $query1 = "SELECT * FROM users WHERE id='$user_id'";
                            $result1 = $conn->query($query1);
                            while ($row1 = $result1 -> fetch_assoc()){
                                $fname = $row1['firstname'];
                                $lname = $row1['lastname'];
                                $email = $row1['email'];
                                
                            }
                            $datetime_from = $row['datetime_from'];
                            $datetime_to= $row['datetime_to'];
                            $datetime =$row['datetime'];
                            $location = $row['location'];
                            $nop = $row['number_of_people'];
                            $i++;
                        

                        ?>
                    <tr>
                        <td><?php echo $i ; ?></td>
                        <td><?php echo $fname, " ",$lname ; ?></td>
                        <td><?php echo $email ; ?></td>
                        <td><?php echo $location ; ?></td>
                        <td><?php echo $datetime_from ; ?></td>
                        <td><?php echo $datetime_to ; ?></td>
                        <td><?php echo $nop ; ?></td>
                        <td><?php echo $datetime ; ?></td>
                        <td><button class="btn btn-block btn-danger">Delete</button></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="center">Users</h1>
                <hr>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="../assets/js/style.js"></script>

<script>
    $(document).ready(function () {
        var ctx = $('#bookingChart')[0].getContext('2d');
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
                    datetimeValues.push(new Date(item.datetime));
                    countValues.push(parseInt(item.count));
                });
    
                // Now you can use datetimeValues and countValues as separate arrays
                console.log('Datetime Values:', datetimeValues);
                console.log('Count Values:', countValues);
    
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
    
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: initialData,
                    options: {
                        // Additional chart options
                    }
                });
            }
        });
    });
    
</script>
</body>
</html>