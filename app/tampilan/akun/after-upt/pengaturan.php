<table class="table striped">
    <tr>
        <td><b>Username</b></td>
        <td><?= $badan['dtusr']['usr_name']; ?></td>
        <td class="center"><button id="username-edit" class="btn indigo waves-effect waves-light"><i class="material-icons">edit</i></button></td>
    </tr>
    <tr>
        <td><b>Password</b></td>
        <td>Tidak untuk diperlihatkan.</td>
        <td class="center"><button id="password-edit" class="btn indigo waves-effect waves-light"><i class="material-icons">edit</i></button></td>
    </tr>
</table>

<script>
    $(document).ready(() => {
        $('#username-edit').click(() => {
            $.ajax({
                url: "<?= basis_url('akun/pengaturan/username-editor'); ?>",
                success: (url) => {
                    $('#usr-content').html(url);
                }
            });
        });

        $('#password-edit').click(() => {
            $.ajax({
                url: "<?= basis_url('akun/pengaturan/password-editor'); ?>",
                success: (url) => {
                    $('#usr-content').html(url);
                }
            });
        });
    });
</script>