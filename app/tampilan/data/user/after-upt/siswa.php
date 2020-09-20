<?php $no = 1; ?>
<form action="" method="post" id="fr-lst">
    <div class="row s12 center">
        <div class="col s12 m4 l5">
            <div class="input-field">
                <input type="number" name="lst_gen" id="lst-gen">
                <label for="lst-gen">Angkatan</label>
            </div>
        </div>
        <div class="col s12 m4 l5">
            <div class="input-field">
                <select name="lst_cls" id="lst-cls">
                    <option value="" disabled selected>Pilih Kelas...</option>
                    <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                        <?php if ($dtcls['cls_status'] == 'on') { ?>
                            <option value="<?= $dtcls['cls_id']; ?>"><?= $dtcls['cls_name']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <label for="lst-cls">Kelas</label>
            </div>
        </div>
        <div class="col s12 m4 l2">
            <div class="input-field">
                <button id="kirim-lst" class="btn waves-effect waves-light indigo">Kirim <i class="material-icons right">send</i></button>
            </div>
        </div>
    </div>
</form>
<div id="stu-tbl">
    <table class="table striped responsive-table">
        <tr>
            <th class="center">No.</th>
            <th class="center">Photo</th>
            <th class="center">NIS</th>
            <th class="center">Nama</th>
            <th class="center">Status</th>
            <th class="center">Aksi</th>
        </tr>
        <?php if ($badan['dtstu'] != NULL) { ?>
            <?php foreach ($badan['dtstu'] as $dtstu) { ?>
                <tr>
                    <td class="center"><?= $no++; ?></td>
                    <td class="center">
                        <?php if ($dtstu['stu_photo'] != '') { ?>
                            <a href="" class="modal-trigger" data-target="modal-utp" onclick="uptphoto('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name'] ?>', '<?= $dtstu['stu_photo'] ?>');"><img src="<?= basis_url($dtstu['stu_photo']); ?>" alt="<?= $dtstu['stu_id']; ?>" style="max-width: 50pt;"></a>
                        <?php } else { ?>
                            <button class="btn indigo waves-effect waves-light modal-trigger" data-target="modal-upp" onclick="addphoto('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name'] ?>');"><i class="material-icons">add_a_photo</i></button>
                        <?php } ?>
                    </td>
                    <td class="center"><?= $dtstu['stu_idnumber']; ?></td>
                    <td><?= $dtstu['stu_name']; ?></td>
                    <td class="center"><?= ($dtstu['stu_studentstatus'] == 'on') ? '<span class="new badge green white-text" data-badge-caption="Aktif"></span>' : '<span class="new badge grey white-text" data-badge-caption="Non-Aktif"></span>' ; ?></td>
                    <td class="center">
                        <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtstu['stu_id']; ?>')"><i class="material-icons">search</i></button>
                        <button class="btn btn-small orange waves-effect waves-light" onclick="uptdata('<?= $dtstu['stu_id']; ?>');"><i class="material-icons">edit</i></button>
                        <button class="btn btn-small red waves-effect waves-light" onclick="resdata('<?= $dtstu['stu_id']; ?>', '<?= $dtstu['stu_name']; ?>', '<?= $dtstu['stu_idnumber']; ?>', '<?= $dtstu['stu_passworddef']; ?>');"><i class="material-icons">replay</i></button>
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

<script>
    $(document).ready(function() {
        $('select').formSelect();

        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#kirim-lst').click(function (e) {
            e.preventDefault();
            var lgen = $('#lst-gen').val();
            var lcls = $('#lst-cls').val();

            if (lgen != null && lcls != null) {
                $.ajax({
                    data: $('#fr-lst').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/user/siswa/list-param'); ?>",
                    success: function (url) {
                        $('#stu-tbl').html(url);
                    },
                    error: function () {
                        swal('Error', 'Kan geen verbinding maken met de server!', 'error');
                    }
                });
            } else {
                swal('Kesalahan', 'Harap isi isian angkatan dan kelas!', 'error');
            }
        });
    });
</script>