<?php 
include "./include/db.php";
include "./include/session.php";
include "./phpmailereg.php";


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

        
        if($type == 0){
            header("location:./index.php");
        }else if($type == 1){
            header("location:./dashboard/admin.php");
        }else{
            $_SESSION['errormsg']= "Something went wrong!";
            header("location: login.php");
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
    $query = "INSERT INTO booking(user_id, datetime_from,datetime_to, location, number_of_people) VALUES('$id','$from','$to','$location','$Number_of_people')";
    $execute = $conn->query($query);
    if($execute){
        $message = "
            <p style='font-weight: bold;'>Booking was successful:</p>
            <table style='border-collapse: collapse; width: 100%;'>
                <tbody>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>Name</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$firstname $lastname</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>Email</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$email</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>Location</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$location</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>From</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$from</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>To</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$to</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 8px;'>Number Of People</th>
                        <td style='border: 1px solid #ddd; padding: 8px;'>$Number_of_people</td>
                    </tr>
                    
                    
                </tbody>
            </table>";

        echo "Booking was successful,\nLocation: $location \nFrom: $from \nTo: $to  \nEmail: $email \nName: $firstname $lastname \n";
        //php mailer sending the booking
        $sql = "SELECT * FROM credentials WHERE provider='gmail'";
        $run = $conn->query($sql);
        while($row = mysqli_fetch_array($run)){
            $username = $row['email'];
            $password = $row['password'];
        }

        sendmail($username,$password,$email,$firstname,$message);

        
    }else{ 
        echo "something went wrong!!";
       
    }
    //echo "connection made,location $location from $from to $to  for $email userid =$id";

}
?>