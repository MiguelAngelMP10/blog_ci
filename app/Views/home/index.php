<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="row">
        <?php foreach ($posts as $key => $post): ?>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?= $post['title'] ?></h5>
                        <strong class="card-title">Owner: <?= $post['email'] ?></strong>
                        <p class="card-text">Content: <?= $post['content'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?= $this->endSection() ?>