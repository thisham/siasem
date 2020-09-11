<form action="" method="post" id="fr-upt">
    <div class="input-field">
        <input type="text" name="sbj_id" id="sbj_id" value="<?= $badan['dtsbj']['sbj_id'] ?>" readonly>
        <label for="sbj_id" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Kode Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_name" id="sbj_name" value="<?= $badan['dtsbj']['sbj_name'] ?>">
        <label for="sbj_name" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Nama Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_nameen" id="sbj_nameen" value="<?= $badan['dtsbj']['sbj_nameen'] ?>">
        <label for="sbj_nameen" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Nama Mata Pelajaran (Inggris)</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_class" id="sbj_class" value="<?= $badan['dtsbj']['sbj_class'] ?>">
        <label for="sbj_class" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Tingkat</label>
    </div>
    <div class="input-field">
        <input type="text" name="sbj_competence" id="sbj_competence" value="<?= $badan['dtsbj']['sbj_competence'] ?>">
        <label for="sbj_competence" <?= ($badan['dtsbj'] != '') ? 'class="active"' : '' ; ?>>Kompetensi</label>
    </div>
    <div class="input-field">
        <select name="sbj_sgr" id="sbj_sgr">
            <option value="" disabled <?= ($badan['dtsbj']['sbj_sgr'] == '') ? 'selected' : ''; ?>>Pilih Kelompok Mapel...</option>
            <?php foreach ($badan['dtsgr'] as $dtsgr) { ?>
                <option value="<?= $dtsgr['sgr_id'] ?>" <?= ($badan['dtsbj']['sbj_sgr'] == $dtsgr['sgr_id']) ? 'selected' : ''; ?>><?= $dtsgr['sgr_group'] . ' - ' . $dtsgr['sgr_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_sgr">Nama Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="sbj_cur" id="sbj_cur">
            <option value="" disabled <?= ($badan['dtsbj']['sbj_cur'] == '') ? 'selected' : ''; ?>>Pilih Kurikulum...</option>
            <?php foreach ($badan['dtcur'] as $dtcur) { ?>
                <option value="<?= $dtcur['cur_id'] ?>" <?= ($badan['dtsbj']['sbj_cur'] == $dtcur['cur_id']) ? 'selected' : ''; ?>><?= $dtcur['cur_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_cur">Kurikulum</label>
    </div>
    <div class="input-field">
        <select name="sbj_tch" id="sbj_tch">
            <option value="" disabled <?= ($badan['dtsbj']['sbj_tch'] == '') ? 'selected' : ''; ?>>Pilih Pengajar Mapel...</option>
            <?php foreach ($badan['dttch'] as $dttch) { ?>
                <option value="<?= $dttch['tch_id'] ?>" <?= ($badan['dtsbj']['sbj_tch'] == $dttch['tch_id']) ? 'selected' : ''; ?>><?= $dttch['tch_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_tch">Nama Pengajar Mapel</label>
    </div>
    <div class="input-field">
        <select name="sbj_mjr" id="sbj_mjr">
            <option value="" disabled <?= ($badan['dtsbj']['sbj_mjr'] == '') ? 'selected' : ''; ?>>Pilih Jurusan...</option>
            <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                <option value="<?= $dtmjr['mjr_id'] ?>" <?= ($badan['dtsbj']['sbj_mjr'] == $dtmjr['mjr_id']) ? 'selected' : ''; ?>><?= $dtmjr['mjr_name'] ?></option>
            <?php } ?>
        </select>
        <label for="sbj_mjr">Jurusan</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="sbj_status" id="sbj_status" <?= ($badan['dtsbj']['sbj_status'] != 'off') ? 'checked="checked"' : ''; ?>>
            <span>Aktif</span>
        </label>
    </p>
    <br>
    <div class="divider"></div>
    <br>
    <button id="kirim-upt" class="btn indigo waves-effect waves-light">Kirim</button>
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
                    $('#btn-add').show();
                    $('#sbj-content').html(url);
                },
                error: function () {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });
        
        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/mapel/update'); ?>",
                success: function (url) {
                    $('#btn-add').show();
                    $('#sbj-content').html(url);
                    M.toast({html: "Data berhasil diperbarui!"});
                },
                error: function () {
                    M.toast({html: "Data gagal diperbarui."});
                }
            });
        });
    });
</script>