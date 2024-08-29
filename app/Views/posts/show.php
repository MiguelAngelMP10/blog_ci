<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-warning" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>


<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <p><?php echo esc($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <h1><?= $user['title'] ?></h1>

<?= $user['content'] ?>

<?= $this->endSection() ?>