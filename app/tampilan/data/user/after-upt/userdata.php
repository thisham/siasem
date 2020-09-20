<div class="input-field">
    <input type="text" name="lst_txt" class="autocomplete" id="lst_txt">
    <label for="lst_txt">Kueri Pencarian... (UserID atau Username)</label>
</div>
<div id="usr-tbl">
    <?php 
        $no = 1; 
        $akses = array('Siswa', 'Administrator', 'Kepala Sekolah', 'Guru', 'Keuangan');
    ?>
    <table class="table striped responsive-table">
        <tr>
            <th class="center">No.</th>
            <th class="center">User ID</th>
            <th class="center">Username</th>
            <th class="center">Akses</th>
            <th class="center">Status</th>
            <th class="center">Aksi</th>
        </tr>
        <?php if ($badan['dtusr'] != NULL) { ?>
            <?php foreach ($badan['dtusr'] as $dtusr) { ?>
                <tr>
                    <td class="center"><?= $no++; ?></td>
                    <td class="center"><?= $dtusr['usr_id']; ?></td>
                    <td class="center"><?= $dtusr['usr_name']; ?></td>
                    <td class="center"><?= $akses[$dtusr['usr_role']]; ?></td>
                    <td class="center"><?= ($dtusr['usr_status'] == 'on') ? '<span class="badge new green" data-badge-caption="Aktif"></span>' : '<span class="badge new grey" data-badge-caption="Suspend"></span>' ; ?></td>
                    <td class="center">
                        <button class="btn btn-small indigo waves-effect waves-light modal-trigger" data-target="modal-det" onclick="detdata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_name']; ?>', '<?= $dtusr['usr_role']; ?>');"><i class="material-icons">search</i></button>
                        <button class="btn btn-small orange waves-effect waves-light" onclick="pwrdata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_name']; ?>', '<?= $dtusr['usr_status']; ?>');"><i class="material-icons">power_settings_new</i></button>
                        <button class="btn btn-small red waves-effect waves-light" onclick="deldata('<?= $dtusr['usr_id']; ?>', '<?= $dtusr['usr_role']; ?>', '<?= $dtusr['usr_name']; ?>');"><i class="material-icons">delete</i></button>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td class="center" colspan="6">Tidak ada data.</td>
            </tr>
        <?php } ?>
    </table>
</div>