<?php



if(!file_exists(__DIR__ . '/data.ser')) { 
    $data = [];
} else {
    $data = file_get_contents(__DIR__ . '/data.ser');
    $data = unserialize($data); 
}

echo '<pre>';
print_r($data);

//Добавляем к массиву новый массив:

$data[] = ['name' => 1, 'surname' => 1, 'account-number' => 1, 'id' => 1];


//данные переводим в стринг с помощью serialize и записываем в файл через PUT:

$data = serialize($data);
$data = file_put_contents(__DIR__ . '/data.ser', $data);
