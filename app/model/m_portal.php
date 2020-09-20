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
                $data = array(
                    'usr_name'  => $data['username'], 
                    'usr_pass'  => md5($data['password'])
                );
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_name = :usr_name AND usr_password = :usr_pass")->ikat($data)
                                ->eksekusi()->hasil_tunggal();
                break;
            
            default:
                # code...
                break;
        }
    }
}