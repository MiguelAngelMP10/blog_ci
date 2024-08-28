<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="row">
        <?php foreach ($blogs as $key => $blog): ?>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?= $blog['title'] ?></h5>
                        <strong class="card-title">Owner: <?= $blog['email'] ?></strong>
                        <p class="card-text">Content: <?= $blog['content'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?= $this->endSection() ?>