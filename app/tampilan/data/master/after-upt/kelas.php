<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama Kelas</th>
        <th class="center">Wali Kelas</th>
        <th class="center">Status</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtcls'] != NULL) { ?>
        <?php foreach ($badan['dtcls'] as $dtcls) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtcls['cls_name']; ?></td>
                <td><?= $dtcls['tch_name']; ?></td>
                <td class="center"><?= ($dtcls['cls_status'] == 'on') ? '<span class="badge new green" data-badge-caption="Aktif"></span>' : '<span class="badge new grey" data-badge-caption="Non-Aktif"></span>' ; ?></td>
                <td class="center">
                    <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtcls['cls_id']; ?>')"><i class="material-icons">search</i></button>
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtcls['cls_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtcls['cls_id']; ?>', '<?= $dtcls['cls_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>