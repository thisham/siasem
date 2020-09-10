<h4>Update Data</h4>
<hr>
<br>

<?php $dttch = $badan['dttch']; ?>

<form action="" method="post" id="fr-upt">
    <div class="input-field">
        <input type="text" name="tch_id" id="tch_id" value="<?= $dttch['tch_id']; ?>" readonly>
        <label for="tch_id" <?= ($dttch['tch_id'] != NULL) ? 'class="active"': ''; ?>>Tagar User</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_idnumber" id="tch_idnumber" value="<?= $dttch['tch_idnumber']; ?>"">
        <label for="tch_idnumber" <?= ($dttch['tch_idnumber'] != '') ? 'class="active"': ''; ?>>NIP</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_name" class="validate" id="tch_name" value="<?= $dttch['tch_name']; ?>" required>
        <label for="tch_name" <?= ($dttch['tch_name'] != '') ? 'class="active"': ''; ?>>Nama</label>
    </div>
    <div class="input-field">
        <select name="tch_gender" id="tch_gender" required>
            <option value="" disabled <?= ($dttch['tch_gender'] == '') ? 'selected': ''; ?>>Pilih Jenis Kelamin</option>
            <option value="L" <?= ($dttch['tch_gender'] == 'L') ? 'selected': ''; ?>>Laki-Laki</option>
            <option value="P" <?= ($dttch['tch_gender'] == 'P') ? 'selected': ''; ?>>Perempuan</option>
        </select>
        <label for="tch_gender">Jenis Kelamin</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_birthplace" id="tch_birthplace" value="<?= $dttch['tch_birthplace']; ?>">
        <label for="tch_birthplace" <?= ($dttch['tch_birthplace'] != '') ? 'class="active"': ''; ?>>Tempat Lahir</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_birthdate" id="tch_birthdate" class="datepicker"  value="<?= date('M d, Y',strtotime($dttch['tch_birthdate'])); ?>">
        <label for="tch_birthdate" <?= ($dttch['tch_birthdate'] != '') ? 'class="active"': ''; ?>>Tanggal Lahir</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_nik"  id="tch_nik" value="<?= $dttch['tch_nik']; ?>">
        <label for="tch_nik" <?= ($dttch['tch_nik'] != '') ? 'class="active"': ''; ?>>NIK</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_nuptk" id="tch_nuptk" value="<?= $dttch['tch_nuptk']; ?>">
        <label for="tch_nuptk" <?= ($dttch['tch_nuptk'] != '') ? 'class="active"': ''; ?>>NUPTK</label>
    </div>
    <div class="input-field">
        <select name="tch_est" id="tch_est" required>
            <option value="" disabled <?= ($dttch['tch_est'] == '') ? 'selected': ''; ?>>Pilih Status Kepegawaian</option>
            <?php foreach ($badan['dtest'] as $dtest) { ?>
                <option value="<?= $dtest['est_id']; ?>" <?= ($dttch['tch_est'] == $dtest['est_id']) ? 'selected': ''; ?>><?= $dtest['est_employeestatuses']; ?></option>
            <?php } ?>
        </select>
        <label for="tch_est">Status Kepegawaian</label>
    </div>
    <div class="input-field">
        <select name="tch_ptk" id="tch_ptk">
            <option value="" disabled <?= ($dttch['tch_ptk'] == '') ? 'selected': ''; ?>>Pilih Status PTK</option>
            <?php foreach ($badan['dtptk'] as $dtptk) { ?>
                <option value="<?= $dtptk['ptk_id']; ?>"  <?= ($dttch['tch_ptk'] == $dtptk['ptk_id']) ? 'selected': ''; ?>><?= $dtptk['ptk_name']; ?></option>
            <?php } ?>
        </select>
        <label for="tch_ptk">Status PTK</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_fieldofstudy" id="tch_fieldofstudy" value="<?= $dttch['tch_fieldofstudy']; ?>">
        <label for="tch_fieldofstudy" <?= ($dttch['tch_fieldofstudy'] != '') ? 'class="active"': ''; ?>>Bidang Studi</label>
    </div>
    <div class="input-field">
        <select name="tch_religion" id="tch_religion">
            <option value="" disabled <?= ($dttch['tch_religion'] == '') ? 'selected': ''; ?>>Pilih Agama</option>
            <option value="Islam" <?= ($dttch['tch_religion'] == 'Islam') ? 'selected': ''; ?>>Islam</option>
            <option value="Kristen" <?= ($dttch['tch_religion'] == 'Kristen') ? 'selected': ''; ?>>Kristen</option>
            <option value="Katolik" <?= ($dttch['tch_religion'] == 'Katolik') ? 'selected': ''; ?>>Katolik</option>
            <option value="Hindu" <?= ($dttch['tch_religion'] == 'Hindu') ? 'selected': ''; ?>>Hindu</option>
            <option value="Buddha" <?= ($dttch['tch_religion'] == 'Buddha') ? 'selected': ''; ?>>Buddha</option>
            <option value="Kong Hu Chu" <?= ($dttch['tch_religion'] == 'Kong Hu Chu') ? 'selected': ''; ?>>Kong Hu Chu</option>
            <option value="Lainnya..." <?= ($dttch['tch_religion'] == 'Lainnya...') ? 'selected': ''; ?>>Lainnya...</option>
        </select>
        <label for="tch_religion">Agama</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_streetaddress" id="tch_streetaddress" value="<?= $dttch['tch_streetaddress']; ?>">
        <label for="tch_streetaddress" <?= ($dttch['tch_streetaddress'] != '') ? 'class="active"': ''; ?>>Alamat Jalan</label>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="input-field">
                <input type="text" name="tch_rt"  id="tch_rt" value="<?= $dttch['tch_rt']; ?>">
                <label for="tch_rt" <?= ($dttch['tch_rt'] != '') ? 'class="active"': ''; ?>>RT</label>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <input type="text" name="tch_rw"  id="tch_rw" value="<?= $dttch['tch_rw']; ?>">
                <label for="tch_rt" <?= ($dttch['tch_rw'] != '') ? 'class="active"': ''; ?>>RW</label>
            </div>
        </div>
    </div>
    <div class="input-field">
        <input type="text" name="tch_hamlet" id="tch_hamlet" value="<?= $dttch['tch_hamlet']; ?>">
        <label for="tch_hamlet" <?= ($dttch['tch_hamlet'] != '') ? 'class="active"': ''; ?>>Dusun/Dukuh</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_village" id="tch_village" value="<?= $dttch['tch_village']; ?>">
        <label for="tch_village" <?= ($dttch['tch_village'] != '') ? 'class="active"': ''; ?>>Desa/Kelurahan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_district" id="tch_district" value="<?= $dttch['tch_district']; ?>">
        <label for="tch_district" <?= ($dttch['tch_district'] != '') ? 'class="active"': ''; ?>>Kecamatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_postalcode" id="tch_postalcode" value="<?= $dttch['tch_postalcode']; ?>">
        <label for="tch_postalcode" <?= ($dttch['tch_postalcode'] != '') ? 'class="active"': ''; ?>>Kode Pos</label>
    </div>
    <div class="input-field">
        <input type="tel" name="tch_phone" id="tch_phone" class="validate" value="<?= $dttch['tch_phone']; ?>">
        <label for="tch_phone" <?= ($dttch['tch_phone'] != '') ? 'class="active"': ''; ?>>Nomor Telepon/HP</label>
    </div>
    <div class="input-field">
        <input type="email" name="tch_email" id="tch_email" value="<?= $dttch['tch_email']; ?>">
        <label for="tch_email" <?= ($dttch['tch_email'] != '') ? 'class="active"': ''; ?>>Email</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_additionalassignment" id="tch_additionalassigment" value="<?= $dttch['tch_additionalassignment']; ?>">
        <label for="tch_additionalassignment" <?= ($dttch['tch_additionalassignment'] != '') ? 'class="active"': ''; ?>>Tugas Tambahan</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="tch_status" id="tch_status" <?= ($dttch['tch_status'] != 'off') ? 'checked': ''; ?>>
            <span>Aktif</span>
        </label>
    </p>
    <div class="input-field">
        <input type="text" name="tch_foundationacc" id="tch_foundationacc" value="<?= $dttch['tch_foundationacc']; ?>">
        <label for="tch_foundationacc" <?= ($dttch['tch_foundationacc'] != '') ? 'class="active"': ''; ?>>Nomor SK Pengangkatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_foundationaccdate" class="datepicker" id="tch_foundationaccdate" value="<?= date('M d, Y', strtotime($dttch['tch_foundationaccdate'])); ?>">
        <label for="tch_foundationaccdate" <?= ($dttch['tch_foundationaccdate'] != '') ? 'class="active"': ''; ?>>TMT Pengangkatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_salarysource" id="tch_salarysource" value="<?= $dttch['tch_salarysource']; ?>">
        <label for="tch_salarysource" <?= ($dttch['tch_salarysource'] != '') ? 'class="active"': ''; ?>>Sumber Gaji</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_mothername" id="tch_mothername" value="<?= $dttch['tch_mothername']; ?>">
        <label for="tch_mothername" <?= ($dttch['tch_mothername'] != '') ? 'class="active"': ''; ?>>Nama Ibu Kandung</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="tch_maritalstatus" id="tch_maritalstatus" <?= ($dttch['tch_maritalstatus'] != 'off') ? 'checked': ''; ?>>
            <span>Sudah Menikah</span>
        </label>
    </p>
    <div class="input-field">
        <input type="text" name="tch_maritalpartner" id="tch_maritalpartner" value="<?= $dttch['tch_maritalpartner']; ?>">
        <label for="tch_maritalpartner" <?= ($dttch['tch_maritalpartner'] != '') ? 'class="active"': ''; ?>>Nama Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_maritalpartnernik"  id="tch_maritalpartnernik" value="<?= $dttch['tch_maritalpartnernik']; ?>">
        <label for="tch_maritalpartnernik" <?= ($dttch['tch_maritalpartnernik'] != '') ? 'class="active"': ''; ?>>NIK Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_maritalpartnerjob" id="tch_maritalpartnerjob" value="<?= $dttch['tch_maritalpartnerjob']; ?>">
        <label for="tch_maritalpartnerjob" <?= ($dttch['tch_maritalpartnerjob'] != '') ? 'class="active"': ''; ?>>Pekerjaan Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_npwp" id="tch_npwp" value="<?= $dttch['tch_npwp']; ?>">
        <label for="tch_npwp" <?= ($dttch['tch_npwp'] != '') ? 'class="active"': ''; ?>>NPWP</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_nationality" id="tch_nationality" value="<?= $dttch['tch_nationality']; ?>">
        <label for="tch_nationality" <?= ($dttch['tch_nationality'] != '') ? 'class="active"': ''; ?>>Kewarganegaraan</label>
    </div>
    <br>
    <hr>
    <button id="kirim-upt" class="btn indigo waves-effect waves-light">Kirim</button>
    <button class="btn red waves-effect waves-light data-batal right">Batal</button>
</form>

<script>
    $(document).ready(function () {
        M.AutoInit();

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/user/guru/list'); ?>",
                success: function (url) {
                    $('#tch-content').html(url);
                    $('#btn-add').show();
                },
                error: function() {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            var ptk = $('#tch_ptk').val();
            var est = $('#tch_est').val();
            if (ptk == null || est == null) {
                swal("Kesalahan!", "Lengkapi data kepegawaian dan status PTK!", "error");
            } else {
                $.ajax({
                    data: $('#fr-upt').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/guru/update'); ?>",
                    success: function (url) {
                        $('#tch-content').html(url);
                        $('#btn-add').show();
                    },
                    error: function() {
                        swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                    }
                });
            }
        });
    });
</script>
