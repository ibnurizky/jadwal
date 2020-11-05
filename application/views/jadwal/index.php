<h1 class="mb-3">Jadwal Kuliah</h1>

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-3 my-md-0 mw-100 navbar-search" method="post" action="<?= base_url('jadwal') ?>">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." name="cari">
        <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
    </div>
</form>

<a href="<?= base_url('jadwal/tambah'); ?>" class="btn btn-primary mx-3">Tambah Jadwal</a>

<?= $this->session->flashdata('message'); ?>

<table class="table table-responsive table table-hover mt-3">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kode Matkul</th>
        <th>Nama Matkul</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($jadwal as $jd) { ?>
        <tr>
            <td><?= $jd['nim']; ?></td>
            <td><?= $jd['nama']; ?></td>
            <td><?= $jd['kd_matkul']; ?></td>
            <td><?= $jd['nm_matkul']; ?></td>
            <td><?= $jd['hari']; ?></td>
            <td><?= $jd['jam']; ?></td>
            <td>
                <a href="<?= base_url('jadwal/edit/') ?><?= $jd['kd_jadwal'] ?>" class="btn btn-success">Edit</a>
                <a href="<?= base_url('jadwal/hapus/') ?><?= $jd['kd_jadwal'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>