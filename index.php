<?php

//назначаем переменные
$filename = "addressbook.json";
$jsonInfo = [];

//читаем данные с файла, сохраняем в массив
if (file_exists($filename) and !empty($filename)) {
    $data = file_get_contents($filename);
    $jsonInfo = json_decode($data, true) or exit('Ошибка декодирования json');
} else {
    echo 'Файл недоступен или не существует.';
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашняя работа</title>
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
        echo 'Данные не были получены.';
    }
    ?>
</table>
</body>
</html>