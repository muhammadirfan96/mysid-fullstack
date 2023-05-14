<?= $this->extend('index'); ?>
<?= $this->section('page'); ?>

<?php

$menuadminweb = [
    'bantuan' => [
        'link' => '/bantuan',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'data_disabilitas' => [
        'link' => '/datadisabilitas',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'data_nkk' => [
        'link' => '/datankk',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'data_penduduk' => [
        'link' => '/datapenduduk',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'data_wilayah' => [
        'link' => '/datawilayah',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'desa' => [
        'link' => '/desa',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'kecamatan' => [
        'link' => '/kecamatan',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'kabupaten' => [
        'link' => '/kabupaten',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'provinsi' => [
        'link' => '/provinsi',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
    'register' => [
        'link' => '/register',
        'bg_src' => "url('img/frontend/help.png')",
        'in_user' => 1,
    ],
];

?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2 flex flex-wrap justify-evenly gap-1">

        <?php foreach ($menuadminweb as $key => $value) : ?>
            <div class="relative w-full md:w-40 xl:w-80 h-32 border-2 border-cyan-900 rounded-md bg-cyan-50 mb-2" style="background-image: <?= $value['bg_src'] ?>; background-size: cover;">
                <a href="<?= base_url($value['link']); ?>" class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-center py-2"><?= $key ?></a>
            </div>
        <?php endforeach ?>

    </div>
</div>

<?= $this->endSection(); ?>