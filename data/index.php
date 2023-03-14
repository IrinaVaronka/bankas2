<?php

if(!file_exists(__DIR__ . './data.ser')) { //.ser - сами придумали.
    $data = [];
} else {
    $data = file_get_contents(__DIR__ . '/data.ser');
    $data = unserialize($data); // здесь уже массив.
}

echo '<pre>';
print_r($data);

//Добавляем к массиву новый массив:

$data[] = ['number' => rand(100, 999), 'color' => rand(0, 1) ? 'crimson' : 'skyblue'];


//данные переводим в стринг с помощью serialize и записываем в файл через PUT:

$data = serialize($data);
$data = file_put_contents(__DIR__ . '/data.ser', $data);