<?php
/**
 * cms主页控制器
 * 显示后台主页
 * @author XiaoKeHao
 *
 */
class Main extends My_Controller {
	
	/**
	 * 后台主页
	 */
	public function index() {
		$this->load->view ( 'admin/common' );
	}
	
	/**
	 * 注销用户
	 */
	public function destroy() {
		$this->session->sess_destroy();
		redirect ( base_url () . 'admin/login' );//重定向到登录页面(绝对地址，隐藏index.php)
	}
	
	/**
	 * 测试页面
	 */
	public function test() {
		$this->load->view ( 'admin/common' );
		$this->load->view ( 'admin/user/add' );
	}
	
}

?>