<?php
session_start();
require ('connecttobd.php');

/* Составляем запрос для извлечения данных из полей "name", "email", "theme",
"message", "data" таблицы "test_table" */
$query = "SELECT * FROM manager where id='".$_GET['id']."'";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($res);
if (isset($_SESSION['user_id'])) {
require ('header.html');
print '
<form action="edit_action.php?id='.$_GET['id'].'" method="post" name="test_form">
<table class="sortable">
<thead>
 <tr>
  <td width="250"><b>Контактное лицо</b></td>
  <td width="250"><b>Организация</b></td> 
</tr>  
</thead>
 <tr> 
	<td><input type="text" name="name" style="width: 250px;" maxlength="30" value="'.$row['name'].'" /></td> 
	<td><input type="text" name="name_org" style="width: 250px;" maxlength="30" value="'.$row['name_org'].'" /></td>
 </tr>
<thead> 
 <tr> 
  <td width="150"><b>Телефон</b></td>  
  <td width="150"><b>E-Mail<b></td>  
 </tr>  
</thead> 
  <tr> 
	<td><input type="text" name="phone" maxlength="30" value="'.$row['phone'].'" /></td>
	<td><input type="text" name="email" maxlength="30" value="'.$row['email'].'" /></td>
 </tr> 
  <thead>
 <tr>
  <td width="150"><b>Заявка поступила</b></td>  
  <td width="150"><b>Оплата</b></td> 
 </tr>
  </thead>
 <tr>
	<td>
	<select id="type_app" name=type_app size=1>
	<option value="Офис" selected >Офис</option>
	<option value="Телефон" >Телефон</option>
	<option value="other">Другое</option>
	</select>
	</td>
    <td>
	<select id="oplata" name=oplata size=1 >
	<option value="Не оплачено" selected >Не оплачено</option>
	<option value="Оплачено" >Оплачено</option>
	<option value="Взаиморасчет">Взаиморасчет</option>
	<option value="Оплачена часть суммы">Оплачена часть суммы</option>	
	<option value="Закрыто">Закрыто</option>	
	</select>
	</td>
  </tr>
   <thead>
 <tr>
  <td width="150"><b>Тип печати</b></td>  
  <td width="150"><b>Заявку передать</b></td> 
 </tr>
  </thead>
 <tr>
   <tr>
	<td>
	<select id="type_print" name=type_print size=1>
	<option value="Ш.Ф. печать">Ш.Ф. печать</option>
	<option value="Переплет - Цех">Переплет - Цех</option>	
	<option value="Офсет - Дима">Офсет - Дима</option>
	<option value="Трафарет - Игорь">Трафарет - Игорь</option>
	<option value="Цифр. печать - Офис">Цифр. печать - Офис</option>
	<option value="Пластиковые карты">Пластиковые карты</option>
	<option value="Ризограф">Ризограф</option>
	<option value="Фрезер. гравир.">Фрезер. гравир.</option>	
	<option value="Офсет - Владимир">Офсет - Владимир</option>
	<option value="Сувенирка">Сувенирка</option>
	<option value="Флаги">Флаги</option>		
	</select>
	</td>
    <td>
	<select id="resperson" name=resperson size=1 >
	<option value="Менеджер" selected >Менеджер</option>
	<option value="Дизайнер" >Дизайнер</option>
	<option value="Михаил Петрович" >Михаил Петрович</option>	
	<option value="Петр Михайлович" >Петр Михайлович</option>	
	<option value="Валерий" >Валерий</option>	
	</select>
	</td>
  </tr>
  <tr> 
 <td>
  Дата сдачи <input name="end_data" id="data1" type="text" style="width:120px;" value="'.$row['end_data'].'"/>
  </td>
  </tr> 
  <thead>
 <tr>
 <td colspan="10"><b>Заявка</b> </td>
 </tr> 
</thead> 
 <tr>
 <td colspan="10"><textarea name="app" style="width: 520px; height:100px;">'.$row['app'].'</textarea></td>
 </tr>
 <tr> 
 <td width="150"><b>Сумма: </b><input type="text" name="sum" maxlength="30" value="'.$row['sum'].'" /></td> 
 <td  align="center">
   <input type="submit" class="buttons" value="Внести изменения" />
 </td>
 </tr>
</table>
</form>';
require ('footer.html');
}
else {
    die('access denied!');
}
?>

<script type="text/javascript">
document.getElementById('oplata').value ="<?php echo $row['oplata'] ?>";
document.getElementById('type_app').value ="<?php echo $row['type_app'] ?>";
document.getElementById('type_print').value ="<?php echo $row['type_print'] ?>";
document.getElementById('resperson').value ="<?php echo $row['resperson'] ?>";
</script>
