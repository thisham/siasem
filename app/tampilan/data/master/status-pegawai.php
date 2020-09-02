<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="est-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Status Kepegawaian</th>
                    <th class="center">Keterangan</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtest'] != NULL) { ?>
                    <?php foreach ($badan['dtest'] as $dtest) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtest['est_employeestatuses']; ?></td>
                            <td><?= $dtest['est_information']; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtest['est_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtest['est_id']; ?>', '<?= $dtest['est_employeestatuses']; ?>');"><i class="material-icons">delete</i></button>
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

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 class="modal-title">Tambah Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="est_id" id="add-est_id" readonly>
                <label for="add-est_id" id="ladd-est-id">ID Status Kepegawaian</label>
            </div>
            <div class="input-field">
                <input type="text" name="est_employeestatuses" id="add-est_employeestatuses">
                <label for="est_employeestatuses" id="ladd-est-employeestatuses">Status Kepegawaian</label>
            </div>
            <div class="input-field">
                <input type="text" name="est_information" id="add-est_information">
                <label for="add-est_information" id="ladd-est-information">Keterangan</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-add" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upt">
    <form action="" method="post" id="fr-upt">
        <div class="modal-content">
            <h4 class="modal-title">Update Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="est_id" id="upt-est_id" readonly>
                <label for="upt-est_id" id="lupt-est-id">ID Status Kepegawaian</label>
            </div>
            <div class="input-field">
                <input type="text" name="est_employeestatuses" id="upt-est_employeestatuses">
                <label for="est_employeestatuses" id="lupt-est-employeestatuses">Status Kepegawaian</label>
            </div>
            <div class="input-field">
                <input type="text" name="est_information" id="upt-est_information">
                <label for="upt-est_information" id="lupt-est-information">Keterangan</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script>
    function uptdata (est_id) {
        $('#upt-est_id, #upt-est_employeestatuses, #upt-est_information').val('');
        $('#lupt-est-id, #lupt-est-employeestatuses, #lupt-est-information').removeClass('active');
        $.ajax({
            dataType: "JSON",
            data: {est_id: est_id},
            type: "POST",
            url: "<?= basis_url('data/master/status-pegawai/detail'); ?>",
            success: function (data) {
                if (data.est_id != '') {
                    $('#upt-est_id').val(data.est_id);
                    $('#lupt-est-id').addClass('active');
                }
                if (data.est_employeestatuses != '') {
                    $('#upt-est_employeestatuses').val(data.est_employeestatuses);
                    $('#lupt-est-employeestatuses').addClass('active');
                }
                if (data.est_information != '') {
                    $('#upt-est_information').val(data.est_information);
                    $('#lupt-est-information').addClass('active');
                }
            }
        });
    }

    function deldata (est_id, est_employeestatuses) {
        swal({
            title: 'Anda Yakin?',
            text: 'Status pegawai ' + est_id + ' - ' + est_employeestatuses + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {est_id: est_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/status-pegawai/hapus'); ?>",
                    success: function (url) {
                        $('#est-content').html(url);
                        swal('Status pegawai ' + est_id + ' - ' + est_employeestatuses + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Status pegawai ' + est_id + ' - ' + est_employeestatuses + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Status pegawai ' + est_id + ' - ' + est_employeestatuses + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#add-est_id, #add-est_employeestatuses, #add-est_information').val('');
            $('#ladd-est-id, #ladd-est-employeestatuses, #ladd-est-information').removeClass('active');
            $.ajax({
                url: "<?= basis_url('data/master/status-pegawai/id-add'); ?>",
                success: function (url) {
                    $('#add-est_id').val(url);
                    $('#ladd-est-id').addClass('active');
                } 
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/status-pegawai/tambah'); ?>",
                success: function (url) {
                    $('#est-content').html(url);
                    M.toast({html: 'Data berhasil ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/status-pegawai/update'); ?>",
                success: function (url) {
                    $('#est-content').html(url);
                    M.toast({html: 'Data berhasil diperbarui!'});
                }
            });
        });
    });
</script>