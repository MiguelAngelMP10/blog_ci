<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="row  g-4">
        <?php foreach ($posts as $key => $post): ?>
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?= $post['title'] ?></h5>
                        <strong class="card-title">Owner: <?= $post['email'] ?></strong>
                        <a href="posts/show/<?= $post['id'] ?>" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square" ></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

<?= $this->endSection() ?>