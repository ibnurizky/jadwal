<h1>Dashboard</h1>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="mt-4">Jadwal Desain Grafis</h1>
        <table class="table table-responsive table table-hover mt-3">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <?php foreach ($desain as $d) { ?>
            <tr>
                <td><?= $d['nim']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['kd_matkul']; ?></td>
                <td><?= $d['nm_matkul']; ?></td>
                <td><?= $d['hari']; ?></td>
                <td><?= $d['jam']; ?></td>
            </tr>
        <?php } ?>
        </table>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h1 class="mt-4">Jadwal Pemrograman Mobile Android</h1>
        <table class="table table-responsive table table-hover mt-3">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode Matkul</th>
            <th>Nama Matkul</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <?php foreach ($mobile as $m) { ?>
            <tr>
                <td><?= $m['nim']; ?></td>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['kd_matkul']; ?></td>
                <td><?= $m['nm_matkul']; ?></td>
                <td><?= $m['hari']; ?></td>
                <td><?= $m['jam']; ?></td>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>