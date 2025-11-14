<?php
// home page for urban brew
$pageTitle = "Urban Brew Coffee - Fresh Roasted Daily";
include 'includes/nav.php';
?>

<div class="banner-area">
  <div class="banner-content">
    <h1>Artisan Coffee & Community</h1>
    <p>Locally roasted beans and handcrafted drinks</p>
    <a href="products.php" class="cta-btn">Explore Menu</a>
  </div>
</div>

<div class="featured-section">
  <div class="wrap">
    <h2>Customer Favorites</h2>
    <div class="menu-items">
      <?php
      // hardcoded til database hookup
      $featured = [
        ['drink' => 'House Espresso', 'cost' => 3.25, 'photo' => 'espresso.jpg'],
        ['drink' => 'Vanilla Latte', 'cost' => 5.00, 'photo' => 'latte.jpg'],
        ['drink' => 'Iced Americano', 'cost' => 4.25, 'photo' => 'americano.jpg']
      ];

      foreach($featured as $item): 
      ?>
        <div class="drink-box">
          <img src="assets/img/<?php echo $item['photo']; ?>" alt="<?php echo $item['drink']; ?>">
          <h3><?php echo $item['drink']; ?></h3>
          <span class="cost">$<?php echo number_format($item['cost'], 2); ?></span>
        </div>
      <?php 
      endforeach; 
      ?>
    </div>
  </div>
</div>

<div class="cta-section">
  <h2>Visit Our Cafe Today</h2>
  <p>Experience the perfect cup in our cozy atmosphere</p>
  <a href="locations.php" class="cta-btn">Find a Location</a>
</div>

<?php include 'includes/foot.php'; ?>