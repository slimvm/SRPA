<?php
if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5($_POST['password']);

    // ������ ������ � ��
    // � ���� ����� � ����� ������� � �������

    $query = "SELECT id
            FROM users
            WHERE login='".$login."' AND password='".$password."'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

    // ���� ����� ������������ �������
    if (mysql_num_rows($sql) == 1) {
        // �� �� ������ �� ���� ����� � ������ (�������� �� ����� ������� ID ������������)

        $row = mysql_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];

        // �� ��������, ��� ��� ������ � ����������� �������, � ��� � ������ ������� ������ �������������� session_start();
    }
    else {
        die('����� ����� � ������� �� ������� � ���� ������.');
    }
}
?>