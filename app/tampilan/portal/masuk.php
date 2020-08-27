<br>
<div class="container">
    <div class="card">
        <div class="card-action indigo">
            <h3 class="text-title white-text">Masuk ke Siakad SKAMEDIS</h3>
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
                type: "POST",
                data: $('#fr-login').serialize(),
                url: "<?= basis_url('portal/aksi/masuk'); ?>",
                success: function (url) {
                    $('#ct-form').html(url);
                }
            });
        });
    })
</script>