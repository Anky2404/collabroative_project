<?php
// Include database connection page
include_once('database_connection.php');

// Admin logout
if (isset($_GET['logout']) && isset($_GET['role'])) {

    // Decode the role
    $role = base64_decode($_GET['role']); 

    // Unset all session data for all roles
    if (isset($_SESSION[$role . 'Data'])) {
        unset($_SESSION[$role . 'Data']);
    }

   
    
    // Display the alert and redirect to the login page
    echo '<script>alert("You are successfully logged out as ' . $role . '."); window.location="Login";</script>';
}
?>
