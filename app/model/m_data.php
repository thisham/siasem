<?php

class m_data extends Model
{
    // main data
    private $dtsch = 'dt_sch_school';
    private $dtcur = 'dt_cur_curriculums';
    private $dtfys = 'dt_fys_fiscalyears';
    private $dtbld = 'dt_bld_buildings';
    private $dtrom = 'dt_rom_rooms';
    private $dtecl = 'dt_ecl_employeeclasses';
    private $dtptk = 'dt_ptk_ptk';
    private $dtmjr = 'dt_mjr_majors';
    private $dtcls = 'dt_cls_classes';
    private $dtest = 'dt_est_employeestatuses';
    // academic 
    private $dtsgr = 'dt_sgr_subjectgroups';
    private $dtsbj = 'dt_sbj_subjects';
    private $dttsr = 'dt_tsr_taskandsources';
    private $dtbcp = 'dt_bcp_basiccompetences';
    private $dtgrd = 'dt_grd_grades';
    // users
    private $dthdm = 'dt_hdm_headmaster';
    private $dttch = 'dt_tch_teachers';
    private $dtfin = 'dt_fin_finances';
    private $dtstu = 'dt_stu_students';
    private $dtadm = 'dt_adm_administrators';
    private $dtusr = 'dt_usr_users';

    function __construct()
    {
        $this->db = new Database();
    }

    function master($menu = '', $act = '', $data = '')
    {
        switch ($menu) {
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

            case 'golongan':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtecl WHERE ecl_id = ?")->ikat($data['ecl_id'])
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(ecl_id) as kode FROM $this->dtecl")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'E-' . sprintf("%03s", $no_max);
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtecl WHERE ecl_id = ?")->ikat($data['ecl_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        return $this->db->kueri("INSERT INTO $this->dtecl VALUES (?, ?, ?)")->ikat($data['ecl_id'], $data['ecl_name'], $data['ecl_information'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtecl SET ecl_name = ?, ecl_information = ? WHERE ecl_id = ?")->ikat($data['ecl_name'], $data['ecl_information'], $data['ecl_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtecl")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'jurusan':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtmjr WHERE mjr_id = ?")->ikat($data['mjr_id'])
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtmjr WHERE mjr_id = ?")->ikat($data['mjr_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data['mjr_status'] = (isset($data['mjr_status'])) ? 'on' : 'off';
                        extract((array) $data);
                        return $this->db->kueri("INSERT INTO $this->dtmjr VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")->ikat($mjr_id, $mjr_name, $mjr_nameen, $mjr_expertise, $mjr_basic, $mjr_speciality, $mjr_headofdepartment, $mjr_information, $mjr_status)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['mjr_status'] = (isset($data['mjr_status'])) ? 'on' : 'off';
                        return $this->db->kueri("UPDATE $this->dtmjr SET mjr_name = ?, mjr_nameen = ?, mjr_expertise = ?, mjr_basic = ?, mjr_speciality = ?, mjr_headofdepartment = ?, mjr_information = ?, mjr_status = ? WHERE mjr_id = ?")
                                        ->ikat($data['mjr_name'], $data['mjr_nameen'], $data['mjr_expertise'], $data['mjr_basic'], $data['mjr_speciality'], $data['mjr_headofdepartment'], $data['mjr_information'], $data['mjr_status'], $data['mjr_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtmjr")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'kelas':
                switch ($act) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
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

            case 'ptk':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtptk WHERE ptk_id = ?")->ikat($data['ptk_id'])
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtptk WHERE ptk_id = ?")->ikat($data['ptk_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(ptk_id) as kode FROM $this->dtptk")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'P-' . sprintf("%03s", $no_max);
                        break;
                        
                    case 'tambah':
                        return $this->db->kueri("INSERT INTO $this->dtptk VALUES (?, ?, ?)")->ikat($data['ptk_id'], $data['ptk_name'], $data['ptk_information'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtptk SET ptk_name = ?, ptk_information = ? WHERE ptk_id = ?")->ikat($data['ptk_name'], $data['ptk_information'], $data['ptk_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtptk")->eksekusi()->hasil_jamak();
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

            case 'status-pegawai':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtest WHERE est_id = ?")->ikat($data['est_id'])
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtest WHERE est_id = ?")->ikat($data['est_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(est_id) as kode FROM $this->dtest")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'T-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        return $this->db->kueri("INSERT INTO $this->dtest VALUES (?, ?, ?)")->ikat($data['est_id'], $data['est_employeestatuses'], $data['est_information'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtest SET est_employeestatuses = ?, est_information = ? WHERE est_id = ?")->ikat($data['est_employeestatuses'], $data['est_information'], $data['est_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtest")->eksekusi()->hasil_jamak();
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

    function user($menu = '', $act = '', $data = '')
    {
        switch ($menu) {
            case 'administrator':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtadm WHERE adm_id = ?")->ikat($data['adm_id'])
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(adm_id) as kode FROM $this->dtadm")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 6); 
                        $no_max = ++$no_max;
                        return '20201' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data['adm_status'] = (isset($data['adm_status'])) ? 'on' : 'off';
                        extract((array) $data);
                        return $this->db->kueri("INSERT INTO $this->dtadm VALUES (?, ?, ?, ?, ?, ?, ?, ?)")->ikat($adm_id, $adm_idnumber, $adm_name, $adm_passworddef, $adm_address, $adm_phone, $adm_email, $adm_position)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtadm SET adm_idnumber = ?, adm_name = ?, adm_passworddef = ?, adm_address = ?, adm_phone = ?, adm_email = ?, adm_position = ? WHERE adm_id = ?")
                                        ->ikat($data['adm_idnumber'], $data['adm_name'], $data['adm_passworddef'], $data['adm_address'], $data['adm_phone'], $data['adm_email'], $data['adm_position'], $data['adm_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtadm")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'guru':
                # code...
                break;

            case 'kepala-sekolah':
                # code...
                break;

            case 'keuangan':
                # code...
                break;

            case 'siswa':
                # code...
                break;

            case 'user':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id = ?")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'reset':
                        return $this->db->kueri("UPDATE $this->dtusr SET usr_name = ?, usr_password = ? WHERE usr_id = ?")->ikat($data['usr_name'], md5($data['usr_password']), $data['usr_id'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah-adm':
                        $data['adm_status'] = (isset($data['adm_status'])) ? "on" : "off";
                        return $this->db->kueri("INSERT INTO $this->dtusr VALUES (?, ?, ?, ?, ?)")->ikat($data['adm_id'], $data['adm_idnumber'], md5($data['adm_passworddef']), '1', $data['adm_status'])
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah-fin':
                        # code...
                        break;

                    case 'tambah-hdm':
                        # code...
                        break;

                    case 'tambah-tch':
                        # code...
                        break;

                    case 'tambah-stu':
                        # code...
                        break;

                    case 'update-status-val':
                        $data['adm_status'] = (isset($data['adm_status'])) ? 'on' : 'off';
                        return $this->db->kueri("UPDATE $this->dtusr SET usr_status = ? WHERE usr_id = ?")->ikat($data['adm_status'], $data['adm_id'])
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        # code...
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
