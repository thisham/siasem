<?php

class m_portal extends Model
{
    private $dfusr = 'df_users';

    function __construct()
    {
        $this->db = new Database();
    }

    function aksi($menu, $data)
    {
        if ($menu == 'masuk') {
            return $this->db->kueri("SELECT * FROM $this->dfusr WHERE username = ? AND password = ?")
                            ->eksekusi()->hasil_tunggal();
        }
    }

    function __destruct()
    {
        $this->db->tutup();
    }
}