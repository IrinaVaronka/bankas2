<style>
    h5 {
        display: inline-block;
        float: right;
        margin-right: 20px;
        border: solid 1px black;
        padding: 5px;
    }

    .out {
        display: inline-block;
        float: right;
        margin-right: 20px; 
    }
</style>

<?php
    session_start();
    $users_ = unserialize(file_get_contents(__DIR__ . '/users.ser'));
    $all = ceil(count($users_) / 10);
?>


<a class="btn btn-success" href="http://localhost/bankas2/create.php">Add new account</a>
<a class="btn btn-success" href="http://localhost/bankas2/users.php">Menu</a>

<?php if (isset(SESSION['logged']) && $_SESSION['logged'] == 1) : ?>
    <h5><?=$_SESSION['nameEmp'] ?></h5>
    <form action="http://localhost/bankas2/login/?logout" method="post">
        <button class="btn btn-success out" type="submit">LOG OUT</button>
    </form>
    <?php else : ?>    

<a class="btn btn-success" href="http://localhost/bankas2/login.php">LOG IN</a>

<?php endif ?>

<?php
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
        $color = match($msg['type']) {
            'error' => 'crimson',
            'ok' => 'green',
            default => 'gray'
        };
    }
?>

<?php if(isset($msg)) : ?>
<h2 style="color: <?= $color ?>">
    <?= $msg['text'] ?>
</h2>
<?php endif ?>


