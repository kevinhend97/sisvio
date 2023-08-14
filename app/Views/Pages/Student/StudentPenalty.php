<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<form action="/student/<?= $data['code'] ?>/penalty" method="post">
    <div class="container mx-auto" style="max-width: 720px;" x-data="{penaltyID: ''}">
        <div class="fs-4 fw-bolder mb-4 text-uppercase">SANKSI <?= $data['user']['name'] ?></div>

        <?= $this->include('Layout/Message') ?>

        <table class="table table-borderless table-hover">
            <tr>
                <th>PILIH</th>
                <th>TINDAK LANJUT</th>
                <th>HUKUMAN</th>
                <th>POIN</th>
            </tr>
            <?php
            foreach ($data['penalties'] as $key => $value) {
            ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" x-model="penaltyID" value="<?= $value['id'] ?>" type="radio" name="penalty_id" required>
                        </div>
                    </td>
                    <td><?= $value['title'] ?></td>
                    <td>
                        <div class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $value['description'] ?>">
                            <?= $value['description'] ?>
                        </div>
                    </td>
                    <td><?= $value['min_point'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="d-flex gap-3 justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>