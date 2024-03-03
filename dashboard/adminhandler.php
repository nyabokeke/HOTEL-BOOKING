<?php
include_once "../include/db.php";

if (isset($_GET['bookings'])) {
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
elseif (isset($_GET['users'])) {
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
?>
