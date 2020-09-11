<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="cls-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama Kelas</th>
                    <th class="center">Wali Kelas</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtcls'] != NULL) { ?>
                    <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtcls['cls_name']; ?></td>
                            <td><?= $dtcls['tch_name']; ?></td>
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
        </div>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 class="modal-title">Tambah Data</h4>
            <hr>
            <div class="input-field">
                <input type="text" name="cls_id" id="add-cls_id" readonly>
                <label for="add-cls_id" id="ladd-cls-id">ID Kelas</label>
            </div>
            <div class="input-field">
                <input type="text" name="cls_name" id="add-cls_name">
                <label for="add-cls_name" id="ladd-cls-name">Nama Kelas</label>
            </div>
            <div class="input-field">
                <select name="cls_tch" id="add-cls_tch">
                    <option value="" disabled selected>Pilih Wali Kelas...</option>
                    <?php foreach ($badan['dttch'] as $dttch) { ?>
                        <option value="<?= $dttch['tch_id']; ?>"><?= $dttch['tch_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="add-cls_tch">Wali Kelas</label>
            </div>
            <div class="input-field">
                <select name="cls_mjr" id="add-cls_mjr">
                    <option value="" disabled selected>Pilih Jurusan...</option>
                    <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                        <option value="<?= $dtmjr['mjr_id']; ?>"><?= $dtmjr['mjr_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="add-cls_mjr">Jurusan</label>
            </div>
            <div class="input-field">
                <select name="cls_rom" id="add-cls_rom">
                    <option value="" disabled selected>Pilih Ruangan...</option>
                    <?php foreach ($badan['dtrom'] as $dtrom) { ?>
                        <option value="<?= $dtrom['rom_id']; ?>"><?= $dtrom['rom_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="add-cls_rom">Ruangan</label>
            </div>
            <p>
                <label>
                    <input type="checkbox" name="cls_status" id="add-cls_status">
                    <span>Aktif</span>
                </label>
            </p>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-add" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-det">
    <div class="modal-content">
        <h4 class="modal-title">Detail Data</h4>
        <hr>
        <table class="table striped">
            <tr>
                <td><b>ID Kelas</b></td>
                <td id="det-cls_id"></td>
            </tr>
            <tr>
                <td><b>Nama Kelas</b></td>
                <td id="det-cls_name"></td>
            </tr>
            <tr>
                <td><b>Wali Kelas</b></td>
                <td id="det-cls_tch"></td>
            </tr>
            <tr>
                <td><b>Jurusan</b></td>
                <td id="det-cls_mjr"></td>
            </tr>
            <tr>
                <td><b>Ruangan</b></td>
                <td id="det-cls_rom"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn modal-close btn-flat red white-text">Tutup</button>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-upt">
    <form action="" method="post" id="fr-upt">
        <div class="modal-content">
            <h4 class="modal-title">Update Data</h4>
            <hr>
            <div class="input-field">
                <input type="text" name="cls_id" id="upt-cls_id" readonly>
                <label for="upt-cls_id" id="lupt-cls-id">ID Kelas</label>
            </div>
            <div class="input-field">
                <input type="text" name="cls_name" id="upt-cls_name">
                <label for="upt-cls_name" id="lupt-cls-name">Nama Kelas</label>
            </div>
            <div class="input-field">
                <select name="cls_tch" id="upt-cls_tch">
                    <option value="" disabled selected>(Tidak Diubah)</option>
                    <?php foreach ($badan['dttch'] as $dttch) { ?>
                        <option value="<?= $dttch['tch_id']; ?>"><?= $dttch['tch_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="upt-cls_tch">Wali Kelas</label>
            </div>
            <div class="input-field">
                <select name="cls_mjr" id="upt-cls_mjr">
                    <option value="" disabled selected>(Tidak Diubah)</option>
                    <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                        <option value="<?= $dtmjr['mjr_id']; ?>"><?= $dtmjr['mjr_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="upt-cls_mjr">Jurusan</label>
            </div>
            <div class="input-field">
                <select name="cls_rom" id="upt-cls_rom">
                    <option value="" disabled selected>(Tidak Diubah)</option>
                    <?php foreach ($badan['dtrom'] as $dtrom) { ?>
                        <option value="<?= $dtrom['rom_id']; ?>"><?= $dtrom['rom_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="upt-cls_rom">Ruangan</label>
            </div>
            <p>
                <label>
                    <input type="checkbox" name="cls_status" id="upt-cls_status">
                    <span>Aktif</span>
                </label>
            </p>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script>
    function uptdata(cls_id) {
        $('#upt-cls_id, #upt-cls_name').val('');
        $('#lupt-cls-id, #lupt-cls-name').removeClass('active');
        $.ajax({
            dataType: "JSON",
            data: {cls_id: cls_id},
            type: "POST",
            url: "<?= basis_url('data/master/kelas/detail'); ?>",
            success: function (data) {
                if (data.cls_id != '') {
                    $('#upt-cls_id').val(data.cls_id);
                    $('#lupt-cls-id').addClass('active');
                }
                if (data.cls_name != '') {
                    $('#upt-cls_name').val(data.cls_name);
                    $('#lupt-cls-name').addClass('active');
                }
                if (data.cls_tch != '') {
                    $('#upt-cls_tch option[value="'+data.cls_tch+'"]').attr('selected');
                    $('#upt-cls_tch option[value=""]').removeAttr('selected');
                    $('#upt-cls_tch option[value=""]').removeAttr('disabled');
                    $('#upt-cls_tch option[value=""]').attr('value', data.cls_tch);
                    
                }
                if (data.cls_mjr != '') {
                    $('#upt-cls_mjr option[value="'+data.cls_mjr+'"]').attr('selected');
                    $('#upt-cls_mjr option[value=""]').removeAttr('selected');
                    $('#upt-cls_mjr option[value=""]').removeAttr('disabled');
                    $('#upt-cls_mjr option[value=""]').attr('value', data.cls_mjr);
                    
                }
                if (data.cls_rom != '') {
                    $('#upt-cls_rom option[value="'+data.cls_rom+'"]').attr('selected');
                    $('#upt-cls_rom option[value=""]').removeAttr('selected');
                    $('#upt-cls_rom option[value=""]').removeAttr('disabled');
                    $('#upt-cls_rom option[value=""]').attr('value', data.cls_rom);
                    
                }
                if (data.cls_status != 'off') {
                    $('#upt-cls_status').attr('checked', 'checked');
                }
            }
        });
    }

    function detdata (cls_id)
    {
        $('#det-cls_id, #det-cls_name, #det-cls_tch, #det-cls_mjr, #det-cls_rom, #det-cls_status').html('');
        $.ajax({
            dataType: "JSON",
            data: {cls_id: cls_id},
            type: "POST",
            url: "<?= basis_url('data/master/kelas/detail'); ?>",
            success: function (data) {
                $("#det-cls_id").html(data.cls_id);
                $("#det-cls_name").html(data.cls_name);
                $("#det-cls_tch").html(data.tch_name);
                $("#det-cls_mjr").html(data.mjr_name);
                $("#det-cls_rom").html(data.rom_name);
                $("#det-cls_status").html((data.cls_status == 'on') ? 'Aktif' : 'Non-Aktif');
            }
        });
    }

    function deldata (cls_id, cls_name) {
        swal({
            title: "Anda Yakin?",
            text: "Kelas " + cls_id + " - " + cls_name + " akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {cls_id: cls_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/kelas/hapus'); ?>",
                    success: function (url) {
                        $('#cls-content').html(url);
                        swal('Kelas ' + cls_id + ' - ' + cls_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Kelas ' + cls_id + ' - ' + cls_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
            } else {
                swal("Kelas " + cls_id + " - " + cls_name + " tidak jadi dihapus!");
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#add-cls_id, #add-cls_name').val('');
            $('#ladd-cls-id, #ladd-cls-name').removeClass('active');
            $.ajax({
                url: "<?= basis_url('data/master/kelas/id-add'); ?>",
                success: function (url) {
                    $('#add-cls_id').val(url);
                    $('#ladd-cls-id').addClass('active');
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            var tch = $('#add-cls_tch').val();
            var mjr = $('#add-cls_mjr').val();
            var rom = $('#add-cls_rom').val();
            if (tch == null || mjr == null || rom == null) {
                swal('Kesalahan!', 'Mohon masukkan data wali kelas, jurusan dan ruangan dengan benar!', 'error');
            } else {
                $.ajax({
                    data: $('#fr-add').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/master/kelas/tambah'); ?>",
                    success: function (url) {
                        $('#cls-content').html(url);
                        M.toast({html: "Data berhasil ditambahkan!"});
                    },
                    error: function () {
                        M.toast({html: "Data gagal ditambahkan."});
                    }
                });
            }
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var tch = $('#upt-cls_tch').val();
            var mjr = $('#upt-cls_mjr').val();
            var rom = $('#upt-cls_rom').val();
            if (tch == null || mjr == null || rom == null) {
                swal('Kesalahan!', 'Mohon masukkan data wali kelas, jurusan dan ruangan dengan benar!', 'error');
            } else {
                $.ajax({
                    data: $('#fr-upt').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/master/kelas/update'); ?>",
                    success: function (url) {
                        $('#cls-content').html(url);
                        M.toast({html: "Data berhasil diperbarui!"});
                    },
                    error: function () {
                        M.toast({html: "Data gagal diperbarui."});
                    }
                });
            }
        });
    });
</script>