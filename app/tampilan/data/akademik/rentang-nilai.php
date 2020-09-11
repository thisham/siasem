<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="grd-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Grade</th>
                    <th class="center">Min</th>
                    <th class="center">Max</th>
                    <th class="center">Keterangan</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtgrd'] != NULL) { ?>
                    <?php foreach ($badan['dtgrd'] as $dtgrd) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td class="center"><?= $dtgrd['grd_grade']; ?></td>
                            <td class="center"><?= $dtgrd['grd_min']; ?></td>
                            <td class="center"><?= $dtgrd['grd_max']; ?></td>
                            <td><?= $dtgrd['grd_information']; ?></td>
                            <td class="center">
                                <button class="btn btn-small waves-effect waves-light orange modal-trigger" data-target="modal-upt" onclick="uptdata('<?= $dtgrd['grd_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small waves-effect waves-ligt red" onclick="deldata('<?= $dtgrd['grd_id']; ?>', '<?= $dtgrd['grd_grade'] ?>');"><i class="material-icons">delete</i></button>
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

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 class="modal-title">Tambah Data</h4>
            <div class="divider"></div>
            <br>
            <div class="input-field">
                <input type="text" name="grd_id" id="add-grd_id" readonly>
                <label for="add-grd_id" id="ladd-grd-id">ID Grade</label>
            </div>
            <div class="input-field">
                <input type="text" name="grd_grade" id="add-grd_grade">
                <label for="add-grd_grade" id="ladd-grd-grade">Grade</label>
            </div>
            <div class="row s12">
                <div class="col s6">
                    <div class="input-field">
                        <input type="number" name="grd_min" id="add-grd_min">
                        <label for="add-grd_min" id="ladd-grd-min">Minimum</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input type="number" name="grd_max" id="add-grd_max">
                        <label for="add-grd_max" id="ladd-grd-max">Maksimum</label>
                    </div>
                </div>
            </div>
            <div class="input-field">
                <input type="text" name="grd_information" id="add-grd_information">
                <label for="add-grd_information" id="ladd-grd-information">Keterangan</label>
            </div>
        </div>
        <div class="modal-footer">
            <button id="kirim-add" class="btn btn-flat indigo modal-close white-text">Kirim</button>
            <button class="btn btn-flat data-batal modal-close">Batal</button>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upt">
    <form action="" method="post" id="fr-upt">
        <div class="modal-content">
            <h4 class="modal-title">Update Data</h4>
            <div class="divider"></div>
            <br>
            <div class="input-field">
                <input type="text" name="grd_id" id="upt-grd_id" readonly>
                <label for="upt-grd_id" id="lupt-grd-id">ID Grade</label>
            </div>
            <div class="input-field">
                <input type="text" name="grd_grade" id="upt-grd_grade">
                <label for="upt-grd_grade" id="lupt-grd-grade">Grade</label>
            </div>
            <div class="row s12">
                <div class="col s6">
                    <div class="input-field">
                        <input type="number" name="grd_min" id="upt-grd_min">
                        <label for="upt-grd_min" id="lupt-grd-min">Minimum</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <input type="number" name="grd_max" id="upt-grd_max">
                        <label for="upt-grd_max" id="lupt-grd-max">Maksimum</label>
                    </div>
                </div>
            </div>
            <div class="input-field">
                <input type="text" name="grd_information" id="upt-grd_information">
                <label for="upt-grd_information" id="lupt-grd-information">Keterangan</label>
            </div>
        </div>
        <div class="modal-footer">
            <button id="kirim-upt" class="btn btn-flat indigo modal-close white-text">Kirim</button>
            <button class="btn btn-flat data-batal modal-close">Batal</button>
        </div>
    </form>
</div>

<script>
    function uptdata (grd_id) {
        $('#lupt-grd-id, #lupt-grd-grade, #lupt-grd-min, #lupt-grd-max, #lupt-grd-information').removeClass('active');
        $('#upt-grd_id, #upt-grd_grade, #upt-grd_min, #upt-grd_max, #upt-grd_information').val('');
        $.ajax({
            dataType: "JSON",
            data: {grd_id: grd_id},
            type: "POST",
            url: "<?= basis_url('data/akademik/rentang-nilai/detail'); ?>",
            success: function (data) {
                if (data.grd_id != '') {
                    $('#upt-grd_id').val(data.grd_id);
                    $('#lupt-grd-id').addClass('active');
                }
                if (data.grd_grade != '') {
                    $('#upt-grd_grade').val(data.grd_grade);
                    $('#lupt-grd-grade').addClass('active');
                }
                if (data.grd_min != '') {
                    $('#upt-grd_min').val(data.grd_min);
                    $('#lupt-grd-min').addClass('active');
                }
                if (data.grd_max != '') {
                    $('#upt-grd_max').val(data.grd_max);
                    $('#lupt-grd-max').addClass('active');
                }
                if (data.grd_information != '') {
                    $('#upt-grd_information').val(data.grd_information);
                    $('#lupt-grd-information').addClass('active');
                }
            }
        });
    }

    function deldata(grd_id, grd_grade) {
        swal({
            title: 'Anda Yakin?',
            text: 'Rentang nilai ' + grd_id + ' - ' + grd_grade + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {grd_id: grd_id},
                    type: "POST",
                    url: "<?= basis_url('data/akademik/rentang-nilai/hapus'); ?>",
                    success: function (url) {
                        $('#grd-content').html(url);
                        swal('Rentang nilai ' + grd_id + ' - ' + grd_grade + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Rentang nilai ' + grd_id + ' - ' + grd_grade + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Rentang nilai ' + grd_id + ' - ' + grd_grade + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#ladd-grd-id, #ladd-grd-grade, #ladd-grd-min, #ladd-grd-max, #ladd-grd-information').removeClass('active');
            $('#add-grd_id, #add-grd_grade, #add-grd_min, #add-grd_max, #add-grd_information').val('');
            $.ajax({
                url: "<?= basis_url('data/akademik/rentang-nilai/id-add'); ?>",
                success: function(url) {
                    $('#add-grd_id').val(url),
                    $('#ladd-grd-id').addClass('active');
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/rentang-nilai/update'); ?>",
                success: function (url) {
                    $('#grd-content').html(url);
                    M.toast({html: "Data berhasil diperbarui!"});
                },
                error: function () {
                    M.toast({html: "Data gagal diperbarui."});
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/rentang-nilai/tambah'); ?>",
                success: function (url) {
                    $('#grd-content').html(url);
                    M.toast({html: "Data berhasil ditambahkan!"});
                },
                error: function () {
                    M.toast({html: "Data gagal ditambahkan."});
                }
            });
        });
    });
</script>