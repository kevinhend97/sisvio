<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<div class="fs-3 fw-bolder">DATA SISWA</div>

<div class="d-flex justify-content-between mb-2 mt-3">
    <form action="/student" method="get" style="width: 420px;">
        <div class="input-group mb-3">
            <input type="text" name="search" value="<?= getDefault($query, 'search') ?>" class="form-control" placeholder="Search">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                <i data-feather="search"></i>
            </button>
        </div>
    </form>
    <div>
        <?php
        if (getDefault($auth, 'is_login', false)) {
        ?>
            <?php if ((!session()->get("nis"))) : ?>
                <a type="button" class="btn btn-outline-success mx-3" href="/student/create">Tambah Data</a>
            <?php endif; ?>
        <?php
        }
        ?>
    </div>
</div>

<table class="table table-striped table-hover">
    <tr>
        <th>NIS</th>
        <th>NAMA SISWA</th>
        <th>JENIS KELAMIN</th>
        <th>KELAS</th>
        <th>SKOR PRESTASI</th>
        <th>SKOR PELANGGARAN</th>
        <th>SANKSI</th>
        <th>POIN SEKARANG</th>
        <?php
        if (getDefault($auth, 'is_login', false)) {
        ?>
            <?php if ((!session()->get("nis"))) : ?>
                <th>AKSI</th>
            <?php endif; ?>
        <?php
        }
        ?>
    </tr>
    <?php
    foreach ($data['students'] as $key => $value) {
        $penalties = implode(', ', array_map(function ($item) {
            return $item['title'];
        }, $value['penalties']));
    ?>
        <tr>
            <td><?= $value['nis'] ?></td>
            <td><?= $value['name'] ?></td>
            <td><?= $value['gender'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
            <td><?= $value['class'] ?></td>
            <td>
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?= labelsPoints($value['achievements'], 'poin untuk prestasi') ?>">
                    <i data-feather="eye" class="size-small mb-1" style="margin-right: 6px;"></i>
                    <?= $value['sum_achievement'] == '' ? '0' : $value['sum_achievement'] ?>
                </div>
            </td>
            <td>
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="<?= labelsPoints($value['violations'], 'poin untuk pelanggaran') ?>">
                    <i data-feather="eye" class="size-small mb-1" style="margin-right: 6px;"></i>
                    <?= $value['sum_violation'] == '' ? '0' : $value['sum_violation'] ?>
                </div>
            </td>
            <td>
                <div class="text-truncate" style="max-width: 150px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $penalties ?>">
                    <?= $penalties == '' ? '-' : $penalties ?>
                </div>
            </td>
            <td><?= $value['sum_achievement'] - $value['sum_violation'] ?></td>
            <?php
            if (getDefault($auth, 'is_login', false)) {
            ?>
                <?php if ((!session()->get("nis"))) : ?>
                    <td>
                        <div>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <!-- <li><button class="dropdown-item">Detail Data Siswa</button></li> -->
                                    <li><a class="dropdown-item" href="/student/update/<?= $value['nis'] ?>">Edit Data Siswa</a></li>
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_message" onclick="showMessage({title: 'Hapus Data', body: 'Apakah anda yakin untuk menghapus data?'}, '/student/delete/<?= $value['nis'] ?>')">Hapus Data Siswa</button></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/student/<?= $value['nis'] ?>/achievement">Tambah Prestasi</a></li>
                                    <li><a class="dropdown-item" href="/student/<?= $value['nis'] ?>/violation">Tambah Pelanggaran</a></li>
                                    <li><a class="dropdown-item" href="/student/<?= $value['nis'] ?>/penalty">Tambah Sanksi</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                <?php endif; ?>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table>
<div class="d-flex justify-content-end">
    <nav>
        <ul class="pagination">
            <li class="page-item <?= $data['page'] == 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="/student?search=<?= getDefault($query, 'search') ?>&limit=<?= $data['limit'] ?>&page=<?= $data['page'] - 1 ?>">Previous</a>
            </li>
            <?php
            for ($i = 1; $i <= $data['count_page']; $i++) {
            ?>
                <li class="page-item <?= $data['page'] == $i ? 'active' : '' ?>">
                    <a class="page-link" href="/student?search=<?= getDefault($query, 'search') ?>&limit=<?= $data['limit'] ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php
            }
            ?>
            <li class="page-item <?= $data['page'] == $data['count_page'] ? 'disabled' : '' ?>">
                <a class="page-link" href="/student?search=<?= getDefault($query, 'search') ?>&limit=<?= $data['limit'] ?>&page=<?= $data['page'] + 1 ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

<?= $this->endSection() ?>