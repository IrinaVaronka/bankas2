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


// function checkName(){
//     $errors= ' ';
//     foreach($users as $k => $v) {
//         if (strlen($name) > 3) {
//     $errors .= "<li>Name should be more then 3 characters</li>";
//         }
//     }
//     return $errors;
// }

function funds() {
    $balance = rand(0,3000);
    return $balance;
}

$nameLen = strlen ($_POST ["name"]);  
$length = strlen($nameLen);  
  
if ( $length < 3) {  
    $ErrMsg = "Name must have min 3 digits.";  
            echo $ErrMsg;  
} else {  
    echo "Your name is: " .$nameLen;  
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

