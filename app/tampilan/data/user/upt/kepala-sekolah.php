<form action="" method="post" id="fr-upt">
    <div class="input-field">
        <input type="text" name="hdm_id" id="hdm_id" value="<?= $badan['dthdm']['hdm_id']; ?>">
        <label for="hdm_id" <?= ($badan['dthdm']['hdm_id'] != '') ? 'class="active"' : ''; ?>>ID Akun</label>
    </div>
    <div class="input-field">
        <input type="text" name="hdm_name" id="hdm_name" value="<?= $badan['dthdm']['hdm_name']; ?>">
        <label for="hdm_name" <?= ($badan['dthdm']['hdm_name'] != '') ? 'class="active"' : ''; ?>>Nama Kepala Sekolah</label>
    </div>
    <div class="input-field">
        <input type="text" name="hdm_idnumber" id="hdm_idnumber" value="<?= $badan['dthdm']['hdm_idnumber']; ?>">
        <label for="hdm_idnumber" <?= ($badan['dthdm']['hdm_idnumber'] != '') ? 'class="active"' : ''; ?>>NIP Kepala Sekolah</label>
    </div>
    <div class="input-field">
        <textarea name="hdm_address" id="hdm_address" cols="30" rows="10" class="materialize-textarea"><?= $badan['dthdm']['hdm_address'] ?></textarea>
        <label for="hdm_address" <?= ($badan['dthdm']['hdm_address'] != '') ? 'class="active"' : ''; ?>>Alamat Kepala Sekolah</label>
    </div>
    <div class="input-field">
        <input type="tel" name="hdm_phone" id="hdm_phone" class="validate" value="<?= $badan['dthdm']['hdm_phone'] ?>">
        <label for="hdm_phone" <?= ($badan['dthdm']['hdm_phone'] != '') ? 'class="active"' : ''; ?>>Nomor Telepon/HP</label>
    </div>
    <div class="input-field">
        <input type="email" name="hdm_email" id="hdm_email" class="validate" value="<?= $badan['dthdm']['hdm_email'] ?>">
        <label for="hdm_email" <?= ($badan['dthdm']['hdm_email'] != '') ? 'class="active"' : ''; ?>>Email</label>
    </div>
    <div class="input-field">
        <input type="text" name="hdm_position" id="hdm_position" value="<?= $badan['dthdm']['hdm_position'] ?>">
        <label for="hdm_position" <?= ($badan['dthdm']['hdm_position'] != '') ? 'class="active"' : ''; ?>>Jabatan</label>
    </div>
    <br>
    <div class="divider"></div>
    <br>
    <button class="data-batal btn red left waves-effect waves-light">Batal</button>
    <button id="kirim-upt" class="btn indigo right waves-light waves-effect">Kirim</button>
    <br><br>
</form>

<script>
    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/user/kepala-sekolah/data-batal'); ?>",
                success: function (url) {
                    $('#hdm-content').html(url);
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/user/kepala-sekolah/update'); ?>",
                success: function (url) {
                    $('#hdm-content').html(url);
                    M.toast({html: "Data berhasil dipperbarui!"});
                }
            });
        });
    });
</script>