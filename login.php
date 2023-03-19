<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $usersEmp = json_decode(file_get_contents(__DIR__ . '/db/users.json'), 1);

    if(isset($_GET['logout'])){
        unset($_SESSION['logged'], $_SESSION['nameEmp']);
        header('Location: http://localhost/bankas2/login/');
        die;
    }

    foreach($usersEmp as $userEmp) {
        if ($userEmp['nameEmp'] == $_POST['nameEmp'] && $userEmp['psw'] == md5($_POST['psw'])) {
            $_SESSION['logged'] = 1;
            $_SESSION['nameEmp'] = $userEmp['nameEmp'];
            $_SESSION['msg'] = ['type' => 'ok', 'text' => 'Аuthorization was successful'];
            header('Location: http://localhost/bankas2/users.php/');
            die;
        }
    }
    $_SESSION['msg'] = ['type' => 'error', 'text' => 'Login failed'];
    header('Location: http://localhost/bankas/login.php/');
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
    <title>Log in for employees</title>
</head>
<body>
<?php require __DIR__ . '/menu.php' ?>
<div class="container">
        <form action="" class="form-create" method="post">
            <h2>Log in for employees</h2>
            <input type="text" name="nameEmp" class="form-control" placeholder="E-mail" required>
            <input type="password" name="psw" class="form-control" placeholder="Password" required>
            
            <button type="submit" class="btn btn-lg btn-primary btn-block">Enter</button>
        </form>
    </div>
</body>

</html>