<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>

        <div class="card-content" id="ecl-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Golongan</th>
                    <th class="center">Keterangan</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtecl'] != NULL) { ?>
                    <?php foreach ($badan['dtecl'] as $dtecl) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td class="center"><?= $dtecl['ecl_name']; ?></td>
                            <td><?= $dtecl['ecl_information']; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtecl['ecl_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtecl['ecl_id']; ?>', '<?= $dtecl['ecl_name']; ?>');"><i class="material-icons">delete</i></button>
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
                <input type="text" name="ecl_id" id="add-ecl_id" readonly>
                <label for="add-ecl_id" id="ladd-ecl-id">ID Golongan</label>
            </div>
            <div class="input-field">
                <input type="text" name="ecl_name" id="add-ecl_name">
                <label for="add-ecl_name" id="ladd-ecl-name">Kode Golongan</label>
            </div>
            <div class="input-field">
                <input type="text" name="ecl_information" id="add-ecl_information">
                <label for="add-ecl_information" id="ladd-ecl-information">Kode Golongan</label>
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
                <input type="text" name="ecl_id" id="upt-ecl_id" readonly>
                <label for="upt-ecl_id" id="lupt-ecl-id">ID Golongan</label>
            </div>
            <div class="input-field">
                <input type="text" name="ecl_name" id="upt-ecl_name">
                <label for="upt-ecl_name" id="lupt-ecl-name">Kode Golongan</label>
            </div>
            <div class="input-field">
                <input type="text" name="ecl_information" id="upt-ecl_information">
                <label for="upt-ecl_information" id="lupt-ecl-information">Kode Golongan</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function uptdata (ecl_id) {
        $('#lupt-ecl-id, #lupt-ecl-name, #lupt-ecl-information').removeClass('active');
        $('#upt-ecl_id, #upt-ecl_name, #upt-ecl_information').val('');
        $.ajax({
            dataType: "JSON",
            data: {ecl_id: ecl_id},
            type: "POST",
            url: "<?= basis_url('data/master/golongan/detail'); ?>",
            success: function (data) {
                if (data.ecl_id != null) {
                    $('#lupt-ecl-id').addClass('active');
                    $('#upt-ecl_id').val(data.ecl_id);
                }
                if (data.ecl_name != null) {
                    $('#lupt-ecl-name').addClass('active');
                    $('#upt-ecl_name').val(data.ecl_name);
                }
                if (data.ecl_information != null) {
                    $('#lupt-ecl-information').addClass('active');
                    $('#upt-ecl_information').val(data.ecl_information);
                }
            }
        });
    }

    function deldata (ecl_id, ecl_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Golongan ' + ecl_id + ' - ' + ecl_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {ecl_id: ecl_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/golongan/hapus'); ?>",
                    success: function (url) {
                        $('#ecl-content').html(url);
                        swal('Golongan ' + ecl_id + ' - ' + ecl_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Golongan ' + ecl_id + ' - ' + ecl_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Golongan ' + ecl_id + ' - ' + ecl_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#ladd-ecl-id, #ladd-ecl-name, #ladd-ecl-information').removeClass('active');
            $('#add-ecl_id, #add-ecl_name, #add-ecl_information').val('');
            $.ajax({
                url: "<?= basis_url('data/master/golongan/id-add'); ?>",
                success: function (url) {
                    $('#ladd-ecl-id').addClass('active');
                    $('#add-ecl_id').val(url);
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/golongan/tambah'); ?>",
                success: function (url) {
                    $('#ecl-content').html(url);
                    M.toast({html: 'Data berhasil ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            console.log($('#fr-upt').serialize());
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/golongan/update'); ?>",
                success: function (url) {
                    $('#ecl-content').html(url);
                    M.toast({html: 'Data berhasil diperbarui!'});
                }
            });
        });
    });
</script>