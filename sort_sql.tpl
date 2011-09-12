<?php
$query = "SELECT * FROM manager WHERE resperson = '".$_POST['resperson']."'";
$res = mysql_query($query) or die(mysql_error());
?>