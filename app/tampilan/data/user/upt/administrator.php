<form action="" method="post" id="fr-upt">
    <h4>Update Data</h4>
    <hr>
    <br>
    <div class="input-field">
        <input type="text" name="adm_id" id="adm_id" value="<?= $badan['dtadm']['adm_id']; ?>" readonly>
        <label for="adm_id" id="ladm-id" class="<?= ($badan['dtadm']['adm_id'] == '') ? '' : 'active' ; ?>">Tagar User</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_idnumber" id="adm_idnumber" value="<?= $badan['dtadm']['adm_idnumber']; ?>">
        <label for="adm_idnumber" id="ladm-idnumber" class="<?= ($badan['dtadm']['adm_idnumber'] == '') ? '' : 'active' ; ?>">NIP</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_name" id="adm_name" value="<?= $badan['dtadm']['adm_name']; ?>">
        <label for="adm_name" id="ladm-name" class="<?= ($badan['dtadm']['adm_name'] == '') ? '' : 'active' ; ?>">Nama Administrator</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_passworddef" id="adm_passworddef" value="<?= $badan['dtadm']['adm_passworddef']; ?>">
        <label for="adm_passworddef" id="ladm-passworddef" class="<?= ($badan['dtadm']['adm_passworddef'] == '') ? '' : 'active' ; ?>">Password Default</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_address" id="adm_address" value="<?= $badan['dtadm']['adm_address']; ?>">
        <label for="adm_address" id="ladm-address" class="<?= ($badan['dtadm']['adm_address'] == '') ? '' : 'active' ; ?>">Alamat</label>
    </div>
    <div class="input-field">
        <input type="tel" name="adm_phone" id="adm_phone" value="<?= $badan['dtadm']['adm_phone']; ?>">
        <label for="adm_phone" id="ladm-phone" class="<?= ($badan['dtadm']['adm_phone'] == '') ? '' : 'active' ; ?>">Telepon</label>
    </div>
    <div class="input-field">
        <input type="email" name="adm_email" id="adm_email" value="<?= $badan['dtadm']['adm_email']; ?>">
        <label for="adm_email" id="ladm-email" class="<?= ($badan['dtadm']['adm_email'] == '') ? '' : 'active' ; ?>">Email</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_position" id="adm_position" value="<?= $badan['dtadm']['adm_position']; ?>">
        <label for="adm_position" id="ladm-position" class="<?= ($badan['dtadm']['adm_position'] == '') ? '' : 'active' ; ?>">Jabatan</label>
    </div>
    <label>
        <input type="checkbox" name="adm_status" id="adm_status" <?= ($badan['dtusr']['usr_status'] == 'off') ? '' : 'checked="checked"' ; ?>>
        <span>Aktif</span>
    </label>
    <hr>
    <button id="kirim-upt" class="btn indigo waves-effect waves-light">Kirim</button>
    <button class="btn red waves-effect waves-light data-batal right">Batal</button>
</form>

<script>
    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/user/administrator/list'); ?>",
                success: function (url) {
                    $('#adm-content').html(url);
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/user/administrator/update'); ?>",
                success: function (url) {
                    $('#adm-content').html(url);
                    M.toast({html: 'Data berhasil diperbarui!'});
                }
            });
        });
    });
</script>