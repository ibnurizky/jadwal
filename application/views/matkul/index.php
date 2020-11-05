<h1 class="mb-3">Data Matkul</h1>

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-3 my-md-0 mw-100 navbar-search" method="post" action="<?= base_url('matkul') ?>">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." name="cari">
        <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
    </div>
</form>

<a href="<?= base_url('matkul/tambah'); ?>" class="btn btn-primary mx-3">Tambah Matkul</a>

<?= $this->session->flashdata('message'); ?>

<table class="table table-responsive table table-hover mt-3">
    <tr>
        <th>Kode Matkul</th>
        <th>Nama Matkul</th>
        <th>SKS</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($matkul as $mk) { ?>
        <tr>
            <td><?= $mk['kd_matkul']; ?></td>
            <td><?= $mk['nm_matkul']; ?></td>
            <td><?= $mk['sks']; ?></td>
            <td>
                <a href="<?= base_url('matkul/edit/') ?><?= $mk['kd_matkul'] ?>" class="btn btn-success">Edit</a>
                <a href="<?= base_url('matkul/hapus/') ?><?= $mk['kd_matkul'] ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>