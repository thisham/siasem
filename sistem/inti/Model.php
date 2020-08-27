<?php

class Model {
    public function pustaka($pustaka)
	{
		require_once DIREKTORI . '/app/pustaka/' . $pustaka . '.php';
		return new $pustaka;
	}
	
	public function helper($helper)
	{
		require_once DIREKTORI . '/app/helper/' . $helper . '.php';
	}
}