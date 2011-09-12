<?php

function number1 ($end_data,$oplata)
 {
 if ((strtotime($end_data) <= strtotime(date("d-m-Y"))) && ($end_data > 0) && ($oplata != "Закрыто")){
	$ret = "<tr class=\"alarm\">\n";
	}
	else
	$ret = "<tr>\n";
	return $ret;
}

print '
<table class="sortable" >
<thead>
 <tr style="border: solid 1px #000">
  <td style="width:20px"><b>#</b></td>
  <td align="center"><b>Статус</b></td> 
  <td align="center"><b>Принята</b></td>
  <td align="center"><b>Дата сдачи</b></td> 
  <td align="center"><b>Имя</b></td>
  <td align="center"><b>Организация</b></td>
  <td align="center"><b>Кратко</b></td> 
  <td align="center"><b>Сумма</b></td>
  <td align="center"></td>  
 </tr>
 </thead>
 <tbody>
';
 
while ($row = mysql_fetch_array($res)) {
	$per=mb_substr($row['app'],0,30,'utf-8');
	
echo number1 ($row['end_data'],$row['oplata']);

    echo "<td>".$row['id']."</td>\n";
	
	if (($row['oplata'])=="Не оплачено")
	{
		echo "<td>Не оплачено</td>\n";
	}else
	if (($row['oplata'])=="Оплачено")
	{
		echo "<td class=\"oplata\">Оплачено</td>\n";
	}else
	if (($row['oplata'])=="Взаиморасчет")
	{
		echo "<td class=\"opother\">Взаиморасчет</td>\n";
	}else
	if (($row['oplata'])=="Оплачена часть суммы")
	{
		echo "<td class=\"opother\">Оплачена часть</td>\n";
	}else
	if (($row['oplata'])=="Закрыто")
	{
		echo "<td class=\"closed\">Закрыто</td>";
	}	
	
    echo "<td>".$row['data']."</td>\n";
	echo "<td>".$row['end_data']."</td>\n";
    echo "<td>".$row['name']."</td>\n";
    echo "<td>".$row['name_org']."</td>\n";
    echo "<td>".$per."...</td>\n";	
    echo "<td>".$row['sum']."</td>\n";	
	echo "<td align=center><a href=\"view.php?id=".$row['id']."\"><img src=\"img/view.png\" border=0></a>&nbsp;&nbsp;<a href=\"edit.php?id=".$row['id']."\"><img src=\"img/edit.png\"  border=0></a> </td>\n </tr>\n";
 }
echo ('</tbody></table>');
?>
