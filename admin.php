<?php
$pageTitle = "Admin Access - Urban Brew Coffee";
include 'includes/nav.php';

$loginError = '';
$registerSuccess = false;
$registerErrors = [];

// handle login
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_submit'])) {
    $loginEmail = trim($_POST['loginEmail']);
    $loginPass = $_POST['loginPass'];
    
    if(empty($loginEmail) || empty($loginPass)) {
        $loginError = 'Both fields required';
    }
    // TODO: check database and start session in phase 2
}

// handle registration
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_submit'])) {
    $regEmail = trim($_POST['regEmail']);
    $regPass = $_POST['regPass'];
    $regPassConfirm = $_POST['regPassConfirm'];
    
    $valid = true;
    
    if(empty($regEmail)) {
        $registerErrors[] = 'Email required';
        $valid = false;
    } else if(!filter_var($regEmail, FILTER_VALIDATE_EMAIL)) {
        $registerErrors[] = 'Invalid email format';
        $valid = false;
    }
    
    if(empty($regPass)) {
        $registerErrors[] = 'Password required';
        $valid = false;
    } else if(strlen($regPass) < 6) {
        $registerErrors[] = 'Password must be atleast 6 characters';
        $valid = false;
    }
    
    if($regPass != $regPassConfirm) {
        $registerErrors[] = 'Passwords do not match';
        $valid = false;
    }
    
    if($valid) {
        // TODO: hash password and insert into database
        // $hashedPassword = password_hash($regPass, PASSWORD_DEFAULT);
        $registerSuccess = true;
    }
}
?>

<div class="page-top">
    <h1>Admin Portal</h1>
    <p>Manage your coffee shop</p>
</div>

<div class="admin-area">
    <div class="wrap">
        <div class="admin-forms">
            
            <!-- login section -->
            <div class="form-section">
                <h2>Login</h2>
                
                <?php if($loginError != ''): ?>
                    <div class="error-box"><?php echo $loginError; ?></div>
                <?php endif; ?>
                
                <form method="post" action="admin.php">
                    <label for="loginEmail">Email</label>
                    <input type="email" id="loginEmail" name="loginEmail" required>
                    
                    <label for="loginPass">Password</label>
                    <input type="password" id="loginPass" name="loginPass" required>
                    
                    <button type="submit" name="login_submit" class="cta-btn">Login</button>
                </form>
            </div>
            
            <!-- register section -->
            <div class="form-section">
                <h2>Create Account</h2>
                
                <?php if($registerSuccess): ?>
                    <div class="success-box">Account created. You can now login.</div>
                <?php endif; ?>
                
                <?php if(!empty($registerErrors)): ?>
                    <div class="error-box">
                        <ul>
                            <?php foreach($registerErrors as $regErr): ?>
                                <li><?php echo $regErr; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="post" action="admin.php">
                    <label for="regEmail">Email</label>
                    <input type="email" id="regEmail" name="regEmail" value="<?php echo isset($_POST['regEmail']) ? htmlspecialchars($_POST['regEmail']) : ''; ?>">
                    
                    <label for="regPass">Password</label>
                    <input type="password" id="regPass" name="regPass">
                    
                    <label for="regPassConfirm">Confirm Password</label>
                    <input type="password" id="regPassConfirm" name="regPassConfirm">
                    
                    <button type="submit" name="register_submit" class="cta-btn">Register</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

<?php include 'includes/foot.php'; ?>