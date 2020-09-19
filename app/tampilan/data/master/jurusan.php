<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" data-target="modal-add" id="btn-add"><i class="material-icons">add</i></a>
        </div>

        <div class="card-content" id="mjr-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama Jurusan</th>
                    <th class="center">Status</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtmjr'] != NULL) { ?> 
                    <?php foreach ($badan['dtmjr'] as $dtmjr) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtmjr['mjr_name']; ?></td>
                            <td class="center"><?= ($dtmjr['mjr_status'] == 'on') ? "Aktif" : "Non-Aktif"; ?></td>
                            <td class="center">
                                <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtmjr['mjr_id']; ?>')"><i class="material-icons">search</i></button>
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtmjr['mjr_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="deldata('<?= $dtmjr['mjr_id']; ?>', '<?= $dtmjr['mjr_name']; ?>');"><i class="material-icons">delete</i></button>
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

<div class="modal modal-fixed-footer" id="modal-det">
    <div class="modal-content">
        <h4 class="modal-title">Detail Jurusan</h4>
        <hr>
        <br>
        <table class="table striped">
            <tr>
                <th>Kode Jurusan</th>
                <td id="det-mjr_id"></td>
            </tr>
            <tr>
                <th>Nama Jurusan</th>
                <td id="det-mjr_name"></td>
            </tr>
            <tr>
                <th>Nama Jurusan (EN)</th>
                <td id="det-mjr_nameen"></td>
            </tr>
            <tr>
                <th>Bidang Keahlian</th>
                <td id="det-mjr_expertise"></td>
            </tr>
            <tr>
                <th>Kompetensi Dasar</th>
                <td id="det-mjr_basic"></td>
            </tr>
            <tr>
                <th>Kompetensi Khusus</th>
                <td id="det-mjr_speciality"></td>
            </tr>
            <tr>
                <th>Ketua Jurusan</th>
                <td id="det-mjr_headofdepartment"></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td id="det-mjr_information"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td id="det-mjr_status"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="" id="data-batal" class="btn btn-flat red modal-close data-batal white-text">Tutup</a>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-add">
    <form action="" method="post" id="fr-add">
        <div class="modal-content">
            <h4 class="modal-title">Tambah Data</h4>
            <hr>
            <br>
            <div class="input-field">
                <input type="text" name="mjr_id" id="add-mjr_id">
                <label for="add-mjr_id" id="ladd-mjr-id">Kode Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_name" id="add-mjr_name">
                <label for="add-mjr_name" id="ladd-mjr-name">Nama Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_nameen" id="add-mjr_nameen">
                <label for="add-mjr_nameen" id="ladd-mjr-nameen">Name Jurusan (EN)</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_expertise" id="add-mjr_expertise">
                <label for="add-mjr_expertise" id="ladd-mjr-expertise">Bidang Keahlian</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_basic" id="add-mjr_basic">
                <label for="add-mjr_basic" id="ladd-mjr-basic">Kompetensi Dasar</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_speciality" id="add-mjr_speciality">
                <label for="add-mjr_speciality" id="ladd-mjr-speciality">Kompetensi Khusus</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_headofdepartment" id="add-mjr_headofdepartment">
                <label for="add-mjr_headofdepartment" id="ladd-mjr-headofdepartment">Ketua Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_information" id="add-mjr_information">
                <label for="add-mjr_information" id="ladd-mjr-information">Keterangan</label>
            </div>
            <label>
                <input type="checkbox" name="mjr_status" id="add-mjr_status">
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
                <input type="text" name="mjr_id" id="upt-mjr_id" readonly>
                <label for="upt-mjr_id" id="lupt-mjr-id">Kode Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_name" id="upt-mjr_name">
                <label for="upt-mjr_name" id="lupt-mjr-name">Nama Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_nameen" id="upt-mjr_nameen">
                <label for="upt-mjr_nameen" id="lupt-mjr-nameen">Name Jurusan (EN)</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_expertise" id="upt-mjr_expertise">
                <label for="upt-mjr_expertise" id="lupt-mjr-expertise">Bidang Keahlian</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_basic" id="upt-mjr_basic">
                <label for="upt-mjr_basic" id="lupt-mjr-basic">Kompetensi Dasar</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_speciality" id="upt-mjr_speciality">
                <label for="upt-mjr_speciality" id="lupt-mjr-speciality">Kompetensi Khusus</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_headofdepartment" id="upt-mjr_headofdepartment">
                <label for="upt-mjr_headofdepartment" id="lupt-mjr-headofdepartment">Ketua Jurusan</label>
            </div>
            <div class="input-field">
                <input type="text" name="mjr_information" id="upt-mjr_information">
                <label for="upt-mjr_information" id="lupt-mjr-information">Keterangan</label>
            </div>
            <label>
                <input type="checkbox" name="mjr_status" id="upt-mjr_status">
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
    function detdata(mjr_id) {
        $('#det-mjr_id, #det-mjr_name, #det-mjr_nameen, #det-mjr_expertise, #det-mjr_basic, #det-mjr_speciality, #det-mjr_headofdepartment, #det-mjr_information, #det-mjr_status').html('<b><i>Tidak terisi.</i></b>');
        $.ajax({
            dataType: "JSON",
            data: {mjr_id: mjr_id},
            type: "POST",
            url: "<?= basis_url('data/master/jurusan/detail'); ?>",
            success: function (data) {
                if (data.mjr_id != '') {
                    $('#det-mjr_id').html(data.mjr_id);
                }
                if (data.mjr_name != '') {
                    $('#det-mjr_name').html(data.mjr_name);
                }
                if (data.mjr_nameen != '') {
                    $('#det-mjr_nameen').html('<i>' + data.mjr_nameen + '</i>');
                }
                if (data.mjr_expertise != '') {
                    $('#det-mjr_expertise').html(data.mjr_expertise);
                }
                if (data.mjr_basic != '') {
                    $('#det-mjr_basic').html(data.mjr_basic);
                }
                if (data.mjr_speciality != '') {
                    $('#det-mjr_speciality').html(data.mjr_speciality);
                }
                if (data.mjr_headofdepartment != '') {
                    $('#det-mjr_headofdepartment').html(data.mjr_headofdepartment);
                }
                if (data.mjr_information != '') {
                    $('#det-mjr_information').html(data.mjr_information);
                }
                $('#det-mjr_status').html((data.mjr_status == 'on') ? 'Aktif' : 'Non-Aktif');
            }
        });
    }

    function deldata (mjr_id, mjr_name) {
        swal({
            title: "Anda Yakin?",
            text: "Jurusan " + mjr_id + " - " + mjr_name + " akan dihapus. Data yang telah dihapus tidak dapat dipulihkan kembali.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {mjr_id: mjr_id},
                    type: "POST",
                    url: "<?= basis_url('data/master/jurusan/hapus'); ?>",
                    success: function (url) {
                        $('#mjr-content').html(url);
                        swal('Jurusan ' + mjr_id + ' - ' + mjr_name + ' telah dihapus!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Jurusan ' + mjr_id + ' - ' + mjr_name + ' tidak dihapus! Harap periksa data-data yang berelasi.', {
                            icon: 'error'
                        });
                    }
                });
            } else {
                swal("Jurusan " + mjr_id + " - " + mjr_name + " tidak jadi dihapus!");
            }
        });
    }

    function uptdata (mjr_id) {
        $('#upt-mjr_id, #upt-mjr_name, #upt-mjr_nameen, #upt-mjr_expertise, #upt-mjr_basic, #upt-mjr_speciality, #upt-mjr_headofdepartment, #upt-mjr_information').val('');
        $('#lupt-mjr-id, #lupt-mjr-name, #lupt-mjr-nameen, #lupt-mjr-expertise, #lupt-mjr-basic, #lupt-mjr-speciality, #lupt-mjr-headofdepartment, #lupt-mjr-information').removeClass('active');
        $('#upt-mjr_status').removeAttr('checked');
        $.ajax({
            dataType: "JSON",
            data: {mjr_id: mjr_id},
            type: "POST",
            url: "<?= basis_url('data/master/jurusan/detail'); ?>",
            success: function (data) {
                if (data.mjr_id != '') {
                    $('#upt-mjr_id').val(data.mjr_id);
                    $('#lupt-mjr-id').addClass('active');
                }
                if (data.mjr_name != '') {
                    $('#upt-mjr_name').val(data.mjr_name);
                    $('#lupt-mjr-name').addClass('active');
                }
                if (data.mjr_nameen != '') {
                    $('#upt-mjr_nameen').val(data.mjr_nameen);
                    $('#lupt-mjr-nameen').addClass('active');
                }
                if (data.mjr_expertise != '') {
                    $('#upt-mjr_expertise').val(data.mjr_expertise);
                    $('#lupt-mjr-expertise').addClass('active');
                }
                if (data.mjr_basic != '') {
                    $('#upt-mjr_basic').val(data.mjr_basic);
                    $('#lupt-mjr-basic').addClass('active');
                }
                if (data.mjr_speciality != '') {
                    $('#upt-mjr_speciality').val(data.mjr_speciality);
                    $('#lupt-mjr-speciality').addClass('active');
                }
                if (data.mjr_headofdepartment != '') {
                    $('#upt-mjr_headofdepartment').val(data.mjr_headofdepartment);
                    $('#lupt-mjr-headofdepartment').addClass('active');
                }
                if (data.mjr_information != '') {
                    $('#upt-mjr_information').val(data.mjr_information);
                    $('#lupt-mjr-information').addClass('active');
                }
                if (data.mjr_status != 'off') {
                    $('#upt-mjr_status').attr('checked', 'checked');
                }
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $('#add-mjr_id, #add-mjr_name, #add-mjr_nameen, #add-mjr_expertise, #add-mjr_basic, #add-mjr_speciality, #add-mjr_headofdepartment, #add-mjr_information').val('');
            $('#ladd-mjr-id, #ladd-mjr-name, #ladd-mjr-nameen, #ladd-mjr-expertise, #ladd-mjr-basic, #ladd-mjr-speciality, #ladd-mjr-headofdepartment, #ladd-mjr-information').removeClass('active');
            $('#add-mjr_status').removeAttr('checked');
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-add').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/jurusan/tambah'); ?>",
                success: function (url) {
                    $('#mjr-content').html(url);
                    M.toast({html: 'Data berhasil ditambahkan!'});
                }
            });
        });

        $('#kirim-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                data: $('#fr-upt').serialize(),
                type: "POST",
                url: "<?= basis_url('data/master/jurusan/update'); ?>",
                success: function (url) {
                    $('#mjr-content').html(url);
                    M.toast({html: 'Data berhasil diperbarui!'});
                }
            });
        });
    });
</script>