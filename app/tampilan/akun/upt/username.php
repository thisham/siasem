<form action="" method="post" id="fr-upt">
    <div class="input-field">
        <input type="text" name="new_username" id="username-baru">
        <label for="username-baru">Username Baru</label>
    </div>
    <button id="kirim-upt" class="right indigo btn waves-effect waves-light">Kirim <i class="material-icons right">send</i></button>
    <button class="left red btn waves-effect waves-light data-batal">Batal</button>
    <br><br>
</form>

<script>
    $(document).ready(() => {
        $('.data-batal').click((e) => {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('akun/pengaturan/final'); ?>",
                success: (url) => {
                    $('#usr-content').html(url);
                }
            });
        });

        $('#kirim-upt').click((e) => {
            e.preventDefault();
            var new_username = $('#username-baru').val();
            if (new_username != '') {
                $.ajax({
                    data: {new_username: new_username},
                    type: "POST",
                    url: "<?= basis_url('akun/pengaturan/username-count'); ?>",
                    success: (url) => {
                        if (url == 0) {
                            $.ajax({
                                data: {new_username: $('#username-baru').val(), usr_id: "<?= $_SESSION['usr_id']; ?>"},
                                type: "POST",
                                url: "<?= basis_url('akun/pengaturan/update-username'); ?>",
                                success: (url) => {
                                    $('#usr-content').html(url);
                                    M.toast({html: "Username telah diubah!"});
                                },
                                error: () => {
                                    M.toast({html: "Username tidak diubah!"});
                                }
                            });
                        } else {
                            swal('Kesalahan!', 'Username telah digunakan.', 'error');
                        }
                    }
                });
            } else {
                swal('Kesalahan!', 'Isian tidak boleh kosong.', 'error');
            }
        });
    });
</script>