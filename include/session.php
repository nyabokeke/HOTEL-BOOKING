<?php
session_start();
/**
 * Returns the login details of the currently logged in user
 * 
 * @return array The login details of the currently logged in user
 */
function logindetails() {
    if(isset($_SESSION['email'])){
        $email = $_SESSION["email"];
        $id = $_SESSION['id'];
        $type = $_SESSION['type'];
        return array($email, $id, $type);
    }else{
        return null;
    }
}

/**
 * Displays any error or success messages that may have been set
 */
function message() {
    if (isset($_SESSION["errormsg"]) || isset($_SESSION['successmsg'])) {
        if (isset($_SESSION["errormsg"])) {
            $message = "<div style='text-align: center;' class='bg-warning text-danger'>" . $_SESSION["errormsg"] . "</div>";
            $_SESSION['errormsg'] = null;  // Set session variable to null before return
            return $message;
        }
        if (isset($_SESSION['successmsg'])) {
            $message = "<div class='bg-primary text-light'>" . $_SESSION['successmsg'] . "</div>";
            $_SESSION['successmsg'] = null;  // Set session variable to null before return
            return $message;
        }
    } else {
        return null;
    }
}

?>