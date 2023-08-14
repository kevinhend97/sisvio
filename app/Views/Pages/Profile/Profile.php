<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>
<div style="max-width: 720px;" class="mx-auto">
    <p class="fs-3 fw-bolder">PROFILE</p>

    <?= $this->include('Layout/Message') ?>

    <form action="<?= base_url('profile-admin') ?>" method="post">
        <?php
        if (getDefault($flash, 'id') != '') {
        ?>
            <input value="<?= getDefault($flash, 'id') ?>" type="text" name="id" hidden>
        <?php
        }
        ?>
        <div class="mb-2">
            <label for="code" class="form-label">Password Lama</label>
            <input value="" type="text" name="old_password" class="form-control" id="code" placeholder="Masukkan Password Lama" required>
        </div>

        <div class="mb-2">
            <label for="code" class="form-label">Password Baru</label>
            <input value="" type="text" name="new_password" class="form-control" id="code" placeholder="Masukkan Password" required>
        </div>
        <div class="mb-2">
            <label for="title" class="form-label">Re-Password</label>
            <input value="" type="text" name="re_password" class="form-control" id="title" placeholder="Masukan Ulang Password" required>
        </div>
       
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>