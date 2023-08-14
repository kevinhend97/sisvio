<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<div style="max-width: 720px;" class="mx-auto">
    <p class="fs-3 fw-bolder">FORM SANKSI</p>

    <?= $this->include('Layout/Message') ?>

    <form action="<?= $data['action'] ?>" method="post">
        <?php
        if (getDefault($flash, 'id') != '') {
        ?>
            <input value="<?= getDefault($flash, 'id') ?>" type="text" name="id" hidden>
        <?php
        }
        ?>

        <div class="mb-2">
            <label for="code" class="form-label">Kode Sanksi</label>
            <input value="<?= getDefault($flash, 'code') ?>" type="text" name="code" class="form-control" id="code" placeholder="Masukan kode pelanggaran (SNK-001)" required>
        </div>
        <div class="mb-2">
            <label for="title" class="form-label">Jenis Sanksi</label>
            <input value="<?= getDefault($flash, 'title') ?>" type="text" name="title" class="form-control" id="title" placeholder="Masukan jenis Sanksi (Sosialisasi)" required>
        </div>
        <div class="mb-2">
            <label for="description" class="form-label">Sanksi</label>
            <textarea name="description" class="form-control" id="description" placeholder="Masukan Sanksi (Skors 2 Minggu)" required><?= getDefault($flash, 'description') ?></textarea>
        </div>
        <div class="mb-2">
            <label for="min_point" class="form-label">Min Point</label>
            <input value="<?= getDefault($flash, 'min_point') ?>" type="number" name="min_point" class="form-control" id="min_point" placeholder="Masukan minimum point" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>