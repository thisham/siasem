<?php

/**
 * 
 */
class portal extends Kontroler
{
	function __construct() {
		$this->portal = $this->model('m_portal');
		$this->session = new Session();
		if ($this->session->get('usr_role') != NULL) {
			header('location:' . basis_url());
			exit;
		}	
	}
	
	function indeks()
	{
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
				// var_dump($_POST);
				$send = $_POST;
				$acts = $this->portal->aksi('masuk', $send);
				if ($acts != NULL) {
					$sesi = array(
						'usr_id'	=> $acts['usr_id'],
						'usr_name'	=> $acts['usr_name'],
						'usr_role'	=> $acts['usr_role'],
						'usr_status'=> $acts['usr_status']
					);
					$this->session->set($sesi);
				}

				echo json_encode($acts);
				break;

			case 're-log':
				$this->tampilkan('portal/re-log');
				break;
		}
	}
}