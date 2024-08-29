<?php
	if(! defined('ENVIRONMENT') )
	{
		$domain = strtolower($_SERVER['HTTP_HOST']);
		switch($domain) {
			case 'erp.heritagemind.com' : 						define('ENVIRONMENT', 'production'); 	break;
			case 'erp.heritagemind.com' : 						define('ENVIRONMENT', 'production'); 	break;
			case 'erp.heritagemind.com': 		define('ENVIRONMENT', 'staging'); 		break;
			default : 									define('ENVIRONMENT', 'development'); 	break;
		}
	}
?>