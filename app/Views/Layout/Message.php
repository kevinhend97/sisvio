<?php
if (isset($flash['message_error'])) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $flash['message_error'] ?>
    </div>
<?php
}
?>

<?php
if (isset($flash['message_success'])) {
?>
    <div class="alert alert-success" role="alert">
        <?= $flash['message_success'] ?>
    </div>
<?php
}
?>