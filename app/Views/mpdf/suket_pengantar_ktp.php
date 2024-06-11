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
                <p style="margin: 0;">KECAMATAN BONE</p>
                <p style="margin: 0;">DESA BHONE KAINSETALA</p>
            </div>
            <p style="margin: 0;">Alamat : Dusun 1 Desa Bhone Kainsetala Kode Pos 93663</p>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 14px;">
        <p style="margin: 0; text-decoration: underline;">SURAT KETERANGAN</p>
        <p style="margin: 0;">Nomor : <?= ' ' . $nomor_surat ?></p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Yang bertanda tangan dibawah ini Kepala Desa Bhone Kainsetala Kecamatan Bone Kabupaten Muna menerangkan dengan sebenarnya bahwa :</p>
    </div>
    <div style="margin-bottom: 14px;">
        <div style="margin-left: 40px;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: <?= ' ' . $nama ?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: <?= ' ' . $nik ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>: <?= ' ' . $ttl ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?= ' ' . $jk ?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>: <?= ' ' . $agama ?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>: <?= ' ' . $pekerjaan ?></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>: <?= ' ' . $golongan_darah ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Bahwa oknum yang namanya tersebut di atas benar-benar penduduk Desa kami dan mohon kiranya untuk dapat dilayani dalam Pembuatan / perekaman E-KTP.</p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Demikian surat keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk digunakan seperlunya.</p>
    </div>
    <div>
        <div style="width: 45%; float: right; text-align: center;">
            <div style="height: 70px;">
                <p style="margin: 0;">Bhone Kainsetala, <?= ' ' . $tanggal ?></p>

                <?php if ($oleh == 'kades') : ?>
                    <p style="margin: 0;">Kepala Desa Bhone Kainsetala</p>
                <?php endif ?>
                <?php if ($oleh == 'sekretaris') : ?>
                    <p style="margin: 0;">an. Kepala Desa Bhone Kainsetala</p>
                    <p style="margin: 0;">Sekretaris</p>
                <?php endif ?>

            </div>
            <div style="width: 60px; height: 60px; margin: auto;"></div>

            <?php if ($oleh == 'kades') : ?>
                <p style="margin: 0;">Marwan, SE</p>
            <?php endif ?>
            <?php if ($oleh == 'sekretaris') : ?>
                <p style="margin: 0;">Alwis</p>
            <?php endif ?>

        </div>
    </div>
</body>

</html>