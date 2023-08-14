<?= $this->extend('Layout/MainTemplate') ?>

<?= $this->section('content') ?>

<p class="fs-3 fw-bolder">Analitik</p>

<div class="card">
    <h5 class="card-header">Rata-rata poin prestasi yang didapat</h5>
    <div class="card-body">
        <div class="card-text fw-light">With supporting text below as a natural lead-in to additional content.</div>
        <div class="card-text mt-3">
            CHART
        </div>
    </div>
</div>

<?= $this->include('Layout/Message') ?>

<?= $this->endSection() ?>