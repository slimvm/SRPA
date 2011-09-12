<?php
$login = mysql_fetch_row( mysql_query("SELECT login FROM users where id='".$_SESSION["user_id"]."'"));
echo $login[0];
?>