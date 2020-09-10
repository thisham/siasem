<h4>Tambah Data</h4>
<hr>
<br>

<form action="" method="post" id="fr-add">
    <div id="add-1">
        <div class="input-field">
            <input type="text" name="tch_id" id="tch_id" value="<?= $badan['dttch'] ?>" readonly>
            <label for="tch_id" <?= ($badan['dttch'] != NULL) ? 'class="active"': ''; ?>>Tagar User</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_idnumber" id="tch_idnumber">
            <label for="tch_idnumber">NIP</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_name" class="validate" id="tch_name" required>
            <label for="tch_name">Nama</label>
        </div>
        <div class="input-field">
            <select name="tch_gender" id="tch_gender" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            <label for="tch_gender">Jenis Kelamin</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_birthplace" id="tch_birthplace">
            <label for="tch_birthplace">Tempat Lahir</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_birthdate" id="tch_birthdate" class="datepicker">
            <label for="tch_birthdate">Tanggal Lahir</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_nik"  id="tch_nik">
            <label for="tch_nik">NIK</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_nuptk" id="tch_nuptk">
            <label for="tch_nuptk">NUPTK</label>
        </div>
        <div class="input-field">
            <select name="tch_est" id="tch_est" required>
                <option value="" disabled selected>Pilih Status Kepegawaian</option>
                <?php foreach ($badan['dtest'] as $dtest) { ?>
                    <option value="<?= $dtest['est_id']; ?>"><?= $dtest['est_employeestatuses']; ?></option>
                <?php } ?>
            </select>
            <label for="tch_est">Status Kepegawaian</label>
        </div>
        <div class="input-field">
            <select name="tch_ptk" id="tch_ptk">
                <option value="" disabled selected>Pilih Status PTK</option>
                <?php foreach ($badan['dtptk'] as $dtptk) { ?>
                    <option value="<?= $dtptk['ptk_id']; ?>"><?= $dtptk['ptk_name']; ?></option>
                <?php } ?>
            </select>
            <label for="tch_ptk">Status PTK</label>
        </div>
        <div class="input-field">
            <input type="text" name="tch_fieldofstudy" id="tch_fieldofstudy">
            <label for="tch_fieldofstudy">Bidang Studi</label>
        </div>
        <div class="input-field">
            <select name="tch_religion" id="tch_religion">
                <option value="" disabled selected>Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Kong Hu Chu">Kong Hu Chu</option>
                <option value="Lainnya...">Lainnya...</option>
            </select>
            <label for="tch_religion">Agama</label>
        </div>
    </div>
    <div id="add-2">
        
    </div>
    
    <div class="input-field">
        <input type="text" name="tch_streetaddress" id="tch_streetaddress">
        <label for="tch_streetaddress">Alamat Jalan</label>
    </div>
    <div class="row">
        <div class="col s6">
            <div class="input-field">
                <input type="text" name="tch_rt"  id="tch_rt">
                <label for="tch_rt">RT</label>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <input type="text" name="tch_rw"  id="tch_rw">
                <label for="tch_rt">RW</label>
            </div>
        </div>
    </div>
    <div class="input-field">
        <input type="text" name="tch_hamlet" id="tch_hamlet">
        <label for="tch_hamlet">Dusun/Dukuh</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_village" id="tch_village">
        <label for="tch_village">Desa/Kelurahan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_district" id="tch_district">
        <label for="tch_district">Kecamatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_postalcode" id="tch_postalcode">
        <label for="tch_postalcode">Kode Pos</label>
    </div>
    <div class="input-field">
        <input type="tel" name="tch_phone" id="tch_phone" class="validate">
        <label for="tch_phone">Nomor Telepon/HP</label>
    </div>
    <div class="input-field">
        <input type="email" name="tch_email" id="tch_email">
        <label for="tch_email">Email</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_additionalassignment" id="tch_additionalassigment">
        <label for="tch_additionalassignment">Tugas Tambahan</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="tch_status" id="tch_status">
            <span>Aktif</span>
        </label>
    </p>
    <div class="input-field">
        <input type="text" name="tch_foundationacc" id="tch_foundationacc">
        <label for="tch_foundationacc">Nomor SK Pengangkatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_foundationaccdate" id="tch_foundationaccdate">
        <label for="tch_foundationaccdate">TMT Pengangkatan</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_salarysource" id="tch_salarysource">
        <label for="tch_salarysource">Sumber Gaji</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_mothername" id="tch_mothername">
        <label for="tch_mothername">Nama Ibu Kandung</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="tch_maritalstatus" id="tch_maritalstatus">
            <span>Sudah Menikah</span>
        </label>
    </p>
    <div class="input-field">
        <input type="text" name="tch_maritalpartner" id="tch_maritalpartner">
        <label for="tch_maritalpartner">Nama Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_maritalpartnernik"  id="tch_maritalpartnernik">
        <label for="tch_maritalpartnernik">NIK Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_maritalpartnerjob" id="tch_maritalpartnerjob">
        <label for="tch_maritalpartnerjob">Pekerjaan Suami/Istri</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_npwp" id="tch_npwp">
        <label for="tch_npwp">NPWP</label>
    </div>
    <div class="input-field">
        <input type="text" name="tch_nationality" id="tch_nationality">
        <label for="tch_nationality">Kewarganegaraan</label>
    </div>
    <br>
    <hr>
    <button id="kirim-add" class="btn indigo waves-effect waves-light">Kirim</button>
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

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            var ptk = $('#tch_ptk').val();
            var est = $('#tch_est').val();
            if (ptk == null || est == null) {
                swal("Kesalahan!", "Lengkapi data kepegawaian dan status PTK!", "error");
            } else {
                $.ajax({
                    data: $('#fr-add').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/guru/tambah'); ?>",
                    success: function (url) {
                        $('#tch-content').html(url);
                        $('#btn-add').removeAttr('disabled');
                    },
                    error: function() {
                        swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                    }
                });
            }
        });
    });
</script>
