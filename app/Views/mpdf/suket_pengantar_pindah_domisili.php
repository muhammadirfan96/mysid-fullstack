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
        <p style="margin: 0; text-decoration: underline;">SURAT PENGANTAR</p>
        <p style="margin: 0;">Nomor : <?= ' ' . $nomor_surat ?></p>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Yang bertanda tangan dibawah ini Kepala Desa Latompa Kecamatan Maligano Kabupaten Muna menerangkan dengan sebenarnya bahwa :</p>
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
                    <td>Alamat</td>
                    <td>: <?= ' ' . $alamat ?></td>
                </tr>
                <tr>
                    <td>Nomor KK</td>
                    <td>: <?= ' ' . $nkk ?></td>
                </tr>
                <tr>
                    <td>Alamat Tujuan Pindah</td>
                    <td>: <?= ' ' . $alamat_tujuan_pindah ?></td>
                </tr>
                <tr>
                    <td>Alasan Pindah</td>
                    <td>: <?= ' ' . $alasan_pindah ?></td>
                </tr>
                <tr>
                    <td>Pengikut</td>
                    <td>: <?= ' ' . $jml_pengikut ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0;">pengikut keluarga yang pindah</p>
    </div>
    <div style="margin-bottom: 14px;">
        <div>
            <table border="1" cellpadding="10" cellspacing="0" style="width:100%">
                <tr>
                    <td style="width:8%; text-align: center;">No</td>
                    <td style="width:45%; text-align: center;">NIK</td>
                    <td style="width:45%; text-align: center;">Nama</td>
                </tr>

                <?php foreach ($pengikut as $key => $value) : ?>
                    <tr>
                        <td style="width:8%; text-align: center;"><?= $key + 1 ?></td>
                        <td><?= $value[0] ?></td>
                        <td><?= $value[1] ?></td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>
    </div>
    <div style="margin-bottom: 14px;">
        <p style="margin: 0; text-indent: 40px;">Demikian surat pengantar pindah domisili ini dibuat dan diberikan kepada yang bersangkutan untuk digunakan seperlunya.</p>
    </div>
    <div>
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