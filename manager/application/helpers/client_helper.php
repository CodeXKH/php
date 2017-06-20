<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// client url------------------------------------------------------------------------

if ( ! function_exists('client_url'))
{
	/**
	 * Client URL
	 */
	function base_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->base_url('client'.$uri, $protocol);
	}
}
