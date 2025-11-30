<?php
// admin dashboard homepage
require_once 'auth-check.php';
require_once '../config.php';
require_once '../classes/Database.php';
require_once '../classes/Crud.php';

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

// get total products count
$stmt = $crud->readProducts();
$totalProducts = $stmt->rowCount();

$pageTitle = "Admin Dashboard - Urban Brew";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<header class="admin-header">
  <div class="wrap">
    <div class="brand">
      <a href="dashboard.php">URBAN BREW ADMIN</a>
    </div>
    <nav class="admin-nav">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="products.php">Manage Products</a></li>
        <li><a href="../home.php">View Site</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="admin-content">
  <div class="wrap">
    <h1>Welcome Back</h1>
    <p>Logged in as: <?php echo $_SESSION['admin_email']; ?></p>
    
    <div class="dashboard-stats">
      <div class="stat-box">
        <h3>Total Products</h3>
        <p class="stat-number"><?php echo $totalProducts; ?></p>
        <a href="products.php" class="cta-btn">Manage Products</a>
      </div>
      
      <div class="stat-box">
        <h3>Quick Actions</h3>
        <a href="add-product.php" class="cta-btn">Add New Product</a>
      </div>
    </div>
  </div>
</div>

<footer class="admin-footer">
  <div class="wrap">
    <p>&copy; <?php echo date('Y'); ?> Urban Brew Admin Panel</p>
  </div>
</footer>

</body>
</html>