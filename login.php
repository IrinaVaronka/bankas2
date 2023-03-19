




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Log in in Bank</title>
</head>
<body>
<?php require __DIR__ . '/menu.php' ?>
    <div class="container">
        <form class="form-signin" action="?id=<?= $user['id'] ?>" method="post">
            <h2>Log in</h2>
            <label>User`s name: </label>
            <input type="text" name="name" class="form-control" readonly value="<?= $user['name'] ?>">
            <label>User`s surname: </label>
            <input type="text" name="name" class="form-control" readonly value="<?= $user['surname'] ?>">
            <label>Add funds, EUR: </label>
            <input type="text" name="" class="form-control"  value="<?= $user['amount'] ?>">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Add</button>
        </form>
    </div>
</body>

</html>