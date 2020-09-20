<?php

/**
 * 
 */
class portal extends Kontroler
{
	function __construct() {
		$this->portal = $this->model('m_portal');
		$this->session = new Session();
		
	}
	
	function indeks()
	{
		if ($this->session->get('usr_role') != NULL) {
			alihkan(basis_url());
			exit;
		}	
		$data = array(
			'title'	=> 'Portal'
		);
		$this->tampilkan('pakem/header', $data);
		$this->tampilkan('pakem/navbar', $data);
		$this->tampilkan('portal/masuk', $data);
		$this->tampilkan('pakem/footer', $data);
	}

	function aksi($menu = '')
	{
		switch ($menu) {
			case 'masuk':
				$send = $_POST;
				$acts = $this->portal->aksi('masuk', $send);
				if ($acts != NULL && $acts['usr_status'] == 'on') {
					$sesi = array(
						'usr_id'	=> $acts['usr_id'],
						'usr_name'	=> $acts['usr_name'],
						'usr_role'	=> $acts['usr_role'],
						'usr_photo'	=> $acts['usr_photo'],
						'usr_status'=> $acts['usr_status']
					);
					$this->session->set($sesi);
				}

				echo json_encode($acts);
				break;

			case 're-log':
				$this->tampilkan('portal/re-log');
				break;

			case 'keluar':
				if ($this->session->get('usr_id') != null) {
					$this->session->end('usr_id', 'usr_name', 'usr_role', 'usr_status', 'usr_photo');
					alihkan(basis_url());
				}
				break;
		}
	}
}