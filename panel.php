<?php
session_start();
require ('connecttobd.php');
require ('login_sql.tpl');

if (isset($_SESSION['user_id'])) {

require ('header.html');
require ('search.tpl');
require ('listing.php');
require ('main_sql.tpl');
require ('body.tpl');
require ('listing_f.php');
include ('footer.html');
}
else {
    die('access denied!');
}
?>
