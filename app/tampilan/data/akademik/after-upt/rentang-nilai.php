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