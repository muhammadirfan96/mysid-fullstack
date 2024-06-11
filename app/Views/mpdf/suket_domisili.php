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
                <p style="margin: 0;">KECAMATAN BHONE</p>
                <p style="margin: 0;">DESA BHONE KAINSETALA</p>
            </div>
            <p style="margin: 0;">Alamat : Dusun 1 Desa Bhone Kainsetala Kode Pos 93663</p>
        </div>
    </div>
    <div style="text-align: center; margin-bottom: 14px;">
        <p style="margin: 0; text-decoration: underline;">SURAT KETERANGAN DOMISILI</p>
        <p style="margin: 0;">Nomor : <?= ' ' . $nomor_surat ?></p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Kepala Desa Bhone Kainsetala Kecamatan Bhone Kabupaten Muna, dengan ini menyatakan bahwa :</p>
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
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Adalah benar bahwa <?= ' ' . $nama ?> berdomisili di <?= ' ' . $alamat ?> Desa Bhone Kainsetala Kecamatan Maligano Kabupaten Muna.</p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Demikian Surat Keterangan ini kami buat dengan sebenarnya agar yang berkepentingan menjadi maklum dan dapat dipergunakan sebagaimana mestinya.</p>
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