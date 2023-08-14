<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>
<div style="max-width: 720px;" class="mx-auto">
    <p class="fs-3 fw-bolder">PROFILE</p>

    <?= $this->include('Layout/Message') ?>
  
    <form action="<?= base_url('profile-siswa') ?>" method="post">
        <?php
        if (getDefault($flash, 'id') != '') {
        ?>
            <input value="<?= getDefault($flash, 'id') ?>" type="text" name="id" hidden>
        <?php
        }
        ?>
        <div class="mb-2">
            <label for="code" class="form-label">Alamat Siswa</label>
            <textarea name="address" class="form-control" placeholder="Alamat Siswa" required id="" cols="30" rows="5"><?=$data['address']?></textarea>
        </div>

        <div class="mb-2">
            <label for="code" class="form-label">No Hp</label>
            <input value="<?=$data['phone']?>" type="text" name="phone" class="form-control" id="code" placeholder="No Hp" required>
        </div>
       
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>