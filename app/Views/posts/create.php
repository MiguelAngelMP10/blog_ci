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

    <form action="/posts/store" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <script src="https://cdn.tiny.cloud/1/g4yt69x5u6xk2xy8arzutzqu1pj8vytojpeb8nxxpllczh5i/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
        });
    </script>

<?= $this->endSection() ?>