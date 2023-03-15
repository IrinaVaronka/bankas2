<?php
$users = unserialize(file_get_contents(__DIR__ . '/users.ser'));

$page = (int) ($_GET['page'] ?? 1);

$sort = $_GET['sort'] ?? '';    //сортировка;

if ($sort == 'name_asc') {
    usort($users, fn($a, $b) => $a['surname'] <=> $b['name']);
}
elseif ($sort == 'name_desc') {
    usort($users, fn($a, $b) => $b['surname'] <=> $a['name']);
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
    <title>Bankas</title>
</head>

<body>
    <h1>Meniu of Bank</h1>
    <?php require __DIR__ . '/menu.php' ?>

    <form action="" method="get">
        <fieldset>
            <select name="sort">
                <option selected>Open to sort</option>
                <option value="name_asc" <?php if ($sort == 'surname_asc') echo 'selected' ?>>Surname A-Z</option>
                <option value="name_desc" <?php if ($sort == 'surname_desc') echo 'selected' ?>>Surname Z-A</option>
            </select>
            <button type="submit" class="btn btn btn-secondary btn-sm">sort</button>
        </fieldset>

    </form>
    <ul>
        <?php foreach($users as $user) : ?>
            <table class="table table-success table-striped">
            <b>Account number:</b> <?= $user['account-number'] ?> <i><?= $user['name'] ?> <?= $user['surname'] ?></i> <u><?= $user['id'] ?></u>
            <button type="submit" class="btn btn-danger btn-sm">delete</button>
            <form action="http://localhost/bankas2/delete.php?id=<?= $user['id'] ?>" method="post">
    
            </form>
            </table>
        <?php endforeach ?>
    </ul>

  
</body>

</html>