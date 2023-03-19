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

// function randString()
// {
//     $letters = range('a', 'z');
//     $out = '';
//     foreach(range(1, rand(5, 15)) as $_) {
//         $out .= $letters[rand(0, count($letters) - 1 )];
//     }
//     return $out;
// }

// function accNumber(){
//     $countryCode  = 'LT';
//     $controlDigits = '60';
//     $bankCode = '10100';
//     $accNumb = str_pad(mt_rand(0, 99999999999), 11, STR_PAD_LEFT);
//     $acc_num = $countryCode . $controlDigits  . $bankCode . $accNumb;
//     return $acc_num;
// }




function funds() {
    $balance = rand(0,3000);
    return $balance;
}
 

$users = array_map(fn($_) => ['id' => getUnique(100)]);

usort($users, fn($a, $b) => $a['id'] <=> $b['id']);

$users = array_map(function($user) {
    $user['name'] = ' ';
    $user['surname'] = ' ';
    $user['id'] = ' ';
    $user['account'] = accNumber();
    $user['amount'] = funds();
    return $user;
}, $users);

file_put_contents(__DIR__ . '/users.ser', serialize($users));

echo '<pre>';
print_r($users);

