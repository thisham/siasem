<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text">Data Tahun Pelajaran</h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="fys-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Kode Tapel</th>
                    <th class="center">Nama Tapel</th>
                    <th class="center">Tahun Fiskal</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtfys'] != NULL) { ?>
                    <?php foreach ($badan['dtfys'] as $dtfys) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td class="center"><?= $dtfys['fys_id']; ?></td>
                            <td><?= $dtfys['fys_name']; ?></td>
                            <td><?= $dtfys['fys_fiscal']; ?></td>
                            <td><?= ($dtfys['fys_status'] == 'on') ? "Aktif" : "Non-Aktif" ; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange waves-effect waves-light modal-trigger" data-target="modal-upt" onclick="uptdata('<?= $dtfys['fys_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtfys['fys_id']; ?>', '<?= $dtfys['fys_name']; ?>');"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="center">Tidak ada data.</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 id="modal-title">Tambah Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="fys_id" id="add-fys_id">
                <label for="add-fys_id" id="ladd-fys-id">Kode Tahun Ajaran</label>
            </div>
            <div class="input-field">
                <input type="text" name="fys_name" id="add-fys_name">
                <label for="add-fys_name" id="ladd-fys-name">Semester</label>
            </div>
            <div class="input-field">
                <input type="text" name="fys_fiscal" id="add-fys_fiscal">
                <label for="add-fys_fiscal" id="ladd-fys-fiscal">Tahun Ajaran</label>
            </div>
            <label>
                <input type="checkbox" name="fys_status" id="add-fys_status">
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
            <h4 id="modal-title">Update Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="fys_id" id="upt-fys_id">
                <label for="upt-fys_id" id="lupt-fys-id">Kode Tahun Ajaran</label>
            </div>
            <div class="input-field">
                <input type="text" name="fys_name" id="upt-fys_name">
                <label for="upt-fys_name" id="lupt-fys-name">Semester</label>
            </div>
            <div class="input-field">
                <input type="text" name="fys_fiscal" id="upt-fys_fiscal">
                <label for="upt-fys_fiscal" id="lupt-fys-fiscal">Tahun Ajaran</label>
            </div>
            <label>
                <input type="checkbox" name="fys_status" id="upt-fys_status">
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
    function uptdata (fys_id) {
        $.ajax({
            dataType: "JSON",
            data: {fys_id: fys_id},
            type: "POST",
            url: "<?= basis_url('data/master/tapel/detail'); ?>",
            success: function (data) {
                $('#lupt-fys-id, #lupt-fys-name, #lupt-fys-fiscal').removeClass('active');
                $('#upt-fys_status').removeAttr('checked');
                if (data.fys_id != '') {
                    $('#lupt-fys-id').addClass('active');
                    $('#upt-fys_id').val(data.fys_id);
                }
                if (data.fys_name != '') {
                    $('#lupt-fys-name').addClass('active');
                    $('#upt-fys_name').val(data.fys_name);
                }
                if (data.fys_fiscal != '') {
                    $('#lupt-fys-fiscal').addClass('active');
                    $('#upt-fys_fiscal').val(data.fys_fiscal);
                }
                if (data.fys_status != 'off') {
                    $('#upt-fys_status').attr('checked', 'checked');
                }
            }
        });
    }

    function deldata(fys_id, fys_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Data semester ' + fys_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali!',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {fys_id: fys_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/tapel/hapus'); ?>",
                    success: function (url) {
                        $('#fys-content').html(url);
                        swal('Data semester ' + fys_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function (url) {
                        swal('Data semester ' + fys_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Data semester ' + fys_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/tapel/tambah'); ?>",
                success: function (url) {
                    $('#fys-content').html(url);
                    M.toast({html: 'Data telah ditambahkan!'});
                },
                error: function (url) {
                    M.toast({html: 'Data tidak ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/tapel/update'); ?>",
                success: function (url) {
                    $('#fys-content').html(url);
                    M.toast({html: 'Data telah diperbarui!'});
                },
                error: function (url) {
                    M.toast({html: 'Data tidak diperbarui!'});
                }
            });
        });
    });
</script>