<?php

//��������� ����������
$filename = "addressbook.json";
$jsonInfo = [];

//������ ������ � �����, ��������� � ������
if (file_exists($filename) and !empty($filename)) {
    $data = file_get_contents($filename);
    $jsonInfo = json_decode($data, true) or exit('������ ������������� json');
} else {
    echo '���� ���������� ��� �� ����������.';
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>�������� ������</title>
</head>
<body>
<table border="1" padding="1">

    <?php
    if (!empty ($jsonInfo)) {
        foreach ($jsonInfo as $jInfo) {
            echo '<tr>';
            $firstName = !empty($jInfo['firstName']) ? $jInfo['firstName'] : '-';
            echo '<td>' . $firstName . '</td>';
            $lastName = !empty($jInfo['lastName']) ? $jInfo['lastName'] : '-';
            echo '<td>' . $lastName . '</td>';
            $address = !empty($jInfo['address']) ? $jInfo['address'] : '-';
            echo '<td>' . $address . '</td>';
            $phoneNumber = !empty($jInfo['phoneNumber']) ? $jInfo['phoneNumber'] : '-';
            echo '<td>' . $phoneNumber . '</td>';
            echo '</tr>';
        }
    } else {
        echo '������ �� ���� ��������.';
    }
    ?>
</table>
</body>
</html>