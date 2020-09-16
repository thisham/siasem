<div class="container">
    <div class="row">
        <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-action indigo">
                    <h3 class="card-title white-text">Selamat Datang!</h3>
                </div>
                <div class="card-content">
                    <p>Selamat datang <b><?= $badan['dtusr']['adm_name']; ?></b>, halaman ini adalah dasbor akun siakad Anda! Anda masuk dengan akun <b><?= $_SESSION['usr_name'] . ' #' . $_SESSION['usr_id'] ?></b>. Ingatlah untuk selalu berdoa sebelum dan sesudah kegiatan belajar mengajar atau bekerja!</p>
                </div>
            </div>
        </div>
        <div class="col l6 m6 s12">
            <div class="card">
                <div class="card-action indigo">
                    <h3 class="card-title white-text">Statistik</h3>
                </div>
                <div class="card-content">
                    <table class="table striped">
                        <tr>
                            <th>Siswa</th>
                            <td><?= count($badan['dtstu']); ?></td>
                        </tr>
                        <tr>
                            <th>Guru</th>
                            <td><?= count($badan['dttch']); ?></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td><?= count($badan['dtmjr']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>