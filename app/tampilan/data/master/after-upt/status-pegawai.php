<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Status Kepegawaian</th>
        <th class="center">Keterangan</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtest'] != NULL) { ?>
        <?php foreach ($badan['dtest'] as $dtest) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtest['est_employeestatuses']; ?></td>
                <td><?= $dtest['est_information']; ?></td>
                <td class="center">
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtest['est_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtest['est_id']; ?>', '<?= $dtest['est_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>