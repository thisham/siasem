<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Golongan</th>
        <th class="center">Keterangan</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtecl'] != NULL) { ?>
        <?php foreach ($badan['dtecl'] as $dtecl) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td class="center"><?= $dtecl['ecl_name']; ?></td>
                <td><?= $dtecl['ecl_information']; ?></td>
                <td class="center">
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtecl['ecl_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtecl['ecl_id']; ?>', '<?= $dtecl['ecl_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
    
</table>