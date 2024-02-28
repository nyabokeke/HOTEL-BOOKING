<?php
require_once "./include/session.php";

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
<!-- owl-carousel css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Hotel</title>
<style>
    .jumbotron img{
        height: 300px;
    }
    .book-now p {
        font-size: 20px;
        text-align: center;
        font-weight: 900;
        background: -webkit-linear-gradient(blue, purple);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        animation: gradient 3s infinite;
    }
    @keyframes gradient{
        0% {
            background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, blue, purple);
        }
        50% {
            background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, rgb(79, 79, 145), rgb(218, 86, 218));
        }
        100% {
            background-clip: text;
            color: transparent;
            background-image: linear-gradient(to right, purple, blue);
        }
    }

    
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-image:linear-gradient(to right, blue,purple)">
                    <a class="navbar-brand" href="#"><img class="logo" src="./assets/images/logo/velvet-logo.png" alt=""></a>
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                        aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav mr-auto mt-2 mx-auto my-auto mt-lg-0">
                            <li class="nav-item ">
                                <a class="nav-link" href="./index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="#">Action 1</a>
                                    <a class="dropdown-item" href="#">Action 2</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php"><i class="fas fa-door-open    "></i> logout</a>
                            </li>
                            
                            
                    </div>
                </nav>
            </div>
        </div>
        <div class="row" style="margin-top: 70px;">
            <div class="col-sm-12">
                <p><?php echo message();?></p>
                
            </div>
            <div class="col-sm-12">
                <h1><i class="fas fa-hotel"></i> Hotels</h1>
                <div class="overview-top owl-carousel owl-theme">
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/banner1.jpg?1" alt="">
                                <table class="table bg-warning">
                                    <tr>
                                        <th>location</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                    </tr>
                                    <tr>
                                        <td>Kisumu</td>
                                        <td>07:00 A.M - 09:00 P.M</td>
                                        <td>10:00 A.M</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/banner.jpg" alt="">
                                <table class="table bg-warning">
                                    <tr>
                                        <th>location</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                    </tr>
                                    <tr>
                                        <td>Nairobi</td>
                                        <td>05:00 A.M - 09:00 P.M</td>
                                        <td>10:00 A.M</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/banner3.jpg" alt="">
                                <table class="table bg-warning">
                                    <tr>
                                        <th>location</th>
                                        <th>Checkin</th>
                                        <th>Checkout</th>
                                    </tr>
                                    <tr>
                                        <td>Mombasa</td>
                                        <td>06:30 A.M - 09:00 P.M</td>
                                        <td>10:00 A.M</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- rooms -->
                <h1>Rooms</h1>
                <div class="rooms owl-carousel owl-theme">
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/rooms/140127103345-peninsula-shanghai-deluxe-mock-up.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/rooms/eaton-dc-interiors-hotel-washington-dc-maryland-usa-adrian-gaut_dezeen_2364_col_2.webp" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/rooms/photo-1611892440504-42a792e24d32.avif" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/rooms/room2jpg.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <img class="img-fluid" src="./assets/images/hotel/rooms/room3.jpg" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
        <div class="row my-5" >
            <footer>
                <div class="book-now col-sm-12 ">
                    <div class="modal-button-text fixed-bottom bg-warning ">
                        <p>Book now at any of the location</p>
                        <!-- Button trigger modal -->
                        <button class="btn btn-block btn-primary"data-toggle="modal" data-target="#booking-form" >Book Now!</button>
                    

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="booking-form" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title center">Booking Form</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form">
                                        <form action="./handler.php" method="get">
                                            <label for="fname">NameFirstname</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                            <label for="lname">Lastname</label>
                                            
                                            <input type="text" name="lname" id="lname" class="form-control">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            <label for="Location"><i class="fa fa-location-arrow" aria-hidden="true"></i>Location</label>
                                            <select name="location" id="location" class="form-control">
                                                <option value="Nairobi">Nairobi</option>
                                                <option value="Kisumu">Kisumu</option>
                                                <option value="Mombasa">Mombasa</option>
                                            </select>
                                            <label for="From">From</label>
                                            <input type="datetime-local" name="from" id="from" class="form-control">
                                            <label for="to">To</label>
                                            <input type="datetime-local" name="to" id="to" class="form-control">
                                            <button class="my-1 book btn btn-primary btn-block">Book</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.overview-top').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:2500,
        autoplayHoverPause:true,
        
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });
    $('.rooms').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        /*autoplay:true,
        autoplayTimeout:2500,
        autoplayHoverPause:true,*/
        
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    })
</script>
</body>
</html>