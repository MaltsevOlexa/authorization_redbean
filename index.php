<?php
require 'includes/db.php';

if (isset($_SESSION['logged_user'])) : ?>
Hello <?php echo $_SESSION['logged_user']->login; ?>
<br /><a href="logout.php">LogOut</a>
<?php else : ?> 
You are not authorized<br />
<a href="signin.php">Sign In</a><br />
<a href="signup.php">Sign Up</a>
<?php endif; ?>