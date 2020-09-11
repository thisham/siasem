<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="sbj-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Kode Mapel</th>
                    <th class="center">Mata Pelajaran</th>
                    <th class="center">Pengajar</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtsbj'] != NULL) { ?>
                    <?php foreach ($badan['dtsbj'] as $dtsbj) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td class="center"><?= $dtsbj['sbj_id']; ?></td>
                            <td><?= $dtsbj['sbj_name']; ?></td>
                            <td><?= $dtsbj['tch_name']; ?></td>
                            <td class="center">
                                <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtsbj['sbj_id']; ?>')"><i class="material-icons">search</i></button>
                                <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dtsbj['sbj_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtsbj['sbj_id']; ?>', '<?= $dtsbj['sbj_name']; ?>', '<?= $dtsbj['tch_name']; ?>');"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="center">Tidak ada data.</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-det">
    <div class="modal-content">
        <h4 class="modal-title">Detail Data</h4>
        <div class="divider"></div>
        <br>
        <table class="table striped">
            <tr>
                <td><b>Kode Mapel</b></td>
                <td id="det-sbj_id"></td>
            </tr>
            <tr>
                <td><b>Nama Mapel</b></td>
                <td id="det-sbj_name"></td>
            </tr>
            <tr>
                <td><b>Kode Mapel (EN)</b></td>
                <td id="det-sbj_nameen"></td>
            </tr>
            <tr>
                <td><b>Kelas</b></td>
                <td id="det-sbj_class"></td>
            </tr>
            <tr>
                <td><b>Kompetensi</b></td>
                <td id="det-sbj_competence"></td>
            </tr>
            <tr>
                <td><b>Kelompok Mapel</b></td>
                <td id="det-sbj_sgr"></td>
            </tr>
            <tr>
                <td><b>Jurusan</b></td>
                <td id="det-sbj_mjr"></td>
            </tr>
            <tr>
                <td><b>Pengajar Mapel</b></td>
                <td id="det-sbj_tch"></td>
            </tr>
            <tr>
                <td><b>Kurikulum</b></td>
                <td id="det-sbj_cur"></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td id="det-sbj_status"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn btn-flat red white-text modal-close">Tutup</button>
    </div>
</div>

<script>
    function uptdata (sbj_id) {
        $.ajax({
            data: {sbj_id: sbj_id},
            type: "POST",
            url: "<?= basis_url('data/akademik/mapel/editor'); ?>",
            success: function (url) {
                $('#sbj-content').html(url);
                $('#btn-add').hide();
            },
            error: function() {
                swal("エッラー!", "サーバーの接続が見つかりません。", "error");
            }
        });
    }

    function detdata (sbj_id) {
        $.ajax({
            dataType: "JSON",
            data: {sbj_id: sbj_id},
            type: "POST",
            url: "<?= basis_url('data/akademik/mapel/detail'); ?>",
            success: function (data) {
                $('#det-sbj_id').html(data.sbj_id);
                $('#det-sbj_name').html(data.sbj_name);
                $('#det-sbj_nameen').html(data.sbj_nameen);
                $('#det-sbj_class').html(data.sbj_class);
                $('#det-sbj_competence').html(data.sbj_competence);
                $('#det-sbj_sgr').html(data.sgr_group + ' - ' + data.sgr_name);
                $('#det-sbj_mjr').html(data.mjr_name);
                $('#det-sbj_tch').html(data.tch_name);
                $('#det-sbj_cur').html(data.cur_name);
                $('#det-sbj_status').html((data.sbj_status == 'on') ? 'Aktif' : 'Non-Aktif');
            },
            error: function() {
                swal("エッラー!", "サーバーの接続が見つかりません。", "error");
            }
        });
    }

    function deldata (sbj_id, sbj_name, tch_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Mata pelajaran ' + sbj_id + ' - ' + sbj_name + ' yang diampu ' + tch_name + ' akan dihapus. Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {sbj_id: sbj_id},
                    type: "POST",
                    url: "<?= basis_url('data/akademik/mapel/hapus'); ?>",
                    success: function (url) {
                        $('#sbj-content').html(url);
                        swal('Mata pelajaran ' + sbj_id + ' - ' + sbj_name + ' yang diampu ' + tch_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Mata pelajaran ' + sbj_id + ' - ' + sbj_name + ' yang diampu ' + tch_name + ' tidak dapat dihapus!', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Mata pelajaran ' + sbj_id + ' - ' + sbj_name + ' yang diampu ' + tch_name + ' tidak jadi dihapus.');
            }
        });
    }

    $(document).ready(function () {
        M.AutoInit();

        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/akademik/mapel/id-add'); ?>",
                success: function (url) {
                    $('#sbj-content').html(url);
                    $('#btn-add').hide();
                },
                error: function () {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });
    });
</script>