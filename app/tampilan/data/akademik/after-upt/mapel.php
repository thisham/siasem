<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Kode Mapel</th>
        <th class="center">Mata Pelajaran</th>
        <th class="center">Pengajar</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtsbj'] != NULL) { ?>
        <?php foreach ($badan['dtsbj'] as $dtsbj) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td class="center"><?= $dtsbj['sbj_id']; ?></td>
                <td><?= $dtsbj['sbj_name']; ?></td>
                <td><?= $dtsbj['tch_name']; ?></td>
                <td class="center">
                    <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtsbj['sbj_id']; ?>')"><i class="material-icons">search</i></button>
                    <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dtsbj['sbj_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtsbj['sbj_id']; ?>', '<?= $dtsbj['sbj_name']; ?>', '<?= $dtsbj['tch_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="5" class="center">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>