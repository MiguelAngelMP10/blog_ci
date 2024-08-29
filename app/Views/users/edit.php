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

    <form action="/users/update" method="post">
        <?= csrf_field() ?>
        <input type="hidden" class="form-control" name="id"  value="<?= $user['id'] ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="surnames" class="form-label">Surnames</label>
            <input type="text" class="form-control" name="surnames" id="surnames" value="<?= $user['surnames'] ?>"
                   required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="" <?= !isset($user['gender']) ? 'selected' : '' ?>>Open this select menu</option>
                <option value="male" <?= isset($user['gender']) && $user['gender'] == 'male' ? 'selected' : '' ?>>Male
                </option>
                <option value="female" <?= isset($user['gender']) && $user['gender'] == 'female' ? 'selected' : '' ?>>
                    Female
                </option>
                <option value="other" <?= isset($user['gender']) && $user['gender'] == 'other' ? 'selected' : '' ?>>
                    Other
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $user['date_of_birth'] ?>"  required>
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>


<?= $this->endSection() ?>