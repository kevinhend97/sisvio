<?php

if (!session()->get("nis")) {

    $navItems = [
        [
            'label' => 'Profile',
            'link' => '/profile'
        ],
        [
            'label' => 'Siswa',
            'link' => '/student'
        ],
        [
            'label' => 'Prestasi',
            'link' => '/achievement'
        ],
        [
            'label' => 'Pelanggaran',
            'link' => '/violation'
        ],
        [
            'label' => 'Sanksi',
            'link' => '/penalty'
        ],
    ];
} else {
    $navItems = [
        [
            'label' => 'Profile',
            'link' => '/profile'
        ],
        [
            'label' => 'Siswa',
            'link' => '/student'
        ],
    ];
}


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-lg">

        <!-- Logo -->
        <a class="navbar-brand" href="/student">
            <img src="/logo.png" class="rounded-circle" style="width: 36px;" alt="Avatar" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- List Item -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                foreach ($navItems as $key => $value) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?= isCurrentUrl($value['link']) ? 'active' : '' ?>" href="<?= $value['link'] ?>"><?= $value['label'] ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>

            <!-- Avatar -->
            <?php
            if (getDefault($auth, 'is_login', false)) {
            ?>
                <div class="btn-group">
                    <span class="text-uppercase fw-semibold" style="margin-top: 6px;"><?= getDefault($auth, 'name', '-') ?></span>
                    <button class="dropdown-toggle border-0 bg-transparent" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 32px;" alt="Avatar" />
                    </button>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
                        <!-- <li><a class="dropdown-item" href="/help">Bantuan</a></li> -->
                        <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="/auth/logout">Logout</a></li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <a href="/auth/login?type=admin" class="btn btn-outline-primary px-4">Login</a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>