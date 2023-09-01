<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suket_kenal_lahir</title>
</head>

<body>
    <div style="text-align: center; border-bottom: 1px solid black; margin-bottom: 14px;">
        <div style="width: 12%; height: 85px; float: left; margin-bottom: 4px;">
            <img src="img/frontend/logo_kabupaten.png">
        </div>
        <div style="width: 75%;">
            <div style="font-weight: bold;">
                <p style="margin: 0;">PEMERINTAH KABUPATEN MUNA</p>
                <p style="margin: 0;">KECAMATAN MALIGANO</p>
                <p style="margin: 0;">DESA LATOMPA</p>
            </div>
            <p style="margin: 0;">Alamat : Jalan Poros Maligano - Labuan KM 5 Kode Pos 93675</p>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 14px;">
        <p style="margin: 0; text-decoration: underline;">SURAT KETERANGAN KENAL LAHIR</p>
        <p style="margin: 0;">Nomor : <?= ' ' . $nomor_surat ?></p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Yang bertanda tangan di bawah ini, Kepala Desa Latompa Kecaamatan Maligano Kab. Muna menerangkan berdasarkan keterangan dari :</p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; font-weight: bold;">Ayah Kandung</p>
        <div style="margin-left: 40px;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= ' ' . $nama_ayah ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl lahir</td>
                    <td>: <?= ' ' . $ttl_ayah ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: <?= ' ' . $agama_ayah ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: <?= ' ' . $pekerjaan_ayah ?></td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td>: <?= ' ' . $nik_ayah ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat_ayah ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; font-weight: bold;">Ibu Kandung</p>
        <div style="margin-left: 40px;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= ' ' . $nama_ibu ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl lahir</td>
                    <td>: <?= ' ' . $ttl_ibu ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: <?= ' ' . $agama_ibu ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: <?= ' ' . $pekerjaan_ibu ?></td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td>: <?= ' ' . $nik_ibu ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat_ibu ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-left: 40px; margin-bottom: 14px;">
        <p style="margin: 0; font-weight: bold;">Telah lahir seorang anak</p>
        <div>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= ' ' . $nama_anak ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tgl lahir</td>
                    <td>: <?= ' ' . $ttl_anak ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?= ' ' . $jk_anak ?></td>
                </tr>
                <tr>
                    <td>Anak ke</td>
                    <td>: <?= ' ' . $anak_ke ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat_anak ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya</p>
    </div>
    <div>
        <div style="width: 45%; float: left; text-align: center;">
            <div style="height: 70px;">
                <p style="margin: 0; line-height: 50px;">Pelapor</p>
            </div>
            <div style="width: 60px; height: 60px; margin: auto;"></div>
            <p style="margin: 0;"><?= $nama_ayah ?></p>
        </div>
        <div style="width: 45%; float: right; text-align: center;">
            <div style="height: 70px;">
                <p style="margin: 0;">Latompa, <?= ' ' . $tanggal ?></p>

                <?php if ($oleh == 'kades') : ?>
                    <p style="margin: 0;">Kepala Desa Latompa</p>
                <?php endif ?>
                <?php if ($oleh == 'sekretaris') : ?>
                    <p style="margin: 0;">an. Kepala Desa Latompa</p>
                    <p style="margin: 0;">Sekretaris</p>
                <?php endif ?>

            </div>
            <div style="width: 60px; height: 60px; margin: auto;"></div>

            <?php if ($oleh == 'kades') : ?>
                <p style="margin: 0;">Liston, S.S, B.Th.</p>
            <?php endif ?>
            <?php if ($oleh == 'sekretaris') : ?>
                <p style="margin: 0;">Muhammad Izar, S.T.</p>
            <?php endif ?>

        </div>
    </div>
</body>

</html>