<?php
/**
 * 扩展CI控制器 
 * @author XiaoKeHao
 *
 */
class My_Controller extends CI_Controller {
	/**
	 * 登录拦截
	 */
	public function __construct() {
		parent::__construct ();
		$name = $this->session->userdata ( 'name' );
		
		if (!isset ( $name )) {
			redirect ( base_url () . 'admin/login' );//重定向到登录页面(绝对地址，隐藏index.php)
		}
		
		
	}
}

?>
