<?php
    session_start();
    $users_ = unserialize(file_get_contents(__DIR__ . '/users.ser'));
    $all = ceil(count($users_) / 10);
?>


<a class="btn btn-info" href="http://localhost/bankas2/create.php">Add new account</a>

<?php
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
        $color = match($msg['type']) {
            'error' => 'crimson',
            'ok' => 'skyblue',
            default => 'gray'
        };
    }
?>

<?php if(isset($msg)) : ?>
<h2 style="color: <?= $color ?>">
    <?= $msg['text'] ?>
</h2>
<?php endif ?>


<!-- <div class="alert alert-success" role="alert" style="color: <?= $color ?>">
    <?= $msg['text'] ?>
</div> -->