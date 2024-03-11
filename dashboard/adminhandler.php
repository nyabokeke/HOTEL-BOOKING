<?php
include_once "../include/db.php";

if (isset($_POST['bookings'])) {
    $sql = "SELECT DATE_FORMAT(datetime, '%Y-%m-%d') as date, COUNT(*) as count FROM booking GROUP BY date";

    $result = $conn->query($sql);

    if ($result) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'datetime' => $row['date'],
                'count' => $row['count']
            );
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // Handle query error
        echo json_encode(array('error' => 'Error executing query'));
    }
}
elseif (isset($_POST['users'])) {
    $sql = "SELECT DATE_FORMAT(datetime, '%Y-%m-%d') as date, COUNT(*) as count FROM users GROUP BY date";

    $result = $conn->query($sql);

    if ($result) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'datetime' => $row['date'],
                'count' => $row['count']
            );
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // Handle query error
        echo json_encode(array('error' => 'Error executing query'));
    }
}
elseif(isset($_POST['bookingsdelete'])){
    $id = $_POST['id'];
    $query = "DELETE FROM booking WHERE id='$id'";
    $result = $conn->query($query);
    if (!$result) {
        echo "Error executing the query: ". $conn->error;
        exit();
    }else{
        echo json_encode("Deleted successfully");
    }
}
elseif(isset($_POST['updatebookingtbl'])){
    $table = '<table class="table text-dark bg-light table-striped table-hover table-responsive">
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
    </tr>';
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
        $id = $row['id'];
        $datetime_from = $row['datetime_from'];
        $datetime_to= $row['datetime_to'];
        $datetime =$row['datetime'];
        $location = $row['location'];
        $nop = $row['number_of_people'];
        $i++;
        $table .= "<tr>
        <td>$i</td>
        <td>$fname $lname</td>
        <td>$email</td>
        <td>$location</td>
        <td>$datetime_from</td>
        <td>$datetime_to</td>
        <td>$nop</td>
        <td>$datetime</td>
        <td><button data-id='$id' class='btn btn-block btn-danger btn-bookings'>Delete</button></td>
    </tr>";
    }
    $table .= "</table>";
    echo $table;
}
if (isset($_POST['usersdelete'])) {
    // Ensure that 'id' is set and is a valid integer
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = $_POST['id'];

        // Use prepared statements to prevent SQL injection
        $query = $conn->prepare("DELETE FROM users WHERE id = ?");
        $query->bind_param("i", $id); // 'i' represents integer type
        $result = $query->execute();

        if (!$result) {
            echo json_encode("Error executing the query: " . $query->error);
        } else {
            echo json_encode("Deleted successfully");
        }

        $query->close(); // Close the prepared statement
    } else {
        echo json_encode("Invalid ID provided");
    }
}
elseif(isset($_POST['updateuserstbl'])){
    $table = '<table class="table bg-light text-dark">
    <tr>
        <th>S/NO</th>
        <th>FirstName</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Type</th>
        <th>DateTime Created</th>
        <th>Delete</th>
    </tr>';
    $query = "SELECT * FROM users";
    $execute = $conn->query($query);
    $count = 0;
    while ($row = mysqli_fetch_assoc($execute)) {
        $id = $row['id'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $type = $row['type'];
        $email = $row['email'];
        $datetime = $row['datetime'];
        $count++;
    
        $table .= "<tr>
            <td>$count</td>
            <td class='fname' data-id='$id' contenteditable >$fname</td>
            <td class='lname' data-id='$id' contenteditable >$lname</td>
            <td class='email' data-id='$id' contenteditable >$email</td>
            <td>";
    
        $usertype = ($type == 1) ? "Admin" : "Customer";
    
        $table .= "<select name='type' data-id='$id' id='type' class='type'>
                <option value='0'" . (($type == 0) ? ' selected' : '') . ">Customer</option>
                <option value='1'" . (($type == 1) ? ' selected' : '') . ">Admin</option>
                </select>";
    
        $table .= "</td>
        <td>$datetime</td>
        <td><button class='btn btn-danger btn-block btn-users' data-id='$id'>Delete</button></td>
        </tr>";
    }
    
    $table .= "</table>"; 
    echo $table;
    


}
elseif(isset($_POST['editingfname'])){
    
    $fname = $_POST['fname'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET firstname='$fname' WHERE id='$id'";
    $execute = $conn->query($sql);

    if($execute == true){
        echo json_encode("updated success for $fname");
    } else {
        echo json_encode("Error: " . $conn->error);
    }

    echo json_encode(" id $id");
}
elseif(isset($_POST['editinglname'])){
    
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET lastname='$lname' WHERE id='$id'";
    $execute = $conn->query($sql);

    if($execute == true){
        echo json_encode("updated success for $lname");
    } else {
        echo json_encode("Error: " . $conn->error);
    }

    echo json_encode(" id $id");
}
elseif(isset($_POST['editingemail'])){
    
    $email = $_POST['email'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET email='$email' WHERE id='$id'";
    $execute = $conn->query($sql);

    if($execute == true){
        echo json_encode("updated success for $email");
    } else {
        echo json_encode("Error: " . $conn->error);
    }

    echo json_encode(" id $id");
}
elseif(isset($_POST['editingtype'])){
    
    $type = $_POST['type'];
    $id = $_POST['id'];
    $sql = "UPDATE users SET type='$type' WHERE id='$id'";
    $execute = $conn->query($sql);
    if($type == 1){
        $typedetail = "Admin";

    }else{
        $typedetail = "Customer";
    }
   

    if($execute == true){
        echo json_encode("updated success to $typedetail");
    } else {
        echo json_encode("Error: " . $conn->error);
    }

    echo json_encode(" id $id");
}


    
                

                

                
                    
                       
                        
                    
                
                
            
?>

                    
                       
                        
                        

                    
                    
                
