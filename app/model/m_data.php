<?php

class m_data extends Model
{
    // main data
    private $dtsch = 'dt_sch_school';
    private $dtcur = 'dt_cur_curriculums';
    private $dtfys = 'dt_fys_fiscalyears';
    private $dtbld = 'dt_bld_buildings';
    private $dtrom = 'dt_rom_rooms';
    private $dtest = 'dt_est_employeestatuses';
    private $dtptk = 'dt_ptk_ptk';
    private $dtmjr = 'dt_mjr_majors';
    private $dtcls = 'dt_cls_classes';
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
            case 'golongan':
                # code...
                break;
            case 'gedung':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtbld WHERE bld_id = ?")->ikat($data['bld_id'])->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(bld_id) as kode FROM $this->dtbld")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'B-' . sprintf("%03s", $no_max);
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtbld WHERE bld_id = ?")->ikat($data['bld_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        extract((array) $data);
                        $bld_status = (isset($bld_status)) ? 'on' : 'off';
                        return $this->db->kueri("INSERT INTO $this->dtbld VALUES (?, ?, ?, ?, ?, ?, ?, ?)")->ikat($bld_id, $bld_name, $bld_floor, $bld_length, $bld_height, $bld_width, $bld_information, $bld_status)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['bld_status'] = (isset($data['bld_status'])) ? 'on' : 'off';
                        return $this->db->kueri("UPDATE $this->dtbld SET bld_name = ?, bld_floor = ?, bld_length = ?, bld_width = ?, bld_height = ?, bld_information = ?, bld_status = ? WHERE bld_id = ?")
                                        ->ikat($data['bld_name'], $data['bld_floor'], $data['bld_length'], $data['bld_width'], $data['bld_height'], $data['bld_information'], $data['bld_status'], $data['bld_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtbld")->eksekusi()->hasil_jamak();
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
                        $data['cur_status'] = (isset($data['cur_status'])) ? 'on' : 'off';
                        return $this->db->kueri("INSERT INTO $this->dtcur VALUES (?, ?, ?)")->ikat($data['cur_id'], $data['cur_name'], $data['cur_status'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['cur_status'] = (isset($data['cur_status'])) ? 'on' : 'off';
                        return $this->db->kueri("UPDATE $this->dtcur SET cur_name = ?, cur_status = ? WHERE cur_id = ?")->ikat($data['cur_name'], $data['cur_status'], $data['cur_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtcur")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'ruangan':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtrom JOIN $this->dtbld ON rom_bld = bld_id WHERE rom_id = ?")->ikat($data['rom_id'])->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtrom WHERE rom_id = ?")->ikat($data['rom_id'])->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(rom_id) as kode FROM $this->dtrom")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'R-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data['rom_status']          = (isset($data['rom_status'])) ? "on" : "off";
                        $data['rom_studentcapacity'] = ($data['rom_studentcapacity'] <= 0 || $data['rom_studentcapacity'] == NULL) ? 0 : $data['rom_studentcapacity'];
                        $data['rom_examcapacity']    = ($data['rom_examcapacity'] <= 0 || $data['rom_examcapacity'] == NULL) ? 0 : $data['rom_examcapacity'];
                        extract((array) $data);
                        return $this->db->kueri("INSERT INTO $this->dtrom VALUES (?, ?, ?, ?, ?, ?, ?)")
                                        ->ikat($rom_id, $rom_bld, $rom_name, $rom_studentcapacity, $rom_examcapacity, $rom_information, $rom_status)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['rom_status']          = (isset($data['rom_status'])) ? "on" : "off";
                        $data['rom_studentcapacity'] = ($data['rom_studentcapacity'] <= 0 || $data['rom_studentcapacity'] == NULL) ? 0 : $data['rom_studentcapacity'];
                        $data['rom_examcapacity']    = ($data['rom_examcapacity'] <= 0 || $data['rom_examcapacity'] == NULL) ? 0 : $data['rom_examcapacity'];
                        return $this->db->kueri("UPDATE $this->dtrom SET rom_bld = ?, rom_name = ?, rom_studentcapacity = ?, rom_examcapacity = ?, rom_information = ?, rom_status = ? WHERE rom_id = ?")
                                        ->ikat($data['rom_bld'], $data['rom_name'], $data['rom_studentcapacity'], $data['rom_examcapacity'], $data['rom_information'], $data['rom_status'], $data['rom_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtrom JOIN $this->dtbld ON rom_bld = bld_id")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

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

            case 'tapel':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtfys WHERE fys_id = ?")->ikat($data['fys_id'])->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtfys WHERE fys_id = ?")->ikat($data['fys_id'])->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data['fys_status'] = (isset($data['fys_status'])) ? 'on' : 'off' ;
                        return $this->db->kueri("INSERT INTO $this->dtfys VALUES (?, ?, ?, ?)")->ikat($data['fys_id'], $data['fys_name'], $data['fys_fiscal'], $data['fys_status'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['fys_status'] = (isset($data['fys_status'])) ? 'on' : 'off' ;
                        return $this->db->kueri("UPDATE $this->dtfys SET fys_name = ?, fys_fiscal = ?, fys_status = ? WHERE fys_id = ?")
                                        ->ikat($data['fys_name'], $data['fys_fiscal'], $data['fys_status'], $data['fys_id'])->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtfys")->eksekusi()->hasil_jamak();
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
