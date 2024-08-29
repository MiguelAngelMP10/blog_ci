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

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="surnames" class="form-label">Surnames</label>
        <input type="text" class="form-control" name="surnames" id="surnames" value="<?= $user['surnames'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender" disabled>
            <option value="" <?= !isset($user['gender']) ? 'selected' : '' ?>>Open this select menu</option>
            <option value="male" <?= isset($user['gender']) && $user['gender'] == 'male' ? 'selected' : '' ?>>Male
            </option>
            <option value="female" <?= isset($user['gender']) && $user['gender'] == 'female' ? 'selected' : '' ?>>
                Female
            </option>
            <option value="other" <?= isset($user['gender']) && $user['gender'] == 'other' ? 'selected' : '' ?>>Other
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" disabled>
    </div>

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
               value="<?= $user['date_of_birth'] ?>" disabled>
    </div>


<?= $this->endSection() ?>