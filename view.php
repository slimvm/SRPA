<?php
session_start();
require ('connecttobd.php');

/* Составляем запрос для извлечения данных из полей "name", "email", "theme",
"message", "data" таблицы "test_table" */
$query = "SELECT * FROM manager where id = '".$_GET['id']."'";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($res);
if (isset($_SESSION['user_id'])) {
require ('header.html');
print '
<form action="edit.php?id='.$row['id'].'" method="post" name="test_form">
<table class="sortable" width="600px">
<thead>
 <tr>
  <td width="250"><b>Контактное лицо</b></td>
  <td width="250"><b>Организация</b></td> 
</tr>  
</thead>
 <tr> 
	<td>'.$row['name'].'</td> 
	<td>'.$row['name_org'].'</td>
 </tr>
<thead> 
 <tr> 
  <td width="150"><b>Телефон</b></td>  
  <td width="150"><b>E-Mail<b></td>  
 </tr>  
</thead> 
  <tr> 
	<td>'.$row['phone'].'</td>
	<td>'.$row['email'].'</td>
 </tr> 
   <thead>
 <tr>
  <td width="150"><b>Тип заявки</b></td>  
  <td width="150"><b>Оплата</b></td> 
 </tr>
   </thead>
 <tr>
	<td>'.$row['type_app'].'</td>
	<td>'.$row['oplata'].'</td>
  </tr>
  <thead>
 <tr>
  <tr>
  <td width="150"><b>Тип печати</b></td>  
  <td width="150"><b>Заявка передана</b></td> 
 </tr>
  </thead>
   <tr>
	<td>'.$row['type_print'].'</td>
	<td>'.$row['resperson'].'</td>
  </tr>
<thead> 
 <tr>
 <td colspan="10"><b>Заявка</b></td>
 </tr> 
</thead> 
 <tr>
 <td colspan="10">'.$row['app'].'</td>
 </tr>
 <tr>

 <td width="150"><b>Сумма: </b>'.$row['sum'].'</td> 
 <td  align="center">
   <a href="history.php?id='.$row['id'].'">История</a> 
   <input type="submit" class="buttons" value="Редактировать" />
 </td>
 </tr>

 <tr>
 <td colspan="10"><b>Заявка создана</b> '.$row['who'].'</td>
 </tr> 

</table>
</form>';
require ('footer.html');
}
else {
    die('access denied!');
}
?>
