<?php $no = 1; $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; ?>
<form action="" method="post" id="fr-lst">
    <div class="row s12 center">
        <div class="col s12 l3 m3">
            <select name="ssc_fys" id="lst-fys">
                <option value="" disabled selected>Pilih Tahun Ajaran</option>
                <?php foreach ($badan['dtfys'] as $dtfys) { ?>
                    <option value="<?= $dtfys['fys_id']; ?>"><?= $dtfys['fys_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col s12 l4 m3">
            <select name="ssc_cls" id="lst-cls">
                <option value="" disabled selected>Pilih Kelas</option>
                    <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                        <option value="<?= $dtcls['cls_id']; ?>"><?= $dtcls['cls_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col s12 l3 m3">
                <select name="ssc_day" id="lst-day">
                    <option value="" disabled selected>Pilih Hari</option>
                    <option value="0">Minggu</option>
                    <option value="1">Senin</option>
                    <option value="2">Selasa</option>
                    <option value="3">Rabu</option>
                    <option value="4">Kamis</option>
                    <option value="5">Jumat</option>
                    <option value="6">Sabtu</option>
                </select>
            </div>
            <div class="col s12 l2 m3">
                <button id="kirim-lst" class="btn indigo waves-effect waves-light">Kirim <i class="material-icons right">send</i></button>
            </div>
        </div>
    </form>
    <div class="divider"></div>
    <table class="table striped responsive-table" id="ssc-tbl">
        <tr>
            <th class="center">No.</th>
            <th class="center">MP</th>
            <th class="center">Pengajar</th>
            <th class="center">Waktu</th>
            <th class="center">Status</th>
            <th class="center">Aksi</th>
        </tr>
        <?php if ($badan['dtssc'] != NULL) { ?>
            <?php foreach ($badan['dtssc'] as $dtssc) { ?>
                <tr>
                    <td class="center"><?= $no++; ?></td>
                    <td class="center"><?= $dtssc['sbj_name']; ?></td>
                    <td class="center"><?= $dtssc['tch_name']; ?></td>
                    <td class="center"><?= $days[$dtssc['ssc_day']] . ', ' . $dtssc['ssc_timestart'] . ' s/d ' . $dtssc['ssc_timeend']; ?></td>
                    <td class="center"><?= ($dtssc['ssc_status'] == 'on') ? 'Aktif': 'Non-Aktif'; ?></td>
                    <td class="center">
                <button class="btn btn-small orange waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtssc['ssc_id']; ?>');"><i class="material-icons">edit</i></button>
                <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtssc['ssc_id']; ?>');"><i class="material-icons">delete</i></button>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="center" colspan="6">Tidak ada data.</td>
            </tr>
        <?php } ?>
    </table>

<script>
    $(document).ready(function () {
        $('select').formSelect();
        
        $('#btn-add').click(function() {
            $.ajax({
                url: "<?= basis_url('data/akademik/jadwal/id-add') ?>",
                success: function (url) {
                    $('#ssc-content').html(url);
                }
            });
        });

        $('#kirim-lst').click(function (e) {
            e.preventDefault();
            var fys = $('#lst-fys').val();
            var cls = $('#lst-cls').val();
            var day = $('#lst-day').val();
            if (fys != null && cls != null && day != null) {
                $.ajax({
                    data: $('#fr-lst').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/akademik/jadwal/list-param'); ?>",
                    success: function (url) {
                        $('#ssc-tbl').html(url);
                    },
                    error: function () {
                        swal('Kesalahan', 'Tidak dapat terhubung dengan server!', 'error');
                    }
                });
            } else {
                swal('Kesalahan', 'Lengkapi data tahun pelajaran, kelas dan hari!', 'error');
            }
            
        });
    });
</script>
</script>