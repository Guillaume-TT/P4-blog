<?php $this->title = 'Se connection';
var_dump($_SESSION);
if (isset($message)) { ?>

<div class="my-2 alert alert-<?= $messageType ?>" role="alert">
    <?= $message ?>
</div>

<?php }
if (!isset($_SESSION['id'])) { ?>

<form class="mb-2" method="post" action="">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="******">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Se connecter">
</form>

<?php
} else { ?>
    <script>window.location = "index.php?page=admin"</script>
<?php } ?>