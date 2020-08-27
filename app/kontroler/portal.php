<?php

/**
 * 
 */
class portal extends Kontroler
{
	
	function indeks()
	{
		$data = array(
			'title'	=> 'Portal'
		);
		$this->tampilkan('pakem/header', $data);
		$this->tampilkan('portal/masuk', $data);
		$this->tampilkan('pakem/footer', $data);
	}

	function aksi($menu)
	{
		switch ($menu) {
			case 'masuk':
				$send = $_POST;
				break;
		}
	}
}