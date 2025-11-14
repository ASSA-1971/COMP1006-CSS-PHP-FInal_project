<?php
$pageTitle = "Our Menu - Urban Brew Coffee";
include 'includes/nav.php';
?>

<div class="page-top">
    <h1>Coffee Menu</h1>
    <p>Explore our handcrafted drinks and fresh roasted beans</p>
</div>

<div class="products-area">
    <div class="wrap">
        <?php
        // static data for phase 1 - will pull from db later
        $coffees = [
            ['drink' => 'House Espresso', 'cost' => 3.25, 'detail' => 'Double shot', 'photo' => 'espresso.jpg'],
            ['drink' => 'Vanilla Latte', 'cost' => 5.00, 'detail' => 'Steamed milk', 'photo' => 'latte.jpg'],
            ['drink' => 'Iced Americano', 'cost' => 4.25, 'detail' => 'Over ice', 'photo' => 'americano.jpg'],
            ['drink' => 'Cappuccino', 'cost' => 4.50, 'detail' => 'Italian style', 'photo' => 'cappuccino.jpg'],
            ['drink' => 'Caramel Macchiato', 'cost' => 5.50, 'detail' => 'Sweet espresso', 'photo' => 'macchiato.jpg'],
            ['drink' => 'Origin Blend', 'cost' => 18.00, 'detail' => '12oz whole bean', 'photo' => 'beans.jpg']
        ];
        
        // $testPrice = 5.99; // was testing pricing logic
        ?>

        <div class="menu-grid">
            <?php 
            foreach($coffees as $coffee) {
                ?>
                <div class="drink-box">
                    <img src="assets/img/<?php echo $coffee['photo']; ?>" alt="<?php echo $coffee['drink']; ?>">
                    <div class="drink-info">
                        <h3><?php echo $coffee['drink']; ?></h3>
                        <p class="detail"><?php echo $coffee['detail']; ?></p>
                        <span class="cost">$<?php echo number_format($coffee['cost'], 2); ?></span>
                        <a href="#" class="link-btn">View Details</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include 'includes/foot.php'; ?>