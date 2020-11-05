<h1 class="mb-4">Edit Mahasiswa</h1>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <form action="<?= base_url('mahasiswa/editaksi'); ?>" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= $mhs['nim']; ?>">
            <?= form_error('nim'); ?>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $mhs['nama']; ?>">
            <?= form_error('nama'); ?>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control">
                <option value="Manajemen Informatika">Manajemen Informatika</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Akuntansi">Akuntansi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $mhs['alamat']; ?>">
            <?= form_error('alamat'); ?>
        </div>
        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?= $mhs['telp']; ?>">
            <?= form_error('telp'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>

</div>