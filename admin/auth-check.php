<?php
// check if user is logged in
// include this at top of protected pages

session_start();

if(!isset($_SESSION['admin_id'])) {
  // not logged in, redirect to login page
  header('Location: ../admin.php');
  exit;
}
?>