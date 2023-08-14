<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<form action="/student/<?= $data['code'] ?>/achievement" method="post">
    <div class="container mx-auto" style="max-width: 720px;" x-data="{
        isOpenTable: false, point: '', achievementID: '',
        openTable() {
            if (!this.point) {
                return;
            }

            this.isOpenTable = true;
        }
    }">
        <div class="fs-4 fw-bolder mb-4 text-uppercase">PRESTASI <?= $data['user']['name'] ?></div>

        <?= $this->include('Layout/Message') ?>

        <div>
            <div class="mb-2">
                <label for="point" class="form-label">Jumlah poin prestasi siswa</label>
                <input x-model="point" name="point" type="number" class="form-control" id="point" placeholder="Masukan poin" required>
            </div>
        </div>

        <table class="table table-borderless table-hover" x-show="isOpenTable">
            <tr>
                <th>PILIH</th>
                <th>JUDUL PRESTASI</th>
                <th>DESCRIPTION</th>
                <th>POIN</th>
            </tr>
            <?php
            foreach ($data['achievements'] as $key => $value) {
            ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" x-model="achievementID" value="<?= $value['id'] ?>" type="radio" name="achievement_id" required>
                        </div>
                    </td>
                    <td><?= $value['title'] ?></td>
                    <td>
                        <div class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $value['description'] ?>">
                            <?= $value['description'] ?>
                        </div>
                    </td>
                    <td><?= $value['min_point'] . ' - ' . $value['max_point'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="d-flex gap-3 justify-content-end mt-3">
            <button type="button" class="btn btn-primary" @click="openTable" x-show="!isOpenTable">Selanjutnya</button>
            <button type="button" class="btn btn-warning" @click="isOpenTable = false" x-show="isOpenTable">Kembali</button>
            <button type="submit" class="btn btn-primary" x-show="isOpenTable && achievementID != ''">Simpan</button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>