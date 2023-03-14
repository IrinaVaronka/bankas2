<?php

function getUnique($to)
{
    static $ids = [];
    do {
        $id = rand(1, $to);
    } while(in_array($id, $ids));
    $ids[] = $id;
    return $id;
}



$users = array_map(fn($_) => ['user_id' => getUnique(100), 'account' => getUnique(100)], range(1, 5));

usort($users, fn($a, $b) => $a['user_id'] <=> $b['user_id']);

$users = array_map(function($user) {
    $user['name'] = '';
    $user['surname'] = '';
    $user['account'] = getUnique(100);
    return $user;
}, $users);

file_put_contents(__DIR__ . '/users.ser', serialize($users));

echo '<pre>';
print_r($users);
