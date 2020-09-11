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