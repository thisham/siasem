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
    private $dtssc = 'dt_ssc_schedule';
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
                        $data = array('bld_id' => $data['bld_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtbld WHERE bld_id = :bld_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(bld_id) as kode FROM $this->dtbld")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'B-' . sprintf("%03s", $no_max);
                        break;

                    case 'hapus':
                        $data = array('bld_id' => $data['bld_id']);
                        return $this->db->kueri("DELETE FROM $this->dtbld WHERE bld_id = :bld_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'bld_id'            => $data['bld_id'],
                            'bld_name'          => $data['bld_name'],
                            'bld_floor'         => $data['bld_floor'],
                            'bld_length'        => $data['bld_length'],
                            'bld_height'        => $data['bld_height'],
                            'bld_width'         => $data['bld_width'],
                            'bld_information'   => $data['bld_information'],
                            'bld_status'        => (isset($data['bld_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtbld VALUES (:bld_id, :bld_name, :bld_floor, :bld_length, :bld_height, :bld_width, :bld_information, :bld_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'bld_id'            => $data['bld_id'],
                            'bld_name'          => $data['bld_name'],
                            'bld_floor'         => $data['bld_floor'],
                            'bld_length'        => $data['bld_length'],
                            'bld_height'        => $data['bld_height'],
                            'bld_width'         => $data['bld_width'],
                            'bld_information'   => $data['bld_information'],
                            'bld_status'        => (isset($data['bld_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtbld SET bld_name = :bld_name, bld_floor = :bld_floor, bld_length = :bld_length, bld_width = :bld_width, bld_height = :bld_height, bld_information = :bld_information, bld_status = :bld_status WHERE bld_id = :bld_id")->ikat($data)
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
                        $data = array('ecl_id' => $data['ecl_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtecl WHERE ecl_id = :ecl_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(ecl_id) as kode FROM $this->dtecl")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'E-' . sprintf("%03s", $no_max);
                        break;

                    case 'hapus':
                        $data = array('ecl_id' => $data['ecl_id']);
                        return $this->db->kueri("DELETE FROM $this->dtecl WHERE ecl_id = :ecl_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'ecl_id'    => $data['ecl_id'],
                            'ecl_name'  => $data['ecl_name'],
                            'ecl_information'   => $data['ecl_information']
                        );
                        return $this->db->kueri("INSERT INTO $this->dtecl VALUES (:ecl_id, :ecl_name, :ecl_information)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'ecl_id'    => $data['ecl_id'],
                            'ecl_name'  => $data['ecl_name'],
                            'ecl_information'   => $data['ecl_information']
                        );
                        return $this->db->kueri("UPDATE $this->dtecl SET ecl_name = :ecl_name, ecl_information = :ecl_information WHERE ecl_id = :ecl_id")->ikat($data)
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
                        $data = array('mjr_id' => $data['mjr_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtmjr WHERE mjr_id = :mjr_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('mjr_id' => $data['mjr_id']);
                        return $this->db->kueri("DELETE FROM $this->dtmjr WHERE mjr_id = :mjr_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'mjr_id'                => $data['mjr_id'],
                            'mjr_name'              => $data['mjr_name'],
                            'mjr_nameen'            => $data['mjr_nameen'],
                            'mjr_basic'             => $data['mjr_basic'],
                            'mjr_expertise'         => $data['mjr_expertise'],
                            'mjr_speciality'        => $data['mjr_speciality'],
                            'mjr_headofdepartment'  => $data['mjr_headofdepartment'],
                            'mjr_information'       => $data['mjr_information'],
                            'mjr_status'            => (isset($data['mjr_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtmjr VALUES (:mjr_id, :mjr_name, :mjr_nameen, :mjr_expertise, :mjr_basic, :mjr_speciality, :mjr_headofdepartment, :mjr_information, :mjr_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'mjr_id'                => $data['mjr_id'],
                            'mjr_name'              => $data['mjr_name'],
                            'mjr_nameen'            => $data['mjr_nameen'],
                            'mjr_basic'             => $data['mjr_basic'],
                            'mjr_expertise'         => $data['mjr_expertise'],
                            'mjr_speciality'        => $data['mjr_speciality'],
                            'mjr_headofdepartment'  => $data['mjr_headofdepartment'],
                            'mjr_information'       => $data['mjr_information'],
                            'mjr_status'            => (isset($data['mjr_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtmjr SET mjr_name = :mjr_name, mjr_nameen = :mjr_nameen, mjr_expertise = :mjr_expertise, mjr_basic = :mjr_basic, mjr_speciality = :mjr_speciality, mjr_headofdepartment = :mjr_headofdepartment, mjr_information = :mjr_information, mjr_status = :mjr_status WHERE mjr_id = :mjr_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtmjr")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'kelas':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtcls JOIN $this->dttch ON cls_tch = tch_id JOIN $this->dtmjr ON cls_mjr = mjr_id JOIN $this->dtrom ON cls_rom = rom_id WHERE cls_id = :cls_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtcls WHERE cls_id = :cls_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(cls_id) as kode FROM $this->dtcls")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'C-' . sprintf("%03s", $no_max);
                        break;
                    
                    case 'tambah':
                        $data = array(
                            'cls_id'    => $data['cls_id'],
                            'cls_name'  => $data['cls_name'],
                            'cls_mjr'   => (isset($data['cls_mjr'])) ? $data['cls_mjr'] : '',
                            'cls_tch'   => (isset($data['cls_tch'])) ? $data['cls_tch'] : '',
                            'cls_rom'   => (isset($data['cls_rom'])) ? $data['cls_rom'] : '',
                            'cls_status'=> (isset($data['cls_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtcls VALUES (:cls_id, :cls_name, :cls_tch, :cls_mjr, :cls_rom, :cls_status)")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'cls_id'    => $data['cls_id'],
                            'cls_name'  => $data['cls_name'],
                            'cls_mjr'   => (isset($data['cls_mjr'])) ? $data['cls_mjr'] : '',
                            'cls_tch'   => (isset($data['cls_tch'])) ? $data['cls_tch'] : '',
                            'cls_rom'   => (isset($data['cls_rom'])) ? $data['cls_rom'] : '',
                            'cls_status'=> (isset($data['cls_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtcls SET cls_name = :cls_name, cls_mjr = :cls_mjr, cls_tch = :cls_tch, cls_rom = :cls_rom, cls_status = :cls_status WHERE cls_id = :cls_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtcls JOIN $this->dttch ON cls_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'kurikulum':
                switch ($act) {
                    case 'detail':
                        $data = array('cur_id' => $data['cur_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtcur WHERE cur_id = :cur_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('cur_id' => $data['cur_id']);
                        return $this->db->kueri("DELETE FROM $this->dtcur WHERE cur_id = :cur_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(cur_id) as kode FROM $this->dtcur")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'K-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data = array(
                            'cur_id'    => $data['cur_id'],
                            'cur_name'  => $data['cur_name'],
                            'cur_status'=> (isset($data['cur_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtcur VALUES (:cur_id, :cur_name, :cur_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'cur_id'    => $data['cur_id'],
                            'cur_name'  => $data['cur_name'],
                            'cur_status'=> (isset($data['cur_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtcur SET cur_name = :cur_name, cur_status = :cur_status WHERE cur_id = :cur_id")->ikat($data)
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
                        $data = array('ptk_id' => $data['ptk_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtptk WHERE ptk_id = :ptk_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('ptk_id' => $data['ptk_id']);
                        return $this->db->kueri("DELETE FROM $this->dtptk WHERE ptk_id = :ptk_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(ptk_id) as kode FROM $this->dtptk")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'P-' . sprintf("%03s", $no_max);
                        break;
                        
                    case 'tambah':
                        $data = array(
                            'ptk_id'            => $data['ptk_id'],
                            'ptk_name'          => $data['ptk_name'],
                            'ptk_information'   => $data['ptk_information']
                        );
                        return $this->db->kueri("INSERT INTO $this->dtptk VALUES (:ptk_id, :ptk_name, :ptk_information)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'ptk_id'            => $data['ptk_id'],
                            'ptk_name'          => $data['ptk_name'],
                            'ptk_information'   => $data['ptk_information']
                        );
                        return $this->db->kueri("UPDATE $this->dtptk SET ptk_name = :ptk_name, ptk_information = :ptk_information WHERE ptk_id = :ptk_id")->ikat($data)
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
                        $data = array('rom_id' => $data['rom_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtrom JOIN $this->dtbld ON rom_bld = bld_id WHERE rom_id = :rom_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('rom_id' => $data['rom_id']);
                        return $this->db->kueri("DELETE FROM $this->dtrom WHERE rom_id = :rom_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(rom_id) as kode FROM $this->dtrom")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'R-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data = array(
                            'rom_id'    => $data['rom_id'],
                            'rom_bld'   => $data['rom_bld'],
                            'rom_name'  => $data['rom_name'],
                            'rom_studentcapacity'   => ($data['rom_studentcapacity'] <= 0 || $data['rom_studentcapacity'] == NULL) ? 0 : $data['rom_studentcapacity'],
                            'rom_examcapacity'      => ($data['rom_examcapacity'] <= 0 || $data['rom_examcapacity'] == NULL) ? 0 : $data['rom_examcapacity'],
                            'rom_information'       => $data['rom_information'],
                            'rom_status'            => (isset($data['rom_status'])) ? "on" : "off"
                        );
                        return $this->db->kueri("INSERT INTO $this->dtrom VALUES (:rom_id, :rom_bld, :rom_name, :rom_studentcapacity, :rom_examcapacity, :rom_information, :rom_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'rom_id'    => $data['rom_id'],
                            'rom_bld'   => $data['rom_bld'],
                            'rom_name'  => $data['rom_name'],
                            'rom_studentcapacity'   => ($data['rom_studentcapacity'] <= 0 || $data['rom_studentcapacity'] == NULL) ? 0 : $data['rom_studentcapacity'],
                            'rom_examcapacity'      => ($data['rom_examcapacity'] <= 0 || $data['rom_examcapacity'] == NULL) ? 0 : $data['rom_examcapacity'],
                            'rom_information'       => $data['rom_information'],
                            'rom_status'            => (isset($data['rom_status'])) ? "on" : "off"
                        );
                        return $this->db->kueri("UPDATE $this->dtrom SET rom_bld = :rom_bld, rom_name = :rom_name, rom_studentcapacity = :rom_studentcapacity, rom_examcapacity = :rom_examcapacity, rom_information = :rom_information, rom_status = :rom_status WHERE rom_id = :rom_id")->ikat($data)
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
                        $data = array(
                            'sch_name'      => $data['sch_name'], 
                            'sch_npsn'      => $data['sch_npsn'], 
                            'sch_nss'       => $data['sch_nss'], 
                            'sch_address'   => $data['sch_address'], 
                            'sch_postalcode'=> $data['sch_postalcode'], 
                            'sch_telephone' => $data['sch_telephone'], 
                            'sch_village'   => $data['sch_village'], 
                            'sch_district'  => $data['sch_district'], 
                            'sch_regency'   => $data['sch_regency'], 
                            'sch_province'  => $data['sch_province'], 
                            'sch_website'   => $data['sch_website'], 
                            'sch_email'     => $data['sch_email']
                        );
                        return $this->db->kueri("UPDATE $this->dtsch SET sch_name = :sch_name, sch_npsn = :sch_npsn, sch_nss = :sch_nss, sch_address = :sch_address, sch_postalcode = :sch_postalcode, sch_telephone = :sch_telephone, sch_village = :sch_village, sch_district = :sch_district, sch_regency = :sch_regency, sch_province = :sch_province, sch_website = :sch_website, sch_email = :sch_email")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        $data = array('sch_id' => 1);
                        return $this->db->kueri("SELECT * FROM $this->dtsch WHERE sch_id = :sch_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;
                }
                break;

            case 'status-pegawai':
                switch ($act) {
                    case 'detail':
                        $data = array(
                            'est_id'    => $data['est_id']
                        );
                        return $this->db->kueri("SELECT * FROM $this->dtest WHERE est_id = :est_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array(
                            'est_id'    => $data['est_id']
                        );
                        return $this->db->kueri("DELETE FROM $this->dtest WHERE est_id = :est_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(est_id) as kode FROM $this->dtest")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3); 
                        $no_max = ++$no_max;
                        return 'T-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data = array(
                            'est_id'                => $data['est_id'],
                            'est_employeestatuses'  => $data['est_employeestatuses'],
                            'est_information'       => $data['est_information']
                        );
                        return $this->db->kueri("INSERT INTO $this->dtest VALUES (:est_id, :est_employeestatuses, :est_information)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'est_id'                => $data['est_id'],
                            'est_employeestatuses'  => $data['est_employeestatuses'],
                            'est_information'       => $data['est_information']
                        );
                        return $this->db->kueri("UPDATE $this->dtest SET est_employeestatuses = :est_employeestatuses, est_information = :est_information WHERE est_id = :est_id")->ikat($data)
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
                        $data = array('fys_id' => $data['fys_id']);
                        return $this->db->kueri("SELECT * FROM $this->dtfys WHERE fys_id = :fys_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('fys_id' => $data['fys_id']);
                        return $this->db->kueri("DELETE FROM $this->dtfys WHERE fys_id = :fys_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'fys_id'    => $data['fys_id'],
                            'fys_name'  => $data['fys_name'],
                            'fys_fiscal'=> $data['fys_fiscal'],
                            'fys_status'=> (isset($data['fys_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtfys VALUES (:fys_id, :fys_name, :fys_fiscal, :fys_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'fys_id'    => $data['fys_id'],
                            'fys_name'  => $data['fys_name'],
                            'fys_fiscal'=> $data['fys_fiscal'],
                            'fys_status'=> (isset($data['fys_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtfys SET fys_name = :fys_name, fys_fiscal = :fys_fiscal, fys_status = :fys_status WHERE fys_id = :fys_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
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
                        $data = array(
                            'adm_id'    => $data['usr_id']
                        );
                        return $this->db->kueri("SELECT * FROM $this->dtadm WHERE adm_id = :adm_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(adm_id) as kode FROM $this->dtadm")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 6); 
                        $no_max = ++$no_max;
                        return date('Y') . '1' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data = array(
                            'adm_id'            => $data['adm_id'],
                            'adm_idnumber'      => $data['adm_idnumber'],
                            'adm_name'          => $data['adm_name'],
                            'adm_passworddef'   => $data['adm_passworddef'],
                            'adm_address'       => $data['adm_address'],
                            'adm_phone'         => $data['adm_phone'],
                            'adm_email'         => $data['adm_email'],
                            'adm_position'      => $data['adm_position'],
                            'adm_status'        => (isset($data['adm_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtadm VALUES (:adm_id, :adm_idnumber, :adm_name, :adm_passworddef, :adm_address, :adm_phone, :adm_email, :adm_position)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'adm_id'            => $data['adm_id'],
                            'adm_idnumber'      => $data['adm_idnumber'],
                            'adm_name'          => $data['adm_name'],
                            'adm_passworddef'   => $data['adm_passworddef'],
                            'adm_address'       => $data['adm_address'],
                            'adm_phone'         => $data['adm_phone'],
                            'adm_email'         => $data['adm_email'],
                            'adm_position'      => $data['adm_position'],
                            'adm_status'        => (isset($data['adm_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtadm SET adm_idnumber = :adm_idnumber, adm_name = :adm_name, adm_passworddef = :adm_passworddef, adm_address = :adm_address, adm_phone = :adm_phone, adm_email = :adm_email, adm_position = :adm_position WHERE adm_id = :adm_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtadm")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'guru':
                switch ($act) {
                    case 'detail':
                        $data = array(
                            'tch_id'    => $data['usr_id']
                        );
                        return $this->db->kueri("SELECT * FROM $this->dttch WHERE tch_id = :tch_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(tch_id) as kode FROM $this->dttch")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 6); 
                        $no_max = ++$no_max;
                        return date('Y') . '3' . sprintf("%03s", $no_max);
                        break;

                    case 'photo-upload':
                        $this->db->kueri("UPDATE $this->dtusr SET usr_photo = :tch_photo WHERE usr_id = :tch_id")->ikat($data)->eksekusi()->baris_terefek();
                        return $this->db->kueri("UPDATE $this->dttch SET tch_photo = :tch_photo WHERE tch_id = :tch_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'tch_id'					=> $data['tch_id'],
                            'tch_idnumber'				=> $data['tch_idnumber'],
                            'tch_name'					=> $data['tch_name'],
                            'tch_passworddef'			=> date('dmY', strtotime($data['tch_birthdate'])),
                            'tch_gender'				=> (isset($data['tch_gender'])) ? $data['tch_gender'] : '',
                            'tch_birthplace'			=> $data['tch_birthplace'],
                            'tch_birthdate'				=> date('Y-m-d', strtotime($data['tch_birthdate'])),
                            'tch_nik'					=> $data['tch_nik'],
                            'tch_nuptk'					=> $data['tch_nuptk'],
                            'tch_est'					=> (isset($data['tch_est'])) ? $data['tch_est'] : '',
                            'tch_ptk'					=> (isset($data['tch_ptk'])) ? $data['tch_ptk'] : '',
                            'tch_fieldofstudy'			=> $data['tch_fieldofstudy'],
                            'tch_religion'				=> (isset($data['tch_religion'])) ? $data['tch_religion'] : '',
                            'tch_streetaddress'			=> $data['tch_streetaddress'],
                            'tch_rt'					=> $data['tch_rt'],
                            'tch_rw'					=> $data['tch_rw'],
                            'tch_hamlet'				=> $data['tch_hamlet'],
                            'tch_village'				=> $data['tch_village'],
                            'tch_district'				=> $data['tch_district'],
                            'tch_postalcode'			=> $data['tch_postalcode'],
                            'tch_phone'					=> $data['tch_phone'],
                            'tch_email'					=> $data['tch_email'],
                            'tch_additionalassignment'	=> $data['tch_additionalassignment'],
                            'tch_status'				=> (isset($data['tch_status'])) ? 'on' : 'off',
                            'tch_foundationacc'			=> $data['tch_foundationacc'],
                            'tch_foundationaccdate'		=> date('Y-m-d', strtotime($data['tch_foundationaccdate'])),
                            'tch_salarysource'			=> $data['tch_salarysource'],
                            'tch_mothername'			=> $data['tch_mothername'],
                            'tch_maritalstatus'			=> (isset($data['tch_maritalstatus'])) ? 'on' : 'off',
                            'tch_maritalpartner'		=> $data['tch_maritalpartner'],
                            'tch_maritalpartnernik'		=> $data['tch_maritalpartnernik'],
                            'tch_maritalpartnerjob'		=> $data['tch_maritalpartnerjob'],
                            'tch_npwp'					=> $data['tch_npwp'],
                            'tch_nationality'			=> $data['tch_nationality'],
                            'tch_photo'					=> ''
                        );
                        return $this->db->kueri("INSERT INTO $this->dttch VALUES (:tch_id, :tch_idnumber, :tch_name, :tch_passworddef, :tch_gender, :tch_birthplace, :tch_birthdate, :tch_nik, :tch_nuptk, :tch_est, :tch_ptk, :tch_fieldofstudy, :tch_religion, :tch_streetaddress, :tch_rt, :tch_rw, :tch_hamlet, :tch_village, :tch_district, :tch_postalcode, :tch_phone, :tch_email, :tch_additionalassignment, :tch_status, :tch_foundationacc, :tch_foundationaccdate, :tch_salarysource, :tch_mothername, :tch_maritalstatus, :tch_maritalpartner, :tch_maritalpartnernik, :tch_maritalpartnerjob, :tch_npwp, :tch_nationality, :tch_photo)")
                                        ->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'tch_id'					=> $data['tch_id'],
                            'tch_idnumber'				=> $data['tch_idnumber'],
                            'tch_name'					=> $data['tch_name'],
                            'tch_passworddef'			=> date('dmY', strtotime($data['tch_birthdate'])),
                            'tch_gender'				=> (isset($data['tch_gender'])) ? $data['tch_gender'] : '',
                            'tch_birthplace'			=> $data['tch_birthplace'],
                            'tch_birthdate'				=> date('Y-m-d', strtotime($data['tch_birthdate'])),
                            'tch_nik'					=> $data['tch_nik'],
                            'tch_nuptk'					=> $data['tch_nuptk'],
                            'tch_est'					=> (isset($data['tch_est'])) ? $data['tch_est'] : '',
                            'tch_ptk'					=> (isset($data['tch_ptk'])) ? $data['tch_ptk'] : '',
                            'tch_fieldofstudy'			=> $data['tch_fieldofstudy'],
                            'tch_religion'				=> (isset($data['tch_religion'])) ? $data['tch_religion'] : '',
                            'tch_streetaddress'			=> $data['tch_streetaddress'],
                            'tch_rt'					=> $data['tch_rt'],
                            'tch_rw'					=> $data['tch_rw'],
                            'tch_hamlet'				=> $data['tch_hamlet'],
                            'tch_village'				=> $data['tch_village'],
                            'tch_district'				=> $data['tch_district'],
                            'tch_postalcode'			=> $data['tch_postalcode'],
                            'tch_phone'					=> $data['tch_phone'],
                            'tch_email'					=> $data['tch_email'],
                            'tch_additionalassignment'	=> $data['tch_additionalassignment'],
                            'tch_status'				=> (isset($data['tch_status'])) ? 'on' : 'off',
                            'tch_foundationacc'			=> $data['tch_foundationacc'],
                            'tch_foundationaccdate'		=> date('Y-m-d', strtotime($data['tch_foundationaccdate'])),
                            'tch_salarysource'			=> $data['tch_salarysource'],
                            'tch_mothername'			=> $data['tch_mothername'],
                            'tch_maritalstatus'			=> (isset($data['tch_maritalstatus'])) ? 'on' : 'off',
                            'tch_maritalpartner'		=> $data['tch_maritalpartner'],
                            'tch_maritalpartnernik'		=> $data['tch_maritalpartnernik'],
                            'tch_maritalpartnerjob'		=> $data['tch_maritalpartnerjob'],
                            'tch_npwp'					=> $data['tch_npwp'],
                            'tch_nationality'			=> $data['tch_nationality'],
                        );
                        return $this->db->kueri("UPDATE $this->dttch SET tch_idnumber = :tch_idnumber, tch_name = :tch_name, tch_passworddef = :tch_passworddef, tch_gender = :tch_gender, tch_birthplace = :tch_birthplace, tch_birthdate = :tch_birthdate, tch_nik = :tch_nik, tch_nuptk = :tch_nuptk, tch_est = :tch_est, tch_ptk = :tch_ptk, tch_fieldofstudy = :tch_fieldofstudy, tch_religion = :tch_religion, tch_streetaddress = :tch_streetaddress, tch_rt = :tch_rt, tch_rw = :tch_rw, tch_hamlet = :tch_hamlet, tch_village = :tch_village, tch_district = :tch_district, tch_postalcode = :tch_postalcode, tch_phone = :tch_phone, tch_email = :tch_email, tch_additionalassignment = :tch_additionalassignment, tch_status = :tch_status, tch_foundationacc = :tch_foundationacc, tch_foundationaccdate = :tch_foundationaccdate, tch_salarysource = :tch_salarysource, tch_mothername = :tch_mothername, tch_maritalstatus = :tch_maritalstatus, tch_maritalpartner = :tch_maritalpartner, tch_maritalpartnernik = :tch_maritalpartnernik, tch_maritalpartnerjob = :tch_maritalpartnerjob, tch_npwp = :tch_npwp, tch_nationality = :tch_nationality WHERE tch_id = :tch_id")
                                        ->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dttch")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'kepala-sekolah':
                switch ($act) {
                    case 'update':
                        $data = array(
                            'hdm_id'        => $data['hdm_id'],
                            'hdm_idnumber'  => $data['hdm_idnumber'],
                            'hdm_name'      => $data['hdm_name'],
                            'hdm_passdef'   => $data['hdm_idnumber'],
                            'hdm_address'   => $data['hdm_address'],
                            'hdm_phone'     => $data['hdm_phone'],
                            'hdm_email'     => $data['hdm_email'],
                            'hdm_position'  => $data['hdm_position']
                        );
                        return $this->db->kueri("UPDATE $this->dthdm SET hdm_idnumber = :hdm_idnumber, hdm_name = :hdm_name, hdm_passworddef = :hdm_passdef, hdm_address = :hdm_address, hdm_phone = :hdm_phone, hdm_email = :hdm_email, hdm_position = :hdm_position WHERE hdm_id = :hdm_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        $data = array('id' => '20202001');
                        return $this->db->kueri("SELECT * FROM $this->dthdm WHERE hdm_id = :id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;
                }
                break;

            case 'keuangan':
                # code...
                break;

            case 'siswa':
                switch ($act) {
                    case 'detail':
                        $data = array(
                            'stu_id'    => $data['usr_id']
                        );
                        return $this->db->kueri("SELECT * FROM $this->dtstu JOIN $this->dtcls ON stu_cls = cls_id JOIN $this->dtmjr ON stu_mjr = mjr_id WHERE stu_id = :stu_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(stu_id) as kode FROM $this->dtstu")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 6); 
                        $no_max = ++$no_max;
                        return date('Y') . '0' . sprintf("%03s", $no_max);
                        break;

                    case 'list':
                        return $this->db->kueri("SELECT * FROM $this->dtstu WHERE stu_generation = :lst_gen AND stu_cls = :lst_cls")->ikat($data)->eksekusi()->hasil_jamak();
                        break;

                    case 'photo-upload':
                        $this->db->kueri("UPDATE $this->dtusr SET usr_photo = :stu_photo WHERE usr_id = :stu_id")->ikat($data)->eksekusi()->baris_terefek();
                        return $this->db->kueri("UPDATE $this->dtstu SET stu_photo = :stu_photo WHERE stu_id = :stu_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'tambah':
                        $data = array(
                            'stu_id'            => $data['stu_id'],
                            'stu_idnumber'      => $data['stu_idnumber'],
                            'stu_nisn'          => $data['stu_nisn'],
                            'stu_passworddef'   => date('dmY', strtotime($data['stu_birthdate'])),
                            'stu_name'          => $data['stu_name'],
                            'stu_gender'        => (isset($data['stu_gender'])) ? $data['stu_gender'] : '',
                            'stu_birthplace'    => $data['stu_birthplace'],
                            'stu_birthdate'     => date('Y-m-d', strtotime($data['stu_birthdate'])),
                            'stu_religion'      => (isset($data['stu_religion'])) ? $data['stu_religion'] : '',
                            'stu_nik'           => $data['stu_nik'],
                            'stu_specialneeds'  => $data['stu_specialneeds'],
                            'stu_address'       => (isset($data['stu_address'])) ? $data['stu_address'] : '',
                            'stu_rt'            => $data['stu_rt'],
                            'stu_rw'            => $data['stu_rw'],
                            'stu_hamlet'        => $data['stu_hamlet'],
                            'stu_village'       => $data['stu_village'],
                            'stu_district'      => $data['stu_district'],
                            'stu_postalcode'    => $data['stu_postalcode'],
                            'stu_placetolive'   => $data['stu_placetolive'],
                            'stu_transportation'=> $data['stu_transportation'],
                            'stu_phone'         => $data['stu_phone'],
                            'stu_email'         => $data['stu_email'],
                            'stu_skhun'         => $data['stu_skhun'],
                            'stu_kpsrecipient'  => (isset($data['stu_kpsrecipient'])) ? 'on' : 'off',
                            'stu_kpsnumber'     => $data['stu_kpsnumber'],
                            'stu_photo'         => '',
                            'stu_father_name'           => $data['stu_father_name'],
                            'stu_father_birthplace'     => $data['stu_father_birthplace'],
                            'stu_father_birthdate'      => date('Y-m-d', strtotime($data['stu_father_birthdate'])),
                            'stu_father_education'      => $data['stu_father_education'],
                            'stu_father_job'            => $data['stu_father_job'],
                            'stu_father_salary'         => $data['stu_father_salary'],
                            'stu_father_specialneeds'   => $data['stu_father_specialneeds'],
                            'stu_father_phone'          => $data['stu_father_phone'],
                            'stu_mother_name'           => $data['stu_mother_name'],
                            'stu_mother_birthplace'     => $data['stu_mother_birthplace'],
                            'stu_mother_birthdate'      => date('Y-m-d', strtotime($data['stu_mother_birthdate'])),
                            'stu_mother_education'      => $data['stu_mother_education'],
                            'stu_mother_job'            => $data['stu_mother_job'],
                            'stu_mother_salary'         => $data['stu_mother_salary'],
                            'stu_mother_specialneeds'   => $data['stu_mother_specialneeds'],
                            'stu_mother_phone'          => $data['stu_mother_phone'],
                            'stu_guardian_name'         => $data['stu_guardian_name'],
                            'stu_guardian_birthplace'   => $data['stu_guardian_birthplace'],
                            'stu_guardian_birthdate'    => date('Y-m-d', strtotime($data['stu_guardian_birthdate'])),
                            'stu_guardian_education'    => $data['stu_guardian_education'],
                            'stu_guardian_job'          => $data['stu_guardian_job'],
                            'stu_guardian_salary'       => $data['stu_guardian_salary'],
                            'stu_guardian_specialneeds' => $data['stu_guardian_specialneeds'],
                            'stu_guardian_phone'        => $data['stu_guardian_phone'],
                            'stu_generation'    => (int) $data['stu_generation'],
                            'stu_initialstatus' => $data['stu_initialstatus'],
                            'stu_studentstatus' => (isset($data['stu_studentstatus'])) ? 'on' : 'off',
                            'stu_grade'         => (isset($data['stu_grade'])) ? $data['stu_grade'] : '',
                            'stu_cls'           => (isset($data['stu_cls'])) ? $data['stu_cls'] : '',
                            'stu_mjr'           => (isset($data['stu_mjr'])) ? $data['stu_mjr'] : ''
                        );
                        return $this->db->kueri("INSERT INTO $this->dtstu VALUES (:stu_id, :stu_idnumber, :stu_nisn, :stu_passworddef, :stu_name, :stu_gender, :stu_birthplace, :stu_birthdate, :stu_religion, :stu_nik, :stu_specialneeds, :stu_address, :stu_rt, :stu_rw, :stu_hamlet, :stu_village, :stu_district, :stu_postalcode, :stu_placetolive, :stu_transportation, :stu_phone, :stu_email, :stu_skhun, :stu_kpsrecipient, :stu_kpsnumber, :stu_photo, :stu_father_name, :stu_father_birthplace, :stu_father_birthdate, :stu_father_education, :stu_father_job, :stu_father_salary, :stu_father_specialneeds, :stu_father_phone, :stu_mother_name, :stu_mother_birthplace, :stu_mother_birthdate, :stu_mother_education, :stu_mother_job, :stu_mother_salary, :stu_mother_specialneeds, :stu_mother_phone, :stu_guardian_name, :stu_guardian_birthplace, :stu_guardian_birthdate, :stu_guardian_education, :stu_guardian_job, :stu_guardian_salary, :stu_guardian_specialneeds, :stu_guardian_phone, :stu_generation, :stu_initialstatus, :stu_studentstatus, :stu_grade, :stu_cls, :stu_mjr)")
                                        ->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'stu_id'            => $data['stu_id'],
                            'stu_idnumber'      => $data['stu_idnumber'],
                            'stu_nisn'          => $data['stu_nisn'],
                            'stu_passworddef'   => date('dmY', strtotime($data['stu_birthdate'])),
                            'stu_name'          => $data['stu_name'],
                            'stu_gender'        => (isset($data['stu_gender'])) ? $data['stu_gender'] : '',
                            'stu_birthplace'    => $data['stu_birthplace'],
                            'stu_birthdate'     => date('Y-m-d', strtotime($data['stu_birthdate'])),
                            'stu_religion'      => (isset($data['stu_religion'])) ? $data['stu_religion'] : '',
                            'stu_nik'           => $data['stu_nik'],
                            'stu_specialneeds'  => $data['stu_specialneeds'],
                            'stu_address'       => (isset($data['stu_address'])) ? $data['stu_address'] : '',
                            'stu_rt'            => $data['stu_rt'],
                            'stu_rw'            => $data['stu_rw'],
                            'stu_hamlet'        => $data['stu_hamlet'],
                            'stu_village'       => $data['stu_village'],
                            'stu_district'      => $data['stu_district'],
                            'stu_postalcode'    => $data['stu_postalcode'],
                            'stu_placetolive'   => $data['stu_placetolive'],
                            'stu_transportation'=> $data['stu_transportation'],
                            'stu_phone'         => $data['stu_phone'],
                            'stu_email'         => $data['stu_email'],
                            'stu_skhun'         => $data['stu_skhun'],
                            'stu_kpsrecipient'  => (isset($data['stu_kpsrecipient'])) ? 'on' : 'off',
                            'stu_kpsnumber'     => $data['stu_kpsnumber'],
                            'stu_father_name'           => $data['stu_father_name'],
                            'stu_father_birthplace'     => $data['stu_father_birthplace'],
                            'stu_father_birthdate'      => date('Y-m-d', strtotime($data['stu_father_birthdate'])),
                            'stu_father_education'      => $data['stu_father_education'],
                            'stu_father_job'            => $data['stu_father_job'],
                            'stu_father_salary'         => $data['stu_father_salary'],
                            'stu_father_specialneeds'   => $data['stu_father_specialneeds'],
                            'stu_father_phone'          => $data['stu_father_phone'],
                            'stu_mother_name'           => $data['stu_mother_name'],
                            'stu_mother_birthplace'     => $data['stu_mother_birthplace'],
                            'stu_mother_birthdate'      => date('Y-m-d', strtotime($data['stu_mother_birthdate'])),
                            'stu_mother_education'      => $data['stu_mother_education'],
                            'stu_mother_job'            => $data['stu_mother_job'],
                            'stu_mother_salary'         => $data['stu_mother_salary'],
                            'stu_mother_specialneeds'   => $data['stu_mother_specialneeds'],
                            'stu_mother_phone'          => $data['stu_mother_phone'],
                            'stu_guardian_name'         => $data['stu_guardian_name'],
                            'stu_guardian_birthplace'   => $data['stu_guardian_birthplace'],
                            'stu_guardian_birthdate'    => date('Y-m-d', strtotime($data['stu_guardian_birthdate'])),
                            'stu_guardian_education'    => $data['stu_guardian_education'],
                            'stu_guardian_job'          => $data['stu_guardian_job'],
                            'stu_guardian_salary'       => $data['stu_guardian_salary'],
                            'stu_guardian_specialneeds' => $data['stu_guardian_specialneeds'],
                            'stu_guardian_phone'        => $data['stu_guardian_phone'],
                            'stu_generation'    => (int) $data['stu_generation'],
                            'stu_initialstatus' => $data['stu_initialstatus'],
                            'stu_studentstatus' => (isset($data['stu_studentstatus'])) ? 'on' : 'off',
                            'stu_grade'         => (isset($data['stu_grade'])) ? $data['stu_grade'] : '',
                            'stu_cls'           => (isset($data['stu_cls'])) ? $data['stu_cls'] : '',
                            'stu_mjr'           => (isset($data['stu_mjr'])) ? $data['stu_mjr'] : ''
                        );
                        return $this->db->kueri("UPDATE $this->dtstu SET stu_idnumber = :stu_idnumber, stu_nisn = :stu_nisn, stu_passworddef = :stu_passworddef, stu_name = :stu_name, stu_gender = :stu_gender, stu_birthplace = :stu_birthplace, stu_birthdate = :stu_birthdate, stu_religion = :stu_religion, stu_nik = :stu_nik, stu_specialneeds = :stu_specialneeds, stu_address = :stu_address, stu_rt = :stu_rt, stu_rw = :stu_rw, stu_hamlet = :stu_hamlet, stu_village = :stu_village, stu_district = :stu_district, stu_postalcode = :stu_postalcode, stu_placetolive = :stu_placetolive, stu_transportation = :stu_transportation, stu_phone = :stu_phone, stu_email = :stu_email, stu_skhun = :stu_skhun, stu_kpsrecipient = :stu_kpsrecipient, stu_kpsnumber = :stu_kpsnumber, stu_father_name = :stu_father_name, stu_father_birthplace = :stu_father_birthplace, stu_father_birthdate = :stu_father_birthdate, stu_father_education = :stu_father_education, stu_father_job = :stu_father_job, stu_father_salary = :stu_father_salary, stu_father_specialneeds = :stu_father_specialneeds, stu_father_phone = :stu_father_phone, stu_mother_name = :stu_mother_name, stu_mother_birthplace = :stu_mother_birthplace, stu_mother_birthdate = :stu_mother_birthdate, stu_mother_education = :stu_mother_education, stu_mother_job = :stu_mother_job, stu_mother_salary = :stu_mother_salary, stu_mother_specialneeds = :stu_mother_specialneeds, stu_mother_phone = :stu_mother_phone, stu_guardian_name = :stu_guardian_name, stu_guardian_birthplace = :stu_guardian_birthplace, stu_guardian_birthdate = :stu_guardian_birthdate, stu_guardian_education = :stu_guardian_education, stu_guardian_job = :stu_guardian_job, stu_guardian_salary = :stu_guardian_salary, stu_guardian_specialneeds = :stu_guardian_specialneeds, stu_guardian_phone = :stu_guardian_phone, stu_generation = :stu_generation, stu_initialstatus = :stu_initialstatus, stu_studentstatus = :stu_studentstatus, stu_grade = :stu_grade, stu_cls = :stu_cls, stu_mjr = :stu_mjr WHERE stu_id = :stu_id")
                                        ->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtstu")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'user':
                switch ($act) {
                    case 'detail':
                        $data = array('usr_id' => $data);
                        return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id = :usr_id")->ikat($data)
                                        ->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        $data = array('usr_id' => $data['usr_id']);
                        return $this->db->kueri("DELETE FROM $this->dtusr WHERE usr_id = :usr_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'reset':
                        $data = array(
                            'usr_name'  => $data['usr_name'],
                            'usr_pass'  => md5($data['usr_password']),
                            'usr_id'    => $data['usr_id']
                        );
                        return $this->db->kueri("UPDATE $this->dtusr SET usr_name = :usr_name, usr_password = :usr_pass WHERE usr_id = :usr_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'search':
                        $data = array(
                            'src_query' => '%' . $data['query'] . '%'
                        );
                        return $this->db->kueri("SELECT * FROM $this->dtusr WHERE usr_id LIKE :src_query OR usr_name LIKE :src_query LIMIT 10")->ikat($data)
                                        ->eksekusi()->hasil_jamak();
                        break;

                    case 'tambah-adm':
                        $data = array(
                            'usr_id'    => $data['adm_id'],
                            'usr_name'  => $data['adm_idnumber'],
                            'usr_pass'  => md5($data['adm_passworddef']),
                            'usr_role'  => 1,
                            'usr_photo' => '',
                            'usr_status'=> (isset($data['adm_status'])) ? "on" : "off",
                        );
                        return $this->db->kueri("INSERT INTO $this->dtusr VALUES (:usr_id, :usr_name, :usr_pass, :usr_role, :usr_photo, :usr_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah-fin':
                        # code...
                        break;

                    case 'tambah-hdm':
                        $data = array(
                            'usr_id'    => $data['hdm_id'],
                            'usr_name'  => $data['hdm_idnumber'],
                            'usr_pass'  => md5($data['hdm_idnumber']),
                            'usr_role'  => 2,
                            'usr_photo' => '',
                            'usr_status'=> 'on'
                        );
                        return $this->db->kueri("UPDATE $this->dtusr SET usr_name = :usr_name, usr_password = :usr_pass, usr_role = :usr_role, usr_photo = :usr_photo, usr_status = :usr_status WHERE usr_id = :usr_id")->ikat($data)
                                         ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah-tch':
                        $data = array(
                            'usr_id'    => $data['tch_id'],
                            'usr_name'  => $data['tch_idnumber'],
                            'usr_pass'  => md5(date('dmY', strtotime($data['tch_birthdate']))),
                            'usr_role'  => 3,
                            'usr_photo' => '',
                            'usr_status'=> (isset($data['tch_status'])) ? "on" : "off"
                        );
                        return $this->db->kueri("INSERT INTO $this->dtusr VALUES (:usr_id, :usr_name, :usr_pass, :usr_role, :usr_photo, :usr_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'tambah-stu':
                        $data = array(
                            'usr_id'    => $data['stu_id'],
                            'usr_name'  => $data['stu_idnumber'],
                            'usr_pass'  => md5(date('dmY', strtotime($data['stu_birthdate']))),
                            'usr_role'  => 0,
                            'usr_photo' => '',
                            'usr_status'=> (isset($data['stu_status'])) ? "on" : "off"
                        );
                        return $this->db->kueri("INSERT INTO $this->dtusr VALUES (:usr_id, :usr_name, :usr_pass, :usr_role, :usr_photo, :usr_status)")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;

                    case 'update-status-val':
                        $data = array(
                            'usr_id'    => $data['usr_id'],
                            'usr_status'=> $data['usr_status']
                        );
                        return $this->db->kueri("UPDATE $this->dtusr SET usr_status = :usr_status WHERE usr_id = :usr_id")->ikat($data)
                                        ->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtusr LIMIT 10")->eksekusi()->hasil_jamak();
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    function akademik($menu = '', $act = '', $data = '')
    {
        switch ($menu) {
            case 'kelompok-mapel':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtsgr WHERE sgr_id = :sgr_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtsgr WHERE sgr_id = :sgr_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(sgr_id) as kode FROM $this->dtsgr")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'G-' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        return $this->db->kueri("INSERT INTO $this->dtsgr VALUES (:sgr_id, :sgr_group, :sgr_name)")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtsgr SET sgr_group = :sgr_group, sgr_name = :sgr_name WHERE sgr_id = :sgr_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtsgr")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'jadwal':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_id = :ssc_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtssc WHERE ssc_id = :ssc_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(ssc_id) as kode FROM $this->dtssc")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 5);
                        $no_max = ++$no_max;
                        $semest = ((int) date('m') < 7) ? '1' : '2';
                        return 'SC' . date('y') . $semest . sprintf("%03s", $no_max);
                        break;

                    case 'list':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dttch ON ssc_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_fys = :ssc_fys AND ssc_cls = :ssc_cls AND ssc_day = :ssc_day AND ssc_status = :ssc_stt")->ikat($data)->eksekusi()->hasil_jamak();
                        break;

                    case 'list-guru':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dttch ON ssc_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_tch = :ssc_tch")->ikat($data)->eksekusi()->hasil_jamak();
                        break;

                    case 'list-hari':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dttch ON ssc_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_day = :ssc_day")->ikat($data)->eksekusi()->hasil_jamak();
                        break;

                    case 'list-kelas':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dttch ON ssc_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_cls = :ssc_cls ORDER BY ssc_timestart ASC")->ikat($data)->eksekusi()->hasil_jamak();
                        break;

                    case 'non-aktif':
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dttch ON ssc_tch = tch_id JOIN $this->dtrom ON cls_rom = rom_id WHERE ssc_status = 'off'")->eksekusi()->hasil_jamak();
                        break;

                    case 'tambah':
                        $data['ssc_timestart'] = date('H:i:s', strtotime($data['ssc_timestart']));
                        $data['ssc_timeend'] = date('H:i:s', strtotime($data['ssc_timeend']));
                        $data['ssc_status'] = (isset($data['ssc_status'])) ? 'on' : 'off';
                        return $this->db->kueri("INSERT INTO $this->dtssc VALUES (:ssc_id, :ssc_fys, :ssc_cls, :ssc_sbj, :ssc_tch, :ssc_learntime, :ssc_timestart, :ssc_timeend, :ssc_day, :ssc_status)")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data['ssc_timestart'] = date('H:i:s', strtotime($data['ssc_timestart']));
                        $data['ssc_timeend'] = date('H:i:s', strtotime($data['ssc_timeend']));
                        $data['ssc_status'] = (isset($data['ssc_status'])) ? 'on' : 'off';
                        return $this->db->kueri("UPDATE $this->dtssc SET ssc_fys = :ssc_fys, ssc_cls = :ssc_cls, ssc_sbj = :ssc_sbj, ssc_tch = :ssc_tch, ssc_learntime = :ssc_learntime, ssc_timestart = :ssc_timestart, ssc_timeend = :ssc_timeend, ssc_day = :ssc_day, ssc_status = :ssc_status WHERE ssc_id = :ssc_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtssc JOIN $this->dtfys ON ssc_fys = fys_id JOIN $this->dtcls ON ssc_cls = cls_id JOIN $this->dtsbj ON ssc_sbj = sbj_id JOIN $this->dtrom ON cls_rom = rom_id JOIN $this->dttch ON ssc_tch = tch_id")->eksekusi()->hasil_jamak();
                        break;
                }
                break;

            case 'mapel':
                switch ($act) {
                    case 'detail':
                        return $this->db->kueri("SELECT * FROM $this->dtsbj JOIN $this->dttch ON sbj_tch = tch_id JOIN $this->dtcur ON sbj_cur = cur_id JOIN $this->dtsgr ON sbj_sgr = sgr_id JOIN $this->dtmjr ON sbj_mjr = mjr_id WHERE sbj_id = :sbj_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtsbj WHERE sbj_id = :sbj_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(sbj_id) as kode FROM $this->dtsbj")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'MP' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        $data = array(
                            'sbj_id'            => $data['sbj_id'],
                            'sbj_name'          => $data['sbj_name'],
                            'sbj_nameen'        => $data['sbj_nameen'],
                            'sbj_class'         => $data['sbj_class'],
                            'sbj_competence'    => $data['sbj_competence'],
                            'sbj_sgr'           => (isset($data['sbj_sgr'])) ? $data['sbj_sgr'] : '',
                            'sbj_mjr'           => (isset($data['sbj_mjr'])) ? $data['sbj_mjr'] : '',
                            'sbj_tch'           => (isset($data['sbj_tch'])) ? $data['sbj_tch'] : '',
                            'sbj_cur'           => (isset($data['sbj_cur'])) ? $data['sbj_cur'] : '',
                            'sbj_status'        => (isset($data['sbj_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("INSERT INTO $this->dtsbj VALUES (:sbj_id, :sbj_name, :sbj_nameen, :sbj_class, :sbj_competence, :sbj_sgr, :sbj_mjr, :sbj_tch, :sbj_cur, :sbj_status)")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        $data = array(
                            'sbj_id'            => $data['sbj_id'],
                            'sbj_name'          => $data['sbj_name'],
                            'sbj_nameen'        => $data['sbj_nameen'],
                            'sbj_class'         => $data['sbj_class'],
                            'sbj_competence'    => $data['sbj_competence'],
                            'sbj_sgr'           => (isset($data['sbj_sgr'])) ? $data['sbj_sgr'] : '',
                            'sbj_mjr'           => (isset($data['sbj_mjr'])) ? $data['sbj_mjr'] : '',
                            'sbj_tch'           => (isset($data['sbj_tch'])) ? $data['sbj_tch'] : '',
                            'sbj_cur'           => (isset($data['sbj_cur'])) ? $data['sbj_cur'] : '',
                            'sbj_status'        => (isset($data['sbj_status'])) ? 'on' : 'off'
                        );
                        return $this->db->kueri("UPDATE $this->dtsbj SET sbj_name = :sbj_name, sbj_nameen = :sbj_nameen, sbj_class = :sbj_class, sbj_competence = :sbj_competence, sbj_sgr = :sbj_sgr, sbj_mjr = :sbj_mjr, sbj_tch = :sbj_tch, sbj_cur = :sbj_cur, sbj_status = :sbj_status WHERE sbj_id = :sbj_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtsbj JOIN $this->dttch ON sbj_tch = tch_id")->eksekusi()->hasil_jamak();
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
                        return $this->db->kueri("SELECT * FROM $this->dtgrd WHERE grd_id = :grd_id")->ikat($data)->eksekusi()->hasil_tunggal();
                        break;

                    case 'hapus':
                        return $this->db->kueri("DELETE FROM $this->dtgrd WHERE grd_id = :grd_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'id-add':
                        $no_max = $this->db->kueri("SELECT max(grd_id) as kode FROM $this->dtgrd")->eksekusi()->hasil_tunggal();
                        $no_max = (int) substr($no_max['kode'], 3);
                        $no_max = ++$no_max;
                        return 'GR' . sprintf("%03s", $no_max);
                        break;

                    case 'tambah':
                        return $this->db->kueri("INSERT INTO $this->dtgrd VALUES (:grd_id, :grd_min, :grd_max, :grd_grade, :grd_information)")->ikat($data)->eksekusi()->baris_terefek();
                        break;

                    case 'update':
                        return $this->db->kueri("UPDATE $this->dtgrd SET grd_min = :grd_min, grd_max = :grd_max, grd_grade = :grd_grade, grd_information = :grd_information WHERE grd_id = :grd_id")->ikat($data)->eksekusi()->baris_terefek();
                        break;
                    
                    default:
                        return $this->db->kueri("SELECT * FROM $this->dtgrd")->eksekusi()->hasil_jamak();
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
}
