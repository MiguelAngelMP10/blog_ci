<?= $this->extend('default') ?>

<?= $this->section('content') ?>


<?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
    <div class="alert alert-info" role="alert">
        <?= session()->getFlashdata('error') ?>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
    <a href="blogs/create" class="btn btn-primary" role="button">Create blog</a>

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
        <?php foreach ($blogs as $key => $blog): ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $blog['email'] ?></td>
                <td><?= $blog['title'] ?></td>
                <td><?= $blog['content'] ?></td>
                <td>
                    <a href="blogs/edit/<?= $blog['id'] ?>" class="btn btn-primary" role="button">Edit</a>
                    <a href="blogs/delete/<?= $blog['id'] ?>" class="btn btn-danger"
                       onclick="return confirm('Are you sure?')" role="button">Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>