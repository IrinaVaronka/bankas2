<?php
$usersEmp = [
    ['nameEmp' => 'aaa@gmail.com', 'psw' => md5('123')],
    ['nameEmp' => 'bbb@gmail.com', 'psw' => md5('123')],
    ['nameEmp' => 'ccc@gmail.com', 'psw' => md5('123')]
];

file_put_contents(__DIR__ .'/users.json', json_encode($usersEmp));

echo 'All is OK';
