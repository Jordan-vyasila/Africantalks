<?php 
    session_start();
    //echo $_SESSION['user'];
    session_unset();
// remove all session variables
    session_destroy();
    //echo 'session has destroyed';
echo '<script>alert("Logout Successful!"); window.location.href="index.php";</script>';
?>