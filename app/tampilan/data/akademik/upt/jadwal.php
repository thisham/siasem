<form action="" method="post" id="fr-upt">
    <h4 class="modal-title">Update Data</h4>
    <div class="divider"></div>
    <div class="input-field">
        <input type="text" name="ssc_id" id="upt-ssc_id" value="<?= $badan['dtssc']['ssc_id']; ?>" readonly>
        <label for="upt-ssc_id" id="lupt-ssc-id" <?= ($badan['dtssc']['ssc_id'] != '') ? 'class="active"' : ''; ?>>ID Jadwal</label>
    </div>
    <div class="input-field">
        <select name="ssc_fys" id="upt-ssc_fys">
            <option value="" id="ufys1" disabled>Pilih Tahun Pelajaran...</option>
            <?php foreach ($badan['dtfys'] as $dtfys) { ?>
                <option value="<?= $dtfys['fys_id']; ?>" <?= ($badan['dtssc']['ssc_fys'] == $dtfys['fys_id']) ? 'selected' : ''; ?>><?= $dtfys['fys_name']; ?></option>
            <?php } ?>
        </select>
        <label for="upt-ssc_fys">Tahun Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="ssc_cls" id="upt-ssc_cls">
            <option value="" id="ucls1" disabled>Pilih Kelas...</option>
            <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                <option value="<?= $dtcls['cls_id']; ?>" <?= ($badan['dtssc']['ssc_cls'] == $dtcls['cls_id']) ? 'selected' : ''; ?>><?= $dtcls['cls_name']; ?></option>
            <?php } ?>
        </select>
        <label for="upt-ssc_cls">Kelas</label>
    </div>
    <div class="input-field">
        <select name="ssc_sbj" id="upt-ssc_sbj">
            <option value="" id="usbj1" disabled>Pilih Mata Pelajaran...</option>
            <?php foreach ($badan['dtsbj'] as $dtsbj) { ?>
                <option value="<?= $dtsbj['sbj_id']; ?>" <?= ($badan['dtssc']['ssc_sbj'] == $dtsbj['sbj_id']) ? 'selected' : ''; ?>><?= $dtsbj['sbj_name']; ?></option>
            <?php } ?>
        </select>
        <label for="upt-ssc_sbj">Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="ssc_tch" id="upt-ssc_tch">
            <option value="" id="utch1" disabled>Pilih Pengajar...</option>
            <?php foreach ($badan['dttch'] as $dttch) { ?>
                <option value="<?= $dttch['tch_id']; ?>" <?= ($badan['dtssc']['ssc_tch'] == $dttch['tch_id']) ? 'selected' : ''; ?>><?= $dttch['tch_name']; ?></option>
            <?php } ?>
        </select>
        <label for="upt-ssc_tch">Pengajar</label>
    </div>
    <div class="row s12">
        <div class="col s6">
            <div class="input-field">
                <input type="time" name="ssc_timestart" id="upt-ssc_timestart" value="<?= $badan['dtssc']['ssc_timestart']; ?>">
                <label for="upt-ssc_timestart" id="lupt-ssc-timestart" <?= ($badan['dtssc']['ssc_status'] != null) ? 'class="active"' : ''; ?>>Mulai</label>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <input type="time" name="ssc_timeend" id="upt-ssc_timeend" value="<?= $badan['dtssc']['ssc_timeend']; ?>">
                <label for="upt-ssc_timeend" id="lupt-ssc-timeend" <?= ($badan['dtssc']['ssc_status'] != null) ? 'class="active"' : ''; ?>>Selesai</label>
            </div>
        </div>
    </div>
    <div class="input-field">
        <select name="ssc_day" id="upt-ssc_day">
            <option value="" id="uday1" disabled>Pilih Hari</option>
            <option value="0" <?= ($badan['dtssc']['ssc_day'] == 0) ? 'selected' : ''; ?>>Minggu</option>
            <option value="1" <?= ($badan['dtssc']['ssc_day'] == 1) ? 'selected' : ''; ?>>Senin</option>
            <option value="2" <?= ($badan['dtssc']['ssc_day'] == 2) ? 'selected' : ''; ?>>Selasa</option>
            <option value="3" <?= ($badan['dtssc']['ssc_day'] == 3) ? 'selected' : ''; ?>>Rabu</option>
            <option value="4" <?= ($badan['dtssc']['ssc_day'] == 4) ? 'selected' : ''; ?>>Kamis</option>
            <option value="5" <?= ($badan['dtssc']['ssc_day'] == 5) ? 'selected' : ''; ?>>Jumat</option>
            <option value="6" <?= ($badan['dtssc']['ssc_day'] == 6) ? 'selected' : ''; ?>>Sabtu</option>
        </select>
        <label for="upt-ssc_day">Hari</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="ssc_status" id="upt-ssc_status" <?= ($badan['dtssc']['ssc_status'] == 'on') ? 'checked="checked"' : ''; ?>>
            <span>Aktif</span>
        </label>
    </p>
    <br>
    <div class="divider"></div>
    <br>
    <button id="kirim-upt" class="btn indigo white-text waves-effect waves-light right">Kirim</button>
    <button class="btn red data-batal left white-text waves-effect waves-light">Batal</button>
    <br><br>
</form>

<script>
    $(document).ready(function () {
        $('select').formSelect();

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/akademik/jadwal/list'); ?>",
                success: function (url) {
                    $('#btn-add').show();
                    $('#ssc-content').html(url);
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
                url: "<?= basis_url('data/akademik/jadwal/update'); ?>",
                success: function (url) {
                    $('#btn-add').show();
                    $('#ssc-content').html(url);
                    M.toast({html: "Data berhasil diperbarui!"});
                },
                error: function () {
                    M.toast({html: "Data gagal diperbarui."});
                }
            });
        });
    });
</script>