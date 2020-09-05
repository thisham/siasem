<?php

class m_portal extends Model
{
    private $dtusr = 'dt_usr_users';

    function __construct()
    {
        $this->db = new Database();
    }

    function aksi($menu = '', $data = '')
    {
        switch ($menu) {
            case 'masuk':
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_name = ? AND usr_password = ?")->ikat($data['username'], md5($data['password']))
                                ->eksekusi()->hasil_tunggal();
                break;
            
            default:
                # code...
                break;
        }
    }

    function __destruct()
    {
        $this->db->tutup();
    }
}