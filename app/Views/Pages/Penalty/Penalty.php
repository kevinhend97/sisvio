<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<p class="fs-3 fw-bolder">DATA SANKSI</p>

<?= $this->include('Layout/Message') ?>

<?php
if (getDefault($auth, 'is_login', false)) {
?>
    <div class="d-flex justify-content-end mb-4">
        <a type="button" class="btn btn-outline-success mx-3" href="/penalty/create">Tambah Data</a>
    </div>

<?php
}
?>

<table class="table table-striped table-hover">
    <tr>
        <th>KODE SANKSI</th>
        <th>TINDAK LANJUT</th>
        <th>HUKUMAN</th>
        <th>POIN</th>
        <th>JUMLAH PELANGGAR</th>
        <th>TANGGAL</th>
        <th>AKSI</th>
    </tr>
    <?php
    foreach ($data as $key => $value) {
    ?>
        <tr>
            <td><?= $value['code'] ?></td>
            <td><?= $value['title'] ?></td>
            <td>
                <div class="text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $value['description'] ?>">
                    <?= $value['description'] ?>
                </div>
            </td>
            <td><?= $value['min_point'] ?></td>
            <td><?= $value['count'] ?></td>
            <td><?= date_format(date_create($value['created_at']), 'd F Y') ?></td>
            <td>
                <div class="d-flex gap-2">
                    <a type="button" class="btn btn-sm btn-outline-primary" href="/penalty/update/<?= $value['code'] ?>">Edit</a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal_message" onclick="showMessage({title: 'Hapus Data', body: 'Apakah anda yakin untuk menghapus data?'}, '/penalty/delete/<?= $value['code'] ?>')">Delete</button>
                </div>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<?= $this->endSection() ?>