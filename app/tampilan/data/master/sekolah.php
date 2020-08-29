<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large" id="btn-upt"><i class="material-icons">edit</i></a>
        </div>
        <div class="card-content" id="sch-content">
            <table class="table striped">
                <tr>
                    <th>Nama Sekolah</th>
                    <td><?= $badan['dtsch']['sch_name']; ?></td>
                </tr>
                <tr>
                    <th>NPSN</th>
                    <td><?= $badan['dtsch']['sch_npsn']; ?></td>
                </tr>
                <tr>
                    <th>NSS</th>
                    <td><?= $badan['dtsch']['sch_nss']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $badan['dtsch']['sch_address']; ?></td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td><?= $badan['dtsch']['sch_postalcode']; ?></td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td><?= $badan['dtsch']['sch_telephone']; ?></td>
                </tr>
                <tr>
                    <th>Kelurahan/Desa</th>
                    <td><?= $badan['dtsch']['sch_village']; ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td><?= $badan['dtsch']['sch_district']; ?></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td><?= $badan['dtsch']['sch_regency']; ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td><?= $badan['dtsch']['sch_province']; ?></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><?= $badan['dtsch']['sch_website']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $badan['dtsch']['sch_email']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#btn-upt').click(function () {
            $.ajax({
                url: "<?= basis_url('data/master/sekolah/editor'); ?>",
                success: function(url) {
                    $('#sch-content').html(url);
                }
            });
        });

        // $('#sch-upt').click(function (e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         data: $('#fr-upt').serialize(),
        //         url: "<?= basis_url('data/master/sekolah/update'); ?>",
        //         success: function (url) {
        //             $('#sch-content').html(url);
        //             M.toast({html: 'Data berhasil diubah!'});
        //         }
        //     });
        // });
    });
</script>