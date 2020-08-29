<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama Gedung</th>
        <th class="center">Lantai</th>
        <th class="center">Panjang</th>
        <th class="center">Lebar</th>
        <th class="center">Tinggi</th>
        <th class="center">Keterangan</th>
        <th class="center">Status</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtbld'] != NULL) { ?>
        <?php foreach ($badan['dtbld'] as $dtbld) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td><?= $dtbld['bld_name']; ?></td>
                <td class="center"><?= $dtbld['bld_floor']; ?></td>
                <td class="center"><?= $dtbld['bld_length']; ?></td>
                <td class="center"><?= $dtbld['bld_width']; ?></td>
                <td class="center"><?= $dtbld['bld_height']; ?></td>
                <td><?= $dtbld['bld_information']; ?></td>
                <td class="center"><?= ($dtbld['bld_status'] == 'on')? "Aktif" : "Non-Aktif" ; ?></td>
                <td class="center">
                    <button class="btn btn-small waves-effect waves-light orange modal-trigger" data-target="modal-upt" onclick="uptdata('<?= $dtbld['bld_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small waves-effect waves-ligt red" onclick="deldata('<?= $dtbld['bld_id']; ?>', '<?= $dtbld['bld_name'] ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
        
    <?php } else { ?>
        <tr>
            <td class="center" colspan="9">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>