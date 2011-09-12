<?php
session_start();
require ('connecttobd.php');

$query = "SELECT * FROM who_history where zayavka='".$_GET['id']."'";
$res = mysql_query($query) or die(mysql_error());

if (isset($_SESSION['user_id'])) 
{
require ('header.html');
print '
<table class="sortable" >
<thead>
 <tr style="border: solid 1px #000">
  <td align="center"><b>Кто изменял</b></td> 
  <td align="center"><b>Оплата</b></td>   
  <td align="center"><b>Заявку передать</b></td>
  <td align="center"><b>Дата сдачи</b></td> 
  <td align="center"><b>Дата</b></td>
  <td align="center"><b>Время</b></td>

 </tr>
 </thead>
 <tbody>
';
 
/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) 
{
    echo " <tr>\n";
    echo "<td>".$row['who']."</td>\n";
    echo "<td>".$row['oplata']."</td>\n";
    echo "<td>".$row['resperson']."</td>\n";
    echo "<td>".$row['end_data']."</td>\n";	
	echo "<td>".$row['date']."</td>\n";
    echo "<td>".$row['time']."</td>\n</tr>\n";
}
print '<tr><td colspan="3"><a href="view.php?id='.$_GET['id'].'">Назад</a> </td></tr></tbody></table>';
 
/* Закрываем соединение */
mysql_close();
require ('footer.html'); 
}
else {
    die('access denied!');
}
?>
