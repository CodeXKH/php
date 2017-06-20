<?php 
/**
 * cms登录页面控制器
 * 加载验证码数据，用户登录
 * @author XiaoKeHao
 *
 */
class Login extends CI_Controller{
	
	/**
	 * 加载登录页面
	 */
	public function index(){
		$this->load->model('CaptchaModel','captcha');
		$this->load->helper('captcha');
		$data['img']=$this->captcha->get_captcha();
		$this->load->view ( 'admin/login', $data );
	}
	
	
	/**
	 * 用户登录验证
	 */
	public function user() {
		$name = $this->input->post ( 'name' );
		$password = $this->input->post ( 'password' );
		$verimg = $this->input->post ( 'verimg' );
		$captcha = $this->session->userdata ( 'captcha' );
	
		if (strcasecmp ( $captcha ['rand'], $verimg ) == 0) {
				
			$this->load->model ( 'admin/LoginModel', 'login' ); // 调用模型获取数据
			$result = $this->login->get_user ( $name, md5 ( $password ) );
			if ($result > 0) {
				$this->session->set_userdata('name',$name); // 验证码的值存入session
				echo 1; // 用户名和密码正确
			} else {
				echo 2; // 用户名和密码不正确
			}
		} else {
			echo 0; // 验证码错误
		}
	}
}


?>