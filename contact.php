<?php
$pageTitle = "Contact Us - Urban Brew Coffee";
include 'includes/nav.php';

$submitted = false;
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = trim($_POST['userName']);
    $userEmail = trim($_POST['userEmail']);
    $userMessage = trim($_POST['userMessage']);
    
    // echo $userEmail; // testing email output
    
    $valid = true;
    
    // check name
    if(empty($userName)) {
        $errors[] = 'Name is required';
        $valid = false;
    }
    
    // check email
    if(empty($userEmail)) {
        $errors[] = 'Email is required';
        $valid = false;
    } else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email';
        $valid = false;
    }
    
    // check message
    if(empty($userMessage)) {
        $errors[] = 'Message cannot be empty';
        $valid = false;
    }
    
    if($valid) {
        // TODO: save to database in phase 2
        $submitted = true;
    }
}
?>

<div class="page-top">
    <h1>Get In Touch</h1>
    <p>Questions or feedback? We would love to hear from you</p>
</div>

<div class="contact-area">
    <div class="wrap">
        <?php if($submitted): ?>
            <div class="success-box">Thank you for your message. We'll respond soon.</div>
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
        
        <fieldset>
            <legend>Contact Form</legend>
            <form method="post" action="contact.php">
                
                <label for="userName">Your Name</label>
                <input type="text" id="userName" name="userName" value="<?php echo isset($_POST['userName']) ? $_POST['userName'] : ''; ?>">
                
                <label for="userEmail">Email Address</label>
                <input type="email" id="userEmail" name="userEmail" value="<?php echo isset($_POST['userEmail']) ? htmlspecialchars($_POST['userEmail']) : ''; ?>">
                
                <label for="userMessage">Your Message</label>
                <textarea id="userMessage" name="userMessage" rows="6"><?php echo isset($_POST['userMessage']) ? htmlspecialchars($_POST['userMessage']) : ''; ?></textarea>
                
                <button type="submit" class="cta-btn">Send Message</button>
            </form>
        </fieldset>
    </div>
</div>

<?php include 'includes/foot.php'; ?>