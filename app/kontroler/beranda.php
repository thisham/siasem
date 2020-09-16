<?php

/**
 * 
 */
class beranda extends Kontroler
{

	function __construct()
	{
		$this->session = new Session();
		$this->data = $this->model('m_data');
		if ($this->session->get('usr_role') == NULL) {
			header('location:' . basis_url('portal'));
			exit;
		}		
	}
	
	function indeks()
	{
		$acts = array('siswa', 'administrator', 'kepala-sekolah', 'guru', 'keuangan');
		$keys = array('stu_id', 'adm_id', 'hdm_id', 'tch_id', 'fin_id');
		$send[$keys[$this->session->get('usr_role')]] = $this->session->get('usr_id');
		$data = array(
			'title'	=> 'Beranda',
			'badan'	=> array (
				'dtusr'	=> $this->data->user($acts[$this->session->get('usr_role')], 'detail', $send),
				'dtstu'	=> $this->data->user('siswa'),
				'dttch'	=> $this->data->user('guru'),
				'dtmjr'	=> $this->data->master('jurusan')
			)
		);
		$this->tampilkan('pakem/header', $data);
		$this->tampilkan('pakem/navbar');
		$this->tampilkan('dasbor', $data);
		$this->tampilkan('pakem/footer');
	}
}