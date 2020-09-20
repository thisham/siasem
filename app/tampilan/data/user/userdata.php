<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="white-text card-title"><?= $title; ?></h3>
        </div>
        <div class="card-content" id="usr-content">
            <div class="input-field">
                <input type="text" name="lst_txt" class="autocomplete" id="lst_txt">
                <label for="lst_txt">Kueri Pencarian... (UserID atau Username)</label>
            </div>
            <div id="usr-tbl">
                <?php 
                    $no = 1; 
                    $akses = array('Siswa', 'Administrator', 'Kepala Sekolah', 'Guru', 'Keuangan');
                ?>
                <table class="table striped responsive-table">
                    <tr>
                        <th class="center">No.</th>
                        <th class="center">User ID</th>
                        <th class="center">Username</th>
                        <th class="center">Akses</th>
                        <th class="center">Status</th>
                        <th class="center">Aksi</th>
                    </tr>
                    <?php if ($badan['dtusr'] != NULL) { ?>
                        <?php foreach ($badan['dtusr'] as $dtusr) { ?>
                            <tr>
                                <td class="center"><?= $no++; ?></td>
                                <td class="center"><?= $dtusr['usr_id']; ?></td>
                                <td class="center"><?= $dtusr['usr_name']; ?></td>
                                <td class="center"><?= $akses[$dtusr['usr_role']]; ?></td>
                                <td class="center"><?= ($dtusr['usr_status'] == 'on') ? '<span class="badge new green" data-badge-caption="Aktif"></span>' : '<span class="badge new grey" data-badge-caption="Suspend"></span>' ; ?></td>
                                <td class="center">
                                    <button class="btn btn-small indigo waves-effect waves-light modal-trigger" data-target="modal-det" onclick="detdata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_name']; ?>', '<?= $dtusr['usr_role']; ?>');"><i class="material-icons">search</i></button>
                                    <button class="btn btn-small orange waves-effect waves-light" onclick="pwrdata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_name']; ?>', '<?= $dtusr['usr_status']; ?>');"><i class="material-icons">power_settings_new</i></button>
                                    <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_role']; ?>', '<?= $dtusr['usr_name']; ?>');"><i class="material-icons">delete</i></button>
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
                <h5 class="modal-title" id="det-usr_data">ASDF</h5>
                <div class="divider"></div>
                <h6 class="card-title" id="det-usr_name">ASD</h6>
                <br><br><br>
                <h4 class="card-title" id="det-usr_role">ASD</h4>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light red modal-close">Tutup</button>
    </div>
</div>

<script>
    function deldata(usr_id, usr_role, usr_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' akan dihapus. User tersebut akan kehilangan akses selamanya pada aplikasi ini. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {usr_id: usr_id},
                    type: "POST",
                    url: "<?= basis_url('data/user/userdata/hapus'); ?>",
                    success: function (url) {
                        $('#usr-content').html(url);
                        swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' telah dihapus dan kehilangan akses!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak dihapus!', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak jadi dihapus!');
            }
        });
    }

    function detdata(usr_id, usr_name, usr_role) {
        $('#det-usr_data, #det-usr_name, #det-usr_role').html('');
        $('#det-photo').attr('src', '<?= basis_url('assets/img/logo-smk.png'); ?>');
        $('#det-photo').attr('alt', 'Foto Profil');
        switch (usr_role) {
            case '1':
                var url = "<?= basis_url('data/user/administrator/detail'); ?>";
                var pos = "Administrator";
                break;

            case '2':
                var url = "<?= basis_url('data/user/kepala-sekolah/detail'); ?>";
                var pos = "Kepala Sekolah";
                break;

            case '3':
                var url = "<?= basis_url('data/user/guru/detail'); ?>";
                var pos = "Guru";
                break;
            
            case '4':
                var url = "<?= basis_url('data/user/keuangan/detail'); ?>";
                var pos = "Keuangan";
                break;
        
            default:
                var url = "<?= basis_url('data/user/siswa/detail'); ?>";
                var pos = "Siswa";
                break;
        }
        $.ajax({
            dataType: "JSON",
            data: {usr_id: usr_id},
            type: "POST",
            url: url,
            success: function (data) {
                switch (usr_role) {
                    case '1':
                        var name = data.adm_name;
                        var tags = data.adm_id;
                        var foto = null;
                        break;

                    case '2':
                        var name = data.hdm_name;
                        var tags = data.hdm_id;
                        var foto = null;
                        break;

                    case '3':
                        var name = data.tch_name;
                        var tags = data.tch_id;
                        var foto = data.tch_photo;
                        break;
                    
                    case '4':
                        var name = data.fin_name;
                        var tags = data.fin_id;
                        var foto = null;
                        break;
                
                    default:
                        var name = data.stu_name;
                        var tags = data.stu_id;
                        var foto = data.stu_photo;
                        break;
                }
                console.log(usr_name);
                $('#det-usr_data').html(usr_name + ' #' + tags);
                $('#det-usr_name').html(name);
                $('#det-usr_role').html(pos); 
                if (foto != null) {
                    $('#det-photo').attr('src', '<?= basis_url(); ?>' + foto);
                    $('#det-photo').attr('alt', 'Foto Profil dari ' + usr_name + ' #' + usr_id);
                }               
            },
            error: function () {
                swal('Error', 'Kan geen verbinding maken met de server!', 'error');
            }
        });
    }

    function pwrdata(usr_id, usr_name, usr_status) {
        if (usr_status == 'on') {
            swal({
                title: 'Anda Yakin?',
                text: 'Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' akan di-suspensikan.',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        data: {usr_id: usr_id, usr_status: 'off'},
                        type: "POST",
                        url: "<?= basis_url('data/user/userdata/update-status-val'); ?>",
                        success: function (url) {
                            $('#usr-content').html(url);
                            swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' telah di-suspensikan!', {
                                icon: 'success'
                            });
                        },
                        error: function () {
                            swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak di-suspensikan!', {
                                icon: 'error'
                            });
                        }
                    });
                            
                } else {
                    swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak jadi di-suspensikan!');
                }
            });
        } else {
            swal({
                title: 'Anda Yakin?',
                text: 'Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' akan diaktifkan.',
                icon: 'warning',
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        data: {usr_id: usr_id, usr_status: 'on'},
                        type: "POST",
                        url: "<?= basis_url('data/user/userdata/update-status-val'); ?>",
                        success: function (url) {
                            $('#usr-content').html(url);
                            swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' telah diaktifkan!', {
                                icon: 'success'
                            });
                        },
                        error: function () {
                            swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak diaktifkan!', {
                                icon: 'error'
                            });
                        }
                    });
                            
                } else {
                    swal('Akun dengan UserID ' + usr_id + ' - ' + usr_name + ' tidak jadi diaktifkan!');
                }
            });
        }
    }

    $(document).ready(function () {
        $('#lst_txt').keyup(function () {
            var x = $('#lst_txt').val();
            $.ajax({
                data: {query: $('#lst_txt').val()},
                type: "POST",
                url: "<?= basis_url('data/user/userdata/search'); ?>",
                success: function (url) {
                    $('#usr-tbl').html(url);
                }
            });
        });
    });
</script>