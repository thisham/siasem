<div class="container">
    <div class="card indigo">
        <div class="card-action">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content white" id="stu-content">
            <?php $no = 1; ?>
            <form action="" method="post" id="fr-lst">
                <div class="row s12 center">
                    <div class="col s12 m4 l5">
                        <div class="input-field">
                            <input type="number" name="lst_gen" id="lst-gen">
                            <label for="lst-gen">Angkatan</label>
                        </div>
                    </div>
                    <div class="col s12 m4 l5">
                        <div class="input-field">
                            <select name="lst_cls" id="lst-cls">
                                <option value="" disabled selected>Pilih Kelas...</option>
                                <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                                    <?php if ($dtcls['cls_status'] == 'on') { ?>
                                        <option value="<?= $dtcls['cls_id']; ?>"><?= $dtcls['cls_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <label for="lst-cls">Kelas</label>
                        </div>
                    </div>
                    <div class="col s12 m4 l2">
                        <div class="input-field">
                            <button id="kirim-lst" class="btn waves-effect waves-light indigo">Kirim <i class="material-icons right">send</i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div id="stu-tbl">
                <table class="table striped responsive-table">
                    <tr>
                        <th class="center">No.</th>
                        <th class="center">Photo</th>
                        <th class="center">NIS</th>
                        <th class="center">Nama</th>
                        <th class="center">Status</th>
                        <th class="center">Aksi</th>
                    </tr>
                    <?php if ($badan['dtstu'] != NULL) { ?>
                        <?php foreach ($badan['dtstu'] as $dtstu) { ?>
                            <tr>
                                <td class="center"><?= $no++; ?></td>
                                <td class="center">
                                    <?php if ($dtstu['stu_photo'] != '') { ?>
                                        <a href="" class="modal-trigger" data-target="modal-utp" onclick="uptphoto('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name'] ?>', '<?= $dtstu['stu_photo'] ?>');"><img src="<?= basis_url($dtstu['stu_photo']); ?>" alt="<?= $dtstu['stu_id']; ?>" style="max-width: 50pt;"></a>
                                    <?php } else { ?>
                                        <button class="btn indigo waves-effect waves-light modal-trigger" data-target="modal-upp" onclick="addphoto('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name'] ?>');"><i class="material-icons">add_a_photo</i></button>
                                    <?php } ?>
                                </td>
                                <td class="center"><?= $dtstu['stu_idnumber']; ?></td>
                                <td><?= $dtstu['stu_name']; ?></td>
                                <td class="center"><?= ($dtstu['stu_studentstatus'] == 'on') ? '<span class="new badge green white-text" data-badge-caption="Aktif"></span>' : '<span class="new badge grey white-text" data-badge-caption="Non-Aktif"></span>' ; ?></td>
                                <td class="center">
                                <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtstu['stu_id']; ?>')"><i class="material-icons">search</i></button>
                                <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dtstu['stu_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="resdata('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name']; ?>', '<?= $dtstu['stu_idnumber']; ?>', '<?= $dtstu['stu_passworddef']; ?>');"><i class="material-icons">replay</i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td class="center" colspan="6">Tidak ada data.</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-det">
    <div class="modal-content">
        <div class="row s12">
            <div class="col s12 m6 l6 center">
                <img src="" alt="" style="max-width: 200pt; width: 100%;" id="det-photo">
            </div>
            <div class="col s12 m6 l6">
                <h5 class="modal-title" id="det-stu_name"></h5>
                <div class="divider"></div>
                <p id="det-stu_idnumber"></p>
                <p id="det-stu_birth"></p>
                <p id="det-stu_religion"></p>
                <p id="det-stu_address"></p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light red modal-close">Tutup</button>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-utp">
    <form action="" method="post" id="fr-utp" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row s12">
                <div class="col s12 m6 l6 center">
                    <img src="" alt="" style="max-width: 200pt; width: 100%;" id="utp-photo">
                </div>
                <div class="col s12 m6 l6">
                    <p class="modal-title">Update foto untuk <b><b id="utpname"></b> #<b id="utp-text-stu_id"></b></b></p>
                    <div class="divider"></div>
                    <div class="input-field file-field">
                        <div class="input-field">
                            <input type="text" name="stu_id" id="txtu-stu_id" readonly>
                            <label for="txtu-stu_id" id="ltxtu-stu-id">ID User</label>
                        </div>
                        <div class="btn indigo waves-light waves-effect">
                            <span>Pilih Foto...</span>
                            <input type="file" name="stu_photo" id="utp-stu_photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-utp" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upp">
    <form action="" method="post" id="fr-upp" enctype="multipart/form-data">
        <div class="modal-content">
            <p class="modal-title">Unggah foto untuk <b><b id="uppname"></b> #<b id="upp-text-stu_id"></b></b></p>
            <div class="divider"></div>
            <div class="input-field file-field">
                <div class="input-field">
                    <input type="text" name="stu_id" id="txt-stu_id" readonly>
                    <label for="txt-stu_id" id="ltxt-stu-id">ID User</label>
                </div>
                <div class="btn indigo waves-light waves-effect">
                    <span>Pilih Foto...</span>
                    <input type="file" name="stu_photo" id="upt-stu_photo">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upp" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script>
    function addphoto(stu_id, stu_name) {
        $('#uppname').html(stu_name);
        $('#upp-text-stu_id').html(stu_id);
        $('#txt-stu_id').val(stu_id);
        $('#ltxt-stu-id').addClass('active');
    }

    function uptdata(stu_id) {
        $.ajax({
            data: {stu_id: stu_id},
            type: "POST",
            url: "<?= basis_url('data/user/siswa/editor'); ?>",
            success: function (url) {
                $('#stu-content').html(url);
                $('#btn-add').hide();
            }
        });
    }

    function uptphoto(stu_id, stu_name, stu_photo) {
        console.log(stu_id);
        $('#utpname').html(stu_name);
        $('#utp-text-stu_id').html(stu_id);
        $('#txtu-stu_id').val(stu_id);
        $('#ltxtu-stu-id').addClass('active');
        $('#utp-photo').attr('src', '<?= basis_url() ?>' + stu_photo);
        $('#utp-photo').attr('alt', 'PP dari ' + stu_name + ' #' + stu_id);
    }

    function detdata(stu_id) {
        $('#det-stu_name, #det-stu_idnumber, #det-stu_birth, #det-stu_religion, #det-stu_address').html('');
        $('#det-photo').attr('src', '');
        $('#det-photo').attr('alt', '');
        $.ajax({
            dataType: "JSON",
            data: {stu_id: stu_id},
            type: "POST",
            url: "<?= basis_url('data/user/siswa/detail'); ?>",
            success: function (data) {
                $('#det-photo').attr('src', '<?= basis_url(); ?>' + data.stu_photo);
                $('#det-photo').attr('alt', 'Foto dari ' + data.stu_name + ' #' + data.stu_id);
                $('#det-stu_name').html(data.stu_name);
                $('#det-stu_idnumber').html('NIS. ' + data.stu_idnumber);
                $('#det-stu_birth').html(data.stu_birthplace + ', ' + data.stu_birthdate);
                $('#det-stu_religion').html(data.stu_religion);
                $('#det-stu_address').html(data.stu_address + ', ' + data.stu_hamlet + ' ' + data.stu_rt + '/' + data.stu_rw + ', ' + data.stu_village + ', ' + data.stu_district + ', ' + data.stu_postalcode);
            }
        });
    }

    function resdata(stu_id, stu_name, stu_idnumber, stu_passworddef) {
        swal({
            title: 'Anda Yakin?',
            text: 'Username dan password akun pelajar dengan tagar ' + stu_id + ' milik ' + stu_name + ' akan diset ulang ke setelan default.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {usr_id: stu_id, usr_name: stu_idnumber, usr_password: stu_passworddef},
                    type: "POST",
                    url: "<?= basis_url('data/user/siswa/reset'); ?>",
                    success: function (url) {
                        $('#stu-content').html(url);
                        swal('Username dan password akun pelajar dengan tagar ' + stu_id + ' milik ' + stu_name + ' telah diset ulang menjadi username dan password default!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Username dan password akun pelajar dengan tagar ' + stu_id + ' milik ' + stu_name + ' tidak dapat diset ulang!', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Username dan password akun pengajar dengan tagar ' + tch_id + ' milik ' + tch_name + ' tidak jadi diset ulang.');
            }
        });
    }

    $(document).ready(function () {
        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/user/siswa/id-add') ?>",
                success: function (url) {
                    $('#stu-content').html(url);
                    $('#btn-add').hide();
                },
                error: function () {
                    swal('Error', 'Kan geen verbinding maken met de server!', 'error');
                }
            });
        });

        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#kirim-lst').click(function (e) {
            e.preventDefault();
            var lgen = $('#lst-gen').val();
            var lcls = $('#lst-cls').val();

            if (lgen != null && lcls != null) {
                $.ajax({
                    data: $('#fr-lst').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/siswa/list-param'); ?>",
                    success: function (url) {
                        $('#stu-tbl').html(url);
                    },
                    error: function () {
                        swal('Error', 'Kan geen verbinding maken met de server!', 'error');
                    }
                });
            } else {
                swal('Kesalahan', 'Harap isi isian angkatan dan kelas!', 'error');
            }
        });

        $('#kirim-upp').click(function (e) {
            e.preventDefault();
            var file_data = $('#upt-stu_photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('stu_id', $('#txt-stu_id').val());
            form_data.append('file', file_data);
            $.ajax({
                url:"<?= basis_url('data/user/siswa/photo-upload'); ?>",
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success:function (url) {
                    $('#stu-content').html(url);
                    M.toast({html: "Upload foto berhasil!"});
                },
                error: function () {
                    M.toast({html: "Upload foto gagal!"});
                }
            });
        });

        $('#kirim-utp').click(function (e) {
            e.preventDefault();
            var file_data = $('#utp-stu_photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('stu_id', $('#txtu-stu_id').val());
            form_data.append('file', file_data);
            $.ajax({
                url:"<?= basis_url('data/user/siswa/photo-upload'); ?>",
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success:function (url) {
                    $('#stu-content').html(url);
                    M.toast({html: "Upload foto berhasil!"});
                },
                error: function () {
                    M.toast({html: "Upload foto gagal!"});
                }
            });
        });
    });
</script>