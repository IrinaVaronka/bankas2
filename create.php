<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $users = unserialize(file_get_contents(__DIR__ . '/users.ser'));

    


    $user = [
        'id' => (int) $_POST['id'],
        'account' => (int) $_POST['account'],
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
       
    ];

    $users[] = $user;

    $users = serialize($users);
    file_put_contents(__DIR__ . '/users.ser', $users);

    $_SESSION['msg'] = ['type' => 'ok', 'text' => 'New account was created'];
    header('Location: http://localhost/bankas2/users.php'); 
    die;
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
    <title>Create</title>
</head>
<body>
    <div class="container">
        <form action="" class="form-create" method="post">
            <h2>Create new account</h2>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="text" name="surname" class="form-control" placeholder="Surname" required>
            <input type="text" name="account" class="form-control" placeholder="Account number" required>
            <input type="text" name="id" class="form-control" placeholder="Personal identification number" required>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Add new account</button>
        </form>
    </div>
</body>

</html>