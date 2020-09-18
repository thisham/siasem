<style>
    .table-of-contents a.active {
        border-left: 2px solid indigo !important;
    }
    
    .table-of-contents a:hover {
        border-left: 1px solid indigo !important;
    }
</style>
<div class="row">
    <div class="col s12 m9 l10">
        <form action="" method="post" id="fr-upt">
            <div id="tab-bio" class="section scrollspy">
                <h5 class="card-title">Biodata</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_id" id="stu_id" value="<?= $badan['dtstu']['stu_id']; ?>" readonly>
                    <label for="stu_id" class="active">Tagar User</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_idnumber" value="<?= $badan['dtstu']['stu_idnumber']; ?>" id="stu_idnumber">
                    <label for="stu_idnumber" <?php if ($badan['dtstu']['stu_idnumber'] != '') echo "class='active'"; ?>>Nomor Induk Siswa</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_nisn" id="stu_nisn" value="<?= $badan['dtstu']['stu_nisn']; ?>">
                    <label for="stu_nisn" <?php if ($badan['dtstu']['stu_nisn'] != '') echo "class='active'"; ?>>Nomor Induk Siswa Nasional</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_name" id="stu_name" value="<?= $badan['dtstu']['stu_name']; ?>">
                    <label for="stu_name" <?php if ($badan['dtstu']['stu_name'] != '') echo "class='active'"; ?>>Nama Siswa</label>
                </div>
                <p>
                    <p>Jenis Kelamin</p>
                    <label>
                        <input type="radio" name="stu_gender" class="with-gap <?php if ($badan['dtstu']['stu_gender'] == 'L') echo 'active'; ?>" value="L">
                        <span>Laki-Laki</span>
                    </label>
                    <label>
                        <input type="radio" name="stu_gender" class="with-gap <?php if ($badan['dtstu']['stu_gender'] == 'P') echo 'active'; ?>" value="P">
                        <span>Perempuan</span>
                    </label>
                </p>
                <div class="input-field">
                    <input type="text" name="stu_birthplace" id="stu_birthplace" value="<?= $badan['dtstu']['stu_birthplace']; ?>">
                    <label for="stu_birthplace" <?php if ($badan['dtstu']['stu_birthplace'] != '') echo "class='active'"; ?>>Tempat Kelahiran</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_birthdate" class="datepicker" id="stu_birthdate" value="<?= date('M d, Y', strtotime($badan['dtstu']['stu_birthdate'])); ?>">
                    <label for="stu_birthdate" class="active">Tanggal Kelahiran</label>
                </div>
                <div class="input-field">
                    <select name="stu_religion" id="stu_religion">
                        <option value="" <?php if ($badan['dtstu']['stu_religion'] == '') echo "selected"; ?> disabled>Pilih Agama...</option>
                        <option value="Islam" <?php if ($badan['dtstu']['stu_religion'] == 'Islam') echo "selected"; ?>>Islam</option>
                        <option value="Kristen" <?php if ($badan['dtstu']['stu_religion'] == 'Kristen') echo "selected"; ?>>Kristen</option>
                        <option value="Katolik" <?php if ($badan['dtstu']['stu_religion'] == 'Katolik') echo "selected"; ?>>Katolik</option>
                        <option value="Hindu" <?php if ($badan['dtstu']['stu_religion'] == 'Hindu') echo "selected"; ?>>Hindu</option>
                        <option value="Buddha" <?php if ($badan['dtstu']['stu_religion'] == 'Buddha') echo "selected"; ?>>Buddha</option>
                        <option value="Kong Hu Cu" <?php if ($badan['dtstu']['stu_religion'] == 'Kong Hu Cu') echo "selected"; ?>>Kong Hu Cu</option>
                        <option value="Lainnya...">Lainnya...</option>
                    </select>
                    <label for="stu_religion">Agama</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_specialneeds" id="stu_specialneeds" value="<?= $badan['dtstu']['stu_specialneeds']; ?>">
                    <label for="stu_specialneeds" <?php if ($badan['dtstu']['stu_specialneeds'] != '') echo "class='active'"; ?>>Kebutuhan Khusus</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_generation" id="stu_generation" value="<?= $badan['dtstu']['stu_generation']; ?>">
                    <label for="stu_generation" <?php if ($badan['dtstu']['stu_generation'] != '') echo "class='active'"; ?>>Angkatan</label>
                </div>
                <div class="input-field">
                    <select name="stu_cls" id="stu_cls">
                        <option value="" <?php if ($badan['dtstu']['stu_cls'] == '') echo "selected"; ?> disabled>Pilih Kelas...</option>
                        <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                            <option value="<?= $dtcls['cls_id']; ?>" <?php if ($badan['dtstu']['stu_cls'] == $dtcls['cls_id']) echo "selected"; ?>><?= $dtcls['cls_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="stu_cls">Kelas</label>
                </div>
                <div class="input-field">
                    <select name="stu_mjr" id="stu_mjr">
                        <option value="" <?php if ($badan['dtstu']['stu_mjr'] == '') echo "selected"; ?> disabled>Pilih Jurusan...</option>
                        <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                            <option value="<?= $dtmjr['mjr_id']; ?>" <?php if ($badan['dtstu']['stu_mjr'] == $dtmjr['mjr_id']) echo "selected"; ?>><?= $dtmjr['mjr_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="stu_mjr">Jurusan</label>
                </div>
                <p>
                    <label>
                        <input type="checkbox" name="stu_studentstatus" id="stu_studentstatus" <?php if ($badan['dtstu']['stu_studentstatus'] == 'on') echo "checked"; ?>>
                        <span>Pelajar Aktif</span>
                    </label>
                </p>
                <br>
            </div>
            <div id="tab-doc" class="section scrollspy">
                <h5 class="card-title">Dokumen</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_nik" id="stu_nik" value="<?= $badan['dtstu']['stu_nik']; ?>">
                    <label for="stu_nik" <?php if ($badan['dtstu']['stu_nik'] != '') echo "class='active'"; ?>>Nomor Induk Kependudukan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_skhun" id="stu_skhun" value="<?= $badan['dtstu']['stu_skhun']; ?>">
                    <label for="stu_skhun" <?php if ($badan['dtstu']['stu_skhun'] != '') echo "class='active'"; ?>>Nomor SKHUN</label>
                </div>
                <p>
                    <label>
                        <input type="checkbox" name="stu_kpsrecipient" id="stu_kpsrecipient" <?php if ($badan['dtstu']['stu_kpsrecipient'] != 'off') echo "selected"; ?>>
                        <span>Penerima KPS</span>
                    </label>
                </p>
                <div class="input-field">
                    <input type="text" name="stu_kpsnumber" id="stu_kpsnumber" <?= $badan['dtstu']['stu_kpsnumber']; ?>>
                    <label for="stu_kpsnumber" <?php if ($badan['dtstu']['stu_kpsnumber'] != '') echo "class='active'"; ?>>Nomor KPS</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_initialstatus" id="stu_initialstatus" value="<?= $badan['dtstu']['stu_initialstatus']; ?>">
                    <label for="stu_initialstatus" <?php if ($badan['dtstu']['stu_initialstatus'] != '') echo "class='active'"; ?>>Status Awal Masuk</label>
                </div>
            </div>
            <div id="tab-con" class="section scrollspy">
                <h5 class="card-title">Alamat dan Kontak</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_address" id="stu_address" value="<?= $badan['dtstu']['stu_address']; ?>">
                    <label for="stu_address" <?php if ($badan['dtstu']['stu_address'] != '') echo "class='active'"; ?>>Alamat Jalan</label>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="stu_rt" id="stu_rt" value="<?= $badan['dtstu']['stu_rt']; ?>">
                            <label for="stu_rt" <?php if ($badan['dtstu']['stu_rt'] != '') echo "class='active'"; ?>>RT</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="stu_rw" id="stu_rw" value="<?= $badan['dtstu']['stu_rw']; ?>">
                            <label for="stu_rw" <?php if ($badan['dtstu']['stu_rw'] != '') echo "class='active'"; ?>>RW</label>
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_hamlet" id="stu_hamlet" value="<?= $badan['dtstu']['stu_hamlet']; ?>">
                    <label for="stu_hamlet" <?php if ($badan['dtstu']['stu_hamlet'] != '') echo "class='active'"; ?>>Dusun/Dukuh/Perumahan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_village" id="stu_village" value="<?= $badan['dtstu']['stu_village']; ?>">
                    <label for="stu_village" <?php if ($badan['dtstu']['stu_village'] != '') echo "class='active'"; ?>>Desa/Kelurahan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_district" id="stu_district" value="<?= $badan['dtstu']['stu_district']; ?>">
                    <label for="stu_district" <?php if ($badan['dtstu']['stu_district'] != '') echo "class='active'"; ?>>Kecamatan/Distrik</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_postalcode" id="stu_postalcode" value="<?= $badan['dtstu']['stu_postalcode']; ?>">
                    <label for="stu_postalcode" <?php if ($badan['dtstu']['stu_postalcode'] != '') echo "class='active'"; ?>>Kode Pos</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_placetolive" id="stu_placetolive" value="<?= $badan['dtstu']['stu_placetolive']; ?>">
                    <label for="stu_placetolive" <?php if ($badan['dtstu']['stu_placetolive'] != '') echo "class='active'"; ?>>Status Tempat Tinggal</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_transportation" id="stu_transportation" value="<?= $badan['dtstu']['stu_transportation']; ?>">
                    <label for="stu_transportation" <?php if ($badan['dtstu']['stu_transportation'] != '') echo "class='active'"; ?>>Transportasi</label>
                </div>
                <div class="input-field">
                    <input type="tel" class="validate" name="stu_phone" id="stu_phone" value="<?= $badan['dtstu']['stu_phone']; ?>">
                    <label for="stu_phone" <?php if ($badan['dtstu']['stu_phone'] != '') echo "class='active'"; ?>>Nomor HP/Telepon</label>
                </div>
                <div class="input-field">
                    <input type="email" class="validate" name="stu_email" id="stu_email" value="<?= $badan['dtstu']['stu_email']; ?>">
                    <label for="stu_email" <?php if ($badan['dtstu']['stu_email'] != '') echo "class='active'"; ?>>Email</label>
                </div>
            </div>
            <div id="tab-fth" class="section scrollspy">
                <h5 class="card-title">Data Ayah</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_father_name" id="stu_father_name" value="<?= $badan['dtstu']['stu_father_name']; ?>">
                    <label for="stu_father_name" <?php if ($badan['dtstu']['stu_father_name'] != '') echo "class='active'"; ?>>Nama Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_birthplace" id="stu_father_birthplace" value="<?= $badan['dtstu']['stu_father_birthplace'] ?>">
                    <label for="stu_father_birthplace" <?php if ($badan['dtstu']['stu_father_birthplace'] != '') echo "class='active'"; ?>>Tempat Lahir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_birthdate" class="datepicker" id="stu_father_father_birthdate" value="<?= date('M d, Y', strtotime($badan['dtstu']['stu_father_birthdate'])) ?>">
                    <label for="stu_father_birthdate" class="active">Tanggal Lahir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_education" id="stu_father_education" value="<?= $badan['dtstu']['stu_father_education'] ?>">
                    <label for="stu_father_education" <?php if ($badan['dtstu']['stu_father_education'] != '') echo "class='active'"; ?>>Pendidikan Terakhir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_job" id="stu_father_job" value="<?= $badan['dtstu']['stu_father_job']; ?>">
                    <label for="stu_father_job" <?php if ($badan['dtstu']['stu_father_job'] != '') echo "class='active'"; ?>>Pekerjaan Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_salary" id="stu_father_salary" value="<?= $badan['dtstu']['stu_father_salary']; ?>">
                    <label for="stu_father_salary" <?php if ($badan['dtstu']['stu_father_salary'] != '') echo "class='active'"; ?>>Gaji Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_specialneeds" id="stu_father_specialneeds" value="<?= $badan['dtstu']['stu_father_specialneeds']; ?>">
                    <label for="stu_father_specialneeds" <?php if ($badan['dtstu']['stu_father_specialneeds'] != '') echo "class='active'"; ?>>Kebutuhan Khusus Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_phone" id="stu_father_phone" value="<?= $badan['dtstu']['stu_father_phone']; ?>">
                    <label for="stu_father_phone" <?php if ($badan['dtstu']['stu_father_phone'] != '') echo "class='active'"; ?>>Nomor Telepon/HP Ayah</label>
                </div>
            </div>
            <div id="tab-mth" class="section scrollspy">
                <h5 class="card-title">Data Ibu</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_mother_name" id="stu_mother_name" value="<?= $badan['dtstu']['stu_mother_name']; ?>">
                    <label for="stu_mother_name" <?php if ($badan['dtstu']['stu_mother_name'] != '') echo "class='active'"; ?>>Nama Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_birthplace" id="stu_mother_birthplace" value="<?= $badan['dtstu']['stu_mother_birthplace'] ?>">
                    <label for="stu_mother_birthplace" <?php if ($badan['dtstu']['stu_mother_birthplace'] != '') echo "class='active'"; ?>>Tempat Lahir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_birthdate" class="datepicker" id="stu_mother_mother_birthdate" value="<?= date('M d, Y', strtotime($badan['dtstu']['stu_mother_birthdate'])) ?>">
                    <label for="stu_mother_birthdate" class="active">Tanggal Lahir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_education" id="stu_mother_education" value="<?= $badan['dtstu']['stu_mother_education'] ?>">
                    <label for="stu_mother_education" <?php if ($badan['dtstu']['stu_mother_education'] != '') echo "class='active'"; ?>>Pendidikan Terakhir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_job" id="stu_mother_job" value="<?= $badan['dtstu']['stu_mother_job']; ?>">
                    <label for="stu_mother_job" <?php if ($badan['dtstu']['stu_mother_job'] != '') echo "class='active'"; ?>>Pekerjaan Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_salary" id="stu_mother_salary" value="<?= $badan['dtstu']['stu_mother_salary']; ?>">
                    <label for="stu_mother_salary" <?php if ($badan['dtstu']['stu_mother_salary'] != '') echo "class='active'"; ?>>Gaji Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_specialneeds" id="stu_mother_specialneeds" value="<?= $badan['dtstu']['stu_mother_specialneeds']; ?>">
                    <label for="stu_mother_specialneeds" <?php if ($badan['dtstu']['stu_mother_specialneeds'] != '') echo "class='active'"; ?>>Kebutuhan Khusus Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_phone" id="stu_mother_phone" value="<?= $badan['dtstu']['stu_mother_phone']; ?>">
                    <label for="stu_mother_phone" <?php if ($badan['dtstu']['stu_mother_phone'] != '') echo "class='active'"; ?>>Nomor Telepon/HP Ibu</label>
                </div>
            </div>
            <div id="tab-grd" class="section scrollspy">
                <h5 class="card-title">Data Wali</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_name" id="stu_guardian_name" value="<?= $badan['dtstu']['stu_guardian_name']; ?>">
                    <label for="stu_guardian_name" <?php if ($badan['dtstu']['stu_guardian_name'] != '') echo "class='active'"; ?>>Nama Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_birthplace" id="stu_guardian_birthplace" value="<?= $badan['dtstu']['stu_guardian_birthplace'] ?>">
                    <label for="stu_guardian_birthplace" <?php if ($badan['dtstu']['stu_guardian_birthplace'] != '') echo "class='active'"; ?>>Tempat Lahir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_birthdate" class="datepicker" id="stu_guardian_guardian_birthdate" value="<?= date('M d, Y', strtotime($badan['dtstu']['stu_guardian_birthdate'])) ?>">
                    <label for="stu_guardian_birthdate" class="active">Tanggal Lahir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_education" id="stu_guardian_education" value="<?= $badan['dtstu']['stu_guardian_education'] ?>">
                    <label for="stu_guardian_education" <?php if ($badan['dtstu']['stu_guardian_education'] != '') echo "class='active'"; ?>>Pendidikan Terakhir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_job" id="stu_guardian_job" value="<?= $badan['dtstu']['stu_guardian_job']; ?>">
                    <label for="stu_guardian_job" <?php if ($badan['dtstu']['stu_guardian_job'] != '') echo "class='active'"; ?>>Pekerjaan Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_salary" id="stu_guardian_salary" value="<?= $badan['dtstu']['stu_guardian_salary']; ?>">
                    <label for="stu_guardian_salary" <?php if ($badan['dtstu']['stu_guardian_salary'] != '') echo "class='active'"; ?>>Gaji Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_specialneeds" id="stu_guardian_specialneeds" value="<?= $badan['dtstu']['stu_guardian_specialneeds']; ?>">
                    <label for="stu_guardian_specialneeds" <?php if ($badan['dtstu']['stu_guardian_specialneeds'] != '') echo "class='active'"; ?>>Kebutuhan Khusus Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_phone" id="stu_guardian_phone" value="<?= $badan['dtstu']['stu_guardian_phone']; ?>">
                    <label for="stu_guardian_phone" <?php if ($badan['dtstu']['stu_guardian_phone'] != '') echo "class='active'"; ?>>Nomor Telepon/HP Wali</label>
                </div>
            </div>
            <button class="btn red left waves-effect waves-light data-batal" >Batal</button>
            <button class="btn indigo right waves-effect waves-light" id="kirim-upt">Kirim</button>
        </form>
    </div>
    <div class="col m3 l2 hide-on-small-only">
        <ul class="section table-of-contents fixed">
            <li><a href="#tab-bio">Biodata</a></li>
            <li><a href="#tab-doc">Dokumen</a></li>
            <li><a href="#tab-con">Alamat dan Kontak</a></li>
            <li><a href="#tab-fth">Data Ayah</a></li>
            <li><a href="#tab-mth">Data Ibu</a></li>
            <li><a href="#tab-grd">Data Wali</a></li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.scrollspy').scrollSpy({
            scrollOffset: 0
        });

        $('select').formSelect();

        $('.datepicker').datepicker();

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url : "<?= basis_url('data/user/siswa/list'); ?>",
                success: function (url) {
                    $('#stu-content').html(url);
                    $('#btn-add').show();
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            var acls = $('#stu_cls').val();
            var amjr = $('#stu_mjr').val();
            if (acls != null && amjr != null) {
                $.ajax({
                    data: $('#fr-upt').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/siswa/update'); ?>",
                    success: function (url) {
                        $('#stu-content').html(url);
                        $('#btn-add').show();
                        M.toast({html: "Data telah diperbarui!"});
                    },
                    error: function() {
                        M.toast({html: "Data gagal diperbarui."});
                    }
                });
            } else {
                swal('Kesalahan!', 'Lengkapi data kelas dan jurusan!', 'error');
            }
        });
    });

    
</script>