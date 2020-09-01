<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>

        <div class="card-content" id="ptk-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Jenis PTK</th>
                    <th class="center">Keterangan</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtptk'] != NULL) { ?>
                    <?php foreach ($badan['dtptk'] as $dtptk) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtptk['ptk_name']; ?></td>
                            <td><?= $dtptk['ptk_information']; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtptk['ptk_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtptk['ptk_id']; ?>', '<?= $dtptk['ptk_name']; ?>');"><i class="material-icons">delete</i></button>
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
                <input type="text" name="ptk_id" id="add-ptk_id" readonly>
                <label for="add-ptk_id" id="ladd-ptk-id">ID PTK</label>
            </div>
            <div class="input-field">
                <input type="text" name="ptk_name" id="add-ptk_name">
                <label for="add-ptk_name" id="ladd-ptk-name">Jenis PTK</label>
            </div>
            <div class="input-field">
                <input type="text" name="ptk_information" id="add-ptk_information">
                <label for="add-ptk_information" id="ladd-ptk-information">Keterangan</label>
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
                <input type="text" name="ptk_id" id="upt-ptk_id" readonly>
                <label for="upt-ptk_id" id="lupt-ptk-id">ID PTK</label>
            </div>
            <div class="input-field">
                <input type="text" name="ptk_name" id="upt-ptk_name">
                <label for="upt-ptk_name" id="lupt-ptk-name">Jenis PTK</label>
            </div>
            <div class="input-field">
                <input type="text" name="ptk_information" id="upt-ptk_information">
                <label for="upt-ptk_information" id="lupt-ptk-information">Keterangan</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function uptdata (ptk_id) {
        $('#add-ptk_id, #add-ptk_name, #add-ptk_information').val('');
        $('#ladd-ptk-id, #ladd-ptk-name, #ladd-ptk-information').removeClass('active');
        $.ajax({
            dataType: "JSON",
            data: {ptk_id: ptk_id},
            type: "POST",
            url: "<?= basis_url('data/master/ptk/detail'); ?>",
            success: function (data) {
                if (data.ptk_id != '') {
                    $('#upt-ptk_id').val(data.ptk_id);
                    $('#lupt-ptk-id').addClass('active');
                }
                if (data.ptk_name !='') {
                    $('#upt-ptk_name').val(data.ptk_name);
                    $('#lupt-ptk-name').addClass('active');
                }
                if (data.ptk_information != '') {
                    $('#upt-ptk_information').val(data.ptk_information);
                    $('#lupt-ptk-information').addClass('active');
                }
            }
        });
    }

    function deldata (ptk_id, ptk_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Data PTK ' + ptk_id + ' - ' + ptk_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {ptk_id: ptk_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/ptk/hapus'); ?>",
                    success: function (url) {
                        $('#ptk-content').html(url);
                        swal('Data PTK ' + ptk_id + ' - ' + ptk_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Data PTK ' + ptk_id + ' - ' + ptk_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Data PTK ' + ptk_id + ' - ' + ptk_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#add-ptk_id, #add-ptk_name, #add-ptk_information').val('');
            $('#ladd-ptk-id, #ladd-ptk-name, #ladd-ptk-information').removeClass('active');
            $.ajax({
                url: "<?= basis_url('data/master/ptk/id-add'); ?>",
                success: function (url) {
                    $('#add-ptk_id').val(url);
                    $('#ladd-ptk-id').addClass('active');
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/ptk/tambah'); ?>",
                success: function (url) {
                    $('#ptk-content').html(url);
                    M.toast({html: 'Data berhasil ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/ptk/update'); ?>",
                success: function (url) {
                    $('#ptk-content').html(url);
                    M.toast({html: 'Data berhasil diperbarui!'});
                }
            });
        });
    });
</script>