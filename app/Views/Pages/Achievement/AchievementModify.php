<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<div style="max-width: 720px;" class="mx-auto">
    <p class="fs-3 fw-bolder">FORM PRESTASI</p>

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
            <label for="code" class="form-label">Kode Prestasi</label>
            <input value="<?= getDefault($flash, 'code') ?>" type="text" name="code" class="form-control" id="code" placeholder="Masukan kode prestasi (PRS-001)" required>
        </div>
        <div class="mb-2">
            <label for="title" class="form-label">Judul</label>
            <input value="<?= getDefault($flash, 'title') ?>" type="text" name="title" class="form-control" id="title" placeholder="Masukan judul prestasi (PRESTASI AKADEMIS)" required>
        </div>
        <div class="mb-2">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" id="description" placeholder="Masukan Deskripsi (deskripsi dari title)" required><?= getDefault($flash, 'description') ?></textarea>
        </div>
        <div class="d-flex gap-4">
            <div class="mb-2 flex-fill">
                <label for="min_point" class="form-label">Min Point</label>
                <input value="<?= getDefault($flash, 'min_point') ?>" type="number" name="min_point" class="form-control" id="min_point" placeholder="Masukan minimum point" required>
            </div>
            <div class="mb-2 flex-fill">
                <label for="max_point" class="form-label">Max Point</label>
                <input value="<?= getDefault($flash, 'max_point') ?>" type="number" name="max_point" class="form-control" id="max_point" placeholder="Masukan maximum point" required>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>