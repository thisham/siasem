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