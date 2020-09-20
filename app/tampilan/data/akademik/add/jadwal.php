<form action="" method="post" id="fr-add">
    <h4 class="modal-title">Tambah Data</h4>
    <div class="divider"></div>
    <div class="input-field">
        <input type="text" name="ssc_id" id="add-ssc_id" value="<?= $badan['dtssc']; ?>" readonly>
        <label for="add-ssc_id" id="ladd-ssc-id" <?= ($badan['dtssc'] != '') ? 'class="active"' : ''; ?>>ID Jadwal</label>
    </div>
    <div class="input-field">
        <select name="ssc_fys" id="add-ssc_fys">
            <option value="" disabled selected>Pilih Tahun Pelajaran...</option>
            <?php foreach ($badan['dtfys'] as $dtfys) { ?>
                <option value="<?= $dtfys['fys_id']; ?>"><?= $dtfys['fys_name']; ?></option>
            <?php } ?>
        </select>
        <label for="add-ssc_fys">Tahun Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="ssc_cls" id="add-ssc_cls">
            <option value="" disabled selected>Pilih Kelas...</option>
            <?php foreach ($badan['dtcls'] as $dtcls) { ?>
                <option value="<?= $dtcls['cls_id']; ?>"><?= $dtcls['cls_name']; ?></option>
            <?php } ?>
        </select>
        <label for="add-ssc_cls">Kelas</label>
    </div>
    <div class="input-field">
        <select name="ssc_sbj" id="add-ssc_sbj">
            <option value="" id="asbj1" disabled selected>Pilih Mata Pelajaran...</option>
            <?php foreach ($badan['dtsbj'] as $dtsbj) { ?>
                <option value="<?= $dtsbj['sbj_id']; ?>"><?= $dtsbj['sbj_name']; ?></option>
            <?php } ?>
        </select>
        <label for="add-ssc_sbj">Mata Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="ssc_tch" id="add-ssc_tch">
            <option value="" disabled selected>Pilih Pengajar...</option>
            <?php foreach ($badan['dttch'] as $dttch) { ?>
                <option value="<?= $dttch['tch_id']; ?>"><?= $dttch['tch_name']; ?></option>
            <?php } ?>
        </select>
        <label for="add-ssc_tch">Pengajar</label>
    </div>
    <div class="row s12">
        <div class="col s6">
            <div class="input-field">
                <input type="time" name="ssc_timestart" id="add-ssc_timestart" value="<?= $badan['dtssc']['ssc_timestart']; ?>">
                <label for="add-ssc_timestart" id="ladd-ssc-timestart">Mulai</label>
            </div>
        </div>
        <div class="col s6">
            <div class="input-field">
                <input type="time" name="ssc_timeend" id="add-ssc_timeend">
                <label for="add-ssc_timeend" id="ladd-ssc-timeend">Selesai</label>
            </div>
        </div>
    </div>
    <div class="input-field">
        <input type="number" name="ssc_learntime" id="add-ssc_learntime">
        <label for="add-ssc_learntime" id="ladd-ssc-learntime">Jam Pelajaran</label>
    </div>
    <div class="input-field">
        <select name="ssc_day" id="add-ssc_day">
            <option value="" id="aday1" disabled selected>Pilih Hari...</option>
            <option value="0">Minggu</option>
            <option value="1">Senin</option>
            <option value="2">Selasa</option>
            <option value="3">Rabu</option>
            <option value="4">Kamis</option>
            <option value="5">Jumat</option>
            <option value="6">Sabtu</option>
        </select>
        <label for="add-ssc_day">Hari</label>
    </div>
    <p>
        <label>
            <input type="checkbox" name="ssc_status" id="add-ssc_status">
            <span>Aktif</span>
        </label>
    </p>
    <br>
    <div class="divider"></div>
    <br>
    <button id="kirim-add" class="btn indigo white-text waves-effect waves-light right">Kirim</button>
    <button class="btn red data-batal left white-text waves-effect waves-light">Batal</button>
    <br><br>
</form>

<script>
    $(document).ready(function () {
        $('select').formSelect();

        $('.data-batal').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= basis_url('data/akademik/jadwal/list'); ?>",
                success: function (url) {
                    $('#btn-add').show();
                    $('#ssc-content').html(url);
                },
                error: function () {
                    swal("エッラー!", "サーバーの接続が見つかりません。", "error");
                }
            });
        });

        $('#kirim-add').click(function (e) {
            e.preventDefault();
            var fys = $('#add-ssc_fys').val();
            var cls = $('#add-ssc_cls').val();
            var sbj = $('#add-ssc_sbj').val();
            var tch = $('#add-ssc_tch').val();

            if (fys != null && cls != null && sbj != null && tch != null) {
                $.ajax({
                    data: $('#fr-add').serialize(),
                    type: "POST",
                    url: "<?= basis_url('data/akademik/jadwal/tambah'); ?>",
                    success: function (url) {
                        console.log('tambah');
                        $('#ssc-content').html(url);
                        M.toast({html: "Data berhasil ditambahkan!"});
                    },
                    error: function () {
                        M.toast({html: "Data gagal ditambahkan."});
                    }
                });
            } else {
                swal('Kesalahan', 'Lengkapi data isian tahun pelajaran, kelas, pengajar mapel dan mata pelajaran!', 'error');
            }
            
        });
    });
</script>