<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="white-text card-title"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="tch-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Foto</th>
                    <th class="center">NIP</th>
                    <th class="center">Nama</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dttch'] != NULL) { ?>
                    <?php foreach ($badan['dttch'] as $dttch) { ?>
                        <tr>
                            <td class="center"><?= $no++ ?></td>
                            <td class="center">
                                <?php if ($dttch['tch_photo'] != '') { ?>
                                    <a href="" class="modal-trigger" data-target="modal-utp" onclick="uptphoto('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name'] ?>', '<?= $dttch['tch_photo'] ?>');"><img src="<?= basis_url($dttch['tch_photo']); ?>" style="max-width: 50pt;" alt="Foto Profil"></a>
                                <?php } else { ?>
                                    <button class="btn indigo waves-effect waves-light modal-trigger" data-target="modal-upp" onclick="addphoto('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name'] ?>');"><i class="material-icons">add_a_photo</i></button>
                                <?php } ?>
                            </td>
                            <td class="center"><?= $dttch['tch_idnumber']; ?></td>
                            <td><?= $dttch['tch_name']; ?></td>
                            <td class="center"><?= ($dttch['tch_status'] == 'on') ? '<span class="green badge new white-text" data-badge-caption="Aktif"></span>' : '<span class="red badge new white-text" data-badge-caption="Non-Aktif"></span>' ?></td>
                            <td class="center">
                                <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dttch['tch_id']; ?>')"><i class="material-icons">search</i></button>
                                <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dttch['tch_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red waves-effect waves-light" onclick="resdata('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name']; ?>', '<?= $dttch['tch_idnumber']; ?>', '<?= $dttch['tch_passworddef']; ?>');"><i class="material-icons">replay</i></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td class="center" colspan="4">Tidak ada data.</td>
                    </tr>
                <?php } ?>
            </table>
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
                <h5 class="modal-title" id="det-tch_name"></h5>
                <div class="divider"></div>
                <p id="det-tch_idnumber"></p>
                <p id="det-tch_birth"></p>
                <p id="det-tch_religion"></p>
                <p id="det-tch_address"></p>
                <p id="det-tch_foundationacc"></p>
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
                    <p class="modal-title">Update foto untuk <b><b id="utpname"></b> #<b id="utp-text-tch_id"></b></b></p>
                    <div class="divider"></div>
                    <div class="input-field file-field">
                        <div class="input-field">
                            <input type="text" name="tch_id" id="txtu-tch_id" readonly>
                            <label for="txtu-tch_id" id="ltxtu-tch-id">ID User</label>
                        </div>
                        <div class="btn indigo waves-light waves-effect">
                            <span>Pilih Foto...</span>
                            <input type="file" name="tch_photo" id="utp-tch_photo">
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
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upp">
    <form action="" method="post" id="fr-upp" enctype="multipart/form-data">
        <div class="modal-content">
            <p class="modal-title">Unggah foto untuk <b><b id="uppname"></b> #<b id="upp-text-tch_id"></b></b></p>
            <div class="divider"></div>
            <div class="input-field file-field">
                <div class="input-field">
                    <input type="text" name="tch_id" id="txt-tch_id" readonly>
                    <label for="txt-tch_id" id="ltxt-tch-id">ID User</label>
                </div>
                <div class="btn indigo waves-light waves-effect">
                    <span>Pilih Foto...</span>
                    <input type="file" name="tch_photo" id="upt-tch_photo">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upp" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script>
    function addphoto(tch_id, tch_name) {
        $('#uppname').html(tch_name);
        $('#upp-text-tch_id').html(tch_id);
        $('#txt-tch_id').val(tch_id);
        $('#ltxt-tch-id').addClass('active');
    }

    function uptphoto(tch_id, tch_name, tch_photo) {
        $('#utpname').html(tch_name);
        $('#utp-text-tch_id').html(tch_id);
        $('#txtu-tch_id').val(tch_id);
        $('#ltxtu-tch-id').addClass('active');
        $('#utp-photo').attr('src', '<?= basis_url() ?>' + tch_photo);
        $('#utp-photo').attr('alt', 'PP dari ' + tch_name + ' #' + tch_id);
    }

    function detdata(tch_id) {
        $('#det-tch_name, #det-tch_idnumber, #det-tch_birth, #det-tch_religion, #det-tch_address, #det-tch_foundationacc').html('');
        $('#det-photo').attr('src', '');
        $('#det-photo').attr('alt', '');
        $.ajax({
            dataType: "JSON",
            data: {usr_id: tch_id},
            type: "POST",
            url: "<?= basis_url('data/user/guru/detail'); ?>",
            success: function (data) {
                $('#det-photo').attr('src', '<?= basis_url(); ?>' + data.tch_photo);
                $('#det-photo').attr('alt', 'Foto dari ' + data.tch_name + ' #' + data.tch_id);
                $('#det-tch_name').html(data.tch_name);
                $('#det-tch_idnumber').html('NIP. ' + data.tch_idnumber);
                $('#det-tch_birth').html(data.tch_birthplace + ', ' + data.tch_birthdate);
                $('#det-tch_religion').html(data.tch_religion);
                $('#det-tch_address').html(data.tch_streetaddress + ', ' + data.tch_hamlet + ' ' + data.tch_rt + '/' + data.tch_rw + ', ' + data.tch_village + ', ' + data.tch_district + ', ' + data.tch_postalcode);
                $('#det-tch_foundationacc').html(data.tch_foundationacc + ' pada tanggal ' + data.tch_foundationaccdate);
            }
        });
    }

    function uptdata(tch_id) {
        $.ajax({
            data: {usr_id: tch_id},
            type: "POST",
            url: "<?= basis_url('data/user/guru/detail-upt'); ?>",
            success: function (url) {
                $('#tch-content').html(url);
                $('#btn-add').hide();
            },
            error: function() {
                swal("エッラー!", "サーバーの接続が見つかりません。", "error");
            }
        });
    }

    function resdata(tch_id, tch_name, tch_idnumber, tch_passworddef) {
        swal({
            title: 'Anda Yakin?',
            text: 'Username dan password akun pengajar dengan tagar ' + tch_id + ' milik ' + tch_name + ' akan diset ulang ke setelan default.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {usr_id: tch_id, usr_name: tch_idnumber, usr_password: tch_passworddef},
                    type: "POST",
                    url: "<?= basis_url('data/user/guru/reset'); ?>",
                    success: function (url) {
                        $('#stu-content').html(url);
                        swal('Username dan password akun pengajar dengan tagar ' + tch_id + ' milik ' + tch_name + ' telah diset ulang menjadi username dan password default!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Username dan password akun pengajar dengan tagar ' + tch_id + ' milik ' + tch_name + ' tidak dapat diset ulang!', {
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
                url: "<?= basis_url('data/user/guru/id-add'); ?>",
                success: function (url) {
                    $('#tch-content').html(url);
                    $('#btn-add').hide();
                },
                error: function() {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });

        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#kirim-utp').click(function (e) {
            e.preventDefault();
            var file_data = $('#utp-tch_photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('tch_id', $('#txtu-tch_id').val());
            form_data.append('file', file_data);
            $.ajax({
                url:"<?= basis_url('data/user/guru/photo-upload'); ?>",
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success:function (url) {
                    $('#tch-content').html(url);
                    M.toast({html: "Upload foto berhasil!"});
                },
                error: function () {
                    M.toast({html: "Upload foto gagal!"});
                }
            });
        });

        $('#kirim-upp').click(function (e) {
            e.preventDefault();
            var file_data = $('#upt-tch_photo').prop('files')[0];
            var form_data = new FormData();
            form_data.append('tch_id', $('#txt-tch_id').val());
            form_data.append('file', file_data);
            $.ajax({
                url:"<?= basis_url('data/user/guru/photo-upload'); ?>",
                dataType: 'text', 
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success:function (url) {
                    $('#tch-content').html(url);
                    M.toast({html: "Upload foto berhasil!"});
                },
                error: function () {
                    M.toast({html: "Upload foto gagal!"});
                }
            });
        });
    });
</script>