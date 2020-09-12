<?php $no = 1; $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; ?>
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