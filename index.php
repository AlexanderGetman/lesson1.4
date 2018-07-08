<?php
$json = '{"coord":{"lon":131.89,"lat":43.12},"weather":[{"id":801,"main":"Clouds","description":"few clouds","icon":"02n"}],"base":"stations","main":{"temp":287.15,"pressure":1016,"humidity":71,"temp_min":287.15,"temp_max":287.15},"visibility":10000,"wind":{"speed":3,"deg":210},"clouds":{"all":20},"dt":1530961200,"sys":{"type":1,"id":7251,"message":0.0221,"country":"RU","sunrise":1530906018,"sunset":1530960848},"id":2013348,"name":"Vladivostok","cod":200}';

$weather = json_decode($json, true);
$celsius = 273.15;
$pathx = "http://openweathermap.org/img/w/";
$file = $weather['weather'][0]['icon'];


//echo '<h1>' . 'Current weather in ' . $weather['name'] . '</h1>'; echo '</br>';
//echo 'The temperature is ' . ((int)$weather['main']['temp']-$celsius) . ' °C'; echo '</br>';
//echo 'Weather condition: ' . '<b>' . $weather['weather'][0]['description'] . '</b>' . '<img src="'.$pathx.$file.'.png">'; echo '</br>';
//echo 'Speed of wind is ' . $weather['wind']['speed'] . ' m/s'; echo '</br>';
//echo 'Humidity ' . $weather['main']['humidity'] . ' %'; echo '</br>';
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
        <td><?php echo '<img src="'.$pathx.$file.'.png">' . '<b>' . $weather['weather'][0]['description'] . '</b>'?></td>
        <td><?php echo ((int)$weather['main']['temp']-$celsius)?></td>
        <td><?php echo $weather['wind']['speed']?></td>
        <td><?php echo $weather['main']['humidity']?></td>
        <td><?php echo $weather['main']['pressure']?></td>
    </tr>
</table>
</body>
</html>