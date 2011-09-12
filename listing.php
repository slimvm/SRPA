<?php
DEFINE('ITEMS_PER_PAGE', 20);
$query = "SELECT COUNT(*) FROM manager";
$res = mysql_query( $query );
$total = mysql_result( $res, 0, 0 );

if ( isset($_GET['page']) ) {
  $page = (int)$_GET['page'];
  if ( $page < 1 ) $page = 1;
} else {
  $page = 1;
}
$cnt_pages = ceil( $total / ITEMS_PER_PAGE );
if ( $page > $cnt_pages ) $page = $cnt_pages;

$start = ( $page - 1 ) * ITEMS_PER_PAGE;
?>
