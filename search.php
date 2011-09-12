<?php
session_start();
require ('connecttobd.php');


if (isset($_SESSION['user_id'])) {

require ('header.html');
require ('search.tpl');
require ('search_sql.tpl');
require ('body.tpl');
include ('footer.html');
}
else {
    die('access denied!');
}
?>
