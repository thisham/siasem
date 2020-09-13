<?php

class data extends Kontroler
{
    function __construct()
    {
        $this->session = new Session();
        $this->data = $this->model('m_data');
        $this->file = $this->pustaka('p_berkas');
        if ($this->session->get('usr_role') == NULL) {
            alihkan(basis_url('portal'));
        }
    }

    function indeks()
    {
        echo "string";
    }

    function master($menu = '', $act = '')
    {
        if ($this->session->get('usr_role') != 1) {
            $this->tampilkan('errors/error-403');
            exit;
        }
        switch ($menu)
        {
            case 'gedung':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('gedung', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('gedung', 'hapus', $send);
                        $data = array (
                            'badan' => array (
                                'dtbld' => $this->data->master('gedung')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/gedung', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('gedung', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('gedung', 'tambah', $send);
                        $data = array (
                            'badan' => array (
                                'dtbld' => $this->data->master('gedung')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/gedung', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('gedung', 'update', $send);
                        $data = array (
                            'badan' => array (
                                'dtbld' => $this->data->master('gedung')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/gedung', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Gedung',
                            'badan' => array(
                                'dtbld' => $this->data->master('gedung')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/gedung', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'golongan':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        echo json_encode($this->data->master('golongan', 'detail', $send));
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('golongan', 'hapus', $send);
                        $data = array (
                            'badan' => array (
                                'dtecl' => $this->data->master('golongan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/golongan', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('golongan', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('golongan', 'tambah', $send);
                        $data = array (
                            'badan' => array (
                                'dtecl' => $this->data->master('golongan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/golongan', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('golongan', 'update', $send);
                        $data = array (
                            'badan' => array (
                                'dtecl' => $this->data->master('golongan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/golongan', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Golongan',
                            'badan' => array(
                                'dtecl' => $this->data->master('golongan')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/golongan', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'jurusan':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        echo json_encode($this->data->master('jurusan', 'detail', $send));
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('jurusan', 'hapus', $send);
                        $data = array (
                            'badan' => array (
                                'dtmjr' => $this->data->master('jurusan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/jurusan', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('jurusan', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('jurusan', 'tambah', $send);
                        $data = array (
                            'badan' => array (
                                'dtmjr' => $this->data->master('jurusan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/jurusan', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('jurusan', 'update', $send);
                        $data = array (
                            'badan' => array (
                                'dtmjr' => $this->data->master('jurusan')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/jurusan', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Jurusan',
                            'badan' => array(
                                'dtmjr' => $this->data->master('jurusan')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/jurusan', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'kelas':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('kelas', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('kelas', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtcls' => $this->data->master('kelas'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtrom' => $this->data->master('ruangan')
                            )
                        );
                        $this->tampilkan('data/master/after-upt/kelas', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('kelas', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('kelas', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtcls' => $this->data->master('kelas'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtrom' => $this->data->master('ruangan')
                            )
                        );
                        $this->tampilkan('data/master/after-upt/kelas', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('kelas', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtcls' => $this->data->master('kelas'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtrom' => $this->data->master('ruangan')
                            )
                        );
                        $this->tampilkan('data/master/after-upt/kelas', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Kelas',
                            'badan' => array(
                                'dtcls' => $this->data->master('kelas'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtrom' => $this->data->master('ruangan')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/kelas', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'kurikulum' :
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('kurikulum', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('kurikulum', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/kurikulum', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('kurikulum', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $this->data->master('kurikulum', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
    
                        $this->tampilkan('data/master/after-upt/kurikulum', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('kurikulum', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/kurikulum', $data);
                        break;

                    default:
                        $data = array(
                            'title' => 'Data Kurikulum',
                            'badan' => array(
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/kurikulum', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                
                break;

            case 'ptk':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('ptk', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('ptk', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtptk' => $this->data->master('ptk')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ptk', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('ptk', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('ptk', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtptk' => $this->data->master('ptk')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ptk', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('ptk', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtptk' => $this->data->master('ptk')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ptk', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Pendidik dan Tenaga Kependidikan',
                            'badan' => array(
                                'dtptk' => $this->data->master('ptk')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/ptk', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'ruangan':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('ruangan', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('ruangan', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtrom' => $this->data->master('ruangan'),
                                'dtbld' => $this->data->master('gedung')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ruangan', $data);
                        break;
                        
                    case 'id-add':
                        echo $this->data->master('ruangan', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('ruangan', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtrom' => $this->data->master('ruangan'),
                                'dtbld' => $this->data->master('gedung'),
                                'hasil' => $acts
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ruangan', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('ruangan', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtrom' => $this->data->master('ruangan'),
                                'dtbld' => $this->data->master('gedung')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/ruangan', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Ruangan',
                            'badan' => array(
                                'dtrom' => $this->data->master('ruangan'),
                                'dtbld' => $this->data->master('gedung')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/ruangan', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'sekolah':
                switch ($act) {
                    case 'update':
                        $send = $_POST; 
                        $this->data->master('sekolah', 'update', $send);

                        $data = array(
                            'badan' => array(
                                'dtsch' => $this->data->master('sekolah')
                            )
                        );
                        $this->tampilkan('data/master/after-upt/sekolah', $data);
                        break;

                    case 'editor':
                        $data = array(
                            'title' => 'Data Sekolah',
                            'badan' => array(
                                'dtsch' => $this->data->master('sekolah')
                            )
                        );
                        
                        $this->tampilkan('data/master/upt/sekolah', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Sekolah',
                            'badan' => array(
                                'dtsch' => $this->data->master('sekolah')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/sekolah', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'status-pegawai':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('status-pegawai', 'detail', $send);
                        
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('status-pegawai', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtest' => $this->data->master('status-pegawai')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/status-pegawai', $data);
                        break;

                    case 'id-add':
                        echo $this->data->master('status-pegawai', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('status-pegawai', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtest' => $this->data->master('status-pegawai')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/status-pegawai', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('status-pegawai', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtest' => $this->data->master('status-pegawai')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/status-pegawai', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Status Pegawai',
                            'badan' => array(
                                'dtest' => $this->data->master('status-pegawai')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/status-pegawai', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'tapel':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->master('tapel', 'detail', $send);

                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->master('tapel', 'hapus', $send);
                        $data = array (
                            'badan' => array(
                                'dtfys' => $this->data->master('tapel')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/tapel', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->master('tapel', 'tambah', $send);
                        $data = array (
                            'badan' => array(
                                'dtfys' => $this->data->master('tapel')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/tapel', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->master('tapel', 'update', $send);
                        $data = array (
                            'badan' => array(
                                'dtfys' => $this->data->master('tapel')
                            )
                        );

                        $this->tampilkan('data/master/after-upt/tapel', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Tahun Pelajaran',
                            'badan' => array(
                                'dtfys' => $this->data->master('tapel')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/master/tapel', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            default:
                $data = array(
                    'title' => 'Data Master'
                );
                $this->tampilkan('pakem/header', $data);
                $this->tampilkan('pakem/navbar', $data);
                $this->tampilkan('data/master/index', $data);
                $this->tampilkan('pakem/footer');
                break;
        }
    }

    function user($menu = '', $act = '', $param = '')
    {
        switch ($menu) {
            case 'administrator':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $act1 = $this->data->user('administrator', 'detail', $send);
                        $act2 = $this->data->user('user', 'detail', $send['adm_id']);
                        $act1['usr_status'] = $act2['usr_status'];
                        echo json_encode($act1);
                        break;

                    case 'editor':
                        $send = $_POST;
                        $data = array(
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator', 'detail', $send),
                                'dtusr' => $this->data->user('user', 'detail', $send['adm_id'])
                            )
                        );
                        
                        $this->tampilkan('data/user/upt/administrator', $data);
                        break;

                    case 'id-add':
                        $data = array(
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator', 'id-add')
                            )
                        );
                        $this->tampilkan('data/user/add/administrator', $data);
                        break;

                    case 'list':
                        $data = array(
                            'title' => 'Data Administrator',
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator')
                            )
                        );
                        $this->tampilkan('data/user/after-upt/administrator', $data);
                        break;

                    case 'reset':
                        $send = $_POST;
                        $acts = $this->data->user('user', 'reset', $send);
                        $data = array(
                            'title' => 'Data Administrator',
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator')
                            )
                        );
                        $this->tampilkan('data/user/after-upt/administrator', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $act1 = $this->data->user('administrator', 'tambah', $send);
                        $act2 = $this->data->user('user', 'tambah-adm', $send);
                        $data = array(
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator')
                            )
                        );

                        $this->tampilkan('data/user/after-upt/administrator', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $act1 = $this->data->user('administrator', 'update', $send);
                        $act2 = $this->data->user('user', 'update-status-val', $send);
                        $data = array(
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator')
                            )
                        );

                        $this->tampilkan('data/user/after-upt/administrator', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Administrator',
                            'badan' => array(
                                'dtadm' => $this->data->user('administrator')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/user/administrator', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'guru':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->user('guru', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'detail-upt':
                        $send = $_POST;
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru', 'detail', $send),
                                'dtest' => $this->data->master('status-pegawai'),
                                'dtptk' => $this->data->master('ptk')
                            )
                        );
                        $this->tampilkan('data/user/upt/guru', $data);
                        break;

                    case 'id-add':
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru', 'id-add'),
                                'dtptk' => $this->data->master('ptk'),
                                'dtest' => $this->data->master('status-pegawai')
                            )
                        );

                        $this->tampilkan('data/user/add/guru', $data);
                        break;

                    case 'list':
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        // echo 'asdsda';

                        $this->tampilkan('data/user/after-upt/guru', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $act1 = $this->data->user('guru', 'tambah', $send);
                        $act2 = $this->data->user('user', 'tambah-tch', $send);
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );

                        $this->tampilkan('data/user/after-upt/guru', $data);
                        break;

                    case 'photo-upload':
                        $send = $_POST;
                        $file = $this->file->setFolder('img/teacher')->upload($send['tch_id'], $_FILES['file']);
                        $send = array('tch_id' => $send['tch_id'], 'tch_photo' => $file);
                        $act1 = $this->data->user('guru', 'photo-upload', $send);
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/user/after-upt/guru', $data);
                        break;

                    case 'reset':
                        $send = $_POST;
                        $acts = $this->data->user('user', 'reset', $send);
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/user/after-upt/guru', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->user('guru', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );

                        $this->tampilkan('data/user/after-upt/guru', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Guru',
                            'badan' => array(
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/user/guru', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'kepala-sekolah':
                switch ($act) {
                    case 'detail':
                        $data = array(
                            'badan' => array(
                                'dthdm' => $this->data->user('kepala-sekolah')
                            )
                        );
                        $this->tampilkan('data/user/aftr-upt/kepala-sekolah', $data);
                        break;

                    case 'editor':
                        $data = array(
                            'badan' => array(
                                'dthdm' => $this->data->user('kepala-sekolah')
                            )
                        );
                        $this->tampilkan('data/user/upt/kepala-sekolah', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $act1 = $this->data->user('user', 'tambah-hdm', $send);
                        $act2 = $this->data->user('kepala-sekolah', 'update', $send);
                        
                        $data = array(
                            'badan' => array(
                                'dthdm' => $this->data->user('kepala-sekolah')
                            )
                        );
                        $this->tampilkan('data/user/after-upt/kepala-sekolah', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Kepala Sekolah',
                            'badan' => array(
                                'dthdm' => $this->data->user('kepala-sekolah')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/user/kepala-sekolah', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'siswa':
                switch ($act) {
                    case 'id-add':
                        $data = array(
                            'title' => 'Tambah Data Siswa',
                            'badan' => array(
                                'dtstu' => $this->data->user('siswa', 'id-add'),
                                'dtcls' => $this->data->master('kelas'),
                                'dtmjr' => $this->data->master('jurusan')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/user/add/siswa', $data);
                        $this->tampilkan('pakem/footer');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $this->data->user('siswa', 'tambah', $send);

                        alihkan(basis_url('data/user/siswa'));
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Data Siswa',
                            'badan' => array(
                                'dtstu' => $this->data->user('siswa')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/user/siswa', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'user':
                switch ($act) {
                    case 'reset':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
                break;
            
            default:
                $data = array(
                    'title' => 'Data User'
                );
                $this->tampilkan('pakem/header', $data);
                $this->tampilkan('pakem/navbar', $data);
                $this->tampilkan('data/user/index', $data);
                $this->tampilkan('pakem/footer');
                break;
        }
    }

    function akademik($menu = '', $act = '', $p1 = '', $p2 = '')
    {
        switch ($menu) {
            case 'jadwal':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->akademik('jadwal', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'editor':
                        $send = $_POST;
                        $data = array(
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal', 'detail', $send),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/upt/jadwal', $data);
                        break;

                    case 'id-add':
                        $data = array(
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal', 'id-add'),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/add/jadwal', $data);
                        break;

                    case 'hapus':
                        parse_str($_POST['ssc_param'], $_POST['ssc_param']);
                        $par1 = $_POST['ssc_param']; unset($_POST['ssc_param']);
                        $send = $_POST;
                        $acts = $this->data->akademik('jadwal', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtssc' => ($par1 == NULL) ? $this->data->akademik('jadwal') : $this->data->akademik('jadwal', 'list', $par1),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/tbl-jadwal', $data);
                        break;

                    case 'list':
                        $acts = $this->data->akademik('jadwal');
                        $data = array(
                            'badan' => array(
                                'dtssc' => $acts,
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/jadwal', $data);
                        break;

                    case 'list-param':
                        $send = $_POST;
                        $acts = $this->data->akademik('jadwal', 'list', $send);
                        $data = array(
                            'badan' => array(
                                'dtssc' => $acts,
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/tbl-jadwal', $data);
                        break;

                    case 'non-aktif':
                        $data = array(
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal', 'non-aktif'),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/jadwal', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->akademik('jadwal', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal'),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/jadwal', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->akademik('jadwal', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal'),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/jadwal', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Jadwal Pelajaran',
                            'badan' => array(
                                'dtssc' => $this->data->akademik('jadwal'),
                                'dtfys' => $this->data->master('tapel'), 
                                'dtcls' => $this->data->master('kelas'), 
                                'dtsbj' => $this->data->akademik('mapel'), 
                                'dttch' => $this->data->user('guru')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/akademik/jadwal', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'kelompok-mapel':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->akademik('kelompok-mapel', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'id-add':
                        echo $this->data->akademik('kelompok-mapel', 'id-add');
                        break;
                        
                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->akademik('kelompok-mapel', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtsgr' => $this->data->akademik('kelompok-mapel')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/kelompok-mapel', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->akademik('kelompok-mapel', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtsgr' => $this->data->akademik('kelompok-mapel')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/kelompok-mapel', $data);
                        break;
                    
                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->akademik('kelompok-mapel', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtsgr' => $this->data->akademik('kelompok-mapel')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/kelompok-mapel', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Kelompok Mata Pelajaran',
                            'badan' => array(
                                'dtsgr' => $this->data->akademik('kelompok-mapel')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/akademik/kelompok-mapel', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'mapel':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->akademik('mapel', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'editor':
                        $send = $_POST;
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel', 'detail', $send),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/upt/mapel', $data);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->akademik('mapel', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/mapel', $data);
                        break;

                    case 'id-add':
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel', 'id-add'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/add/mapel', $data);
                        break;

                    case 'list':
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/mapel', $data);
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->akademik('mapel', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/mapel', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->akademik('mapel', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/mapel', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Mata Pelajaran',
                            'badan' => array(
                                'dtsbj' => $this->data->akademik('mapel'),
                                'dtsgr' => $this->data->akademik('kelompok-mapel'),
                                'dtmjr' => $this->data->master('jurusan'),
                                'dttch' => $this->data->user('guru'),
                                'dtcur' => $this->data->master('kurikulum')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/akademik/mapel', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;

            case 'materi':
                # code...
                break;

            case 'kompetensi-dasar':
                # code...
                break;

            case 'rentang-nilai':
                switch ($act) {
                    case 'detail':
                        $send = $_POST;
                        $acts = $this->data->akademik('rentang-nilai', 'detail', $send);
                        echo json_encode($acts);
                        break;

                    case 'hapus':
                        $send = $_POST;
                        $acts = $this->data->akademik('rentang-nilai', 'hapus', $send);
                        $data = array(
                            'badan' => array(
                                'dtgrd' => $this->data->akademik('rentang-nilai')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/rentang-nilai', $data);
                        break;

                    case 'id-add':
                        echo $this->data->akademik('rentang-nilai', 'id-add');
                        break;

                    case 'tambah':
                        $send = $_POST;
                        $acts = $this->data->akademik('rentang-nilai', 'tambah', $send);
                        $data = array(
                            'badan' => array(
                                'dtgrd' => $this->data->akademik('rentang-nilai')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/rentang-nilai', $data);
                        break;

                    case 'update':
                        $send = $_POST;
                        $acts = $this->data->akademik('rentang-nilai', 'update', $send);
                        $data = array(
                            'badan' => array(
                                'dtgrd' => $this->data->akademik('rentang-nilai')
                            )
                        );
                        $this->tampilkan('data/akademik/after-upt/rentang-nilai', $data);
                        break;
                    
                    default:
                        $data = array(
                            'title' => 'Rentang Nilai (Grading)',
                            'badan' => array(
                                'dtgrd' => $this->data->akademik('rentang-nilai')
                            )
                        );
                        $this->tampilkan('pakem/header', $data);
                        $this->tampilkan('pakem/navbar', $data);
                        $this->tampilkan('data/akademik/rentang-nilai', $data);
                        $this->tampilkan('pakem/footer');
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}