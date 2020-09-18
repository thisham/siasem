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
        <form action="" method="post" id="fr-add">
            <div id="tab-bio" class="section scrollspy">
                <h5 class="card-title">Biodata</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_id" id="stu_id" value="<?= $badan['dtstu']; ?>" readonly>
                    <label for="stu_id" class="active">Tagar User</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_idnumber" id="stu_idnumber">
                    <label for="stu_idnumber">Nomor Induk Siswa</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_nisn" id="stu_nisn">
                    <label for="stu_nisn">Nomor Induk Siswa Nasional</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_name" id="stu_name">
                    <label for="stu_name">Nama Siswa</label>
                </div>
                <p>
                    <p>Jenis Kelamin</p>
                    <label>
                        <input type="radio" name="stu_gender" class="with-gap" value="L">
                        <span>Laki-Laki</span>
                    </label>
                    <label>
                        <input type="radio" name="stu_gender" class="with-gap" value="P">
                        <span>Perempuan</span>
                    </label>
                </p>
                <div class="input-field">
                    <input type="text" name="stu_birthplace" id="stu_birthplace">
                    <label for="stu_birthplace">Tempat Kelahiran</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_birthdate" class="datepicker" id="stu_birthdate">
                    <label for="stu_birthdate">Tanggal Kelahiran</label>
                </div>
                <div class="input-field">
                    <select name="stu_religion" id="stu_religion">
                        <option value="" selected disabled>Pilih Agama...</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Lainnya...">Lainnya...</option>
                    </select>
                    <label for="stu_religion">Agama</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_specialneeds" id="stu_specialneeds">
                    <label for="stu_specialneeds">Kebutuhan Khusus</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_generation" id="stu_generation">
                    <label for="stu_generation">Angkatan</label>
                </div>
                <div class="input-field">
                    <select name="stu_cls" id="stu_cls">
                        <option value="" selected disabled>Pilih Kelas...</option>
                        <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                            <option value="<?= $dtcls['cls_id']; ?>"><?= $dtcls['cls_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="stu_cls">Kelas</label>
                </div>
                <div class="input-field">
                    <select name="stu_mjr" id="stu_mjr">
                        <option value="" selected disabled>Pilih Jurusan...</option>
                        <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                            <option value="<?= $dtmjr['mjr_id']; ?>"><?= $dtmjr['mjr_name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="stu_mjr">Jurusan</label>
                </div>
                <p>
                    <label>
                        <input type="checkbox" name="stu_studentstatus" id="stu_studentstatus">
                        <span>Pelajar Aktif</span>
                    </label>
                </p>
                <br>
            </div>
            <div id="tab-doc" class="section scrollspy">
                <h5 class="card-title">Dokumen</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_nik" id="stu_nik">
                    <label for="stu_nik">Nomor Induk Kependudukan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_skhun" id="stu_skhun">
                    <label for="stu_skhun">Nomor SKHUN</label>
                </div>
                <p>
                    <label>
                        <input type="checkbox" name="stu_kpsrecipient" id="stu_kpsrecipient">
                        <span>Penerima KPS</span>
                    </label>
                </p>
                <div class="input-field">
                    <input type="text" name="stu_kpsnumber" id="stu_kpsnumber">
                    <label for="stu_kpsnumber">Nomor KPS</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_initialstatus" id="stu_initialstatus">
                    <label for="stu_initialstatus">Status Awal Masuk</label>
                </div>
            </div>
            <div id="tab-con" class="section scrollspy">
                <h5 class="card-title">Alamat dan Kontak</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_address" id="stu_address">
                    <label for="stu_address">Alamat Jalan</label>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="stu_rt" id="stu_rt">
                            <label for="stu_rt">RT</label>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="input-field">
                            <input type="text" name="stu_rw" id="stu_rw">
                            <label for="stu_rw">RW</label>
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_hamlet" id="stu_hamlet">
                    <label for="stu_hamlet">Dusun/Dukuh/Perumahan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_village" id="stu_village">
                    <label for="stu_village">Desa/Kelurahan</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_district" id="stu_district">
                    <label for="stu_district">Kecamatan/Distrik</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_postalcode" id="stu_postalcode">
                    <label for="stu_postalcode">Kode Pos</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_placetolive" id="stu_placetolive">
                    <label for="stu_placetolive">Status Tempat Tinggal</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_transportation" id="stu_transportation">
                    <label for="stu_transportation">Transportasi</label>
                </div>
                <div class="input-field">
                    <input type="tel" class="validate" name="stu_phone" id="stu_phone">
                    <label for="stu_phone">Nomor HP/Telepon</label>
                </div>
                <div class="input-field">
                    <input type="email" class="validate" name="stu_email" id="stu_email">
                    <label for="stu_email">Email</label>
                </div>
            </div>
            <div id="tab-fth" class="section scrollspy">
                <h5 class="card-title">Data Ayah</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_father_name" id="stu_father_name">
                    <label for="stu_father_name">Nama Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_birthplace" id="stu_father_birthplace">
                    <label for="stu_father_birthplace">Tempat Lahir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_birthdate" class="datepicker" id="stu_father_name">
                    <label for="stu_father_birthdate">Tanggal Lahir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_education" id="stu_father_education">
                    <label for="stu_father_education">Pendidikan Terakhir Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_job" id="stu_father_job">
                    <label for="stu_father_job">Pekerjaan Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_salary" id="stu_father_salary">
                    <label for="stu_father_salary">Gaji Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_specialneeds" id="stu_father_specialneeds">
                    <label for="stu_father_specialneeds">Kebutuhan Khusus Ayah</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_father_phone" id="stu_father_phone">
                    <label for="stu_father_phone">Nomor Telepon/HP Ayah</label>
                </div>
            </div>
            <div id="tab-mth" class="section scrollspy">
                <h5 class="card-title">Data Ibu</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_mother_name" id="stu_mother_name">
                    <label for="stu_mother_name">Nama Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_birthplace" id="stu_mother_birthplace">
                    <label for="stu_mother_birthplace">Tempat Lahir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_birthdate" class="datepicker" id="stu_mother_name">
                    <label for="stu_mother_birthdate">Tanggal Lahir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_education" id="stu_mother_education">
                    <label for="stu_mother_education">Pendidikan Terakhir Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_job" id="stu_mother_job">
                    <label for="stu_mother_job">Pekerjaan Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_salary" id="stu_mother_salary">
                    <label for="stu_mother_salary">Gaji Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_specialneeds" id="stu_mother_specialneeds">
                    <label for="stu_mother_specialneeds">Kebutuhan Khusus Ibu</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_mother_phone" id="stu_mother_phone">
                    <label for="stu_mother_phone">Nomor Telepon/HP Ibu</label>
                </div>
            </div>
            <div id="tab-grd" class="section scrollspy">
                <h5 class="card-title">Data Wali</h5>
                <div class="divider"></div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_name" id="stu_guardian_name">
                    <label for="stu_guardian_name">Nama Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_birthplace" id="stu_guardian_birthplace">
                    <label for="stu_guardian_birthplace">Tempat Lahir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_birthdate" class="datepicker" id="stu_guardian_name">
                    <label for="stu_guardian_birthdate">Tanggal Lahir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_education" id="stu_guardian_education">
                    <label for="stu_guardian_education">Pendidikan Terakhir Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_job" id="stu_guardian_job">
                    <label for="stu_guardian_job">Pekerjaan Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_salary" id="stu_guardian_salary">
                    <label for="stu_guardian_salary">Gaji Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_specialneeds" id="stu_guardian_specialneeds">
                    <label for="stu_guardian_specialneeds">Kebutuhan Khusus Wali</label>
                </div>
                <div class="input-field">
                    <input type="text" name="stu_guardian_phone" id="stu_guardian_phone">
                    <label for="stu_guardian_phone">Nomor Telepon/HP Wali</label>
                </div>
            </div>
            <button class="btn red left waves-effect waves-light data-batal" >Batal</button>
            <button class="btn indigo right waves-effect waves-light" id="kirim-add">Tambah</button>
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

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            var acls = $('#stu_cls').val();
            var amjr = $('#stu_mjr').val();
            if (acls != null && amjr != null) {
                $.ajax({
                    data: $('#fr-add').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/siswa/tambah'); ?>",
                    success: function (url) {
                        $('#stu-content').html(url);
                        $('#btn-add').show();
                        M.toast({html: "Data telah ditambahkan!"});
                    },
                    error: function() {
                        M.toast({html: "Data gagal ditambahkan."});
                    }
                });
            } else {
                swal('Kesalahan!', 'Lengkapi data kelas dan jurusan!', 'error');
            }
        });
    });

    
</script>