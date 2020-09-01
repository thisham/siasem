<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Jenis PTK</th>
        <th class="center">Keterangan</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtptk'] != NULL) { ?>
        <?php foreach ($badan['dtptk'] as $dtptk) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtptk['ptk_name']; ?></td>
                <td><?= $dtptk['ptk_information']; ?></td>
                <td class="center">
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtptk['ptk_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtptk['ptk_id']; ?>', '<?= $dtptk['ptk_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
    
</table>