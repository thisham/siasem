<?php $no = 1; ?>
<table class="table striped responsive-table">
    <tr>
        <th class="center">No.</th>
        <th class="center">Foto</th>
        <th class="center">NIP - Nama</th>
        <th class="center">Aksi</th>
    </tr>
    <?php if ($badan['dttch'] != NULL) { ?>
        <?php foreach ($badan['dttch'] as $dttch) { ?>
            <tr>
                <td class="center"><?= $no++ ?></td>
                <td class="center">
                    <?php if ($dttch['tch_photo'] != '') { ?>
                        <a href="" class="modal-trigger" data-target="modal-utp" onclick="uptphoto('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name'] ?>', '<?= $dttch['tch_photo'] ?>');"><img src="<?= basis_url($dttch['tch_photo']); ?>" style="max-width: 50pt;" alt="Foto Profil"></a>
                    <?php } else { ?>
                        <button class="btn indigo waves-effect waves-light modal-trigger" data-target="modal-upp" onclick="addphoto('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name'] ?>');"><i class="material-icons">add_a_photo</i></button>
                    <?php } ?>
                </td>
                <td><b><?= $dttch['tch_idnumber']; ?></b> - <?= ($dttch['tch_status'] == 'on') ? '<span class="green white-text">Aktif</span>' : '<span class="red white-text">Non-Aktif</span>' ?><br><?= $dttch['tch_name']; ?></td>
                <td class="center">
                    <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dttch['tch_id']; ?>')"><i class="material-icons">search</i></button>
                    <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dttch['tch_id']; ?>');"><i class="material-icons">edit</i></button>
                    <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="resdata('<?= $dttch['tch_id']; ?>', '<?= $dttch['tch_name']; ?>', '<?= $dttch['tch_idnumber']; ?>', '<?= $dttch['tch_passworddef']; ?>');"><i class="material-icons">replay</i></button>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td class="center" colspan="4">Tidak ada data.</td>
        </tr>
    <?php } ?>
</table>