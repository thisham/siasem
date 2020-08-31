<?php $no = 1; ?>
<table class="table responsive-table striped">
    <tr>
        <th class="center">No.</th>
        <th class="center">Gedung</th>
        <th class="center">Nomor Ruangan</th>
        <th class="center">Kapasitas <br> (KBM/Ujian)</th>
        <th class="center">Nama Ruangan</th>
        <th class="center">Status</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dtrom'] != NULL) { ?>
        <?php foreach ($badan['dtrom'] as $dtrom) { ?>
            <tr>
                <td class="center"><?= $no++; ?></td>
                <td class="center"><?= $dtrom['bld_name']; ?></td>
                <td class="center"><?= $dtrom['rom_name']; ?></td>
                <td class="center"><?= $dtrom['rom_studentcapacity']; ?> / <?= $dtrom['rom_examcapacity']; ?></td>
                <td class="center"><?= $dtrom['rom_information']; ?></td>
                <td class="center"><?= ($dtrom['rom_status'] == 'on') ? 'Aktif' : 'Non-Aktif' ; ?></td>
                <td class="center">
                    <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtrom['rom_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtrom['rom_id']; ?>', '<?= $dtrom['rom_name']; ?>');"><i class="material-icons">delete</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="8" class="center">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>