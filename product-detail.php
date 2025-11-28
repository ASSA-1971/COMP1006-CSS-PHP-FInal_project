<?php
// single product detail page
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/Crud.php';

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

// get product id from url
if(!isset($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$productId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

// get product details
$product = $crud->readSingleProduct($productId);

if(!$product) {
    header('Location: products.php');
    exit;
}

$pageTitle = $product['name'] . " - Urban Brew Coffee";
include 'includes/nav.php';
?>

<div class="product-detail-area">
    <div class="wrap">
        <div class="product-layout">
            <div class="product-image">
                <?php if($product['img']): ?>
                    <img src="assets/img/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                <?php else: ?>
                    <img src="assets/img/placeholder.jpg" alt="No image">
                <?php endif; ?>
            </div>
            
            <div class="product-details">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                
                <p class="product-category">
                    Category: <strong><?php echo htmlspecialchars($product['category_name']); ?></strong>
                </p>
                
                <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                
                <?php if($product['description']): ?>
                    <div class="product-description">
                        <h3>Description</h3>
                        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <div class="product-actions">
                    <a href="products.php" class="cta-btn">Back to Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/foot.php'; ?>