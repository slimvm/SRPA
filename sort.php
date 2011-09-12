<?php
session_start();
require ('connecttobd.php');


if (isset($_SESSION['user_id'])) {

require ('header.html');
require ('search.tpl');

if (($_POST['resperson'])=="all" )
{
require ('listing.php');
require ('main_sql.tpl');
require ('body.tpl');
require ('listing_f.php');
}else
{
require ('sort_sql.tpl');
require ('body.tpl');
include ('footer.html');
}
}
else {
    die('access denied!');
}
?>