<h1 class="mb-4">Tambah Jadwal</h1>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

    <form action="<?= base_url('jadwal/tambahaksi'); ?>" method="post">
        <div class="form-group">
            <label for="nim">NIM</label>
            <select name="nim" id="nm_matkul" class="form-control">
                <?php foreach($mahasiswa as $mh) { ?>
                    <option value="<?= $mh['nim']; ?>"><?= $mh['nim']; ?> - <?= $mh['nama']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="kd_matkul">Kode Matkul</label>
            <select name="kd_matkul" id="kd_matkul" class="form-control">
                <?php foreach($matkul as $mk) { ?>
                    <option value="<?= $mk['kd_matkul']; ?>"><?= $mk['kd_matkul']; ?> - <?= $mk['nm_matkul']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" id="hari" class="form-control">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <select name="jam" id="jam" class="form-control">
                <option value="08.00 - 10.00">08.00 - 10.00</option>
                <option value="10.00 - 12.00">10.00 - 12.00</option>
                <option value="12.00 - 14.00">12.00 - 14.00</option>
                <option value="14.00 - 16.00">14.00 - 16.00</option>
                <option value="16.00 - 18.00">16.00 - 18.00</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>

</div>