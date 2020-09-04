<form action="" method="post" id="fr-add">
    <h4>Tambah Data</h4>
    <hr>
    <br>
    <div class="input-field">
        <input type="text" name="adm_id" id="adm_id" readonly>
        <label for="adm_id" id="ladm-id">Tagar User</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_idnumber" id="adm_idnumber">
        <label for="adm_idnumber" id="ladm-idnumber">NIP</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_name" id="adm_name">
        <label for="adm_name" id="ladm-name">Nama Administrator</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_passworddef" id="adm_passworddef">
        <label for="adm_passworddef" id="ladm-passworddef">Password Default</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_address" id="adm_address">
        <label for="adm_address" id="ladm-address">Alamat</label>
    </div>
    <div class="input-field">
        <input type="tel" name="adm_phone" id="adm_phone">
        <label for="adm_phone" id="ladm-phone">Telepon</label>
    </div>
    <div class="input-field">
        <input type="email" name="adm_email" id="adm_email">
        <label for="adm_email" id="ladm-email">Email</label>
    </div>
    <div class="input-field">
        <input type="text" name="adm_position" id="adm_position">
        <label for="adm_position" id="ladm-position">Jabatan</label>
    </div>
    <label>
        <input type="checkbox" name="adm_status" id="adm_status">
        <span>Aktif</span>
    </label>
    <br>
    <br>
    <button id="kirim-add" class="btn indigo waves-effect waves-light">Kirim</button>
    <button class="btn red waves-effect waves-light data-batal right">Batal</button>
</form>

<script>
    $(document).ready(function () {
        var add = "<?= $badan['dtadm']; ?>";
        if (add != "") {
            $('#adm_id').val(add);
            $('#ladm-id').addClass('active');
        }

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/user/administrator/list'); ?>",
                success: function (url) {
                    $('#adm-content').html(url);
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/user/administrator/tambah'); ?>",
                success: function (url) {
                    $('#adm-content').html(url);
                    M.toast({html: 'Data berhasil ditambahkan!'});
                }
            });
        });
    });
</script>