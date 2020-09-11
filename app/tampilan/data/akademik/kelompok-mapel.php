<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="sgr-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Kelompok Mapel</th>
                    <th class="center">Nama Kelompok Mapel</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtsgr'] != NULL) { ?>
                    <?php foreach ($badan['dtsgr'] as $dtsgr) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td class="center"><?= $dtsgr['sgr_group']; ?></td>
                            <td><?= $dtsgr['sgr_name']; ?></td>
                            <td class="center">
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtsgr['sgr_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtsgr['sgr_id']; ?>', '<?= $dtsgr['sgr_group']; ?>', '<?= $dtsgr['sgr_name']; ?>');"><i class="material-icons">delete</i></button>
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
            <div class="input-field">
                <input type="text" name="sgr_id" id="add-sgr_id" readonly>
                <label for="sgr_id" id="ladd-sgr-id">ID Kelompok</label>
            </div>
            <div class="input-field">
                <input type="text" name="sgr_group" id="add-sgr_group">
                <label for="sgr-group" id="ladd-sgr-group">Kelompok Mata Pelajaran</label>
            </div>
            <div class="input-field">
                <input type="text" name="sgr_name" id="add-sgr_name">
                <label for="sgr_name" id="ladd-sgr-name">Nama Kelompok Mata Pelajaran</label>
            </div>
        </div>
        <div class="modal-footer">
            <button id="kirim-add" class="btn btn-flat modal-close indigo white-text">Kirim</button>
            <button class="btn btn-flat modal-close data-batal">Batal</button>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upt">
    <form action="" method="post" id="fr-upt">
        <div class="modal-content">
            <h4 id="modal-title">Update Data</h4>
            <hr>
            <div class="input-field">
                <input type="text" name="sgr_id" id="upt-sgr_id" readonly>
                <label for="sgr_id" id="lupt-sgr-id">ID Kelompok</label>
            </div>
            <div class="input-field">
                <input type="text" name="sgr_group" id="upt-sgr_group">
                <label for="sgr-group" id="lupt-sgr-group">Kelompok Mata Pelajaran</label>
            </div>
            <div class="input-field">
                <input type="text" name="sgr_name" id="upt-sgr_name">
                <label for="sgr_name" id="lupt-sgr-name">Nama Kelompok Mata Pelajaran</label>
            </div>
        </div>
        <div class="modal-footer">
            <button id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</button>
            <button class="btn btn-flat modal-close data-batal">Batal</button>
        </div>
    </form>
</div>

<script>
    function uptdata (sgr_id) {
        $('#lupt-sgr-id, #lupt-sgr-name, #lupt-sgr-group').removeClass('active');
        $('#upt-sgr_id, #upt-sgr_name, #upt-sgr_group').val('');
        $.ajax({
            dataType: "JSON",
            data: {sgr_id: sgr_id},
            type: "POST",
            url: "<?= basis_url('data/akademik/kelompok-mapel/detail'); ?>",
            success: function (data) {
                console.log(data);
                if (data.sgr_id != '') {
                    $('#lupt-sgr-id').addClass('active');
                    $('#upt-sgr_id').val(data.sgr_id);
                }
                if (data.sgr_name != '') {
                    $('#lupt-sgr-name').addClass('active');
                    $('#upt-sgr_name').val(data.sgr_name);
                }
                if (data.sgr_group != '') {
                    $('#lupt-sgr-group').addClass('active');
                    $('#upt-sgr_group').val(data.sgr_group);
                }
            }
        });
    }

    function deldata (sgr_id, sgr_group, sgr_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Kelompok mata pelajaran ' + sgr_group + ' - ' + sgr_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {sgr_id: sgr_id},
                    type: "POST",
                    url: "<?= basis_url('data/akademik/kelompok-mapel/hapus'); ?>",
                    success: function (url) {
                        $('#sgr-content').html(url);
                        swal('Kurikulum ' + sgr_group + ' - ' + sgr_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Kurikulum ' + sgr_group + ' - ' + sgr_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Kurikulum ' + sgr_group + ' - ' + sgr_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('#btn-add').click(function () {
            $('#ladd-sgr-id, #ladd-sgr-name, #ladd-sgr-group').removeClass('active');
            $('#add-sgr_id, #add-sgr_name, #add-sgr_group').val('');
            $.ajax({
                url: "<?= basis_url('data/akademik/kelompok-mapel/id-add'); ?>",
                success: function (url) {
                    $('#ladd-sgr-id').addClass('active');
                    $('#add-sgr_id').val(url);
                }
            });
        });

        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/kelompok-mapel/tambah'); ?>",
                success: function (url) {
                    $('#sgr-content').html(url);
                    M.toast({html: "Data berhasil ditambahkan!"});
                },
                error: function () {
                    M.toast({html: "Data gagal ditambahkan."});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/akademik/kelompok-mapel/update'); ?>",
                success: function (url) {
                    $('#sgr-content').html(url);
                    M.toast({html: "Data berhasil diperbarui!"});
                },
                error: function () {
                    M.toast({html: "Data gagal diperbarui."});
                }
            });
        });
    });
</script>