<?= $this->extend('index_admin'); ?>
<?= $this->section('page'); ?>

<?php

$menuadminweb = [
    'data_bantuan_individu' => [
        'link' => '/databantuanindividu',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'data_disabilitas' => [
        'link' => '/datadisabilitas',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'data_nkk' => [
        'link' => '/datankk',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'data_penduduk' => [
        'link' => '/datapenduduk',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'data_wilayah' => [
        'link' => '/datawilayah',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'register' => [
        'link' => '/register',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'berita' => [
        'link' => '/berita',
        'bg_src' => "url('img/frontend/help.png')",
    ],
    'mpdf' => [
        'link' => '/mpdf',
        'bg_src' => "url('img/frontend/help.png')",
    ],
];

?>

<div>
    <div class="bg-cyan-200 rounded-md m-2 p-2 relative">
        <p class="text-center text-lg font-semibold uppercase"><?= $title; ?></p>
    </div>

    <div class="m-2 flex flex-wrap justify-center gap-3">

        <?php foreach ($menuadminweb as $key => $value) : ?>
            <div class="relative w-[48%] md:w-[24%] xl:w-[19%] h-32 border-2 border-cyan-900 rounded-md bg-cyan-50 mb-2" style="background-image: <?= $value['bg_src'] ?>; background-size: cover;">
                <a href="<?= base_url($value['link']); ?>" class="absolute bg-cyan-900 rounded-b-sm w-full bottom-0 text-white text-center py-2"><?= $key ?></a>
            </div>
        <?php endforeach ?>

    </div>
</div>

<?= $this->endSection(); ?>