<form action="" method="post" id="fr-upt">
    <div class="input-field">
        <input type="password" name="old_password" id="password-lama">
        <label for="password-lama">Password Lama</label>
    </div>
    <div class="input-field">
        <input type="password" name="new_password" id="password-baru">
        <label for="password-baru">Password Baru</label>
    </div>
    <div class="input-field">
        <input type="password" name="renew_password" id="repassword-baru">
        <label for="repassword-baru">Konfirmasi Password Baru</label>
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
            var opass = $('#password-lama').val();
            var npass = $('#password-baru').val();
            var rpass = $('#repassword-baru').val();
            if (npass == '' || rpass == '' || opass == '') {
                swal('Kesalahan!', 'Kolom isian wajib diisi!', 'error');
            } else {
                if (npass == rpass) {
                    $.ajax({
                        data: {usr_id: "<?= $_SESSION['usr_id']; ?>", usr_password: opass},
                        type: "POST",
                        url: "<?= basis_url('akun/pengaturan/idpass-find'); ?>",
                        success: (url) => {
                            if (url > 0) {
                                $.ajax({
                                    data: {usr_id: "<?= $_SESSION['usr_id']; ?>", new_password: npass},
                                    type: "POST",
                                    url: "<?= basis_url('akun/pengaturan/update-password'); ?>",
                                    success: (url) => {
                                        $('#usr-content').html(url),
                                        M.toast({html: "Password telah diubah!"});
                                    },
                                    error: () => {
                                        M.toast({html: "Password tidak diubah."});
                                    }
                                });
                            } else {
                                swal('Kesalahan!', 'Password salah!', 'error');
                            }
                        }
                    });
                } else {
                    swal('Kesalahan!', 'Password baru dan konfirmasi pengubahan password baru tidak sama!', 'error');
                }
            }
        });
    });
</script>