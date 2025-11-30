<?php
// manage all products - view, edit, delete
require_once 'auth-check.php';
require_once '../config.php';
require_once '../classes/Database.php';
require_once '../classes/Crud.php';

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

$message = '';

// handle delete
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  
  if($crud->deleteProduct($id)) {
    $message = 'Product deleted successfully';
  } else {
    $message = 'Failed to delete product';
  }
}

// get all products
$stmt = $crud->readProducts();

$pageTitle = "Manage Products - Admin";
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
    <div class="admin-header-row">
      <h1>Manage Products</h1>
      <a href="add-product.php" class="cta-btn">Add New Product</a>
    </div>
    
    <?php if($message != ''): ?>
      <div class="success-box"><?php echo $message; ?></div>
    <?php endif; ?>
    
    <?php if($stmt->rowCount() > 0): ?>
      <table class="admin-table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <tr>
            <td>
              <?php if($row['img']): ?>
                <img src="../assets/img/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>" class="table-img">
              <?php else: ?>
                <span>No image</span>
              <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
            <td>$<?php echo number_format($row['price'], 2); ?></td>
            <td>
              <a href="edit-product.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
              <a href="products.php?action=delete&id=<?php echo $row['id']; ?>" 
                 class="btn-delete" 
                 onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No products found. <a href="add-product.php">Add your first product</a></p>
    <?php endif; ?>
  </div>
</div>

<footer class="admin-footer">
  <div class="wrap">
    <p>&copy; <?php echo date('Y'); ?> Urban Brew Admin Panel</p>
  </div>
</footer>

</body>
</html>