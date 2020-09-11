<?php 

class m_akun extends Model
{
    function __construct() {
        $this->db = $this->pustaka('Database_PDO');
    }

    function pengaturan($act = '', $data = '')
    {
        switch ($act) {
            case 'update':
                return $this->db->kueri("UPDATE $this->dtusr SET usr_name = :usr_name, usr_password = :usr_password WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->baris_terefek();
                break;
            
            default:
                return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->hasil_tunggal();
                break;
        }
    }
}
