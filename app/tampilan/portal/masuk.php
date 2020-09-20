<br>
<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="card-title white-text">Masuk ke Siakad SKAMEDIS</h3>
        </div>
        <div class="card-content" id="ct-form">
            <form method="post" id="fr-login">
                <div class="input-field">
                    <input type="text" id="username" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="input-field center">
                    <button class="indigo white-text btn-large btn waves-effect waves-light" id="fr-kirim">Masuk <i class="material-icons right">exit_to_app</i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#fr-kirim').click(function (e) {
            e.preventDefault();
            $.ajax({
                dataType: "JSON",
                data: $('#fr-login').serialize(),
                type: "POST",
                url: "<?= basis_url('portal/aksi/masuk'); ?>",
                success: function (data) {
                    if (data == false) {
                        swal("Aksi Gagal!", "Kombinasi username dan password tidak ditemukan.", "error");
                    } else {
                        if (data.usr_status == 'on') {
                            swal("Selamat Datang!", "Sedang dialihkan...", "success");
                            setInterval(() => {
                                window.location = "<?= basis_url(); ?>";
                            }, 2000);
                        } else {
                            swal("Aksi Masuk Dicekal!", "Akun ter-suspend, harap hubungi administrator sistem.", "error");
                        }
                    }
                },
                error: function (data) {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });
    })
</script>