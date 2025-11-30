<?php
// add new product form with image upload
require_once 'auth-check.php';
require_once '../config.php';
require_once '../classes/Database.php';
require_once '../classes/Crud.php';

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

$errors = [];
$success = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $categoryId = $_POST['category_id'];
    $price = $_POST['price'];
    $description = trim($_POST['description']);
    
    // validate inputs
    if(empty($name)) {
        $errors[] = 'Product name is required';
    }
    
    if(empty($categoryId)) {
        $errors[] = 'Category is required';
    }
    
    if(empty($price) || !is_numeric($price)) {
        $errors[] = 'Valid price is required';
    }
    
    // handle image upload
    $imageName = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if(!in_array($fileExt, $allowed)) {
            $errors[] = 'Only JPG, PNG and GIF images allowed';
        } else {
            // generate unique filename
            $imageName = uniqid() . '.' . $fileExt;
            $uploadPath = '../assets/img/' . $imageName;
            
            if(!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $errors[] = 'Failed to upload image';
                $imageName = '';
            }
        }
    }
    
    // if no errors create product
    if(empty($errors)) {
        if($crud->createProduct($name, $categoryId, $price, $description, $imageName)) {
            $success = true;
            // reset form
            $_POST = [];
        } else {
            $errors[] = 'Failed to create product';
        }
    }
}

// get categories for dropdown
$categories = $crud->getCategories();

$pageTitle = "Add Product - Admin";
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
        <h1>Add New Product</h1>
        
        <?php if($success): ?>
            <div class="success-box">Product added successfully! <a href="products.php">View all products</a></div>
        <?php endif; ?>
        
        <?php if(!empty($errors)): ?>
            <div class="error-box">
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <form method="post" enctype="multipart/form-data" class="admin-form">
            
            <div class="form-group">
                <label for="name">Product Name *</label>
                <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="category_id">Category *</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    <?php while($cat = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?php echo $cat['id']; ?>" 
                            <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Price *</label>
                <input type="number" step="0.01" id="price" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" id="image" name="image" accept="image/*">
                <small>Accepted formats: JPG, PNG, GIF</small>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="cta-btn">Add Product</button>
                <a href="products.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>

<footer class="admin-footer">
    <div class="wrap">
        <p>&copy; <?php echo date('Y'); ?> Urban Brew Admin Panel</p>
    </div>
</footer>

</body>
</html>