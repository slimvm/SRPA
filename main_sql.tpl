<?php
$query = "SELECT * FROM manager ORDER BY id DESC LIMIT ".$start.", ".ITEMS_PER_PAGE;
$res = mysql_query($query) or die(mysql_error());
?>