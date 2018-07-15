<?php
$link = 'http://api.openweathermap.org/data/2.5/weather';
$apiKey = 'a716ba74a7dc0b2274e512719f0ea72f';
$city = 'Vladivostok,ru';
$apiURL = "{$link}?q={$city}&appid={$apiKey}";

$json = file_get_contents($apiURL) or exit('Не удалось получить данные');
$weather = json_decode($json, true) or exit('Ошибка декодирования json');

function checkData($weather) {
    if (empty($weather)) { return 'не удалось получить данные'; }
    return $weather;}

$celsius = 273.15;
$pathx = "http://openweathermap.org/img/w/";
$file = $weather['weather'][0]['icon'];
?>

<html>
<head>
    <title>Погода в городе <?php echo $weather['name'] ?></title>
    <style>
        table {
            width: 100%;
        }
        table tr {
            text-align: center;
        }
        table td img {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<h1>Текущая погода в городе <?php echo $weather['name'] ?></h1>
<table border="1">
    <tr>
        <th>Текущие погодные условия</th>
        <th>Температура воздуха, °C</th>
        <th>Скорость ветра, м/с</th>
        <th>Уровень влажности, %</th>
        <th>Атмосферное давление, мбар</th>
    </tr>
    <tr>
        <td><?php echo '<img src="'.$pathx.$file.'.png">' . '<b>' . checkData($weather['weather'][0]['description']) . '</b>'?></td>
        <td><?php echo checkData(((int)$weather['main']['temp']-$celsius))?></td>
        <td><?php echo checkData($weather['wind']['speed']) ?></td>
        <td><?php echo checkData($weather['main']['humidity'])?></td>
        <td><?php echo checkData($weather['main']['pressure'])?></td>
    </tr>
</table>
</body>
</html>
