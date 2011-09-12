<table>
 <tbody>
 <thead>
<tr>
<td align="center">
<form action="sort.php" method="post" name="sort">
	<select id="resperson" name=resperson size=1 >
	<option value="all" selected >Все заявки</option>	
	<option value="Менеджер" >Менеджер</option>
	<option value="Дизайнер" >Дизайнер</option>
	<option value="Михаил Петрович" >Михаил Петрович</option>	
	<option value="Петр Михайлович" >Петр Михайлович</option>	
	<option value="Валерий" >Валерий</option>	
   <input type="submit" class="buttons" value="Показать" />	
	</select>
	</form>  
</td>
</tr> 
<tr  >
<td align="right">
<form action="search.php" method="post" name="test_form">
Искать <input type="text" name="search" />
с <input name="data1" id="data1" type="text" style="width:90px;"/>
по <input name="data2" id="data2" type="text" style="width:90px;"/>
   <input type="submit" class="buttons" value="Поиск" />
</form>   
</td>
</tr>
 </thead>
 </tbody>
</table>