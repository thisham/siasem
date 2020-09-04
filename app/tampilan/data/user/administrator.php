<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="white-text card-title"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large modal-trigger" id="btn-add"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content" id="adm-content">
            <?php $no = 1; ?>
            <table class="table striped responsive-table">
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama</th>
                    <th class="center">Jabatan</th>
                    <th class="center">Aksi</th>
                </tr>
                <?php if ($badan['dtadm'] != NULL) { ?>
                    <?php foreach ($badan['dtadm'] as $dtadm) { ?>
                        <tr>
                            <td class="center"><?= $no++; ?></td>
                            <td><?= $dtadm['adm_name']; ?></td>
                            <td><?= $dtadm['adm_position']; ?></td>
                            <td class="center">
                                <button class="btn btn-small indigo modal-trigger waves-effect waves-light" data-target="modal-det" onclick="detdata('<?= $dtadm['adm_id']; ?>')"><i class="material-icons">search</i></button>
                                <button class="btn btn-small orange modal-trigger waves-effect waves-light" data-target="modal-upt" onclick="uptdata('<?= $dtadm['adm_id']; ?>');"><i class="material-icons">edit</i></button>
                                <button class="btn btn-small red modal-trigger waves-effect waves-light" onclick="resdata('<?= $dtadm['adm_id']; ?>', '<?= $dtadm['adm_name']; ?>', '<?= $dtadm['adm_idnumber']; ?>', '<?= $dtadm['adm_passworddef']; ?>');"><i class="material-icons">replay</i></button>
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
        <h4 class="modal-title">Detail Data</h4>
        <hr>
        <br>
        <table class="table striped">
            <tr>
                <th>Tagar</th>
                <td id="det-adm_id"></td>
            </tr>
            <tr>
                <th>NIP</th>
                <td id="det-adm_idnumber"></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td id="det-adm_name"></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td id="det-adm_address"></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td id="det-adm_phone"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td id="det-adm_email"></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td id="det-adm_position"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td id="det-adm_status"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button id="tutup-det" class="modal-close btn red waves-effect waves-light right">Tutup</button>
    </div>
</div>

<script>
    function uptdata(adm_id) {
        $.ajax({
            data: {adm_id: adm_id},
            type: "POST",
            url: "<?= basis_url('data/user/administrator/editor'); ?>",
            success: function (url) {
                $('#adm-content').html(url);
            }
        });
    }

    function resdata(adm_id, adm_name, adm_idnumber, adm_passworddef) {
        swal({
            title: 'Anda Yakin?',
            text: 'Username dan password akun administrator dengan tagar ' + adm_id + ' milik ' + adm_name + ' akan diset ulang ke setelan default.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    data: {usr_id: adm_id, usr_name: adm_idnumber, usr_password: adm_passworddef},
                    type: "POST",
                    url: "<?= basis_url('data/user/administrator/reset'); ?>",
                    success: function (url) {
                        $('#adm-content').html(url);
                        swal('Username dan password akun administrator dengan tagar ' + adm_id + ' milik ' + adm_name + ' telah diset ulang menjadi username dan password default!', {
                            icon: 'success'
                        });
                    },
                    error: function () {
                        swal('Username dan password akun administrator dengan tagar ' + adm_id + ' milik ' + adm_name + ' tidak dapat diset ulang!', {
                            icon: 'error'
                        });
                    }
                });
                        
            } else {
                swal('Username dan password akun administrator dengan tagar ' + adm_id + ' milik ' + adm_name + ' tidak jadi diset ulang.');
            }
        });
    }

    function detdata(adm_id) {
        $.ajax({
            dataType: "JSON",
            data: {adm_id: adm_id},
            type: "POST",
            url: "<?= basis_url('data/user/administrator/detail'); ?>",
            success: function (data) {
                $('#det-adm_id').html('#' + data.adm_id);
                $('#det-adm_idnumber').html(data.adm_idnumber);
                $('#det-adm_name').html(data.adm_name);
                $('#det-adm_passworddef').html(data.adm_passworddef);
                $('#det-adm_address').html(data.adm_address);
                $('#det-adm_phone').html(data.adm_phone);
                $('#det-adm_email').html(data.adm_email);
                $('#det-adm_position').html(data.adm_position);
                $('#det-adm_status').html((data.usr_status == 'on') ? 'Aktif' : 'Suspensi');
            }
        });
    }

    $(document).ready(function () {
        $('.data-batal').click(function (e) {
            e.preventDefault();
        });

        $('#btn-add').click(function () {
            $.ajax({
                url: "<?= basis_url('data/user/administrator/id-add'); ?>",
                success: function (url) {
                    $('#adm-content').html(url);
                }
            });
        });
    });
</script>