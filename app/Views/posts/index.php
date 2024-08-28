<?= $this->extend('default') ?>

<?= $this->section('content') ?>


<?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
    <div class="alert alert-info" role="alert">
        <?= session()->getFlashdata('error') ?>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
    <a href="posts/create" class="btn btn-primary" role="button">Create blog</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Propietario</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $key => $post): ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $post['email'] ?></td>
                <td><?= $post['title'] ?></td>
                <td><?= $post['content'] ?></td>
                <td>
                    <a href="posts/edit/<?= $post['id'] ?>" class="btn btn-primary" role="button">Edit</a>
                    <a href="posts/delete/<?= $post['id'] ?>" class="btn btn-danger"
                       onclick="return confirm('Are you sure?')" role="button">Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>