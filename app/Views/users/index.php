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
<a href="users/create" class="btn btn-sm btn-outline-info" role="button"><i class="fa-solid fa-plus"></i> Create
    user</a>

<table class="table hover" id="usersTable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th>Email</th>
        <th>Name</th>
        <th>Surnames</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th scope="col" class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $key => $user): ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><?= $user['email'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['surnames'] ?></td>
            <td><?= $user['gender'] ?></td>
            <td><?= $user['date_of_birth'] ?></td>
            <td class="text-center">
                <a href="users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-outline-primary" role="button"><i
                            class="fa-regular fa-pen-to-square"></i> Edit</a>
                <a href="users/delete/<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger"
                   onclick="return confirm('Are you sure?')" role="button"><i class="fa-solid fa-trash-can"></i> Delete
                </a>
                <a href="users/show/<?= $user['id'] ?>" class="btn btn-sm btn-outline-secondary" role="button"><i
                            class="fa-regular fa-eye"></i> View</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            responsive: true,
        });
    });
</script>


<?= $this->endSection() ?>


