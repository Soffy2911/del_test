<?php
$connection = mysqli_connect("localhost","root","","clubbase");
if( $connection == false )
{
    echo 'Не вдалося підключитися до бази даних';
    echo mysqli_connect_error(); //вывод ошибки почему не подключилось
    exit();
}

/* Заход с одного из устройств */
function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}