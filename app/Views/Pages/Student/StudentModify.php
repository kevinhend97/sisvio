<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<div style="max-width: 720px;" class="mx-auto">
    <p class="fs-4">FORM SISWA</p>

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
            <label for="nis" class="form-label">NIS</label>
            <input value="<?= getDefault($flash, 'nis') ?>" name="nis" type="text" class="form-control" id="nis" placeholder="Masukan nis siswa" required>
        </div>
        <div class="mb-2">
            <label for="name" class="form-label">Nama Siswa</label>
            <input value="<?= getDefault($flash, 'name') ?>" name="name" type="text" class="form-control" id="name" placeholder="Masukan nama siswa" required>
        </div>
        <div class="mb-2">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select name="gender" class="form-select" id="gender" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" <?= getDefault($flash, 'gender') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= getDefault($flash, 'gender') == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="class" class="form-label">Kelas</label>
            <input value="<?= getDefault($flash, 'class') ?>" name="class" type="text" class="form-control" id="class" placeholder="Masukan kelas siswa" required>
        </div>
        <div class="mb-2">
            <label for="address" class="form-label">Alamat</label>
            <textarea value="<?= getDefault($flash, 'addressx') ?>" name="address" class="form-control" id="address" placeholder="Masukan Alamat" required><?= getDefault($flash, 'address') ?></textarea>
        </div>
        <div class="mb-2">
            <label for="phone" class="form-label">Phone</label>
            <input value="<?= getDefault($flash, 'phone') ?>" type="tel" name="phone" class="form-control" id="phone" placeholder="Masukan Nomor Telp.">
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>