<?php
$pageTitle = "Our Story - Urban Brew Coffee";
require_once 'includes/nav.php';
?>

<div class="page-top">
    <h1>Our Story</h1>
    <p>Passion for quality coffee since 2024</p>
</div>

<div class="about-content">
    <div class="wrap">
        <h2>Rooted in Community</h2>
        <p>Urban Brew started as a passion project between two coffee lovers who wanted to bring specialty roasts to our neighborhood. We believe great coffee should be accessible to everyone.</p>
        <p>Today we source beans directly from sustainable farms and roast them fresh in-house every week. Our baristas are trained to craft each drink with care and precision.</p>
    </div>
</div>

<div class="mission-area">
    <div class="wrap">
        <h2>What Drives Us</h2>
        <!-- tried grid first but flex spacing worked better -->
        <div class="features-row">
            <div class="feature-item">
                <h3>Fresh Roasted</h3>
                <p>Small batch roasting every week for peak flavor</p>
            </div>
            <div class="feature-item">
                <h3>Sustainable</h3>
                <p>Direct trade with farmers using eco-friendly practices</p>
            </div>
            <div class="feature-item">
                <h3>Community First</h3>
                <p>A welcoming space for neighbors to connect</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/foot.php'; ?>