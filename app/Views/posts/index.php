<?= $this->extend('default') ?>

<?= $this->section('content') ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>

<?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
    <div class="alert alert-info" role="alert">
        <?= session()->getFlashdata('error') ?>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
    <a href="posts/create" class="btn btn-sm btn-outline-info" role="button"><i class="fa-solid fa-plus"></i> Create post</a>

    <table class="table hover" id="postsTable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Owner</th>
            <th scope="col">Title</th>
            <th scope="col">Created at</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $key => $post): ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $post['email'] ?></td>
                <td><?= $post['title'] ?></td>
                <td><?= $post['created_at_formatted'] ?></td>
                <td class="text-center">
                    <a href="posts/edit/<?= $post['id'] ?>" class="btn btn-sm btn-outline-primary" role="button"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                    <a href="posts/delete/<?= $post['id'] ?>" class="btn btn-sm btn-outline-danger"
                       onclick="return confirm('Are you sure?')" role="button"><i class="fa-solid fa-trash-can"></i> Delete
                    </a>
                    <a href="posts/show/<?= $post['id'] ?>" class="btn btn-sm btn-outline-secondary" role="button"><i class="fa-regular fa-eye"></i> View</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#postsTable').DataTable({
                responsive: true,
            });
        });
    </script>

<?= $this->endSection() ?>