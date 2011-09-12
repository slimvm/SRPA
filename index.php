<?php
session_start();
include ('connecttobd.php');

if (isset($_GET['logout']))
{
	if (isset($_SESSION['user_id']))
		unset($_SESSION['user_id']);
		
	setcookie('login', '', 0, "/");
	setcookie('password', '', 0, "/");
	// и переносим его на главную
	header('Location: index.php');
	exit;
}

if (isset($_SESSION['user_id']))
{
	// юзер уже залогинен, перекидываем его отсюда на закрытую страницу
	
	header('Location: panel.php');
	exit;

}
print '
<center>
<br />
<form action="panel.php" method="post">
    <table >
        <tr>
            <td>Login:</td>
            <td><input type="text" name="login" /></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Enter" /></td>
        </tr>
    </table>
</form>
</center>
';
?>
</body>
</html>
