<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="bld-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama Gedung</th>
                    <th class="center">Lantai</th>
                    <th class="center">Panjang</th>
                    <th class="center">Lebar</th>
                    <th class="center">Tinggi</th>
                    <th class="center">Keterangan</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtbld'] != NULL) { ?>
                    <?php foreach ($badan['dtbld'] as $dtbld) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtbld['bld_name']; ?></td>
                            <td class="center"><?= $dtbld['bld_floor']; ?></td>
                            <td class="center"><?= $dtbld['bld_length']; ?></td>
                            <td class="center"><?= $dtbld['bld_width']; ?></td>
                            <td class="center"><?= $dtbld['bld_height']; ?></td>
                            <td><?= $dtbld['bld_information']; ?></td>
                            <td class="center"><?= ($dtbld['bld_status'] == 'on')? "Aktif" : "Non-Aktif" ; ?></td>
                            <td class="center">
                                <button class="btn btn-small waves-effect waves-light orange modal-trigger" data-target="modal-upt" onclick="uptdata('<?= $dtbld['bld_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small waves-effect waves-ligt red" onclick="deldata('<?= $dtbld['bld_id']; ?>', '<?= $dtbld['bld_name'] ?>');"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    <?php } ?>
                    
                <?php } else { ?>
                    <tr>
                        <td class="center" colspan="9">Tidak ada data.</td>
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
                <input type="text" name="bld_id" id="add-bld_id" readonly>
                <label for="add-bld_id" id="ladd-bld-id">Kode Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_name" id="add-bld_name">
                <label for="add-bld_name" id="ladd-bld-name">Nama Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_floor" id="add-bld_floor">
                <label for="add-bld_floor" id="ladd-bld-floor">Jumlah Lantai</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_length" id="add-bld_length">
                <label for="add-bld_length" id="ladd-bld-length">Panjang Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_width" id="add-bld_width">
                <label for="add-bld_width" id="ladd-bld-width">Lebar Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_height" id="add-bld_height">
                <label for="add-bld_height" id="ladd-bld-height">Tinggi Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_information" id="add-bld_information">
                <label for="add-bld_information" id="ladd-bld-information">Keterangan</label>
            </div>
            <label>
                <input type="checkbox" name="bld_status" id="add-bld_status">
                <span>Aktif</span>
            </label>
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
                <input type="text" name="bld_id" id="upt-bld_id" readonly>
                <label for="upt-bld_id" id="lupt-bld-id">Kode Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_name" id="upt-bld_name">
                <label for="upt-bld_name" id="lupt-bld-name">Nama Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_floor" id="upt-bld_floor">
                <label for="upt-bld_floor" id="lupt-bld-floor">Jumlah Lantai</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_length" id="upt-bld_length">
                <label for="upt-bld_length" id="lupt-bld-length">Panjang Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_width" id="upt-bld_width">
                <label for="upt-bld_width" id="lupt-bld-width">Lebar Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_height" id="upt-bld_height">
                <label for="upt-bld_height" id="lupt-bld-height">Tinggi Gedung (meter)</label>
            </div>
            <div class="input-field">
                <input type="text" name="bld_information" id="upt-bld_information">
                <label for="upt-bld_information" id="lupt-bld-information">Keterangan</label>
            </div>
            <label>
                <input type="checkbox" name="bld_status" id="upt-bld_status">
                <span>Aktif</span>
            </label>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function uptdata (bld_id) {
        $.ajax({
            dataType: "JSON",
            data: {bld_id: bld_id},
            type: "POST",
            url: "<?= basis_url('data/master/gedung/detail'); ?>",
            success: function (data){
                $('#upt-bld_name, #upt-bld_floor, #upt-bld_length, #upt-bld_width, #upt-bld_height, #upt-bld_information').val('');
                $('#lupt-bld-name, #lupt-bld-floor, #lupt-bld-length, #lupt-bld-width, #lupt-bld-height, #lupt-bld-information').removeClass('active');
                $('#upt-bld_status').removeAttr('checked');
                if (data.bld_id != '') {
                    $('#upt-bld_id').val(data.bld_id);
                    $('#lupt-bld-id').addClass('active');
                }
                if (data.bld_name != '') {
                    $('#upt-bld_name').val(data.bld_name);
                    $('#lupt-bld-name').addClass('active');
                }
                if (data.bld_floor != 0) {
                    $('#upt-bld_floor').val(data.bld_floor);
                    $('#lupt-bld-floor').addClass('active');
                }
                if (data.bld_width != '') {
                    $('#upt-bld_width').val(data.bld_width);
                    $('#lupt-bld-width').addClass('active');
                }
                if (data.bld_length != '') {
                    $('#upt-bld_length').val(data.bld_length);
                    $('#lupt-bld-length').addClass('active');
                }
                if (data.bld_height != '') {
                    $('#upt-bld_height').val(data.bld_height);
                    $('#lupt-bld-height').addClass('active');
                }
                if (data.bld_information != '') {
                    $('#upt-bld_information').val(data.bld_information);
                    $('#lupt-bld-information').addClass('active');
                }
                if (data.bld_status != 'off') {
                    $('#upt-bld_status').attr('checked', 'checked');
                }
            }
        });
    }

    function deldata (bld_id, bld_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Gedung ' + bld_id + ' - ' + bld_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {bld_id: bld_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/gedung/hapus'); ?>",
                    success: function (url) {
                        $('#bld-content').html(url);
                        swal('Gedung ' + bld_id + ' - ' + bld_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Gedung ' + bld_id + ' - ' + bld_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Gedung ' + bld_id + ' - ' + bld_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/master/gedung/id-add'); ?>",
                success: function (url) {
                    $('#add-bld_name, #add-bld_floor, #add-bld_length, #add-bld_width, #add-bld_height, #add-bld_information').val('');
                    $('#ladd-bld-name, #ladd-bld-floor, #ladd-bld-length, #ladd-bld-width, #ladd-bld-height, #ladd-bld-information').removeClass('active');
                    $('#add-bld_status').removeAttr('checked');
                    $('#add-bld_id').val(url);
                    $('#ladd-bld-id').addClass('active');
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/gedung/tambah'); ?>",
                success: function (url) {
                    $('#bld-content').html(url);
                    M.toast({html: "Data berhasil ditambahkan!"});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/gedung/update'); ?>",
                success: function (url) {
                    $('#bld-content').html(url);
                    M.toast({html: "Data berhasil diperbarui!"});
                }
            });
        });
    });
</script>