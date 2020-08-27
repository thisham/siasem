<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Kode Tapel</th>
        <th class="center">Nama Tapel</th>
        <th class="center">Tahun Fiskal</th>
        <th class="center">Status</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtfys'] != NULL) { ?>
        <?php foreach ($badan['dtfys'] as $dtfys) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td class="center"><?= $dtfys['fys_id']; ?></td>
                <td><?= $dtfys['fys_name']; ?></td>
                <td><?= $dtfys['fys_fiscal']; ?></td>
                <td><?= ($dtfys['fys_status'] == 'on') ? "Aktif" : "Non-Aktif" ; ?></td>
                <td class="center">
                    <button class="btn btn-small orange waves-effect waves-light modal-trigger" data-target="modal-upt" onclick="uptdata('<?= $dtfys['fys_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtfys['fys_id']; ?>', '<?= $dtfys['fys_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="6" class="center">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>