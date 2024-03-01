<?php 
include "./include/db.php";
include "./include/session.php";

if(isset($_POST['signup'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    // Check if the account exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    
    // Execute the query
    $result = $conn->query($query);

    // Check for errors in the query execution
    if (!$result) {
        echo "Error executing the query: " . $conn->error;
        exit();
    }

    // Check for rows in the result set
    if ($result->num_rows > 0){
        $_SESSION['errormsg']= "Account already exists";
        header("location:login.php");
        exit();
    }



    //add the account
    $query = "INSERT INTO users(firstname,lastname,email,password) VALUES('$fname','$lname','$email','$passwordhash')";
    $result = $conn->query($query);
    if($result){
        $_SESSION['successmsg']= "account created successfully";
        header("location:login.php");
        //header("location:./signup.php?signup=success");
    }else{ 
        $_SESSION['errormsg']= "something went wrong";
        header("location:login.php");
    }
}
elseif(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);
    $type = null;
    while($rows = mysqli_fetch_array($result)){
        $passwordhash = $rows['password'];
        $type = $rows['type'];
        $id = $rows['id'];
        $firstname = $rows['firstname'];
        $lastname = $rows['lastname'];

    }
    if($type == null){
        $_SESSION['errormsg']= "user doesn't exist!";
        header("location:./login.php");
    }
    else if(password_verify($password, $passwordhash)){
        $_SESSION['id'] = $id;
        $_SESSION['type'] = $type;
        $_SESSION['email'] = $email;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['successmsg'] = "Login successful welcome ,$firstname";

        
        if($type == 1){
            header("location:./admin.php");
        }else{
            header("location:./index.php");
        }
    }
    else if(password_verify($password, $passwordhash)==false){
        echo "wrong password";
        $_SESSION['errormsg']= "wrong password";
        header("location:./login.php");
    }

    else{
        //echo "something went wrong";
        $_SESSION['errormsg']= "something went wrong";
        header("location:./login.php");
    }
}
elseif(isset($_GET['bookingform'])){
    $logindetails =logindetails();
    $firstname = $logindetails[3];
    $lastname = $logindetails[4];
    $from = $_GET['from'];
    
    $to = $_GET['to'];
    $email = $_GET['email'];
    $id = $_GET['id'];
    $location = $_GET['location'];
    $Number_of_people = $_GET['nop'];
    $query = "INSERT INTO BOOKING(user_id, datetime_from,datetime_to, location, number_of_people) VALUES('$id','$from','$to','$location','$Number_of_people')";
    $execute = $conn->query($query);
    if($execute){
        echo "Booking was successful,\nLocation: $location \nFrom: $from \nTo: $to  \nEmail: $email \nName: $firstname $lastname";

        
    }else{ 
        echo "something went wrong!!";
       
    }
    //echo "connection made,location $location from $from to $to  for $email userid =$id";

}
?>