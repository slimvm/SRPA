<?php
if ($_POST['search']=="")
{
$query = "SELECT * FROM manager WHERE data BETWEEN '".$_POST['data1']."' AND '".$_POST['data2']."'";
}else
{
$query = "SELECT * FROM manager where name_org like '%".$_POST['search']."%' OR name like '%".$_POST['search']."%' OR data BETWEEN '".$_POST['data1']."' AND '".$_POST['data2']."'";
}
$res = mysql_query($query) or die(mysql_error());
?>