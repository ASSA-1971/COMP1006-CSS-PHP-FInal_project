<?php
// logout script
// destroys session and redirects to home

session_start();

// destroy all session data
session_destroy();

// redirect to homepage
header('Location: ../home.php');
exit;
?>