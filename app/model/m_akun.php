<?php 

class m_akun extends Model
{
    private $dtusr = 'dt_usr_users';

    function __construct() {
        $this->db = new Database();
    }

    function pengaturan($act = '', $data = '')
    {
        switch ($act) {
            case 'idpass-find':
                $data = array(
                    'usr_pass'  => md5($data['usr_password']),
                    'usr_id'    => $data['usr_id']
                );
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id = :usr_id AND usr_password = :usr_pass")->ikat($data)->eksekusi()->hasil_jamak();
                break;

            case 'username-update':
                $data = array(
                    'usr_name'  => $data['new_username'],
                    'usr_id'    => $data['usr_id']
                );
                return $this->db->kueri("UPDATE $this->dtusr SET usr_name = :usr_name WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->baris_terefek();
                break;

            case 'password-update':
                $data = array(
                    'usr_pass'  => md5($data['new_password']),
                    'usr_id'    => $data['usr_id']
                );
                return $this->db->kueri("UPDATE $this->dtusr SET usr_password = :usr_pass WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->baris_terefek();
                break;

            case 'username-find':
                $data = array(
                    'usr_name' => $data['new_username']
                );
                return $this->db->kueri("SELECT usr_name FROM $this->dtusr WHERE usr_name = :usr_name")->ikat($data)->eksekusi()->hasil_jamak();
                break;

            case 'userpass-find':
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_name = :usr_name AND usr_password = :usr_pass")->ikat($data)
                                ->eksekusi()->hasil_tunggal();
                break;
            
            default:
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->hasil_tunggal();
                break;
        }
    }
}
