<h1 class="mb-3">Data Mahasiswa</h1>

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-3 my-md-0 mw-100 navbar-search" method="post" action="<?= base_url('mahasiswa') ?>">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." name="cari">
        <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
    </div>
</form>

<a href="<?= base_url('mahasiswa/tambah'); ?>" class="btn btn-primary mx-3">Tambah Mahasiswa</a>

<?= $this->session->flashdata('message'); ?>

<table class="table table-responsive table table-hover mt-3">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $m) { ?>
        <tr>
            <td><?= $m['nim']; ?></td>
            <td><?= $m['nama']; ?></td>
            <td><?= $m['jurusan']; ?></td>
            <td><?= $m['alamat']; ?></td>
            <td><?= $m['telp']; ?></td>
            <td>
                <a href="<?= base_url('mahasiswa/edit/') ?><?= $m['nim'] ?>" class="btn btn-success">Edit</a>
                <a href="<?= base_url('mahasiswa/hapus/') ?><?= $m['nim'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>