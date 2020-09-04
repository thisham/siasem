<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama</th>
        <th class="center">Jabatan</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtadm'] != NULL) { ?>
        <?php foreach ($badan['dtadm'] as $dtadm) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtadm['adm_name']; ?></td>
                <td><?= $dtadm['adm_position']; ?></td>
                <td class="center">
                    <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtadm['adm_id']; ?>')"><i class="material-icons">search</i></button>
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtadm['adm_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="resdata('<?= $dtadm['adm_id']; ?>', '<?= $dtadm['adm_name']; ?>', '<?= $dtadm['adm_idnumber']; ?>', '<?= $dtadm['adm_passworddef']; ?>');"><i class="material-icons">replay</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>