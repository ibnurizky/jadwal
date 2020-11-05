<h1 class="mb-4">Edit Matkul</h1>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <form action="<?= base_url('matkul/editaksi'); ?>" method="post">
        <div class="form-group">
            <label for="kdmatkul">Kode Matkul</label>
            <input type="text" name="kdmatkul" class="form-control" value="<?= $mtk['kd_matkul']; ?>">
            <?= form_error('kdmatkul'); ?>
        </div>
        <div class="form-group">
            <label for="nmmatkul">Nama Matkul</label>
            <select name="nmmatkul" id="nmmatkul" class="form-control">
                <option value="Pemrograman Web">Pemrograman Web</option>
                <option value="Pemrograman Mobile Android">Pemrograman Mobile Android</option>
                <option value="Multimedia & Animasi">Multimedia & Animasi</option>
                <option value="Sistem Basis Data">Sistem Basis Data</option>
                <option value="Desain Grafis">Desain Grafis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input type="text" name="sks" class="form-control" value="<?= $mtk['sks']; ?>">
            <?= form_error('sks'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>

</div>