<?php 

/**
 * 
 */
class Session
{
	
	function get($var)
	{
		$data	= NULL;
		if (isset($_SESSION[$var])) {
			$data	= $_SESSION[$var];
		}
		return $data;
	}

	function set($vars, $data = '')
	{
		if (is_array($vars)) {
			$_SESSION	= $vars;
		} else {
			$_SESSION[$vars]	= $data;
		}
	}

	function end(...$vars)
	{
		for ($i=0; $i < count($vars); $i++) { 
			unset($_SESSION[$vars[$i]]);
		}
		
	}
}