<form action="" method="post" id="fr-add">
    <div class="input-field">
        <input type="text" name="sbj_id" id="sbj_id" value="<?= $badan['dtsbj']; ?>" readonly>
        <label for="sbj_id" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Kode Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_name" id="sbj_name">
        <label for="sbj_name">Nama Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_nameen" id="sbj_nameen">
        <label for="sbj_nameen">Nama Mata Pelajaran (Inggris)</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_class" id="sbj_class">
        <label for="sbj_class">Tingkat</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_competence" id="sbj_competence">
        <label for="sbj_competence">Kompetensi</label>
    </div>
    <div class="input-field">
        <select name="sbj_sgr" id="sbj_sgr">
            <option value="" disabled selected>Pilih Kelompok Mapel...</option>
            <?php foreach ($badan['dtsgr'] as $dtsgr) { ?>
                <option value="<?= $dtsgr['sgr_id'] ?>"><?= $dtsgr['sgr_group'] . ' - ' . $dtsgr['sgr_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_sgr">Nama Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="sbj_cur" id="sbj_cur">
            <option value="" disabled selected>Pilih Kurikulum...</option>
            <?php foreach ($badan['dtcur'] as $dtcur) { ?>
                <option value="<?= $dtcur['cur_id'] ?>"><?= $dtcur['cur_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_cur">Kurikulum</label>
    </div>
    <div class="input-field">
        <select name="sbj_tch" id="sbj_tch">
            <option value="" disabled selected>Pilih Pengajar Mapel...</option>
            <?php foreach ($badan['dttch'] as $dttch) { ?>
                <option value="<?= $dttch['tch_id'] ?>"><?= $dttch['tch_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_tch">Nama Pengajar Mapel</label>
    </div>
    <div class="input-field">
        <select name="sbj_mjr" id="sbj_mjr">
            <option value="" disabled selected>Pilih Jurusan...</option>
            <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                <option value="<?= $dtmjr['mjr_id'] ?>"><?= $dtmjr['mjr_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_mjr">Jurusan</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="sbj_status" id="sbj_status">
            <span>Aktif</span>
        </label>
    </p>
    <br>
    <div class="divider"></div>
    <br>
    <button id="kirim-add" class="btn indigo waves-effect waves-light">Kirim</button>
    <button class="btn red waves-effect waves-light data-batal right">Batal</button>
</form>

<script>
    $(document).ready(function () {
        $('select').formSelect();

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/akademik/mapel/list'); ?>",
                success: function (url) {
                    $('#sbj-content').html(url);
                    $('#btn-add').show();
                },
                error: function () {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/mapel/tambah'); ?>",
                success: function (url) {
                    $('#btn-add').show();
                    $('#sbj-content').html(url);
                    M.toast({html: "Data berhasil ditambahkan!"});
                },
                error: function () {
                    M.toast({html: "Data gagal ditambahkan."});
                }
            });
        });
    });
</script>