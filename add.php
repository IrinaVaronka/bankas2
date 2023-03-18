<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $users = unserialize(file_get_contents(__DIR__ . '/users.ser'));


    foreach ($users as &$user) {
        if ($user['id'] == $id) {
             $add = $_POST['funds'];
             $user['funds'] = $user['funds']  + $add;
            file_put_contents(__DIR__ . '/users.ser', serialize($users));

            break;
        }
    }

    header('Location: http://localhost/bankas2/users.php');
    // die;
}


//GET

$clients = unserialize(file_get_contents(__DIR__ . '/users.ser'));

$id = $_GET['id'];
$find = false;
foreach ($clients as $client) {
    if ($client['id'] == $id) {
        $find = true;
        break;
    }
}

if (!$find) {
    die('user not found');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add funds</title>
</head>
<body>
    <div class="container">
        <form action="?id=<?= $user['user_id'] ?>" method="post">
            <h2>Add funds</h2>
            <input type="text" name="account" class="form-control" value="" placeholder="Account number" required>
            
            <button type="submit" class="btn btn-lg btn-primary btn-block">save</button>
        </form>
    </div>
</body>

</html>