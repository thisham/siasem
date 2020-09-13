<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text"><?= $title; ?></h3>
            <a class="btn-floating halfway-fab waves-effect waves-light red btn-large" id="btn-upt"><i class="material-icons">edit</i></a>
        </div>
        <div class="card-content" id="hdm-content">
            <table class="table striped">
                <tr>
                    <td><b>NIP</b></td>
                    <td id="hdm_idnumber"><?= $badan['dthdm']['hdm_idnumber']; ?></td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td id="hdm_name"><?= $badan['dthdm']['hdm_name']; ?></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td id="hdm_email"><?= $badan['dthdm']['hdm_email']; ?></td>
                </tr>
                <tr>
                    <td><b>Nomor HP</b></td>
                    <td id="hdm_phone"><?= $badan['dthdm']['hdm_phone']; ?></td>
                </tr>
                <tr>
                    <td><b>Jabatan</b></td>
                    <td id="hdm_position"><?= $badan['dthdm']['hdm_position']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#btn-upt').click(function () {
            $.ajax({
                url: "<?= basis_url('data/user/kepala-sekolah/editor'); ?>",
                success: function (url) {
                    $('#hdm-content').html(url);
                },
                error: function () {
                    swal('Error!', 'Netwerk is niet bereikbaar!', 'error');
                }
            });
        });
    });
</script>