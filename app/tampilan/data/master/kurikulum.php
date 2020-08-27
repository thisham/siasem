<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text">Data Kurikulum</h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="cur-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Kurikulum</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtcur'] != NULL) { ?>
                    <?php foreach ($badan['dtcur'] as $dtcur) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtcur['cur_name']; ?></td>
                            <td class="center"><?= ($dtcur['cur_status'] == 'on') ? "Aktif" : "Non-Aktif"; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtcur['cur_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtcur['cur_id']; ?>', '<?= $dtcur['cur_name']; ?>');"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="center">Tidak ada data.</td>
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
                <input type="text" name="cur_id" id="add-cur_id" readonly>
                <label for="cur_id" id="ladd-cur-id">ID Kurikulum</label>
            </div>
            <div class="input-field">
                <input type="text" name="cur_name" id="add-cur_name">
                <label for="cur_name" id="ladd-cur-name">Nama Kurikulum</label>
            </div>
            <label>
                <input type="checkbox" name="cur_status" id="add-cur_status">
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
                <input type="text" name="cur_id" id="upt-cur_id" readonly>
                <label for="cur_id" id="lupt-cur-id">ID Kurikulum</label>
            </div>
            <div class="input-field">
                <input type="text" name="cur_name" id="upt-cur_name">
                <label for="cur_name" id="lupt-cur-name">Nama Kurikulum</label>
            </div>
            <label>
                <input type="checkbox" name="cur_status" id="upt-cur_status">
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
    function uptdata (cur_id) {
        $.ajax({
            data: {cur_id: cur_id},
            type: "POST",
            dataType: "JSON",
            url: "<?= basis_url('data/master/kurikulum/detail'); ?>",
            success: function (data) {
                $('#lupt-cur-id').removeClass('active');
                $('#lupt-cur-name').removeClass('active');
                $('#upt-cur_status').removeAttr('checked');
                $('#upt-cur_id').val('');
                $('#upt-cur_name').val('');
                if (data.cur_id != '') {
                    $('#upt-cur_id').val(data.cur_id);
                    $('#lupt-cur-id').addClass('active');
                }
                if (data.cur_name != '') {
                    $('#upt-cur_name').val(data.cur_name);
                    $('#lupt-cur-name').addClass('active');
                }
                if (data.cur_status != '') {
                    $('#upt-cur_status').attr('checked', 'checked');
                }
            }
        });
    }

    function deldata (cur_id, cur_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Kurikulum ' + cur_id + ' - ' + cur_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {cur_id: cur_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/kurikulum/hapus'); ?>",
                    success: function (url) {
                        $('#cur-content').html(url);
                        swal('Kurikulum ' + cur_id + ' - ' + cur_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Kurikulum ' + cur_id + ' - ' + cur_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Kurikulum ' + cur_id + ' - ' + cur_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {

        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/master/kurikulum/id-add'); ?>",
                success: function (url) {
                    $('#add-cur_id').val(url);
                    $('#ladd-cur-id').addClass('active');
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/kurikulum/tambah') ?>",
                success: function (url) {
                    $('#cur-content').html(url);
                    M.toast({html: 'Data telah ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/kurikulum/update'); ?>",
                success: function (url) {
                    $('#cur-content').html(url);
                    M.toast({html: 'Data telah diperbarui.'});
                }
            });
        });
    });
</script>