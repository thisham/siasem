<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama Jurusan</th>
        <th class="center">Status</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtmjr'] != NULL) { ?> 
        <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtmjr['mjr_name']; ?></td>
                <td class="center"><?= ($dtmjr['mjr_status'] == 'on') ? "Aktif" : "Non-Aktif"; ?></td>
                <td class="center">
                    <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtmjr['mjr_id']; ?>')"><i class="material-icons">search</i></button>
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtmjr['mjr_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtmjr['mjr_id']; ?>', '<?= $dtmjr['mjr_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
    
</table>