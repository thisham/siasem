<form action="<?= basis_url('data/master/sekolah/update'); ?>" method="post" id="fr-upt">
    <div class="input-field">
        <input type="text" id="sch_name" name="sch_name" value="<?= $badan['dtsch']['sch_name']; ?>">
        <label <? if($badan['dtsch']['sch_name'] != '') echo "class='active'"; ?> for="sch_name">Nama Sekolah</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_npsn" name="sch_npsn" value="<?= $badan['dtsch']['sch_npsn']; ?>">
        <label <? if($badan['dtsch']['sch_npsn'] != '') echo "class='active'"; ?> for="sch_npsn">NPSN</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_nss" name="sch_nss" value="<?= $badan['dtsch']['sch_nss']; ?>">
        <label <? if($badan['dtsch']['sch_nss'] != '') echo "class='active'"; ?> for="sch_nss">NSS</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_address" name="sch_address" value="<?= $badan['dtsch']['sch_address']; ?>">
        <label <? if($badan['dtsch']['sch_address'] != '') echo "class='active'"; ?> for="sch_address">Alamat Sekolah</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_postalcode" name="sch_postalcode" value="<?= $badan['dtsch']['sch_postalcode']; ?>">
        <label <? if($badan['dtsch']['sch_postalcode'] != '') echo "class='active'"; ?> for="sch_postalcode">Kode Pos</label>
    </div>
    <div class="input-field">
        <input type="tel" id="sch_telephone" name="sch_telephone" class="validate" value="<?= $badan['dtsch']['sch_telephone']; ?>">
        <label <? if($badan['dtsch']['sch_telephone'] != '') echo "class='active'"; ?> for="sch_telephone">Telepon</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_village" name="sch_village" value="<?= $badan['dtsch']['sch_village']; ?>">
        <label <? if($badan['dtsch']['sch_village'] != '') echo "class='active'"; ?> for="sch_village">Kelurahan/Desa</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_district" name="sch_district" value="<?= $badan['dtsch']['sch_district']; ?>">
        <label <? if($badan['dtsch']['sch_district'] != '') echo "class='active'"; ?> for="sch_district">Kecamatan</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_regency" name="sch_regency" value="<?= $badan['dtsch']['sch_regency']; ?>">
        <label <? if($badan['dtsch']['sch_regency'] != '') echo "class='active'"; ?> for="sch_regency">Kabupaten/Kota</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_province" name="sch_province" value="<?= $badan['dtsch']['sch_province']; ?>">
        <label <? if($badan['dtsch']['sch_province'] != '') echo "class='active'"; ?> for="sch_province">Provinsi</label>
    </div>
    <div class="input-field">
        <input type="text" id="sch_website" name="sch_website" value="<?= $badan['dtsch']['sch_website']; ?>">
        <label <? if($badan['dtsch']['sch_website'] != '') echo "class='active'"; ?> for="sch_website">Website</label>
    </div>
    <div class="input-field">
        <input type="email" id="sch_email" name="sch_email" class="validate" value="<?= $badan['dtsch']['sch_email']; ?>">
        <label <? if($badan['dtsch']['sch_email'] != '') echo "class='active'"; ?> for="sch_email">Email</label>
    </div>
    <div class="input-field">
        <center>
            <button class="btn btn-large waves-effect waves-light indigo white-text" id="sch-upt">Update</button>
        </center>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sch-upt').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                data: $('#fr-upt').serialize(),
                url: "<?= basis_url('data/master/sekolah/update'); ?>",
                success: function (url) {
                    $('#sch-content').html(url);
                    M.toast({html: 'Data berhasil diubah!'});
                }
            });
        });
    });
</script>