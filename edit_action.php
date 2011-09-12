<?php
session_start();
require ('connecttobd.php');

/* Определяем текущую дату */
$cdate = date("d-m-Y");
$ctime = gmdate("H:i:s",time()+(4*3600));
 if (isset($_SESSION['user_id'])) {
/* Составляем запрос для вставки информации в таблицу
name...date - название конкретных полей в базе;
в $_POST["test_name"]... $_POST["test_mess"] - в этих переменных содержатся данные, полученные из формы */
$login = mysql_fetch_row( mysql_query("SELECT login FROM users where id='".$_SESSION["user_id"]."'"));
//$login="sdf";
$query = "UPDATE manager SET name='".$_POST['name']."', name_org='".$_POST['name_org']."', phone='".$_POST['phone']."', email='".$_POST["email"]."' , type_app='".$_POST["type_app"]."', type_print='".$_POST["type_print"]."', resperson='".$_POST["resperson"]."', app='".$_POST["app"]."', data='".$cdate."', sum='".$_POST["sum"]."', oplata='".$_POST["oplata"]."', end_data='".$_POST["end_data"]."' where id='".$_GET['id']."'";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die(mysql_error());
$query = "INSERT INTO who_history SET zayavka= '".$_GET['id']."', who='".$login[0]."', date='".$cdate."', time='".$ctime."', oplata='".$_POST["oplata"]."', resperson='".$_POST["resperson"]."', end_data='".$_POST["end_data"]."'";
mysql_query($query) or die(mysql_error());
/* Закрываем соединение */
mysql_close();
 
/* В случае успешного сохранения выводим сообщение и ссылку возврата */
header("Request-URI: panel.php");
header("Content-Location: panel.php");
header("Location: panel.php");
exit;
 }
else {
    die('access denied!');
}
?>