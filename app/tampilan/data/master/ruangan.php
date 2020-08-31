<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>

        <div class="card-content" id="rom-content">
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
        </div>
    
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 class="modal-title">Tambah Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="rom_id" id="add-rom_id" readonly>
                <label for="add-rom_id" id="ladd-rom-id">ID Ruangan</label>
            </div>
            <div class="input-field">
                <select name="rom_bld" id="add-rom_bld" required>
                    <option value="" disabled selected>Pilih Gedung</option>
                    <?php foreach ($badan['dtbld'] as $dtbld) { ?>
                        <option value="<?= $dtbld['bld_id']; ?>"><?= $dtbld['bld_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="add-rom_bld">Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="rom_name" id="add-rom_name">
                <label for="add-rom_name" id="ladd-rom-name">Nomor Ruangan</label>
            </div>
            <div class="input-field">
                <input type="number" name="rom_studentcapacity" min="0" id="add-rom_studentcapacity">
                <label for="add-rom_studentcapacity" id="ladd-rom-studentcapacity">Kapasitas KBM</label>
            </div>
            <div class="input-field">
                <input type="number" name="rom_examcapacity" min="0" id="add-rom_examcapacity">
                <label for="add-rom_capacity" id="ladd-rom-examcapacity">Kapasitas Ujian</label>
            </div>
            <div class="input-field">
                <input type="text" name="rom_information" id="add-rom_information">
                <label for="rom_information" id="ladd-rom-information">Nama Ruangan</label>
            </div>
            <label>
                <input type="checkbox" name="rom_status" id="add-rom_status">
                <span>Aktif</span>
            </label>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-add" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<div class="modal modal-fixed-footer" id="modal-upt">
    <form action="" method="post" id="fr-upt">
        <div class="modal-content">
            <h4 class="modal-title">Update Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="rom_id" id="upt-rom_id" readonly>
                <label for="upt-rom_id" id="lupt-rom-id">ID Ruangan</label>
            </div>
            <div class="input-field">
                <select name="rom_bld" id="upt-rom_bld" required>
                    <option value="" disabled selected>(Tidak Diubah)</option>
                    <?php foreach ($badan['dtbld'] as $dtbld) { ?>
                        <option value="<?= $dtbld['bld_id']; ?>"><?= $dtbld['bld_name']; ?></option>
                    <?php } ?>
                </select>
                <label for="upt-rom_bld">Gedung</label>
            </div>
            <div class="input-field">
                <input type="text" name="rom_name" id="upt-rom_name">
                <label for="upt-rom_name" id="lupt-rom-name">Nomor Ruangan</label>
            </div>
            <div class="input-field">
                <input type="number" name="rom_studentcapacity" min="0" id="upt-rom_studentcapacity">
                <label for="upt-rom_studentcapacity" id="lupt-rom-studentcapacity">Kapasitas KBM</label>
            </div>
            <div class="input-field">
                <input type="number" name="rom_examcapacity" min="0" id="upt-rom_examcapacity">
                <label for="upt-rom_capacity" id="lupt-rom-examcapacity">Kapasitas Ujian</label>
            </div>
            <div class="input-field">
                <input type="text" name="rom_information" id="upt-rom_information">
                <label for="rom_information" id="lupt-rom-information">Nama Ruangan</label>
            </div>
            <label>
                <input type="checkbox" name="rom_status" id="upt-rom_status">
                <span>Aktif</span>
            </label>
        </div>
        <div class="modal-footer">
            <a href="" id="kirim-upt" class="btn btn-flat modal-close indigo white-text">Kirim</a>
            <a href="" id="data-batal" class="btn btn-flat modal-close data-batal">Batal</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function uptdata(rom_id) {
        $('#upt-rom_name, #upt-rom_studentcapacity, #upt-rom_examcapacity, #upt-rom_information').val('');
        $('#lupt-rom-name, #lupt-rom-studentcapacity, #lupt-rom-examcapacity, #lupt-rom-information').removeClass('active');
        $('#lupt-rom-id').addClass('active');
        $('#upt-rom_status').removeAttr('checked');
        $('select#upt-rom_bld option').removeAttr('selected');
        $('select#upt-rom_bld option[value=""]').attr('selected', 'selected');
        $('select#upt-rom_bld option[value=""]').html('(Tidak Diubah)');
        
        $.ajax({
            dataType: "JSON",
            data: {rom_id: rom_id},
            type: "POST",
            url: "<?= basis_url('data/master/ruangan/detail'); ?>",
            success: function (data) {
                if (data.rom_id != '') {
                    $('#upt-rom_id').val(data.rom_id);
                    $('#lupt-rom-id').addClass('active');
                }
                if (data.rom_bld != '') {
                    $('select#upt-rom_bld option[value=""]').removeAttr('selected');
                    $('select#upt-rom_bld option[value=""]').html('(Tidak Diubah) - ' + data.bld_name);
                    $('select#upt-rom_bld option[value="' + data.rom_bld + '"]').attr('selected', 'selected');
                }
                if (data.rom_name != '') {
                    $('#upt-rom_name').val(data.rom_name);
                    $('#lupt-rom-name').addClass('active');
                }
                if (data.rom_studentcapacity != 0) {
                    $('#upt-rom_studentcapacity').val(data.rom_studentcapacity);
                    $('#lupt-rom-studentcapacity').addClass('active');
                }
                if (data.rom_examcapacity != 0) {
                    $('#upt-rom_examcapacity').val(data.rom_examcapacity);
                    $('#lupt-rom-examcapacity').addClass('active');
                }
                if (data.rom_information != '') {
                    $('#upt-rom_information').val(data.rom_information);
                    $('#lupt-rom-information').addClass('active');
                }
                if (data.rom_status != 'off') {
                    $('#upt-rom_status').attr('checked', 'checked')
                }
            }
        });
    }

    function deldata (rom_id, rom_name) {
        swal({
            title: 'Anda Yakin?',
            text: 'Ruangan ' + rom_id + ' - ' + rom_name + ' akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {rom_id: rom_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/ruangan/hapus'); ?>",
                    success: function (url) {
                        $('#rom-content').html(url);
                        swal('Ruangan ' + rom_id + ' - ' + rom_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Ruangan ' + rom_id + ' - ' + rom_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Ruangan ' + rom_id + ' - ' + rom_name + ' tidak jadi dihapus!');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/master/ruangan/id-add'); ?>",
                success: function (url) {
                    $('#add-rom_name, #add-rom_studentcapacity, #add-rom_examcapacity, #add-rom_information').val('');
                    $('#ladd-rom-name, #ladd-rom-studentcapacity, #ladd-rom-examcapacity, #ladd-rom-information').removeClass('active');
                    $('#ladd-rom-id').addClass('active');
                    $('#add-rom_status').removeAttr('checked');
                    $('select#add-rom_bld option[value=""]').attr('selected');
                    $('#add-rom_id').val(url);
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            var rom_bld = $('#add-rom_bld').val();
            if (rom_bld != null) {
                $.ajax({
                    data: $('#fr-add').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/master/ruangan/tambah'); ?>",
                    success: function (url) {
                        var hasil = <?= isset($badan['hasil']) ? $badan['hasil'] : 0; ?>;
                        if (hasil >= 0) {
                            $('#rom-content').html(url);
                            M.toast({html: "Data berhasil ditambahkan!"});
                        } else {
                            M.toast({html: "Data gagal ditambahkan!"});
                        }
                    }
                }); 
            } else {
                swal('Error', 'Periksa data masukan Anda!', 'error');
            }
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            var rom_bld = $('#upt-rom_bld').val();
            if (rom_bld != null) {
                $.ajax({
                    data: $('#fr-upt').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/master/ruangan/update'); ?>",
                    success: function (url) {
                        var hasil = <?= isset($badan['hasil']) ? $badan['hasil'] : 0; ?>;
                        if (hasil >= 0) {
                            $('#rom-content').html(url);
                            M.toast({html: "Data berhasil diperbarui!"});
                        } else {
                            M.toast({html: "Data gagal diperbarui!"});
                        }
                    }
                }); 
            } else {
                swal('Error', 'Periksa data masukan Anda!', 'error');
            }
        });
    });
</script>