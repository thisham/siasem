<?php

class akun extends Kontroler
{
    function __construct() {
        $this->akun = $this->model('m_akun');
        $this->session = new Session();
        if ($this->session->get('usr_role') == NULL) {
            alihkan(basis_url('portal'));
            exit;
        }
    }

    function pengaturan($menu = '', $act = '')
    {
        switch ($menu) {
            case 'detail':
                $send = array('usr_id'  => $this->session->get('usr_id'));
                $acts = $this->akun->pengaturan('akun', $send);
                echo json_encode($acts);
                break;

            case 'final':
                $send = array('usr_id'  => $this->session->get('usr_id'));
                $data = array(
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $send)
                    )
                );
                $this->tampilkan('akun/after-upt/pengaturan', $data);
                break;

            case 'idpass-find':
                $send = $_POST;
                $acts = $this->akun->pengaturan('idpass-find', $send);
                echo count($acts);
                break;

            case 'username-editor':
                $send = array('usr_id'  => $this->session->get('usr_id'));
                $data = array(
                    'title' => 'Pengaturan Akun',
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $send)
                    )
                );
                $this->tampilkan('akun/upt/username', $data);
                break;

            case 'password-editor':
                $send = array('usr_id'  => $this->session->get('usr_id'));
                $data = array(
                    'title' => 'Pengaturan Akun',
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $send)
                    )
                );
                $this->tampilkan('akun/upt/password', $data);
                break;

            case 'update-username':
                $send = $_POST;
                $sent = array('usr_id'  => $this->session->get('usr_id'));
                $acts = $this->akun->pengaturan('username-update', $send);
                $data = array(
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $sent)
                    )
                );
                $this->tampilkan('akun/after-upt/pengaturan', $data);
                break;

            case 'update-password':
                $send = $_POST;
                $sent = array('usr_id'  => $this->session->get('usr_id'));
                $acts = $this->akun->pengaturan('password-update', $send);
                $data = array(
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $sent)
                    )
                );
                $this->tampilkan('akun/after-upt/pengaturan', $data);
                break;

            case 'username-count':
                $send = $_POST;
                $acts = $this->akun->pengaturan('username-find', $send);
                echo count($acts);
                break;
            
            default:
                $send = array('usr_id'  => $this->session->get('usr_id'));
                $data = array(
                    'title' => 'Pengaturan Akun',
                    'badan' => array(
                        'dtusr' => $this->akun->pengaturan('akun', $send)
                    )
                );
                $this->tampilkan('pakem/header', $data);
                $this->tampilkan('pakem/navbar', $data);
                $this->tampilkan('akun/pengaturan', $data);
                $this->tampilkan('pakem/footer');
                break;
        }
    }
}
