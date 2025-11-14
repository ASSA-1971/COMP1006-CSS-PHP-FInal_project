<?php
$pageTitle = "Locations & Hours - Urban Brew Coffee";
include 'includes/nav.php';
?>

<div class="page-top">
    <h1>Visit Us</h1>
    <p>Find a cafe near you</p>
</div>

<div class="locations-content">
    <div class="wrap">
        <div class="location-grid">
            <div class="location-card">
                <h3>Downtown Location</h3>
                <p><strong>Address:</strong> 123 Main Street</p>
                <p><strong>Phone:</strong> (555) 123-4567</p>
                <p><strong>Hours:</strong></p>
                <ul>
                    <li>Mon-Fri: 6:30 AM - 8:00 PM</li>
                    <li>Sat-Sun: 7:00 AM - 9:00 PM</li>
                </ul>
            </div>
            
            <div class="location-card">
                <h3>West End Location</h3>
                <p><strong>Address:</strong> 456 Oak Avenue</p>
                <p><strong>Phone:</strong> (555) 987-6543</p>
                <p><strong>Hours:</strong></p>
                <ul>
                    <li>Mon-Fri: 7:00 AM - 7:00 PM</li>
                    <li>Sat-Sun: 8:00 AM - 6:00 PM</li>
                </ul>
            </div>
        </div>
        
        <!-- placeholder for map integration phase 2 -->
        <div class="map-placeholder">
            <p>Map will be integrated in phase 2</p>
        </div>
    </div>
</div>

<?php include 'includes/foot.php'; ?>