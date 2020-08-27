<?php

class m_data extends Model
{
    // main data
    private $dtsch = 'dt_sch_school';
    private $dtcur = 'dt_cur_curriculums';
    private $dtfys = 'dt_fys_fiscalyears';
    private $dtbld = 'dt_bld_buldings';
    private $dtrom = 'dt_rom_rooms';
    private $dtecl = 'dt_ecl_employeeclasses';
    private $dtptk = 'dt_ptk_ptk';
    // academic 
    private $dtsgr = 'dt_sgr_subjectgroups';
    private $dtsbj = 'dt_sbj_subjects';
    private $dttsr = 'dt_tsr_taskandsources';
    private $dtbcp = 'dt_bcp_basiccompetences';
    private $dtgrd = 'dt_grd_grades';

    function __construct()
    {
        $this->db = new Database();
    }

    function master($menu = '', $act = '', $data = '')
    {
        switch ($menu) {
            case 'sekolah':
                switch ($act) {
                    case 'update':
                        extract((array) $data);
                        return $this->db->kueri("UPDATE $this->dtsch SET sch_name = ?, sch_npsn = ?, sch_nss = ?, sch_address = ?, sch_postalcode = ?, sch_telephone = ?, sch_village = ?, sch_district = ?, sch_regency = ?, sch_province = ?, sch_website = ?, sch_email = ?")
                                        ->ikat($sch_name, $sch_npsn, $sch_nss, $sch_address, $sch_postalcode, $sch_telephone, $sch_village, $sch_district, $sch_regency, $sch_province, $sch_website, $sch_email)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtsch WHERE sch_id = ?")->ikat('1')->eksekusi()->hasil_tunggal();
                        break;
                }
                break;

            case 'kurikulum':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtcur WHERE cur_id = ?")->ikat($data['cur_id'])->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtcur WHERE cur_id = ?")->ikat($data['cur_id'])->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(cur_id) as kode FROM $this->dtcur")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'K-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data['cur_status'] = (isset($data['cur_status'])) ? 'on' : '';
                        return $this->db->kueri("INSERT INTO $this->dtcur VALUES (?, ?, ?)")->ikat($data['cur_id'], $data['cur_name'], $data['cur_status'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['cur_status'] = (isset($data['cur_status'])) ? 'on' : '';
                        return $this->db->kueri("UPDATE $this->dtcur SET cur_name = ?, cur_status = ? WHERE cur_id = ?")->ikat($data['cur_name'], $data['cur_status'], $data['cur_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtcur")->eksekusi()->hasil_jamak();
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
